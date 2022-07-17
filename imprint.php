<?php 
    include_once('layouts/header.php');
	//WHETHER OR NOT TO SHOW ERRORS
	// ini_set('display_errors', false);
	// ini_set('error_reporting', E_ALL);
?>
<section class="userDiv p-0 d-flex align-items-center justify-content-center" style="height: 10rem;">
    <h1 class="text-white m-0" style="text-align: center; line-height:0.75em;padding-top:0.4em;"><?= $ln['imprint'] ?>
    </h1>
</section>
<?php 
  include_once("layouts/imprint.php");
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