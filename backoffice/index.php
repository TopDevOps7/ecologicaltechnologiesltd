<?php
    $href = "#createUserModal";
    $class = "btn site-btn p-1 create-user-entity";
    $icon = "fa-plus-circle";
    $text = "Client";
    include('header.php');

    ?>
<script>
let $role = "<?= $role ?>";
</script>

<div class="container-fluid">

  <div class="st-head card-body">
    </br>
    <h3 class="text-center">
      Client User List
    </h3>
    <div class="row">
      <div class="table-container" style="width: 100%;">
        <div class="table-responsive table-fixed-item">
          <span class="info-showing"></span>
          <table class="table table-striped" id="user_list">
            <thead>
              <tr>
                <th class="c">Investor</th>
                <th class="c">Phone</th>
                <th class="c">Registration</th>
                <th class="c">KYC/NDA</th>
                <th class="c">Status</th>
                <?php if ($role != 3 && $role != 5) { ?>
                <th class="c">Team</th>
                <?php } ?>
                <?php if ($role != 5 && $role != 6) { ?>
                <th class="c">Office</th>
                <th class="c">Token</th>
                <th class="c">Spec. Price</th>
                <?php } else { ?>
                <th class="c">Token</th>
                <?php } ?>
                <th class="c">EUR</th>
                <th class="c">Payed</th>
                <th class="c no-sort">Options</th>
              </tr>
            </thead>
            <tbody>
              <?php echo $crud->getAllClient();?>
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
  <div class="modal-dialog" role="document" style="max-width: 550px;">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="createAsinLabel">Create User</h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="fa">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs create-user-tab">
          <?php if ($role != 5) { ?>
          <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#user_create">1. Personal Info</a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link <?= ($role == 5) ? "active": "" ?>" data-bs-toggle="tab" href="#kyc">2. KYC/NDA</a>
          </li>
          <?php if ($role != 5) { ?>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#invest_create">3. Investment</a>
          </li>
          <?php } ?>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content mb-5">
          <?php if ($role != 5) { ?>
          <div id="user_create" class="st-head card-body tab-pane active">
            <form id="create_user_form" action="../utils/middle.php" method="POST">

              <input type="hidden" name="userType" value="4">
              <div class="form-group">
                <input type="hidden" class="form-control user_id_field" name="userId">
              </div>
              <div class="d-flex" style="justify-content: space-between;">
                <div class="form-group w-45">
                  <label for="additions">First Name *</label>
                  <input type="text" class="form-control" id="user_fname" name="userFname"
                    placeholder="Enter First Name" required>
                </div>
                <div class="form-group w-45">
                  <label for="additions">Last Name *</label>
                  <input type="text" class="form-control" id="user_lname" name="userLname" placeholder="Enter Last Name"
                    required>
                </div>
              </div>

              <div class="d-flex" style="justify-content: space-between;">
                <div class="form-group w-45">
                  <label for="gender">Salutation *</label>
                  <select class="form-control" name="gender" id="gender" required>
                    <option value="Frau" selected>Frau</option>
                    <option value="Herr">Herr</option>
                    <option value="Andere">Andere</option>
                  </select>
                </div>
                <div class="form-group w-45">
                  <label for="title">Title</label>
                  <select class="form-control" name="title" id="title">
                    <option value="" selected></option>
                    <?php echo $crud->getSelectBox('titles') ?>
                  </select>
                </div>
              </div>

              <div class="client-area-default">
                <div class="d-flex" style="justify-content: space-between;">
                  <div class="form-group w-45">
                    <label for="additions">Country *</label>
                    <select id="user_country" name="userCountry" class="form-control" required>
                      <?php echo $crud->getCountryOption($lang) ?>
                    </select>
                  </div>
                  <div class="form-group w-45">
                    <label for="additions">Address *</label>
                    <input type="text" class="form-control" id="user_address" name="userAddress"
                      placeholder="Street and Number" required>
                  </div>
                </div>
                <div class="d-flex" style="justify-content: space-between;">
                  <div class="form-group w-45">
                    <label for="additions">Zip Code *</label>
                    <input type="text" class="form-control" id="user_zip" name="userZip"
                      placeholder="Enter the Zip Code" required>
                  </div>
                  <div class="form-group w-45">
                    <label for="user_city">City *</label>
                    <input type="text" class="form-control" id="user_city" name="userCity" placeholder="Enter the City"
                      required>
                  </div>
                </div>
                <div class="d-flex" style="justify-content: space-between;">
                  <div class="form-group w-45">
                    <label for="user_birth">Date of Birth</label>
                    <input type="date" class="form-control" id="user_birth" name="userBirth"
                      placeholder="Enter the Date of Birth">
                  </div>
                  <div class="form-group w-45">
                    <label for="user_place">Place of Birth</label>
                    <input type="text" class="form-control" id="user_place" name="userPlace"
                      placeholder="Enter the Place of Birth">
                  </div>
                </div>
                <div class="form-group">
                  <label for="user_email">E-Mail *</label>
                  <input type="email" class="form-control" id="user_email" name="userEmail" placeholder="Enter Email"
                    required>
                </div>
                <div class="d-flex" style="justify-content: space-between;">
                  <div class="form-group w-45">
                    <label for="user_tel_one">Telephone 1 *</label>
                    <input type="text" pattern="\+?[0-9]+"
                      oninvalid="this.setCustomValidity('The phone number is incorrect. Allowed type: +1234567890')"
                      oninput="this.setCustomValidity('')" class="form-control" id="user_tel_one" name="userTelOne"
                      placeholder="Enter the Telephone" required>
                  </div>
                  <div class="form-group w-45">
                    <label for="user_tel_two">Telephone 2</label>
                    <input type="text" pattern="\+?[0-9]+"
                      oninvalid="this.setCustomValidity('The phone number is incorrect. Allowed type')"
                      oninput="this.setCustomValidity('')" class="form-control" id="user_tel_two" name="userTelTwo"
                      placeholder="Enter the Telephone">
                  </div>
                </div>
                <div class="d-flex" style="justify-content: space-between;">
                  <div class="form-group w-45 team-group">
                    <label for="team">Team</label>
                    <select class="form-control" name="team" id="team">
                      <option value=""></option>
                      <?php echo $crud->getSelectBox("teams"); ?>
                    </select>
                  </div>
                  <div class="form-group w-45 office-group">
                    <label for="office">Office *</label>
                    <select class="form-control" name="office" id="office" required>
                      <?php echo $crud->getSelectBox("office", "name", "id"); ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="spec_price">Special Price</label>
                  <input type="number" class="form-control" id="spec_price" name="specPrice"
                    placeholder="Enter Special Price" step="any">
                </div>
                <div class="form-group">
                  <label for="additions">Notes</label>
                  <textarea rows="3" class="form-control" id="user_notes" name="userNotes"
                    placeholder="Enter the Notes"></textarea>
                </div>
              </div>

              <div class="modal-footer mt-5 pb-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary createUser" name="createUserAjax">Confirm</button>
              </div>
            </form>
          </div>
          <?php } ?>
          <div id="kyc" class="container tab-pane <?= ($role == 5) ? "active" : "fade" ?>"><br>
            <form id="kyc_form" action="../utils/middle.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" class="form-control user_id_field" name="userId">
              <div class="d-flex justify-content-between align-items-center">
                <div class="form-group w-50" style="position: relative;">
                  <label for="id_file">ID File </label>
                  <input type="file" class="form-control" id="id_file" name="ID_file" style="line-height: 2.4rem;"
                    accept="application/pdf, .jpg, .jpeg, .png">
                  <input type="text" class="form-control" id="id_file_label" style="display: none;"
                    value="File already uploaded." disabled>
                  <input type="hidden" name="id_file_name" id="id_file_name">
                  <input type="hidden" id="id_already" name="id_already">
                  <div id="id_file_remove" title="Remove File."
                    style="display: none; position: absolute; bottom: 7px; right: 10px; cursor: pointer;">
                    <i class="fas fa-trash"></i>
                  </div>
                </div>
                <div class="mt-4">
                  <a href="javascript:void(0);" target="_blank" title="ID file download" id="id_file_download"><i
                      class="fas fa-download"></i></a>
                </div>
                <div class="form-group w-30">
                  <label for="id_status">ID File Status</label>
                  <select name="id_status" id="id_status" class="form-control">
                    <option value="">Select the status</option>
                    <option value="1">Approved</option>
                    <option value="2">Decline</option>
                  </select>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <div class="form-group w-50" style="position: relative;">
                  <label for="utility_file">Utility File </label>
                  <input accept="application/pdf, .jpg, .jpeg, .png" type="file" class="form-control" id="utility_file"
                    name="Utility_file" style="line-height: 2.4rem;">
                  <input type="text" class="form-control" id="utility_file_label" style="display: none;"
                    value="File already uploaded" disabled>
                  <input type="hidden" name="utility_file_name" id="utility_file_name">
                  <input type="hidden" id="utility_already" name="utility_already">
                  <div id="utility_file_remove" title="Remove File."
                    style="display: none; position: absolute; bottom: 7px; right: 10px; cursor: pointer;">
                    <i class="fas fa-trash"></i>
                  </div>
                </div>
                <div class="mt-4">
                  <a href="javascript:void(0);" target="_blank" title="Utility file download"
                    id="utility_file_download"><i class="fas fa-download"></i></a>
                </div>
                <div class="form-group w-30">
                  <label for="utility_status">Utility File Status</label>
                  <select name="utility_status" id="utility_status" class="form-control">
                    <option value="">Select the status</option>
                    <option value="1">Approved</option>
                    <option value="2">Decline</option>
                  </select>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <div class="form-group w-50" style="position: relative;">
                  <label for="nda_file">NDA File </label>
                  <input accept="application/pdf, .jpg, .jpeg, .png" type="file" class="form-control" id="nda_file"
                    name="nda_file" style="line-height: 2.4rem;">
                  <input type="text" class="form-control" id="nda_file_label" style="display: none;"
                    value="File already uploaded" disabled>
                  <input type="hidden" name="nda_file_name" id="nda_file_name">
                  <input type="hidden" id="nda_already" name="nda_already">
                  <div id="nda_file_remove" title="Remove File."
                    style="display: none; position: absolute; bottom: 7px; right: 10px; cursor: pointer;">
                    <i class="fas fa-trash"></i>
                  </div>
                </div>
                <div class="mt-4">
                  <a href="javascript:void(0);" target="_blank" title="nda file download" id="nda_file_download"><i
                      class="fas fa-download"></i></a>
                </div>
                <div class="form-group w-30">
                  <label for="nda_status">NDA File Status</label>
                  <select name="nda_status" id="nda_status" class="form-control">
                    <option value="">Select the status</option>
                    <option value="1">Approved</option>
                    <option value="2">Decline</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer mt-5 pb-0">
                <?php if ($role == 5) { ?>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <?php } else { ?>
                <button type="button" class="btn btn-secondary" id="kyc_kip">Skip</button>
                <?php } ?>
                <button type="submit" id="kyc_ajax_btn" class="btn btn-primary kycAjax" name="kycAjax">Confirm</button>
              </div>
            </form>
          </div>
          <?php if ($role != 5) { ?>
          <div id="invest_create" class="container tab-pane fade"><br>
            <form id="user_invest_form" action="../utils/middle.php" method="POST">
              <input type="hidden" class="form-control user_id_field" name="userId">
              <div class="form-group">
                <label for="additions">Investment (EUR) * </label>
                <input type="number" class="form-control" id="user_invest" name="userInvest"
                  placeholder="Enter the Investment" required>
              </div>
              <div class="form-group">
                <label for="symbol">Project *</label>
                <select class="form-control" name="project" id="project" required>
                  <?php echo $crud->getSelectBox("project"); ?>
                </select>
              </div>
              <div class="d-flex" style="justify-content: space-between;">
                <div class="form-group">
                  <label for="additions">Price *</label>
                  <input type="number" class="form-control" id="user_price" name="userPrice"
                    placeholder="Enter the Price" required step="any">
                </div>
                <div class="form-group">
                  <label for="additions">Token *</label>
                  <input type="number" class="form-control" id="user_size" name="userSize" placeholder="Enter the Size"
                    required step="any">
                </div>
              </div>
              <div class="form-group">
                <label for="pay_method">Payment Method *</label>
                <Select class="form-control" id="pay_method" name="payMethod">
                  <Option value="1">Bank</Option>
                  <Option value="2">Crypto</Option>
                </Select>
              </div>
              <?php if($role == 1 || $role ==2) { ?>
              <!-- <div class="form-group">
                <label for="tracking_service">Tracking Service</label>
                <Select class="form-control" id="tracking_service" name="tracking_service">
                  <Option value="1">UPS</Option>
                  <Option value="2">Dt.Post</Option>
                  <Option value="3">????</Option>
                </Select>
              </div>
              <div class="form-group">
                <label for="tracking_id">Tracking ID</label>
                <input type="text" class="form-control" id="tracking_id" name="tracking_id">
              </div> -->
              <?php } ?>
              <div class="modal-footer mt-5 pb-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="invest_skip">Skip</button>
                <button type="submit" class="btn btn-primary userInvestAjax" name="userInvestAjax">Confirm</button>
              </div>
            </form>
          </div>
          <?php } ?>
        </div>
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
        <h3 class="modal-title" id="exampleModalLabel"><span class="block-user-desc-big"></span> Client?</h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you really want to <span class="block-user-desc"></span> <strong style="color: #15924e;"
          class="user-email-user"></strong>?
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
            <button type="button" class="btn btn-secondary" style="width:75px;margin-right:-8px;"
              data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Edit Spec Price Modal -->
<div class="modal fade" id="editSpecPrice" tabindex="-1" role="dialog" aria-labelledby="createAsinLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-top: 8%;">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Edit Special Price</h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="../utils/middle.php" autocomplete="off">
          <input type="hidden" class="form-control" id="user_id_spec_price" name="userId">
          <div class="form-group">
            <input type="number" class="form-control" id="edit_spec_price" name="specPrice" step="any">
          </div>
          <div class="modal-footer mt-5 pb-0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" name="updateSpecPrice">Confirm</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- File Upload Modal -->
<!-- <div class="modal fade" id="uploadFileModal" tabindex="-1" role="dialog" aria-labelledby="createAsinLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="createAsinLabel">Upload</h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="uploadForm" action="../utils/middle.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" id="user_upload_id" name="user_id">
          <div class="form-group">
            <label for="ID_file">ID File :</label>
            <input type="file" class="form-control" id="ID_file" placeholder="Please select the ID file." required
              name="ID_file" accept=".jpg, .jpeg, .png">
          </div>
          <div class="form-group">
            <label for="Utility_file">Utility Bill File :</label>
            <input type="file" class="form-control" id="Utility_file" placeholder="Please select the Utility File."
              name="Utility_file" required accept="application/pdf">
          </div>
          <div class="progress upload_status" style="display: none;">
            <div class="progress-bar progress-bar-striped active status_bar" role="progressbar" aria-valuenow="40"
              aria-valuemin="0" aria-valuemax="100" style="width:40%">
              40%
            </div>
          </div>
          <div class="modal-footer mt-5 pb-0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary uploadFile" name="uploadFile"
              value="uploadFile">Confirm</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div> -->

<?php include('footer.php'); ?>

<script>
$("#user_size").keydown(e => {
  if (e.keyCode == 190 || e.keyCode == 110 || e.keyCode == 190 || e.keyCode == 189 || e.keyCode == 69 || e
    .keyCode == 107) e.preventDefault();
  // If the input is empty and the key pressed is "0" nothing is printed
  if (!e.target.value && e.key == 0) {

    e.preventDefault();

  } else {
    const regex = new RegExp(/(^\d*$)|(Backspace|Tab|Delete|ArrowLeft|ArrowRight)/);
    if (!event.key.match(regex)) event.preventDefault();
    // If the key pressed is not a number or a period, nothing is printed
    // if (!/[0-9.]/.test(e.key)) {
    //   e.preventDefault();
    // }

  }
});
</script>