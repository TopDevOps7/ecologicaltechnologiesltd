var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) { slideIndex = 1 }
  if (n < 1) { slideIndex = slides.length }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}

window.setInterval(function () {
  plusSlides(1);
}, 10000);

/* Scroll to section on Nav click JS */
$(".main-header .navbar-nav li> a").click(function () {
  $("html, body").animate(
    {
      scrollTop:
        $(
          "#" + $(this).attr("href").replace("index.php", "").split("#")[1]
        ).offset().top - 290,
    },
    100
  );
  return false;
});
$("#slideshow > div:gt(0)").hide();


/* Scroll to contact section on contact Nav click JS */
$(".main-header .navbar-nav li a.contact").click(function () {
  $("html, body").animate(
    {
      scrollTop: $("#contact_us").offset().top - 50,
    },
    100
  );
  return false;
});

/* Add class on Header on window scroll */
$(window).scroll(function () {
  var scroll = $(window).scrollTop();

});

/* Add active class on active Navigation */
$(".main-header .navbar-nav li a").click(function () {
  $(".main-header .navbar-nav li").removeClass("active");
  $(this).parent("li").addClass("active");
});

/* Remove active class from navigation on logo Click */
$(".main-header .navbar-brand img").click(function () {
  $(".main-header .navbar-nav li").removeClass("active");
});

/* Add active class on Navigation on window scroll */
$(window)
  .scroll(function () {
    var distance = $(window).scrollTop();
    if ($(window).scrollTop() == 0) {
      $(".navbar-nav li.active").removeClass("active");
    }

    $(".page-section").each(function (i) {
      if ($(this).position().top <= distance + 300) {
        $(".main-header .navbar-nav li.active").removeClass("active");
        $(".main-header .navbar-nav li").eq(i).addClass("active");
      }
    });
  })
  .scroll();

$("#sendOrderMail").submit((e) => {
  e.preventDefault();

  let senderName = $("#senderName").val();
  let senderEmail = $("#senderEmail").val();
  let senderPhoneNumber = $("#senderPhoneNumber").val();
  let orderMessage = $("#orderMessage").val();

  $.ajax({
    url: "utils/middle.php",
    type: "POST",
    dataType: "JSON",
    data: {
      sendOrderMail: "sendOrderMail",
      senderName,
      senderEmail,
      senderPhoneNumber,
      orderMessage,
    },
    success: (res) => {
      if (res.success) {
        console.log("success");
        toastr.success(res.message);
      } else {
        console.log("can't send");
        toastr.error("Error!");
      }
      $("#appointmentModal").modal("hide");
    },
    error: () => console.log("order mail error!"),
  });
});

// $("#forgotPasswordForm").submit((e) => {
//   e.preventDefault();

//   let userName = $("#userName").val();
//   let userEmail = $("#userEmail").val();
//   let requestMessage = $("#forgotTextarea").val();

//   $.ajax({
//     url: "utils/middle.php",
//     type: "POST",
//     dataType: "JSON",
//     data: {
//       forgotPassword: "forgotPassword",
//       userName,
//       userEmail,
//       requestMessage,
//     },
//     success: (res) => {
//       if (res.success) {
//         console.log("success");
//         toastr.success(res.message);
//         $("#forgotPasswordModal").modal("hide");
//       } else {
//         toastr.error(res.message);
//         console.log("can't send");
//       }
//     },
//     error: () => console.log("order mail error!"),
//   });
// });

$("#sendWhitePaperMail").submit((e) => {
  e.preventDefault();

  let senderName = $("#whitePaperName").val();
  let senderEmail = $("#whitePaperEmail").val();
  let senderPhoneNumber = $("#whitePaperPhoneNumber").val();
  let whitePaperMessage = $("#whitePaperMessage").val();

  $.ajax({
    url: "utils/middle.php",
    type: "POST",
    dataType: "JSON",
    data: {
      sendWhitePaper: "sendWhitePaper",
      senderName,
      senderEmail,
      senderPhoneNumber,
      whitePaperMessage,
    },
    success: (res) => {
      if (res.success) {
        console.log("success");
        toastr.success(res.message);
      } else {
        console.log("can't send");
        toastr.error("Error!");
      }
      $("#whitePaperModal").modal("hide");
    },
    error: () => console.log("order mail error!"),
  });
});

