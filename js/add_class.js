$(document).ready(function() {

    // Button "Add class" click begin
     $(document).on('click', '.add_new_class', function() {

        var id_user         = $('#hcname').val().trim();
        var id_course       = $('#cname').val().trim();
        var day             = $('#day').val().trim();
        var start_time      = $('#stime').val().trim();
        var end_time        = $('#etime').val().trim();

        $.ajax({
            type: 'POST',
            url: 'ajax/add_class_ajax.php',
            data: {
                id_user:        id_user,
                id_course:      id_course,
                day:            day,
                start_time:     start_time,
                end_time:       end_time
            },
            success: function(result) {
                if (result.resultOK == true) {

                    $('#hcname').val('0');
                    $('#cname').val('0');
                    $('#day').val('');
                    $('#stime').val('');
                    $('#etime').val('');

                } else {

                  $('#hcname').val('0');
                  $('#cname').val('0');
                  $('#day').val('');
                  $('#stime').val('');
                  $('#etime').val('');
                }
            }
        });
    });
    // Button "Add class" click end
});
