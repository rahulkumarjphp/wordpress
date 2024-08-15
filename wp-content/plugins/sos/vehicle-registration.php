<?php
/*
Plugin Name: Vehicle Registration Plugin
Description: A plugin to register users, input vehicle and contact details, and manage user details.
Version: 1.0
Author: Your Name
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Register activation hook to create database tables.
register_activation_hook(__FILE__, 'vr_create_database_tables');

// Create database tables.
function vr_create_database_tables() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'vehicle_registration';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        user_id bigint(20) NOT NULL,
        name varchar(100) NOT NULL,
        mobile_number varchar(15) NOT NULL,
        vehicle_number varchar(15) NOT NULL,
        relative_mobile_1 varchar(15) NOT NULL,
        relative_mobile_2 varchar(15) NOT NULL,
        relative_mobile_3 varchar(15) NOT NULL,
        PRIMARY KEY  (id),
        UNIQUE KEY vehicle_number (vehicle_number)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Load scripts and styles
add_action('wp_enqueue_scripts', 'vr_enqueue_scripts');
function vr_enqueue_scripts() {
    // No scripts or styles required for now.
}

// Shortcode for user registration form
add_shortcode('vr_user_registration', 'vr_user_registration_form');
function vr_user_registration_form() {
    ob_start();
    ?>
    <h2>User Registration</h2>
    <form id="vr-registration-form" method="post">
        <p>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </p>
        <p>
            <label for="mobile_number">Mobile Number</label>
            <input type="text" id="mobile_number" name="mobile_number" required>
        </p>
        <p>
            <label for="vehicle_number">Vehicle Number</label>
            <input type="text" id="vehicle_number" name="vehicle_number" required>
        </p>
        <p>
            <label for="relative_mobile_1">Relative Mobile 1</label>
            <input type="text" id="relative_mobile_1" name="relative_mobile_1" required>
        </p>
        <p>
            <label for="relative_mobile_2">Relative Mobile 2</label>
            <input type="text" id="relative_mobile_2" name="relative_mobile_2" required>
        </p>
        <p>
            <label for="relative_mobile_3">Relative Mobile 3</label>
            <input type="text" id="relative_mobile_3" name="relative_mobile_3" required>
        </p>
        <p>
            <button type="submit" name="register_user">Register</button>
        </p>
    </form>
    <?php
    return ob_get_clean();
}

// Handle user registration
add_action('init', 'vr_handle_user_registration');
function vr_handle_user_registration() {
    if (isset($_POST['register_user'])) {
        $name = sanitize_text_field($_POST['name']);
        $mobile_number = sanitize_text_field($_POST['mobile_number']);
        $vehicle_number = sanitize_text_field($_POST['vehicle_number']);
        $relative_mobile_1 = sanitize_text_field($_POST['relative_mobile_1']);
        $relative_mobile_2 = sanitize_text_field($_POST['relative_mobile_2']);
        $relative_mobile_3 = sanitize_text_field($_POST['relative_mobile_3']);
        $user_id = get_current_user_id();

        global $wpdb;
        $table_name = $wpdb->prefix . 'vehicle_registration';

        $wpdb->insert(
            $table_name,
            array(
                'user_id' => $user_id,
                'name' => $name,
                'mobile_number' => $mobile_number,
                'vehicle_number' => $vehicle_number,
                'relative_mobile_1' => $relative_mobile_1,
                'relative_mobile_2' => $relative_mobile_2,
                'relative_mobile_3' => $relative_mobile_3,
            )
        );

        echo '<p>User registered successfully.</p>';
    }
}

// Shortcode for user dashboard
add_shortcode('vr_user_dashboard', 'vr_user_dashboard');
function vr_user_dashboard() {
    if (!is_user_logged_in()) {
        return '<p>You need to be logged in to access the dashboard.</p>';
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'vehicle_registration';
    $user_id = get_current_user_id();

    if (isset($_POST['update_user_details'])) {
        // Handle form submission to update user details
        $name = sanitize_text_field($_POST['name']);
        $mobile_number = sanitize_text_field($_POST['mobile_number']);
        $vehicle_number = sanitize_text_field($_POST['vehicle_number']);
        $relative_mobile_1 = sanitize_text_field($_POST['relative_mobile_1']);
        $relative_mobile_2 = sanitize_text_field($_POST['relative_mobile_2']);
        $relative_mobile_3 = sanitize_text_field($_POST['relative_mobile_3']);

        $wpdb->update(
            $table_name,
            array(
                'name' => $name,
                'mobile_number' => $mobile_number,
                'vehicle_number' => $vehicle_number,
                'relative_mobile_1' => $relative_mobile_1,
                'relative_mobile_2' => $relative_mobile_2,
                'relative_mobile_3' => $relative_mobile_3,
            ),
            array('user_id' => $user_id)
        );

        echo '<p>User details updated successfully.</p>';
    }

    $user_data = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM $table_name WHERE user_id = %d",
        $user_id
    ));

    ob_start();
    ?>
    <h2>User Dashboard</h2>
    <form id="vr-edit-form" method="post">
        <input type="hidden" name="update_user_details" value="1">
        <p>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo esc_attr($user_data->name); ?>" required>
        </p>
        <p>
            <label for="mobile_number">Mobile Number</label>
            <input type="text" id="mobile_number" name="mobile_number" value="<?php echo esc_attr($user_data->mobile_number); ?>" required>
        </p>
        <p>
            <label for="vehicle_number">Vehicle Number</label>
            <input type="text" id="vehicle_number" name="vehicle_number" value="<?php echo esc_attr($user_data->vehicle_number); ?>" required>
        </p>
        <p>
            <label for="relative_mobile_1">Relative Mobile 1</label>
            <input type="text" id="relative_mobile_1" name="relative_mobile_1" value="<?php echo esc_attr($user_data->relative_mobile_1); ?>" required>
        </p>
        <p>
            <label for="relative_mobile_2">Relative Mobile 2</label>
            <input type="text" id="relative_mobile_2" name="relative_mobile_2" value="<?php echo esc_attr($user_data->relative_mobile_2); ?>" required>
        </p>
        <p>
            <label for="relative_mobile_3">Relative Mobile 3</label>
            <input type="text" id="relative_mobile_3" name="relative_mobile_3" value="<?php echo esc_attr($user_data->relative_mobile_3); ?>" required>
        </p>
        <p>
            <button type="submit">Update</button>
        </p>
    </form>
    <?php
    return ob_get_clean();
}

// Shortcode for user search form
add_shortcode('vr_user_search', 'vr_user_search_form');
function vr_user_search_form() {
    ob_start();
    ?>
    <h2>Search User Details</h2>
    <form id="vr-search-form" method="post">
        <p>
            <label for="vehicle_number">Enter Vehicle Number</label>
            <input type="text" id="vehicle_number" name="vehicle_number" required>
        </p>
        <p>
            <button type="submit" name="search_user">Search</button>
        </p>
    </form>
    <?php
    return ob_get_clean();
}

// Handle user search
add_shortcode('vr_search_results', 'vr_user_search_results');
function vr_user_search_results() {
    if (isset($_POST['search_user'])) {
        $vehicle_number = sanitize_text_field($_POST['vehicle_number']);
        global $wpdb;
        $table_name = $wpdb->prefix . 'vehicle_registration';

        $user_data = $wpdb->get_row($wpdb->prepare(
            "SELECT * FROM $table_name WHERE vehicle_number = %s",
            $vehicle_number
        ));

        if ($user_data) {
            ob_start();
            ?>
            <h2>User Details for Vehicle Number <?php echo esc_html($vehicle_number); ?></h2>
            <p>Name: <?php echo esc_html($user_data->name); ?></p>
            <p>Mobile Number: <?php echo esc_html($user_data->mobile_number); ?></p>
            <p>Relative Mobile 1: <?php echo esc_html($user_data->relative_mobile_1); ?></p>
            <p>Relative Mobile 2: <?php echo esc_html($user_data->relative_mobile_2); ?></p>
            <p>Relative Mobile 3: <?php echo esc_html($user_data->relative_mobile_3); ?></p>
            <?php
            return ob_get_clean();
        } else {
            return '<p>No user found with this vehicle number.</p>';
        }
    }
}

// Admin menu and page
add_action('admin_menu', 'vr_admin_menu');
function vr_admin_menu() {
    add_menu_page(
        'User Details',
        'User Details',
        'manage_options',
        'user-details',
        'vr_admin_page',
        'dashicons-admin-users',
        6
    );
}

// Admin page content
function vr_admin_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'vehicle_registration';
    $users = $wpdb->get_results("SELECT * FROM $table_name");

    if (isset($_POST['update_user'])) {
        // Handle form submission to update user details by admin
        $user_id = intval($_POST['user_id']);
        $name = sanitize_text_field($_POST['name']);
        $mobile_number = sanitize_text_field($_POST['mobile_number']);
        $vehicle_number = sanitize_text_field($_POST['vehicle_number']);
        $relative_mobile_1 = sanitize_text_field($_POST['relative_mobile_1']);
        $relative_mobile_2 = sanitize_text_field($_POST['relative_mobile_2']);
        $relative_mobile_3 = sanitize_text_field($_POST['relative_mobile_3']);

        $wpdb->update(
            $table_name,
            array(
                'name' => $name,
                'mobile_number' => $mobile_number,
                'vehicle_number' => $vehicle_number,
                'relative_mobile_1' => $relative_mobile_1,
                'relative_mobile_2' => $relative_mobile_2,
                'relative_mobile_3' => $relative_mobile_3,
            ),
            array('user_id' => $user_id)
        );

        echo '<div class="updated"><p>User details updated successfully.</p></div>';
    }

    ?>
    <div class="wrap">
        <h2>User Details</h2>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>Vehicle Number</th>
                    <th>Relative Mobile 1</th>
                    <th>Relative Mobile 2</th>
                    <th>Relative Mobile 3</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <form method="post">
                            <input type="hidden" name="user_id" value="<?php echo $user->user_id; ?>">
                            <td><input type="text" name="name" value="<?php echo esc_attr($user->name); ?>"></td>
                            <td><input type="text" name="mobile_number" value="<?php echo esc_attr($user->mobile_number); ?>"></td>
                            <td><input type="text" name="vehicle_number" value="<?php echo esc_attr($user->vehicle_number); ?>"></td>
                            <td><input type="text" name="relative_mobile_1" value="<?php echo esc_attr($user->relative_mobile_1); ?>"></td>
                            <td><input type="text" name="relative_mobile_2" value="<?php echo esc_attr($user->relative_mobile_2); ?>"></td>
                            <td><input type="text" name="relative_mobile_3" value="<?php echo esc_attr($user->relative_mobile_3); ?>"></td>
                            <td><button type="submit" name="update_user">Update</button></td>
                        </form>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
}
