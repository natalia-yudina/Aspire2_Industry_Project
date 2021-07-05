$(document).ready(function() {

    load_data();

    function load_data(page) {
        $.ajax({
            url: 'ajax/availability_list_ajax.php',
            method: "POST",
            data: {
                page: page
            },
            success: function(data) {
                $('#availability_data').html(data);
                $('#availability').DataTable({

                  // columnDefs: [ {
                  //     orderable: false,
                  //     className: 'select-checkbox',
                  //     targets:   0
                  // } ],
                  // select: {
                  //     style:    'multi'
                  // }

                });
            }
        })
    }

  // NI 05-07-2021 begin
  // $(document).on('click', '#btid', function() {
  //   var id = $('.checkitem:checked').map(function(){return $(this).val()}).get().join(' ');
  //   $.post('ajax/availability_update_ajax.php', {id: id}, function(data){
  //   });
  // })


  $(document).on('click', '#btid', function() {

    var id = $('.checkitem:checked').map(function(){return $(this).val()}).get().join(' ');

  $.ajax({
    // https://www.w3schools.com/jquery/ajax_ajax.asp
      type: 'POST',
      url: 'ajax/availability_update_ajax.php',
      data: {
          id:  id
      },
      success: function(result) {
          if (result.resultOK == true) {

              Swal.fire(
                  'Congratulations!',
                  'Availability records have just been updated',
                  'success'
              )

          } else {
            // alert(result.message);
          }
      }
  });
  });
  // NI 05-07-2021 end

});
