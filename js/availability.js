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

  $(document).on('click', '#btid', function() {
    var id = $('.checkitem:checked').map(function(){return $(this).val()}).get().join(' ');
    $.post('ajax/availability_update_ajax.php', {id: id}, function(data){
    });
  })


});
