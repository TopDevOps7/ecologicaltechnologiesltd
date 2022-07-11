<?php
	include_once("layouts/header.php");

?>

<!-- Home Begin -->
<section id="download" class="green-wave-gold page-section py-0">

    <div class="top-section">
        <div class="container text-center">
            <div class="registeration_form">
                <p>This content is password protected. To view it please enter your password below:</p>
                <div class="input-groups">
                    <div class="input_item">
                        <input type="text" class="form-control">
                    </div>
                    <button type="button" class="btn btn-success">Enter</button>
                </div>

            </div>
        </div>
    </div>

</section>

<script>
$(function() {
    $(window).resize((e) => {

    });

    $('a[href="investor-registration.php"]').parent().parent().parent().addClass("active");
    $('a[href="investor-registration.php"]').parent().siblings().removeClass("active");

});
</script>

<?php 

  include_once("layouts/footer.php");

?>