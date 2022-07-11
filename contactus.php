<?php
	include_once("layouts/header.php");

?>

<!-- Home Begin -->
<section id="contactus" class="green-wave-gold page-section py-0">
    <div class="header_section">
        <div class="container text-center">
            <h2>Contact</h2>
        </div>
    </div>
    <div class="top-section">
        <div class="container text-center">
            <div class="content">
                <div class="text-group">
                    <h2>Enquire With <span>Us</span></h2>
                    <p>We Solve the main challenge to improve resource efficiency and productivity and ensure that
                        materials are used efficiently at all stages of their lifecycle (extraction, transport,
                        manufacturing, consumption, recovery and disposal) and throughout the supply chain.
                    </p>
                </div>
            </div>
            <div class="registeration_form">
                <div class="image-field">
                    <img src="assets/images/21.png" alt="21png" />
                </div>
                <div class="input-groups">
                    <div class="input_item">
                        <label>Name <span>*</span></label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="input_item">
                        <label>Country</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="input_item">
                        <label>Phone</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="input_item">
                        <label>Email Address<span>*</span></label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="input_item">
                        <label>Company</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="text-area_item">
                        <label>Description</label>
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                    <button type="button" class="btn btn-success">CONTACT US</button>
                </div>

            </div>
            <div class="contact_form">
                <div class="map">
                </div>
                <div class="text-center">
                    <h2>Contact Info:</h2>
                    <div class="text-group">
                        <p>Ecological Technologies Limited</p>
                        <p><span>Address:</span> 401 Bay St, Suite 2702, Toronto, ON M5H 2Y4</p>
                        <p><span>US Address:</span> 575 Madison Avenue, Suite 1006, New York, NY 10022, USA</p>
                        <p><span>Company E-mail:</span> info@ecologicaltechnologiesltd.com</p>
                        <p><span>Correspondence Address:</span> Charter House Business Centre, 175 Chorley New Road,
                            Bolton. BL1 4QZ, UK
                        </p>
                    </div>
                </div>
                <div class="map1"></div>
            </div>
        </div>
    </div>
</section>
<script async src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
</script>
<script>
let map;

function initMap() {
    map = new google.maps.Map(document.getElementById(".contact_form.map"), {
        center: {
            lat: -34.397,
            lng: 150.644
        },
        zoom: 8,
    });
}

window.initMap = initMap;
$(function() {
    $(window).resize((e) => {

    });

    $('a[href="contactus.php"]').parent().addClass("active");
    $('a[href="contactus.php"]').parent().siblings().removeClass("active");

});
</script>

<?php 

  include_once("layouts/footer.php");

?>