<?php
	include_once("layouts/header.php");

?>

<!-- Home Begin -->
<section id="video" class="green-wave-gold page-section py-0">
    <!-- Slider main container -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" onClick="slider1()" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" onClick="slider2()" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" onClick="slider3()" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" onClick="slider4()" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" id="flight" src="assets/images/slider/flight.jpg" alt="First slide" />
                <div class="text-group">
                    <p>VIDEOS</p>
                    <p>Video information about our services, technology, and goals.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" id="trucks" src="assets/images/slider/trucks.jpg" alt="Second slide" />
                <div class="text-group">
                    <p>VIDEOS</p>
                    <p>Video information about our services, technology, and goals.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" id="space" src="assets/images/slider/space-satellite.jpg"
                    alt="Third slide" />
                <div class="text-group">
                    <p>VIDEOS</p>
                    <p>Video information about our services, technology, and goals.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" id="yachts" src="assets/images/slider/yachts.jpg" alt="yachts slide" />
                <div class="text-group">
                    <p>VIDEOS</p>
                    <p>Video information about our services, technology, and goals.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="video-section">
        <div class="content">
            <div class="item">
                <video width="420" height="300" controls autoplay>
                    <source src="https://www.youtube.com/embed/g0X9NH-8NEc" type="video/mp4">
                    <source src="https://www.youtube.com/embed/g0X9NH-8NEc" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="item">
                <video width="420" height="300" controls autoplay>
                    <source src="https://www.youtube.com/embed/Tb8Qi_aaoHg" type="video/mp4">
                    <source src="https://www.youtube.com/embed/Tb8Qi_aaoHg" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="item">
                <video width="420" height="300" controls autoplay>
                    <source src="https://www.youtube.com/embed/ZCxs8X4VKwc" type="video/mp4">
                    <source src="https://www.youtube.com/embed/ZCxs8X4VKwc" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
        <div class="content">
            <div class="item">
                <video width="420" height="300" controls autoplay>
                    <source src="https://www.youtube.com/embed/aIFXJwFaBeos://www.youtube.com/embed/ZCxs8X4VKwc"
                        type="video/mp4">
                    <source src="https://www.youtube.com/embed/aIFXJwFaBeos://www.youtube.com/embed/ZCxs8X4VKwc"
                        type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="item">
                <video width="420" height="300" controls autoplay>
                    <source src="https://www.youtube.com/embed/zriStAYJ2NA" type="video/mp4">
                    <source src="https://www.youtube.com/embed/zriStAYJ2NA" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="item">
                <video width="420" height="300" controls autoplay>
                    <source src="https://www.youtube.com/embed/71s4R4k6VL8?controls=0" type="video/mp4">
                    <source src="https://www.youtube.com/embed/71s4R4k6VL8?controls=0" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
</section>

<script>
function slider1() {
    setTimeout(() => {
        $("#flight").addClass("zoomin");
        $("#yachts").removeClass("zoomin");
        $("#trucks").removeClass("zoomin");
        $("#space").removeClass("zoomin");
    }, 1500);
}

function slider2() {
    setTimeout(() => {
        $("#trucks").addClass("zoomin");
        $("#flight").removeClass("zoomin");
        $("#space").removeClass("zoomin");
        $("#yachts").removeClass("zoomin");
    }, 1500);
}

function slider3() {
    setTimeout(() => {
        $("#space").addClass("zoomin");
        $("#flight").removeClass("zoomin");
        $("#trucks").removeClass("zoomin");
        $("#yachts").removeClass("zoomin");
    }, 1500);
}

function slider4() {
    setTimeout(() => {
        $("#yachts").addClass("zoomin");
        $("#flight").removeClass("zoomin");
        $("#trucks").removeClass("zoomin");
        $("#space").removeClass("zoomin");
    }, 1500);
}
$('.carousel').carousel({
    interval: false,
    ride: true
})

$(function() {
    $(window).resize((e) => {

    });
    $('.carousel-control-next').click(function() {

        let num = $(".carousel-indicators>li.active").attr("data-slide-to");
        console.log(num);
        if (num == 0) {
            setTimeout(() => {
                $("#trucks").addClass("zoomin");
                $("#flight").removeClass("zoomin");
                $("#space").removeClass("zoomin");
                $("#yachts").removeClass("zoomin");
            }, 1500);
        }
        if (num == 1) {
            setTimeout(() => {
                $("#space").addClass("zoomin");
                $("#flight").removeClass("zoomin");
                $("#trucks").removeClass("zoomin");
                $("#yachts").removeClass("zoomin");
            }, 1500);
        }
        if (num == 2) {
            setTimeout(() => {
                $("#yachts").addClass("zoomin");
                $("#flight").removeClass("zoomin");
                $("#trucks").removeClass("zoomin");
                $("#space").removeClass("zoomin");
            }, 1500);
        }
        if (num == 3) {
            setTimeout(() => {
                $("#flight").addClass("zoomin");
                $("#yachts").removeClass("zoomin");
                $("#trucks").removeClass("zoomin");
                $("#space").removeClass("zoomin");
            }, 1500);
        }
    })
    $('.carousel-control-prev').click(function() {
        let num = $(".carousel-indicators>li.active").attr("data-slide-to");
        console.log(num);
        if (num == 0) {
            setTimeout(() => {
                $("#yachts").addClass("zoomin");
                $("#flight").removeClass("zoomin");
                $("#trucks").removeClass("zoomin");
                $("#space").removeClass("zoomin");
            }, 1500);
        }
        if (num == 3) {
            setTimeout(() => {
                $("#space").addClass("zoomin");
                $("#flight").removeClass("zoomin");
                $("#trucks").removeClass("zoomin");
                $("#yachts").removeClass("zoomin");
            }, 1500);
        }
        if (num == 2) {
            setTimeout(() => {
                $("#trucks").addClass("zoomin");
                $("#flight").removeClass("zoomin");
                $("#space").removeClass("zoomin");
                $("#yachts").removeClass("zoomin");
            }, 1500);
        }
        if (num == 1) {
            setTimeout(() => {
                $("#flight").addClass("zoomin");
                $("#yachts").removeClass("zoomin");
                $("#trucks").removeClass("zoomin");
                $("#space").removeClass("zoomin");
            }, 1500);
        }
    })
    $("#flight").addClass("zoomin")
    $('a[href="video.php"]').parent().addClass("active");
    $('a[href="video.php"]').parent().siblings().removeClass("active");
    $('.carousel').carousel({
        interval: false,
        ride: true
    })
});
</script>

<?php 

  include_once("layouts/footer.php");

?>