$("#supportTicketForm").submit((e) => {
  e.preventDefault();

  let senderName = $("#ticketName").val();
  let senderEmail = $("#ticketEmail").val();
  let senderPhoneNumber = $("#ticketPhoneNumber").val();
  let ticketMessage = $("#ticketMessage").val();

  $.ajax({
    url: "utils/middle.php",
    type: "POST",
    dataType: "JSON",
    data: {
      sendTicket: "sendTicket",
      senderName,
      senderEmail,
      senderPhoneNumber,
      ticketMessage,
    },
    success: (res) => {
      if (res.success) {
        console.log("success");
        toastr.success(res.message);
      } else {
        console.log("can't send");
        toastr.error("Error!");
      }
      $("#supportTicket").modal("hide");
    },
    error: () => console.log("order mail error!"),
  });
});

$(window).resize(function (e) {
  let width = $(window).width();
  if (width > 975) {
    $(".logout")
      .addClass("auth-btn")
      .find("a")
      .removeClass("nav-link")
      .html(`<i class="fas fa-sign-out-alt"></i>`);
    $(".login").addClass("auth-btn");
  } else {
    $(".logout")
      .removeClass("auth-btn")
      .find("a")
      .addClass("nav-link")
      .html("Logout");
    $(".login").removeClass("auth-btn");
  }
});

let width = $(window).width();
if (width > 975) {
  $(".logout")
    .addClass("auth-btn")
    .find("a")
    .removeClass("nav-link")
    .html(`<i class="fas fa-sign-out-alt"></i>`);
  $(".login").addClass("auth-btn");
} else {
  $(".logout")
    .removeClass("auth-btn")
    .find("a")
    .addClass("nav-link")
    .html("Logout");
  $(".login").removeClass("auth-btn");
}

var validations = {
  email: [
    /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/,
    "Please enter a valid email address",
  ],
};
$(function () {
  // Check all the input fields of type email. This function will handle all the email addresses validations
  $("input[type=email]").change(function () {
    // Set the regular expression to validate the email
    validation = new RegExp(validations["email"][0]);
    // validate the email value against the regular expression
    if (!validation.test(this.value)) {
      // If the validation fails then we show the custom error message
      this.setCustomValidity(validations["email"][1]);
      return false;
    } else {
      // This is really important. If the validation is successful you need to reset the custom error message
      this.setCustomValidity("");
    }
  });

  $(".main-header .navbar-nav li .dropdown-item").click(function () {
    let lang = $(this).data("lang");
    $.ajax({
      url: rPath + "utils/middle.php",
      type: "GET",
      dataType: "JSON",
      data: {
        languageSet: "languageSet",
        lang,
      },
      success: (res) => {
        location.reload();
      },
    });

  });



});

$(document).on("click", ".add-wallet-address", function () {
  $("#invest_id").val($(this).data("id"));
});

$("#addWalletForm").ajaxForm({
  // beforeSend: function () {},
  // uploadProgress: function (event, position, total, percentComplete) {},
  complete: function (xhr) {
    console.log(xhr);
    let res = JSON.parse(xhr.responseText);
    console.log(res);
    if (res) {
      toastr.success("Wallet address added successfully.");
      location.reload();
    }
  },
});

let files = $("#files_list").DataTable({
  searching: false,
  info: false,
  paging: false,
  legthChange: false,
  ordering: false,
  ajax: {
    url: rPath + "utils/middle.php",
    type: "POST",
    data: {
      getFiles: "getFiles",
    },
  },
  columnDefs: [
    {
      targets: [0, 1],
      // className: "dt-body-center",
    },
  ],
  columns: [
    { data: "file_name" },
    // {
    //   data: "upload_date",
    //   render: (value) => moment(value).format("DD.MM.YYYY hh:mm"),
    // },
    {
      data: "file_name",
      render: (value) =>
        `<a download href='files/${value}' title='Download ${lang.file}'><i class='fas fa-download'></i></a>`,
    },
  ],
});

