$(document).ready(function() {

  $('.saveProfile').click(function() {
    var fname = $('#fname').val().trim();
    var lname = $('#lname').val().trim();
    var email = $('#email').val().trim();
    var phone = $('#phone').val().trim();
    var address = $('#address').val().trim();
    var id = $(this).attr('data-id').trim();

    $.ajax({
        type: 'POST',
        url: 'ajax/profile_update_ajax.php',
        data: {
            id: id,
            fname: fname,
            lname: lname,
            email: email,
            phone: phone,
            address: address
        },
        success: function(result) {
              $('#lb_fullname').html('<i class="fas fa-circle fs-6 p-2" style="color:#feca11;;"></i>' + fname + " " + lname);
              $('#lb_email').html('<i class="fas fa-envelope fs-6 p-2"></i>' + email);
              $('#lb_phone').html('<i class="fas fa-mobile-alt  fs-6 p-2"></i>' + phone);
              $('#lb_address').html('<i class="fas fa-map-marker-alt  fs-6 p-2"></i>' + address);
            },
            error: function() {
              alert('error');
            }
    });

});

});
