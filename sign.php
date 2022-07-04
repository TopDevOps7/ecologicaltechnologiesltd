<?php 
    include_once('layouts/header.php');
	//WHETHER OR NOT TO SHOW ERRORS
	// ini_set('display_errors', false);
	// ini_set('error_reporting', E_ALL);
?>

<section class="userDiv p-0 d-flex align-items-center justify-content-center" style="margin-top: 14rem; height: 10rem;">
  <h1 class="text-white m-0" style="text-align: center; line-height:0.75em;padding-top:0.4em;">
    <?= $ln['registrierung'] ?>
  </h1>
</section>

<section class="register-section " style="margin-bottom: 100px">
  <div class="container">
    <iframe
      src="https://secure.na4.adobesign.com/public/esignWidget?wid=CBFCIBAA3AAABLblqZhD7N7_BljDYEvkvBhr6OdGUSJEXfliwxvQTb27WcFZcNet0-AmQxroS7PsCz3tB2c0*&hosted=false"
      width="100%" height="100%" frameborder="0"
      style="border: 0; overflow: hidden; min-height: 500px; min-width: 600px;"></iframe>
  </div>
</section>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="text-center"><?= $ln['success_title'] ?></h3>
      </div>
      <div class="modal-body">
        <h4><?= $ln['success_text'] ?></h4>
      </div>
      <div class="modal-footer">
        <a class="btn btn-success site-btn" href="./">Go Home</a>
      </div>
    </div>
  </div>
</div>

<?php 
  include_once("layouts/footer.php");
?>

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
</script>