<?php
	include_once("layouts/header.php");

?>

<!-- Home Begin -->
<section id="about" class="green-wave-gold page-section py-0">
    <div class="header_section">
        <div class="container text-center">
            <h2>About</h2>
        </div>
    </div>
    <div class="top-section">
        <div class="container text-center">
            <div class="content">
                <img src="assets/images/earth.png" alt="green-img" />
                <div class="text-group">
                    <p>Ecological Technologies Limited will effectively be solving two problems with one strategy: by
                        providing economically sustainable materials for use in emergency housing, tackling housing
                        affordability issues surrounding displaced families and refugees, and taking steps toward the
                        production of environmentally friendly building materials and, ultimately, creating a cleaner
                        planet for all.
                    </p>
                    <p>The Company will develop its plastic lumber and plastic timber materials, by collecting plastics
                        and other assorted plastic waste. The additional recycling efforts will divert a large portion
                        of waste from landfills, further benefitting the atmosphere and overall environment. The lumber
                        industry owes its existence primarily to the discovery of a use for plastic scrap and
                        post-consumer plastic waste. These modern products are now displacing conventional construction
                        materials in some applications. Global demand for these plastic lumber products is increasing,
                        owing to a growth in their potential building applications.
                    </p>
                </div>
            </div>
            <div class="botom_header">
                <h2>
                    Ecological Technologies Limited Products - <span>The Future of Housing</span>
                </h2>
                <p>Ecological Technologies Limited’s product can be molded to meet almost any desired spatial
                    condition, a major advantage over wood. Plastic lumber also works like wood, with the ability to
                    be shaped, bent, drilled, and cut using conventional woodworking tools. Plastic lumber is not
                    sensitive to staining from a variety of agents. A major selling point of this material is it
                    doesn’t need to be painted and is overall low maintenance. It is manufactured in a variety of
                    colors and is widely available in grays and earth tones. Overall, plastic lumber can be used for
                    many of the following applications, replacing traditional wood altogether. Some of the uses
                    include:
                </p>
            </div>
            <div class="icon-group">
                <div class="group-1">
                    <div class="item">
                        <img src="assets/images/check.png" alt="icon-1" />
                        <p>Deck floors</p>
                    </div>
                    <div class="item">
                        <img src="assets/images/check.png" alt="icon-1" />
                        <p>Railings</p>
                    </div>
                    <div class="item">
                        <img src="assets/images/check.png" alt="icon-1" />
                        <p>Fences</p>
                    </div>
                    <div class="item">
                        <img src="assets/images/check.png" alt="icon-1" />
                        <p>Landscaping timbers</p>
                    </div>
                    <div class="item">
                        <img src="assets/images/check.png" alt="icon-1" />
                        <p>Cladding and sliding</p>
                    </div>
                    <div class="item">
                        <img src="assets/images/check.png" alt="icon-1" />
                        <p>Park benches</p>
                    </div>
                    <div class="item">
                        <img src="assets/images/check.png" alt="icon-1" />
                        <p>Molding & trim</p>
                    </div>
                    <div class="item">
                        <img src="assets/images/check.png" alt="icon-1" />
                        <p>Window & door frames</p>
                    </div>
                </div>
                <div class="group-2">
                    <div class="item">
                        <img src="assets/images/check.png" alt="icon-1" />
                        <p>Deck floors</p>
                    </div>
                    <div class="item">
                        <img src="assets/images/check.png" alt="icon-1" />
                        <p>Indoor and outdoor garden furniture</p>
                    </div>
                    <div class="item">
                        <img src="assets/images/check.png" alt="icon-1" />
                        <p>Marine walls & piling</p>
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

    $('a[href="about.php"]').parent().addClass("active");
    $('a[href="about.php"]').parent().siblings().removeClass("active");

});
</script>

<?php 

  include_once("layouts/footer.php");

?>