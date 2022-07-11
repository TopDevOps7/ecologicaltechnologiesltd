<?php
	include_once("layouts/header.php");

?>

<!-- Home Begin -->
<section id="whyus" class="green-wave-gold page-section py-0">
    <div class="header_section">
        <div class="container text-center">
            <h2>Why Us?</h2>
        </div>
    </div>
    <div class="top-section">
        <div class="container text-center">
            <div class="advantage">
                <div class="container">
                    <div class="elementor-row">
                        <div class="advantage-text">
                            <h2>Our <span> Advantages</span></h2>
                            <p>Ecological Technologies Limited will look toward the production and distribution of its
                                unique
                                plastic lumber against the traditional wood products.
                            </p>
                            <div class="viewmore">
                                <p>View Details</p>
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </div>
                        </div>
                        <div class="rectangle_field">
                            <div class="elementdiv">
                                <i class="fas fa-tint"></i>
                                <div class="text-field">
                                    <h2>Water Resistant</h2>
                                    <p>One of the largest advantages of plastic lumber is that it won't rot or absorb
                                        water.</p>
                                </div>
                            </div>
                            <div class="elementdiv">
                                <i class="fas fa-bug"></i>
                                <div class="text-field">
                                    <h2>Highly Resistant To Insect Damage
                                    </h2>
                                    <p>Another advantage is that plastic lumber is highly resistant to insect damage and
                                        thus
                                        provides a longer life.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="rectangle_field">
                            <div class="elementdiv">
                                <i class="fas fa-hand-spock"></i>
                                <div class="text-field">
                                    <h2>SHOCK RESISTANT
                                    </h2>
                                    <p>Shock Resistance makes it perfect for marine and other water applications, where
                                        the
                                        lumber is further prized by its ability to resist shock.
                                    </p>
                                </div>
                            </div>
                            <div class="elementdiv">
                                <i class="fas fa-home"></i>
                                <div class="text-field">
                                    <h2>Low Maintenance
                                    </h2>
                                    <p>Plastic lumber is more environmentally friendly and requires less maintenance
                                        than
                                        wood/plastic composites or rot-resistant wood.
                                    </p>
                                </div>
                            </div>
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

    $('a[href="whyus.php"]').parent().addClass("active");
    $('a[href="whyus.php"]').parent().siblings().removeClass("active");
    $(window)
        .scroll(function() {
            var distance = $(window).scrollTop();

            $(".advantage").each(function(i) {
                console.log($(this).position().top);
                if ($(this).position().top < distance) {
                    $("#whyus .advantage .container>.elementor-row .rectangle_field:nth-child(2)")
                        .addClass("moveup")
                    $("#whyus .advantage .container>.elementor-row .rectangle_field:nth-child(3)")
                        .addClass("movedown")
                    setTimeout(() => {
                        $("#whyus .advantage .container>.elementor-row .rectangle_field:nth-child(2)")
                            .removeClass("moveup")
                        $("#whyus .advantage .container>.elementor-row .rectangle_field:nth-child(3)")
                            .removeClass("movedown")
                    }, 4000);
                } else {

                }
            });

        })
});
</script>

<?php 

  include_once("layouts/footer.php");

?>