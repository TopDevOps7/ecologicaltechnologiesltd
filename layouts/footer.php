<!-- Footer Begin -->
<footer class="footer mb-5 mb-md-4">
    <div class="contact-section">
        <div class="container">
            <h2><?= $ln["subscribe_footer"]?><span><?= $ln["newsletter"]  ?></span></h2>
            <div class="input_group">
                <div class="form-group">
                    <label for="pwd"><?= $ln["firtname"]  ?></label>
                    <input type="password" class="form-control" id="pwd" name="password">
                </div>
                <div class="form-group">
                    <label for="pwd"><?= $ln["lastname"]  ?></label>
                    <input type="password" class="form-control" id="pwd" name="password">
                </div>
                <div class="form-group">
                    <label for="pwd"><?= $ln["email"]  ?></label>
                    <input type="password" class="form-control" id="pwd" name="password">
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary"><?= $ln["subscribe"]  ?></button>
                </div>
            </div>
        </div>
    </div>
    <div class="foot-bottom">
        <div class="container text-center">
            <div class="item">
                <img src="assets/images/Ecological-tech-Logo.png" alt="footerbottom-img" />
                <p class="bottom-text">
                    <?= $ln["productivity"]  ?>
                </p>
            </div>
            <div class="item">
                <h2>Quick Links</h2>
                <div class="link_form">
                    <ul>
                        <li><a href="#"> <?= $ln["home"]  ?></a></li>
                        <li><a href="#"><?= $ln["about_us"]  ?></a></li>
                        <li><a href="#"><?= $ln["technology"]  ?></a></li>
                        <li><a href="#"><?= $ln["contact"]  ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="item">
                <h2><?= $ln["legal"]  ?></h2>
                <div class="link_form">
                    <ul>
                        <li><a href="#"><?= $ln["terms"]  ?></a></li>
                        <li><a href="#"><?= $ln["privacy"]  ?></a></li>
                        <li><a href="#"><?= $ln["cookie"]  ?></a></li>
                        <li><a href="#"><?= $ln["imprint"]  ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="item">
                <h2><?= $ln["contact"]  ?></h2>
                <div class="link_form">
                    <ul>
                        <li><a href="#"><span><?= $ln["address"]  ?></span> <?= $ln["401bay"]  ?></a></li>
                        <li><a href="#"><span><?= $ln["uaddress"]  ?></span> <?= $ln["575ave"]  ?></a></li>
                        <li>
                            <a href="#">
                                <span><?= $ln["emails"]  ?></span><br />info@ecologicaltechnologiesltd.com
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="foot-btomm-text-section">
        <div class="container">
            <hr class="bottom_line" />
            <p> <?= $ln["ecological"]  ?><span><?= $ln["privacy"]  ?></span> </p>
            <p> <?= $ln["historical_certain"]  ?> </p>
            <p>
                <strong> <?= $ln["place_just"]  ?> </strong> <?= $ln["place_just_text"]  ?>
            </p>
            <p>
                <strong><?= $ln["risk"]  ?></strong> <?= $ln["risk_text"]  ?>
            </P>
            <p>
                <strong><?= $ln["dealer"]  ?> </strong><?= $ln["dealer_bottom_text"]  ?>
            </P>
            <p><?= $ln["no_offer"]  ?> </p>
            <p><?= $ln["no_offer_bottom"]  ?> </p>
            <p><?= $ln["offfer_legal"]  ?> </p>
            <p><?= $ln["offfer_legal_text"]  ?> </p>
            <p><?= $ln["regarding_link"]  ?> </p>
            <p><?= $ln["regarding_link_text"]  ?></p>
        </div>
    </div>
    <!-- <div class="footer-bottom">
    <p class="mb-0 text-center">?? <?= $ln["copyright_text"] ?> | <a href="#">Terms & Condition</a>
    </p>
  </div> -->
</footer>
<!-- Footer End -->

