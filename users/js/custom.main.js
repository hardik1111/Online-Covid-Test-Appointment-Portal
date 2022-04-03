window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 3000);

function show_modal(target)
{
  $("#targetModal").load(target,function(){
      $("#targetModal").modal('show');
  });
}


$(document).ready(function() {

    $('#photodiv').hide();
    $('#changephoto').click(function() {
        if ($(this).is(':checked'))
            $('#photodiv').show(800);
        else
            $('#photodiv').hide(800);
    });



    $("#checkAll").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
    $('#delete-btn').click(function() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })
        if ($(".chkbox:checked").length > 0) {
            swalWithBootstrapButtons.fire({
                title: 'Are you sure ?',
                text: "You won't be able to delete this !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it !',
                cancelButtonText: 'No, cancel !',
                reverseButtons: true
              }).then((result) => {
                if (result.isConfirmed) {
                    $("#delete_form").submit();
                } else if (
                  result.dismiss === Swal.DismissReason.cancel
                ) {
                  swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Delete cancelled!',
                    'error'
                  )
                }
            })
        } else {
            Swal.fire(
                'The Alert ?',
                'Please Select at least one record',
                'question'
              )
        }
    });


    $('.single_delete_btn').click(function(e) {
        e.preventDefault();
        var dataId = $(this).closest('tr').find('.record-ID').text();
        dataId = dataId.trim(); // User Remove Extra Space From ID
        //alert(dataId);
        //console.log(cat_id);
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })
          swalWithBootstrapButtons.fire({
            title: 'Are you sure ?',
            text: "You won't be able to delete this !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it !',
            cancelButtonText: 'No, cancel !',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
                var checkboxId='checkbox'+dataId;
                $('#'+checkboxId).attr('checked', true);
                $("#delete_form").submit();
            } else if (
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                'Cancelled',
                'Delete cancelled!',
                'error'
              )
            }
        })
    });
    // // Category Delete alert
    // $('.single_delete_catbtn').click(function(e) {
    //     e.preventDefault();
    //     var dataId = $(this).closest('tr').find('.record-ID').text();
    //     dataId = dataId.trim(); // User Remove Extra Space From ID
    //     alert(dataId);
    //     return false;
    //     console.log(cat_id);
    //     const swalWithBootstrapButtons = Swal.mixin({
    //         customClass: {
    //           confirmButton: 'btn btn-success',
    //           cancelButton: 'btn btn-danger'
    //         },
    //         buttonsStyling: false
    //       })
    //       swalWithBootstrapButtons.fire({
    //         title: 'Are you sure ?',
    //         text: "This will delete all Subcategories and products related !",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonText: 'Yes, delete!',
    //         cancelButtonText: 'No, cancel!',
    //         reverseButtons: true
    //       }).then((result) => {
    //         if (result.isConfirmed) {
    //             var checkboxId='checkbox'+cat_id;
    //             $('#'+checkboxId).attr('checked', true);
    //             $("#del_form").submit();
    //         } else if (
    //           result.dismiss === Swal.DismissReason.cancel
    //         ) {
    //           swalWithBootstrapButtons.fire(
    //             'Cancelled',
    //             'Delete cancelled!',
    //             'error'
    //           )
    //         }
    //     })
    // });
    // $('#delete-catbtn').click(function() {
    //     const swalWithBootstrapButtons = Swal.mixin({
    //         customClass: {
    //           confirmButton: 'btn btn-success',
    //           cancelButton: 'btn btn-danger'
    //         },
    //         buttonsStyling: false
    //       })
    //     if ($(".chkbox:checked").length > 0) {
    //         swalWithBootstrapButtons.fire({
    //             title: 'Are you sure ?',
    //             text: "This will delete all Subcategories and products related !",
    //             icon: 'warning',
    //             showCancelButton: true,
    //             confirmButtonText: 'Yes, delete!',
    //             cancelButtonText: 'No, cancel!',
    //             reverseButtons: true
    //           }).then((result) => {
    //             if (result.isConfirmed) {
    //                 $("#del_form").submit();
    //             } else if (
    //               result.dismiss === Swal.DismissReason.cancel
    //             ) {
    //               swalWithBootstrapButtons.fire(
    //                 'Cancelled',
    //                 'Delete cancelled!',
    //                 'error'
    //               )
    //             }
    //         })
    //     } else {
    //         Swal.fire(
    //             'The Alert ?',
    //             'Please Select at least one record',
    //             'question'
    //           )
    //     }
    // });
    // // Subcategory Delete alert
    // $('.single_delete_subcatbtn').click(function(e) {
    //     e.preventDefault();
    //     var cat_id = $(this).closest('tr').find('.catId').text();
    //     cat_id = cat_id.trim(); // User Remove Extra Space From ID
    //     //console.log(cat_id);
    //     const swalWithBootstrapButtons = Swal.mixin({
    //         customClass: {
    //           confirmButton: 'btn btn-success',
    //           cancelButton: 'btn btn-danger'
    //         },
    //         buttonsStyling: false
    //       })
    //       swalWithBootstrapButtons.fire({
    //         title: 'Are you sure ?',
    //         text: "This will delete all related products!",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonText: 'Yes, delete!',
    //         cancelButtonText: 'No, cancel!',
    //         reverseButtons: true
    //       }).then((result) => {
    //         if (result.isConfirmed) {
    //             var checkboxId='checkbox'+cat_id;
    //             $('#'+checkboxId).attr('checked', true);
    //             $("#del_form").submit();
    //         } else if (
    //           result.dismiss === Swal.DismissReason.cancel
    //         ) {
    //           swalWithBootstrapButtons.fire(
    //             'Cancelled',
    //             'Delete cancelled!',
    //             'error'
    //           )
    //         }
    //     })
    // });
    // $('#delete-subcatbtn').click(function() {
    //     const swalWithBootstrapButtons = Swal.mixin({
    //         customClass: {
    //           confirmButton: 'btn btn-success',
    //           cancelButton: 'btn btn-danger'
    //         },
    //         buttonsStyling: false
    //       })
    //     if ($(".chkbox:checked").length > 0) {
    //         swalWithBootstrapButtons.fire({
    //             title: 'Are you sure ?',
    //             text: "This will delete all related products !",
    //             icon: 'warning',
    //             showCancelButton: true,
    //             confirmButtonText: 'Yes, delete!',
    //             cancelButtonText: 'No, cancel!',
    //             reverseButtons: true
    //           }).then((result) => {
    //             if (result.isConfirmed) {
    //                 $("#del_form").submit();
    //             } else if (
    //               result.dismiss === Swal.DismissReason.cancel
    //             ) {
    //               swalWithBootstrapButtons.fire(
    //                 'Cancelled',
    //                 'Delete cancelled!',
    //                 'error'
    //               )
    //             }
    //         })
    //     } else {
    //         Swal.fire(
    //             'The Alert ?',
    //             'Please Select at least one record',
    //             'question'
    //           )
    //     }
    // });



$(document).ready(function() {
    $(".hide-Id-column").css('display','none');
});

$(document).ready(function() {
  $(".editDisabledName").attr("disabled", "disabled"); 
});

$('.disabledName').click(function(e) {
  $(".editDisabledName").removeAttr("disabled");

});

$('.disabledName').bind('change', function () {

  if ($(this).is(':checked'))
  { $(".editDisabledName").removeAttr("disabled");}
  else
  {
    $(".editDisabledName").attr("disabled", "disabled");
    $(':input[type="submit"]').prop('disabled', false);
  }

});

});