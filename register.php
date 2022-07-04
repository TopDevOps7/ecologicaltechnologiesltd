<?php 
    include_once('layouts/header.php');
	//WHETHER OR NOT TO SHOW ERRORS
	// ini_set('display_errors', false);
	// ini_set('error_reporting', E_ALL);
?>
<link rel="stylesheet" href="assets/css/register.css">
<style>
select.form-input {
  appearance: auto;
}
</style>
<section class="userDiv p-0 d-flex align-items-center justify-content-center" style="margin-top: 14rem; height: 10rem;">
  <h1 class="text-white m-0" style="text-align: center; line-height:0.75em;padding-top:0.4em;">
    <?= $ln['registrierung'] ?>
  </h1>
</section>

<section class="register-section " style="margin-bottom: 100px">
  <div class="container">
    <form action="utils/middle.php" method="post" id="register_user" autocomplete="off">
      <div class="row ">
        <input type="hidden" name="userType" value="4">
        <div class="col-sm-6">
          <div class="form-group mb-4"><label for="user_email"
              class="required form-label rd-input-label">E-Mail</label><input type="email" id="user_email"
              name="userEmail" required class="form-input form-control" autocomplete="off"></div>
        </div>
        <div class="col-sm-6">
          <div class="form-group mb-4"><label for="user_password"
              class="required form-label rd-input-label"><?= $ln['password'] ?></label><input type="password"
              id="user_password" name="password" required class="form-input form-control"></div>
        </div>
        <div class="col-sm-2">
          <div class="form-group mb-4">
            <label for="gender" class="required form-label rd-input-label"><?= $ln['please_select'] ?></label>
            <select class="form-input form-control" name="gender" id="gender" required>
              <option value=""></option>
              <option value="Frau"><?= $ln['Frau'] ?></option>
              <option value="Herr"><?= $ln['Herr'] ?></option>
              <option value="Andere"><?= $ln['other'] ?></option>
            </select>
          </div>
        </div>
        <div class="col-sm-5">
          <div class="form-group mb-4"><label for="fname"
              class="required form-label rd-input-label"><?= $ln['first_name'] ?></label><input type="text" id="fname"
              name="userFname" required class="form-input form-control"></div>
        </div>
        <div class="col-sm-5">
          <div class="form-group mb-4"><label for="lname"
              class="required form-label rd-input-label"><?= $ln['last_name'] ?></label><input type="text" id="lname"
              name="userLname" required class="form-input form-control"></div>
        </div>
        <div class="col-sm-6">
          <div class="form-group mb-4"><label for="address" class="required form-label rd-input-label">
              <?= $ln['street_number'] ?></label><input type="text" id="address" name="userAddress" required
              class="form-input form-control"></div>
        </div>
        <div class="col-sm-2">
          <div class="form-group mb-4"><label for="zip" class="required form-label rd-input-label">
              <?= $ln['zip'] ?></label><input type="text" id="zip" name="userZip" required
              class="form-input form-control"></div>
        </div>
        <div class="col-sm-2">
          <div class="form-group mb-4"><label for="city" class="required form-label rd-input-label">
              <?= $ln['city'] ?></label><input type="text" id="city" name="userCity" required
              class="form-input form-control"></div>
        </div>
        <div class="col-sm-2">
          <div class="form-group mb-4"><label for="country" class="required form-label rd-input-label">
              <?= $ln['country'] ?></label>
            <select id="country" name="userCountry" class="form-control form-input" required>
              <option value=""></option>
              <?= $crud->getCountryOption($lang) ?>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group mb-4"><label for="phone1" class="required form-label rd-input-label">
              <?= $ln['telephone'] ?> 1</label><input type="text" id="phone1" name="userTelOne" required
              class="form-input form-control"></div>
        </div>
        <div class="col-sm-6">
          <div class="form-group mb-4"><label for="phone2" class="required form-label rd-input-label">
              <?= $ln['telephone'] ?> 2</label><input type="text" id="phone2" name="userTelTwo"
              class="form-input form-control"></div>
        </div>
        <div class="col-12 mt-4 mb-3">
          <h4><strong>Optional</strong></h4>
        </div>
        <div class="col-sm-6">
          <div class="form-group mb-4">
            <label for="dob" class="form-label rd-input-label" style="font-size: 12px; top: 13px;">
              <?= $ln['dob'] ?>
            </label>
            <input type="date" placehloder='<?= $ln['dob'] ?>' id="dob" name="userBirth"
              class="form-input form-control">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group mb-4"><label for="place" class="form-label rd-input-label">
              <?= $ln['place'] ?></label><input type="text" id="place" name="userPlace" class="form-input form-control">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group mb-4" style="margin-top:1.5em;">
            <!-- <select class="form-control form-input" name="office" id="office">
              </select> -->
            <?php echo $crud->getSelectBox('office', 'symbol', 'id', 'radio') ?>
            <!-- <input type="radio" id="javascript" name="fav_language" value="JavaScript">
              <label for="javascript">JavaScript</label><br> -->
          </div>
        </div>
        <input type="hidden" name="self_registered" value="1">
        <div class="col-sm-12" style="margin-top:1em;">
          <button type="submit" class="btn btn-success site-btn"
            name="createUserAjax"><?= $ln['registrierung'] ?></button>
        </div>
      </div>
    </form>
</section>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="text-center"><b style="color: #15924e;"><?= $ln['success_title'] ?></b></h3>
      </div>
      <div class="modal-body">
        <h4><?= $ln['success_text'] ?></h4>
      </div>
      <div class="modal-footer">
        <a class="btn btn-success site-btn" href="./">Okay</a>
      </div>
    </div>
  </div>
</div>

<?php 
  include_once("layouts/footer.php");
?>

<script src="assets/js/register.js"></script>
<script>
// Chart setting.
// Initialize the echarts instance based on the prepared dom

$(function() {
  $(".nav-item").eq(4).addClass("active");
})
$(window).on("scroll", function(e) {
  if ($(document).scrollTop() == 0) {
    $(".nav-item").eq(4).addClass("active");
  }
});
// $('#dob').val(moment().format('YYYY-MM-DD'));
$('a.nav-link').click(function() {
  location.href = $(this).prop("href");
});
$('#register_user, input').prop('autocomplete', 'off');
$("#register_user").ajaxForm({
  beforeSend: function() {},
  uploadProgress: function(event, position, total, percentComplete) {},
  complete: function(xhr) {
    let res = JSON.parse(xhr.responseText);
    if (res.success) {
      // $(".user_id_field").val(res.user_id);
      // $(".nav-tabs.create-user-tab li a:not(.active)")
      //   .removeClass("disabled")
      //   .css("cursor", "pointer");
      // $('.nav-tabs a[href="#kyc"]').tab("show");
      // toastr.success(res.message);
      $("#successModal").modal('show');
      // setTimeout(() => {
      //   location.href = './';
      // }, 3000);
    } else {
      toastr.error(res.message);
      $('#user_email').css('border-color', 'red').focus();
    }
  },
});
</script>