let $phases = $("#phase_list").DataTable({
  searching: false,
  info: false,
  paging: false,
  legthChange: false,
  ordering: false,
  ajax: {
    url: rPath + "utils/middle.php",
    type: "POST",
    data: {
      getPhases: "getPhases",
    },
  },
  columnDefs: [
    {
      targets: [4],
      className: "dt-body-center padding-0",
    },
    {
      targets: [0, 1, 2, 3, 4],
      className: "dt-body-center",
    },
  ],
  columns: [
    {
      data: "phase",
    },
    {
      data: "period",
    },
    {
      data: "token",
      render: (value) => `${value} Mio.`,
    },
    {
      data: "price",
      render: (value) =>
        `${Number(value)
          .toFixed(2)
          .replace(/\d(?=(\d{3})+\.)/g, "$&,")} €`,
    },
    {
      data: "status",
      render: (value) => {
        let state = "";
        if (value == 1) {
          state = `<span class='phase-status active'>${lang.active}</span>`;
        } else if (value == 2) {
          state = `<span class='phase-status complete'>${lang.completed}</span>`;
        }
        return state;
      },
    },
  ],
});

$("#login_file_form").submit(function (e) {
  e.preventDefault();
  let file_pass = $("#file_pass").val();
  $.ajax({
    url: rPath + "utils/middle.php",
    type: "POST",
    dataType: "JSON",
    data: {
      filesLogin: "filesLogin",
      file_pass,
    },
    success: (res) => {
      if (res.success) {
        $(".file_form").hide();
        $(".file_lists").show();
        $(".phase_list").show();
        files.ajax.reload();
        $phases.ajax.reload();
      } else {
        toastr.error(res.msg);
      }
    },
  });
});

$("#changePasswordForm").submit(function (e) {
  e.preventDefault();
  let current = $("#currentPassword").val();
  let newPass = $("#newPassword").val();
  let newPass2 = $("#newPassword2").val();
  let hash = $("#hashValue").val();

  if (newPass != newPass2) {
    $("#newPassword2").get(0).setCustomValidity("Password not match.");
    return;
  }

  $.ajax({
    url: rPath + "utils/middle.php",
    type: "POST",
    dataType: "JSON",
    data: {
      changePassword: "changePassword",
      current,
      newPass,
      hash,
    },
    success: (res) => {
      if (res.success) {
        $("#changePasswordModal").modal("hide");
        toastr.success(res.msg);
      } else {
        toastr.error(res.msg);
      }
    },
  });
});

$("#whitePaperModal").on("hidden.bs.modal", function () {
  $("#file_pass").val("");
});

$(".modal").on("hidden.bs.modal", () => {
  $("input:not([type=hidden]):not(:disabled), textarea").val("");
});

$("#forgotPasswordForm").submit((e) => {
  e.preventDefault();

  let email = $("#userEmail").val();
  $.ajax({
    url: "utils/middle.php",
    type: "POST",
    dataType: "JSON",
    data: {
      forgotPassword: "forgotPassword",
      email,
    },
    success: (res) => {
      if (res.success) {
        console.log("success");
        toastr.success(res.message);
        $("#forgotPasswordForm").modal("hide");
      } else {
        console.log("can't send");
        toastr.error("Error!");
      }
      // $("#appointmentModal").modal("hide");
    },
    error: () => console.log("order mail error!"),
  });
});

$(".userInputIconCtrl input[type=password]")
  .parent(".userInputIconCtrl")
  .append(
    $("<i>", { class: "fas fa-eye" }).css({
      cursor: "pointer",
      position: "absolute",
      color: "#fff",
      top: 15,
      right: 20,
    })
  );

$("input[type=password]#user_password")
  .parent(".form-group")
  .css({ position: "relative" })
  .append(
    $("<i>", { class: "fas fa-eye password" }).css({
      cursor: "pointer",
      position: "absolute",
      top: 20,
      right: 15,
      fontSize: "14px",
    })
  );

$(document).on("click", ".userInputIconCtrl .fas.fa-eye", function () {
  let $pass = $(this)
    .toggleClass("fa-eye-slash")
    .parent(".userInputIconCtrl")
    .find("input");
  $pass.prop("type", $pass.prop("type") == "text" ? "password" : "text");
});

$(document).on("click", ".form-group .fas.fa-eye.password", function () {
  let $pass = $(this)
    .toggleClass("fa-eye-slash")
    .parent(".form-group")
    .find("input");
  $pass.prop("type", $pass.prop("type") == "text" ? "password" : "text");
});