<!-- ===============Login Modal================ -->
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modalContents">
                    <div class="text-center">
                        <img src="assets/images/circleLogo.png" alt="circleLogo" class="circleLogo img-fluid">
                    </div>
                    <h1 class="sectionTitle text-light resetTwo"><span>Login</span></h1>
                    <!-- <h5 class="px-3 pb-2">
            Don't you have account? Plase
            <a href="register.php">Register</a>
          </h5> -->
                    <div class="userForm">
                        <form method="POST" lang="<?= $lang ?>">
                            <div class="mb-3 userInputIconCtrl">
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="E-Mail" lang="<?= $lang ?>" value="<?= $_POST["email"] ?? "" ?>"
                                    aria-describedby="emailHelp" required>
                                <img src="assets/images/user.png" alt="user" class="img-fluid">
                            </div>
                            <div class="mb-3 userInputIconCtrl">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="<?= $ln["password"] ?>" required style="margin-bottom: 0;"
                                    lang="<?= $lang ?>">
                                <img src="assets/images/lock.png" alt="lock" class="img-fluid">
                            </div>
                            <p class="forgotPassWordCtrl d-flex justify-content-between px-2" style="line-height: 0">
                                <a href="register.php" class="forgotPass"><?= $ln["create_user"] ?></a>
                                <a href="#" class="forgotPass" data-bs-toggle="modal"
                                    data-bs-target="#forgotPasswordModal"><?= $ln["forgot_password"] ?></a>
                            </p>
                            <div class="text-center">
                                <button type="submit" name="loginbtn" class="btn button"><?= $ln["register"] ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!--Forgot Modal Pass-->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modalContents">
                    <div class="text-center">
                        <img src="assets/images/circleLogo.png" alt="circleLogo" class="circleLogo img-fluid">
                    </div>
                    <h1 class="sectionTitle text-light resetTxt"><span><?= $ln["request_password"] ?></span></h1>

                    <div class="userForm">
                        <form id="forgotPasswordForm">
                            <!-- <div class="mb-3 userInputIconCtrl">
                <input type="text" class="form-control" id="userName" placeholder="Name" aria-describedby="emailHelp"
                  required>
                <img src="assets/images/user.png" alt="user" class="img-fluid">
              </div> -->
                            <div class="mb-3 userInputIconCtrl">
                                <input type="email" class="form-control" id="userEmail" placeholder="E-Mail" required>
                                <img src="assets/images/email.png" alt="email" class="img-fluid">
                            </div>
                            <!-- <div class="mb-3">
                <textarea class="form-control" id="forgotTextarea" rows="5" placeholder="" required></textarea>
              </div> -->
                            <!-- <p class="forgotPassWordCtrl text-end">
                  <a href="#" class="forgotPass" data-bs-toggle="modal"
                  data-bs-target="#forgotPasswordModal">Forgot Password?</a>
                </p> -->
                            <div class="text-center">
                                <button type="submit" class="btn button"><?= $ln['send'] ?></button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/jquery/jquery.min.js"></script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
    integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
    integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
</script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.9/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/4.0.0/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->

<script src="assets/js/jquery.marquee.min.js"></script>
<script src="assets/js/jquery.pause.min.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>

<script src="assets/js/echarts.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/custom.js"></script>

<script>
let url = location.href;
url = url.split("index_x.php")[1];
$(function() {
    if (url) {
        $("html, body").animate({
                scrollTop: $(url).offset().top - (url != "#contact_us" ? 190 : 50),
            },
            100
        );
    }

    let message = "<?= $authMessage ?? "" ?>";

    console.log(message);
    if (message) {
        toastr.error(message);
        $("#staticBackdrop").modal("show");
    }
})
</script>

<script type="text/javascript">
$(document).ready(function() {
    getLivedData();
    setInterval(function() {
        getLivedData();
    }, 2000);
});

function getLivedData() {
    $.ajax({
        type: "GET",
        url: "get_live_data.php",
        async: false,
        dataType: "JSON",
        data: {
            user_id: "<?= isset($user) ? $user['id'] : "" ?>"
        },
        success: function({
            prices,
            data
        }) {
            let portfolio = 0;
            data.portfolio.map(po => {
                let curr = prices.filter(price => price.name == po.project)[0].price;
                portfolio += Number(po.size) * Number(curr);
            });
            $("#portfolio").text(`${new Intl.NumberFormat('de-DE', {
      minimumFractionDigits: 2
    }).format(portfolio.toFixed(2))} EUR`);
            let performance = portfolio - Number(data.investment);
            $("#performance").text(
                `${performance > 0 ? "+" : ""}${new Intl.NumberFormat('de-DE', {
      minimumFractionDigits: 2
    }).format(performance.toFixed(2))} EUR (${performance > 0 ? "+" : ""}${new Intl.NumberFormat('de-DE', {
      minimumFractionDigits: 2
    }).format((data.investment ? (portfolio/data.investment * 100 - 100) : 0).toFixed(2))}%)`
            );
            $("#investment_size").text(`${new Intl.NumberFormat('de-DE', {
      minimumFractionDigits: 2
    }).format(data.investment.toFixed(2))} EUR`);
            $("#price").val(prices.filter(price => price.name == "GWG")[0].price);
            prices.map((row, i) => {
                var trading_selector = $(".trading-" + row.id);

                if (trading_selector.length) {
                    trading_selector.find('.show-name').text(row.name);
                    trading_selector.find('.show-price').text(row.price);
                    trading_selector.find('.show-percentage').text(row.perc + '%');

                    if (row.status == 1) {
                        trading_selector.find('.show-price').removeClass('currency_down');
                        trading_selector.find('.show-price').addClass('currency_up');

                        trading_selector.find('.show-percentage').removeClass('diff_down');
                        trading_selector.find('.show-percentage').addClass('diff_up');
                    } else {
                        trading_selector.find('.show-price').addClass('currency_down');
                        trading_selector.find('.show-price').removeClass('currency_up');

                        trading_selector.find('.show-percentage').addClass('diff_down');
                        trading_selector.find('.show-percentage').removeClass('diff_up');
                    }
                }
            });
        }
    });
}

