$(document).ready(function() {

     $(document).on('click', '.add_new_course', function() {
      // $('#course').submit(function(){

        var course_name = $('#cname').val().trim();
        var start_date  = $('#sdate').val().trim();
        var end_date    = $('#edate').val().trim();

        $.ajax({
          // https://www.w3schools.com/jquery/ajax_ajax.asp
            type: 'POST',
            url: 'ajax/add_course_ajax.php',
            data: {
                course_name:  course_name,
                start_date:   start_date,
                end_date:     end_date
            },
            success: function(result) {
                if (result.resultOK == true) {

                    $('#cname').val('');
                    $('#sdate').val('');
                    $('#edate').val('');

                    // NI 08-06-2021 begin
                    Swal.fire(
                        'Congratulations!',
                        'Record has just been inserted',
                        'success'
                    )
                    // NI 08-06-2021 end

                } else {
                  $('#cname').val('');
                  $('#sdate').val('');
                  $('#edate').val('');
                }
            }
        });
    });

});
