<?php
  $href = "#uploadFileModal";
  $class = "btn site-btn p-1";
  $icon = "fa-upload";
  $text = "Upload";
  include('header.php');
?>
<div class="container-fluid">

  <div class="st-head card-body">
    </br>
    <h3 class="text-center">
      Forms/Docs List
    </h3>
    <div class="row">
      <div class="table-container" style="width: 100%;">
        <div class="table-responsive table-fixed-item">
          <span class="info-showing"></span>
          <table class="table table-striped" id="file_list">
            <thead>
              <tr>
                <th class="c">File Name</th>
                <th class="c">Upload Date</th>
                <th class="c no-sort">Public View (PW)</th>
                <th class="c no-sort">Options</th>
              </tr>
            </thead>
            <tbody>
              <?php echo $crud->getAllfiles();?>
            </tbody>
          </table>
        </div>
        
      </div>
    </div>
  </div>
</div>

<!-- Remove Modal -->
<div class="modal fade" id="removeFileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-top: 15%;">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Remove File?</h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you really want to remove <strong class="remove_file_name"></strong>?
      </div>
      <div class="modal-footer">
        <input type="hidden" id="remove_file_id">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary removeFile">Confirm</button>
      </div>
    </div>
  </div>
</div>

<!-- File Upload Modal -->
<div class="modal fade" id="uploadFileModal" tabindex="-1" role="dialog" aria-labelledby="createAsinLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-top: 10%;">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="createAsinLabel">Upload File</h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="uploadForm" action="../utils/middle.php" method="POST" enctype="multipart/form-data">
          <!-- <input type="hidden" class="form-control" id="user_upload_id" name="user_id"> -->
          <div class="form-group">
            <label for="uploadFile">File :</label>
            <input type="file" class="form-control" id="uploadFile" placeholder="Please select the ID file." required
              name="uploadFile">
          </div>
          <div class="progress upload_status" style="display: none;">
            <div class="progress-bar progress-bar-striped active status_bar" role="progressbar" aria-valuenow="0"
              aria-valuemin="0" aria-valuemax="100" style="width:0%">
              0%
            </div>
          </div>
          <div class="modal-footer mt-5 pb-0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary uploadFiles" name="uploadFiles"
              value="uploadFiles">Confirm</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
<!-- File Send Modal -->
<div class="modal fade" id="sendFileModal" tabindex="-1" role="dialog" aria-labelledby="createAsinLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-top: 10%;">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="createAsinLabel">Send File</h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="sendFileForm" action="../utils/middle.php" method="POST">
          <input type="hidden" id="send_file_name" name="file_name">
          <div class="form-group">
            <label for="toClient">Client :</label>
            <select class="form-control" name="toClient" id="toClient" required>
              <?php echo $crud->getAllClientOption(); ?>
            </select>
          </div>
          <div class="modal-footer mt-5 pb-0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary sendFile" name="sendFile" value="sendFile">Confirm</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Remove Modal -->
<div class="modal fade" id="setPublicFileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-top: 15%;">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><span class="block-file-desc-big"></span></h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span id="public_status"></span> Public View for <span class="block-file-desc"></span> <strong
          style="color: #15924e;" class="setting-file"></strong>?
      </div>
      <div class="modal-footer">
        <input type="hidden" id="file_id">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary setPublicFile">Confirm</button>
      </div>
    </div>
  </div>
</div>

<!-- Password Setting Modal -->
<div class="modal fade" id="setPasswordModal" tabindex="-1" role="dialog" aria-labelledby="createAsinLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="createAsinLabel">Password Setting</h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="filePasswordSettingForm" autocomplete="off">
          <!-- <input type="hidden" class="form-control" id="user_id" name="userId"> -->
          <!-- <div class="form-group">
            <label for="passEmail">Email *</label>
            <input type="email" class="form-control" id="passEmail" name="passEmail" disabled>
          </div> -->
          <label for="current_password">Current Password</label>
          <div class="d-flex" style="justify-content: space-between;">
            <div class="form-group" style="width: 75%; position: relative;">
              <input type="text" class="form-control" name="current_password" id="current_password" disabled
                value="<?= $crud->getSetting("file_pass") ?>">
              <div id="old_copy_clipboard" style="position: absolute; top: 10px; right: 10px; cursor: pointer;"
                title="Copy to clipboard"><i class="fas fa-copy" aria-hidden="true"></i>
              </div>
            </div>
            <!-- <div class="form-group w-30">
              <button class="btn btn-primary form-control" id="current_pass_send" style="width: 75px;">Send</button>
            </div> -->
          </div>
          <label for="new_password">New Password</label>
          <div class="d-flex" style="justify-content: space-between;">
            <div class="form-group" style="width: 75%; position: relative;">
              <input type="text" name="new_password" class="form-control pr-5" id="new_password">
              <div style="position: absolute; top: 10px; right: 30px; cursor: pointer;" id="refresh_new_pass"
                title="Generate Password"><i class="fas fa-sync-alt" aria-hidden="true"></i>
              </div>
              <div id="new_copy_clipboard" style="position: absolute; top: 10px; right: 10px; cursor: pointer;"
                title="Copy to clipboard"><i class="fas fa-copy" aria-hidden="true"></i>
              </div>
            </div>
            <div class="form-group">
              <button class="btn btn-primary form-control" id="new_filepass_set" style="width: 75px;">Set</button>
            </div>
          </div>

          <div class="modal-footer mt-5 pb-0">
            <button type="button" class="btn btn-secondary" style="width:75px;margin-right:-8px;"
              data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>