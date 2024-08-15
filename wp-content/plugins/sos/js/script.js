jQuery(document).ready(function($) {
    // Registration form submission
    $('#vr-register-form').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url: vr_ajax_object.ajax_url,
            method: 'POST',
            data: {
                action: 'vr_register_user',
                form_data: formData,
            },
            success: function(response) {
                if (response.success) {
                    alert('User registered successfully.');
                } else {
                    alert('Registration failed.');
                }
            }
        });
    });

    // Edit form submission
    $('#vr-edit-form').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url: vr_ajax_object.ajax_url,
            method: 'POST',
            data: {
                action: 'vr_edit_user',
                form_data: formData,
            },
            success: function(response) {
                if (response.success) {
                    alert('User details updated successfully.');
                } else {
                    alert('Update failed.');
                }
            }
        });
    });

    // Scan vehicle form submission
    $('#vr-scan-vehicle-form').on('submit', function(e) {
        e.preventDefault();
        var vehicleNumber = $('#scan_vehicle_number').val();

        $.ajax({
            url: vr_ajax_object.ajax_url,
            method: 'POST',
            data: {
                action: 'vr_scan_vehicle',
                vehicle_number: vehicleNumber,
            },
            success: function(response) {
                if (response.success) {
                    $('#vr-scan-result').html('<p>Vehicle found. Mobile Number: ' + response.data.mobile_number + '</p><button onclick="window.location.href=\'tel:' + response.data.mobile_number + '\'">Call Now</button>');
                } else {
                    $('#vr-scan-result').html('<p>Vehicle number not registered.</p>');
                }
            }
        });
    });
});
