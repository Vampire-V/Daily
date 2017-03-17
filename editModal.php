<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dailog">
    <!--Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail</h4>
      </div>
      <div class="modal-body" id="detail" >
        <form method="post" id="edit-form">
          <label>Name</label>
          <input type="hidden" id="g_id" name="g_id"></input>
          <input type="text" id="g_name" name="g_name" class="form-control" required></input>
          <input type="hidden" id="g_check" name="g_check" class="form-control" required></input>
          <input type="submit" id="insert" class="btn btn-success"></input>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
<?php // ?>
