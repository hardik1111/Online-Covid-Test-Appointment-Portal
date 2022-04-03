<?php 
    require_once '../../config/db_connect.php';
?>
<!-- The Modal -->
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add New Blog</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="_manage_blog.php" enctype="multipart/form-data" method="post" >
            <div class="modal-body">
                <div class="form-group">
                    <label for="heading">Blog Heading</label>
                    <input type="text" class="form-control" id="heading" placeholder="Heading Name" name="heading" required>
                </div>
                
                <div class="form-group">    
                    <label for="content">Blog Content</label>
                    <textarea  class="form-control" id="tiny" placeholder="Type here.." name="content" rows="10"></textarea>
                </div>    
                <p class="alret-msg"></p>
                
            </div>
            <div class="modal-footer ">
                <input type="hidden" name="action" id="action" value="add_blog">
                <button type="submit" class="btn btn-primary" >Add</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
<script type="text/javascript">
      tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
   });
</script>
