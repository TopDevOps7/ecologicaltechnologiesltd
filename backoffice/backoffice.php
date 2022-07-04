<?php
  $href = "#createUserModal";
  $class = "btn site-btn create-user-entity";
  $icon = "fa-plus-circle";
  $text = "Backoffice";
  include('header.php');
?>

<div class="container-fluid">

  <div class="st-head card-body">
    </br>
    <h3 class="text-center"> Backoffice User List </h3>
    <div class="row">
      <div class="table-container" style="width: 100%;">
        <div class="table-responsive table-fixed-item">
          <span class="info-showing"></span>
          <table class="table table-striped" id="user_list">
            <thead>
              <tr>
                <th class="c">Last Name</th>
                <th class="c">First Name</th>
                <th class="c">Email</th>
                <th class="c">Status</th>
                <th class="c no-sort">Options</th>
              </tr>
            </thead>
            <tbody>
              <?php echo $crud->getAllUser(2);?>
            </tbody>
          </table>
        </div>
        
      </div>
    </div>
  </div>
</div>

<!-- Create User Modal -->
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createAsinLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="createAsinLabel">Create User</h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="../utils/middle.php">
          <div class="form-group">
            <input type="hidden" name="userType" value="2">
          </div>
          <div class="form-group">
            <label for="initial_amount">E-Mail *</label>
            <input type="hidden" class="form-control user_id_field" name="userId">
            <input type="text" class="form-control" id="user_email" name="userEmail" placeholder="Enter Email" required>
          </div>
          <div class="form-group">
            <label for="additions">First Name *</label>
            <input type="text" class="form-control" id="user_fname" name="userFname" placeholder="Enter First Name"
              required>
          </div>
          <div class="form-group">
            <label for="additions">Last Name *</label>
            <input type="text" class="form-control" id="user_lname" name="userLname" placeholder="Enter Last Name"
              required>
          </div>

          <div class="modal-footer mt-5 pb-0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary createUser" name="createUser">Confirm</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Remove Modal -->
<div class="modal fade" id="removeUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-top: 15%;">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><span class="block-user-desc-big"></span> Backoffice User?</h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you really want to <span class="block-user-desc"></span> <strong style="color: #15924e"><span
            class="user-email-user"></span></strong>?
      </div>
      <div class="modal-footer">
        <input type="hidden" id="remove_user_id">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary removeUser">Confirm</button>
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
        <form id="passwordSettingForm" autocomplete="off">
          <input type="hidden" class="form-control" id="user_id" name="userId">
          <div class="form-group" style="position: relative;">
            <label for="passEmail">Email *</label>
            <input type="email" class="form-control" id="passEmail" name="passEmail" disabled>
            <div id="email_copy_clipboard" style="position: absolute; top: 40px; right: 10px; cursor: pointer;"
              title="Copy to clipboard"><i class="fas fa-copy" aria-hidden="true"></i>
            </div>
          </div>
          <label for="current_password">Current Password</label>
          <div class="d-flex" style="justify-content: space-between;">
            <div class="form-group" style="width: 75%; position: relative;">
              <input type="text" class="form-control" name="current_password" id="current_password" disabled>
              <div id="old_copy_clipboard" style="position: absolute; top: 10px; right: 10px; cursor: pointer;"
                title="Copy to clipboard"><i class="fas fa-copy" aria-hidden="true"></i>
              </div>
            </div>
            <div class="form-group w-30">
              <button class="btn btn-primary form-control" id="current_pass_send" style="width: 75px;">Send</button>
            </div>
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
              <button class="btn btn-primary form-control" id="new_pass_set" style="width: 75px;">Set</button>
            </div>
          </div>

          <div class="modal-footer mt-5 pb-0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>