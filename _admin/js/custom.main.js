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
    $('.select2').select2();
    
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
        var dataId=$(this).val();
        dataId = dataId.trim(); // User Remove Extra Space From ID
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
    
});

// Add the following code if you want the name of the file appear on select
// $(".custom-file-input").on("change", function() {
//   var fileName = $(this).val().split("\\").pop();
//   $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
// });