function start() {
    // new mq('latest-news');
    // mqRotate(mqr);
}
window.onload = start;

function objWidth(obj) {
    if (obj.offsetWidth) return obj.offsetWidth;
    if (obj.clip) return obj.clip.width;
    return 0;
}
var mqr = [];

function mq(id) {
    this.mqo = document.getElementById(id);
    var wid = objWidth(this.mqo.getElementsByTagName("span")[0]) + 5;
    var fulwid = objWidth(this.mqo);
    var txt = this.mqo.getElementsByTagName("span")[0].innerHTML;
    this.mqo.innerHTML = "";
    var heit = this.mqo.style.height;
    this.mqo.onmouseout = function() {
        mqRotate(mqr);
    };
    this.mqo.onmouseover = function() {
        clearTimeout(mqr[0].TO);
    };
    this.mqo.ary = [];
    var maxw = Math.ceil(fulwid / wid) + 1;
    for (var i = 0; i < maxw; i++) {
        this.mqo.ary[i] = document.createElement("div");
        this.mqo.ary[i].innerHTML = txt;
        this.mqo.ary[i].style.position = "absolute";
        this.mqo.ary[i].style.left = wid * i + "px";
        this.mqo.ary[i].style.width = wid + "px";
        this.mqo.ary[i].style.height = heit;
        this.mqo.appendChild(this.mqo.ary[i]);
    }
    mqr.push(this.mqo);
}

function mqRotate(mqr) {
    if (!mqr) return;
    for (var j = mqr.length - 1; j > -1; j--) {
        maxa = mqr[j].ary.length;
        for (var i = 0; i < maxa; i++) {
            var x = mqr[j].ary[i].style;
            x.left = parseInt(x.left, 10) - 1 + "px";
        }
        var y = mqr[j].ary[0].style;
        if (parseInt(y.left, 10) + parseInt(y.width, 10) < 0) {
            var z = mqr[j].ary.shift();
            z.style.left = parseInt(z.style.left) + parseInt(z.style.width) * maxa + "px";
            mqr[j].ary.push(z);
        }
    }
    mqr[0].TO = setTimeout("mqRotate(mqr)", 20);
}
// $(function() {
//   $('.animation').marquee({
//     speed: 50,
//     gap: 0,
//     delayBeforeStart: 0,
//     direction: 'left',
//     duplicated: true,
//     pauseOnHover: true,
//     startVisible: true
//   });
// });
</script>
<div class="container-fluid ps-0  pe-0">
    <!-- <div class="row">
        <div class="col-sm-12" style="padding-top:1.5px;">
            <div id="latest-news" class="marquee">
                <span style="white-space: nowrap;">
                    <?php
            			$arr = array();
                        $sql = "select * from ticker WHERE name != 'GWG' order by id asc";
                        $stmt = $DB_con->prepare($sql);
                        $stmt->execute();

                        if ($stmt->rowCount() > 0)
                        {
                            $infi = 1;
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ 
                            	
                            	if ($row['name']=="EURUSD") {
                            		$nfd = 4;
                            	}
                            	else {
                            		$nfd = 2;
                            	}
                                ?>
                    <span class="trading-<?=$row['id']?>">
                        <span class="show-name"><?=$row['name']?></span>
                        <span
                            class="show-price <?php if($row['status'] == 1) echo 'currency_up'; else echo 'currency_down'; ?>">
                            <? echo number_format($row['price'], $nfd, '.', '\''); ?>
                        </span>
                        <span
                            class="show-percentage <?php if($row['status'] == 1) echo 'diff_up'; else echo 'diff_down'; ?>"><?php echo number_format($row['perc'], 2, '.', '\''); ?>%</span>
                        <span style="padding:0px 10px;">|</span>
                    </span>
                    <?php } } ?>
                </span>
            </div>
        </div>
    </div> -->
</div>
</body>

</html>