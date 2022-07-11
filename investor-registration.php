<?php
	include_once("layouts/header.php");

?>

<!-- Home Begin -->
<section id="invest" class="green-wave-gold page-section py-0">
    <div class="header_section">
        <div class="container text-center">
            <h2>Investor Registration</h2>
        </div>
    </div>
    <div class="top-section">
        <div class="container text-center">
            <div class="content">
                <div class="text-group">
                    <p>Ecological Technologies Ltd.</p>
                    <h2>Investor Registration</h2>
                    <p>Complete the form below to access the Investor Relations section.
                    </p>
                </div>
            </div>
            <hr />
            <p class="hr_bottom">Once you have completed the form below, one of our representatives will email you with
                credentials to be able to access the information. Please be sure to check your junk/spam folders and
                allow 24 hours for a response. Thank you.
            </p>
            <div class="registeration_form">
                <div class="input-groups">
                    <div class="input_item">
                        <label>Name <span>*</span></label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="input-pair">
                        <div class="input_item">
                            <label>Email Address<span>*</span></label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="input_item">
                            <label>Telephone <span>*</span></label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="input-pair">
                        <div class="input_item">
                            <label>Company</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="input_item">
                            <label>Subject</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="text-area_item">
                        <label>Message</label>
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                    <form>
                        <div>
                            <label for="subscribeNews">
                                I agree that my telephone number and email address may be used by
                                Ecological Technologies Ltd. in order to contact me. They will not be passed to any
                                third party.
                            </label>
                            <input type="checkbox" id="subscribeNews" name="subscribe" value="newsletter">
                            <span>I agree to these terms</span>
                        </div>
                    </form>
                    <button type="button" class="btn btn-success">Submit</button>
                </div>
                <div class="icon-group">
                    <div class="icon-item">
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                        <div class="input_text">
                            <p>info@ecologicaltechnologiesltd.com</p>
                            <p>We reply within 24 hours</p>
                        </div>
                    </div>
                    <div class="icon-item">
                        <i class="fas fa-phone" aria-hidden="true"></i>
                        <div class="input_text">
                            <p>Do you have any questions?</p>
                            <p>+44 (20) 3769 6522</p>
                        </div>
                    </div>
                    <div class="icon-item">
                        <i class="fas fa-clock" aria-hidden="true"></i>
                        <div class="input_text">
                            <p>Office Hours</p>
                            <p>Mo. – Fr. from 9:00 to 18:00</p>
                        </div>
                    </div>
                    <div class="icon-item">
                        <i class="fas fa-map-pin" aria-hidden="true"></i>
                        <div class="input_text">
                            <p>Write to us</p>
                            <p>401 Bay St,
                                Suite 2702,
                                Toronto, ON
                                M5H 2Y4
                            </p>
                        </div>
                    </div>
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