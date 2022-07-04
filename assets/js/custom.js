/*
This is user url page
*/

$.fn.dataTableExt.oSort["date-sort-desc"] = function (x, y) {
  x = x.split(".").reverse().join("-");
  y = y.split(".").reverse().join("-");

  if (new Date(x) < new Date(y)) {
    return 1;
  }
  return -1;
};

$.fn.dataTableExt.oSort["date-sort-asc"] = function (x, y) {
  x = x.split(".").reverse().join("-");
  y = y.split(".").reverse().join("-");

  if (new Date(x) > new Date(y)) {
    return 1;
  }

  return -1;
};

function password_generator(len) {
  var length = len ? len : 10;
  var string = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; //to upper
  var numeric = "0123456789";
  var punctuation = "!@#$%^&*()_+~`|}{[]:;?><,./-=";
  var password = "";
  var character = "";
  var crunch = true;
  while (password.length < length) {
    entity1 = Math.ceil(string.length * Math.random() * Math.random());
    entity2 = Math.ceil(numeric.length * Math.random() * Math.random());
    entity3 = Math.ceil(punctuation.length * Math.random() * Math.random());
    hold = string.charAt(entity1);
    hold = password.length % 2 == 0 ? hold.toUpperCase() : hold;
    character += hold;
    character += numeric.charAt(entity2);
    character += punctuation.charAt(entity3);
    password = character;
  }
  password = password
    .split("")
    .sort(function () {
      return 0.5 - Math.random();
    })
    .join("");
  return password.substr(0, len);
}

$(function () {
  $("#price_list").DataTable({
    fnDrawCallback: function (oSettings) {},
    fnInfoCallback: function (oSettings, iStart, iEnd, iMax, iTotal, sPre) {
      let info = iTotal + "/" + iMax + " entries";
      $("#list .info-showing").text("");
      $("#list .info-showing").text(info);
    },
    drawCallback: function (settings) {
      //   console.log(settings.fnRecordsDisplay());
      if (settings.fnRecordsDisplay() < 251) {
        $(".dataTables_paginate").hide();
      }
      var pagination_prev = $(this)
        .closest(".dataTables_wrapper")
        .find("#job_xml_previous");
      if (pagination_prev.hasClass("disabled")) {
        pagination_prev.addClass("non-opacity");
      }
      $(this).find("thead").css({
        position: "sticky",
        top: 0,
        "z-index": 5,
      });
      $(this).find("tbody>tr>td:first-child").css({
        "z-index": 2,
      });
      var pagination_next = $(this)
        .closest(".dataTables_wrapper")
        .find("#job_xml_next");
      if (pagination_next.hasClass("disabled")) {
        pagination_next.addClass("non-opacity");
      }
    },
    // order: false,
    order: [[0, "desc"]],
    columnDefs: [
      { targets: "no-sort", orderable: false },
      // { sType: "date", aTargets: [0] },
    ],
    aoColumns: [
      {
        sType: "date-sort",
        bSortable: true,
      },
      null,
      null,
    ],
    autoWidth: false,
    pageLength: 250,
    bLengthChange: false,
    bInfo: true,
    oLanguage: { sSearch: "" },
    fixedColumns: true,
    initComplete: function (settings, json) {
      $(`#user_list`).wrap(
        "<div style='overflow:auto; width:100%; max-height: calc(100vh - 185px); position:relative;'></div>"
      );
    },
  });
  $("#phase_table").DataTable({
    fnDrawCallback: function (oSettings) {},
    fnInfoCallback: function (oSettings, iStart, iEnd, iMax, iTotal, sPre) {
      let info = iTotal + "/" + iMax + " entries";
      $("#phase .info-showing").text("");
      $("#phase .info-showing").text(info);
    },
    drawCallback: function (settings) {
      //   console.log(settings.fnRecordsDisplay());
      if (settings.fnRecordsDisplay() < 251) {
        $(".dataTables_paginate").hide();
      }
      var pagination_prev = $(this)
        .closest(".dataTables_wrapper")
        .find("#job_xml_previous");
      if (pagination_prev.hasClass("disabled")) {
        pagination_prev.addClass("non-opacity");
      }
      $(this).find("thead").css({
        position: "sticky",
        top: 0,
        "z-index": 5,
      });
      $(this).find("tbody>tr>td:first-child").css({
        "z-index": 2,
      });
      var pagination_next = $(this)
        .closest(".dataTables_wrapper")
        .find("#job_xml_next");
      if (pagination_next.hasClass("disabled")) {
        pagination_next.addClass("non-opacity");
      }
    },
    order: [[0, "asc"]],
    columnDefs: [
      { targets: "no-sort", orderable: false },
      // { sType: "date", aTargets: [0] },
    ],
    // aoColumns: [
    //   {
    //     sType: "date-sort",
    //     bSortable: true,
    //   },
    //   null,
    //   null,
    // ],
    autoWidth: false,
    pageLength: 250,
    bLengthChange: false,
    bInfo: true,
    oLanguage: { sSearch: "" },
    fixedColumns: true,
    initComplete: function (settings, json) {
      $(`#user_list`).wrap(
        "<div style='overflow:auto; width:100%; max-height: calc(100vh - 185px); position:relative;'></div>"
      );
    },
  });
  $("#user_list").DataTable({
    fnDrawCallback: function (oSettings) {},
    fnInfoCallback: function (oSettings, iStart, iEnd, iMax, iTotal, sPre) {
      let info = iTotal + "/" + iMax + " entries";
      $(".info-showing").text("");
      $(".info-showing").text(info);
    },
    drawCallback: function (settings) {
      //   console.log(settings.fnRecordsDisplay());
      if (settings.fnRecordsDisplay() < 251) {
        $(".dataTables_paginate").hide();
      }
      var pagination_prev = $(this)
        .closest(".dataTables_wrapper")
        .find("#job_xml_previous");
      if (pagination_prev.hasClass("disabled")) {
        pagination_prev.addClass("non-opacity");
      }
      $(this).find("thead").css({
        position: "sticky",
        top: 0,
        "z-index": 5,
      });
      $(this).find("tbody>tr>td:first-child").css({
        "z-index": 2,
      });
      var pagination_next = $(this)
        .closest(".dataTables_wrapper")
        .find("#job_xml_next");
      if (pagination_next.hasClass("disabled")) {
        pagination_next.addClass("non-opacity");
      }
    },
    order: [[2 + location.href.includes("investment.php"), "desc"]],
    autoWidth: false,
    pageLength: 250,
    bLengthChange: false,
    bInfo: true,
    search: { regex: true },
    oLanguage: { sSearch: "" },
    columnDefs: [{ targets: "no-sort", orderable: false }],
    fixedColumns: true,
    initComplete: function (settings, json) {
      $(`#user_list`).wrap(
        "<div style='overflow:auto; width:100%; max-height: calc(100vh - 185px); position:relative;'></div>"
      );

      var api = this.api();

      $(".filtering input[type=checkbox]")
        .off("change")
        .on("change", function (e) {
          e.stopPropagation();

          console.log("here");

          // Get the search value
          // $(this).attr("title", $(this).val());
          var regexr = "({search})"; //$(this).parents('th').find('select').val();

          // Search the column for that value
          var filterValues = [];
          $(".filtering input[type=checkbox]:checked").each(function () {
            filterValues.push(this.value);
          });
          api
            .column($role == 1 || $role == 2 ? 12 : 10)
            .search(
              filterValues.length > 0
                ? regexr.replace(
                    "{search}",
                    "(((" + filterValues.join("|") + ")))"
                  )
                : "",
              filterValues.length > 0,
              filterValues.length == 0
            )
            .draw();

          // $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
        });
      $(".filtering input[type=checkbox][value=active]").trigger("click");
    },
  });
  $("#file_list").DataTable({
    fnDrawCallback: function (oSettings) {},
    fnInfoCallback: function (oSettings, iStart, iEnd, iMax, iTotal, sPre) {
      let info = iTotal + "/" + iMax + " entries";
      $(".info-showing").text("");
      $(".info-showing").text(info);
    },
    drawCallback: function (settings) {
      //   console.log(settings.fnRecordsDisplay());
      if (settings.fnRecordsDisplay() < 251) {
        $(".dataTables_paginate").hide();
      }
      var pagination_prev = $(this)
        .closest(".dataTables_wrapper")
        .find("#job_xml_previous");
      if (pagination_prev.hasClass("disabled")) {
        pagination_prev.addClass("non-opacity");
      }
      $(this).find("thead").css({
        position: "sticky",
        top: 0,
        "z-index": 5,
      });
      $(this).find("tbody>tr>td:first-child").css({
        "z-index": 2,
      });
      var pagination_next = $(this)
        .closest(".dataTables_wrapper")
        .find("#job_xml_next");
      if (pagination_next.hasClass("disabled")) {
        pagination_next.addClass("non-opacity");
      }
    },
    order: [[0, "asc"]],
    autoWidth: false,
    pageLength: 250,
    bLengthChange: false,
    bInfo: true,
    oLanguage: { sSearch: "" },
    columnDefs: [{ targets: "no-sort", orderable: false }],
    fixedColumns: true,
    initComplete: function (settings, json) {
      $(`#user_list`).wrap(
        "<div style='overflow:auto; width:100%; max-height: calc(100vh - 185px); position:relative;'></div>"
      );
    },
  });
  $("div.date").datepicker({
    autoclose: true,
  });
  $(".modal").on("shown.bs.modal", function () {
    $(this).find("input:visible:first").not("#date").focus();
  });
});

$(document).on("click", ".updatePhase", function () {
  let id = $(this).data("id");
  let status = $(this).data("status");
  let prev = $(this).data("prev-id");

  $.ajax({
    url: "../utils/middle.php",
    type: "post",
    dataType: "json",
    data: { updatePhase: "updatePhase", id, status, prev },
    success: function (result) {
      if (result) {
        let hre = location.href;
        location.href = hre.split("?")[0] + "?tab=3";
      }
    },
  });
});

$(document).on("click", ".editPeriod", function () {
  let id = $(this).data("id");
  let period = $(this).data("period").split(" - ");
  $("#phase_id").val(id);
  let from = period[0] ? period[0] : undefined;
  let to = period[1] ? period[1] : undefined;
  $("#fromDate").val(moment(from).format("YYYY-MM-DD"));
  $("#toDate").val(moment(to).format("YYYY-MM-DD"));
  console.log(id, period, from, to);
});

$(document).on("click", ".editSpecPrice", function () {
  let id = $(this).data("id");
  let price = $(this).data("price");
  $("#user_id_spec_price").val(id);
  $("#edit_spec_price").val(price > 0 ? price : "");
});

$("#fromDate").change(function () {
  let from = $("#fromDate").val();
  let to = $("#toDate").val();
  if (new Date(from) > new Date(to)) {
    $("#toDate").val(from);
  }
});

$("#toDate").change(function () {
  let from = $("#fromDate").val();
  let to = $("#toDate").val();
  console.log(new Date(to), new Date(from));
  if (new Date(from) > new Date(to)) {
    $("#fromDate").val(to);
  }
});

$("#user_type").on("change", function () {
  let type = $(this).val();
  if (type == 3) {
    $(".client-area").hide();
    $(".team-group").append(`<label for="team">Team</label>
                                <select class="form-control" name="team" id="team" required>
                                    <option class="default-option" value="">Select Team </option>
                                    <option class="default-option" value="1">Team 1 </option>
                                    <option class="default-option" value="2">Team 2 </option>
                                </select>`);

    $("#user_address").attr("required", false);
    $("#user_country").attr("required", false);
    $("#user_zip").attr("required", false);
    $("#user_tel_one").attr("required", false);
    $("#user_invest").attr("required", false);
    $("#project").attr("required", false);
    $("#user_price").attr("required", false);
    $("#user_size").attr("required", false);
  } else if (type == 4) {
    $(".client-area").show();

    $("#user_address").attr("required", true);
    $("#user_country").attr("required", false);
    $("#user_zip").attr("required", true);
    $("#user_tel_one").attr("required", true);
    $("#user_invest").attr("required", true);
    $("#project").attr("required", true);
    $("#user_price").attr("required", true);
    $("#user_size").attr("required", true);
  } else {
    $(".client-area").hide();
    $(".team-group").html("");

    $("#user_address").attr("required", false);
    $("#user_country").attr("required", false);
    $("#user_zip").attr("required", false);
    $("#user_tel_one").attr("required", false);
    $("#user_invest").attr("required", false);
    $("#project").attr("required", false);
    $("#user_price").attr("required", false);
    $("#user_size").attr("required", false);
  }
});

// remove user entry
$(".removeUser").on("click", function () {
  let id = $("#remove_user_id").val();
  let status = $(".block-user-desc").text();
  $.ajax({
    url: "../utils/middle.php",
    type: "post",
    dataType: "json",
    data: { removeUser: "removeUser", id: id, status: status },
    success: function (result) {
      if (result) {
        location.reload();
      }
    },
  });
});

// Remove Price entry
$(".removePrice").on("click", function () {
  let id = $("#remove_price_id").val();
  $.ajax({
    url: "../utils/middle.php",
    type: "post",
    dataType: "json",
    data: { removePrice: "removePrice", id },
    success: function (result) {
      if (result) {
        location.reload();
      }
    },
  });
});

// Remove File entry
$(".removeFile").on("click", function () {
  let id = $("#remove_file_id").val();
  $.ajax({
    url: "../utils/middle.php",
    type: "post",
    dataType: "json",
    data: { removeFile: "removeFile", id },
    success: function (result) {
      if (result) {
        location.reload();
      }
    },
  });
});

// adding value to remove modal
$(document).on("click", "#removeUser", function () {
  if ($(this).attr("data-status") == "active") {
    $(".block-user-desc").text("block");
    $(".block-user-desc-big").text("Block");
  } else {
    $(".block-user-desc").text("activate");
    $(".block-user-desc-big").text("Activate");
  }
  $(".user-email-user").text($(this).data("user_name"));
  let id = $(this).attr("data-id");
  $("#remove_user_id").val(id);
});

// adding value to remove price modal
$(document).on("click", "#removePrice", function () {
  let id = $(this).attr("data-id");
  $("#remove_price_id").val(id);
});

$(document).on("click", "#removeFile", function () {
  $("#remove_file_id").val($(this).data("id"));
  $(".remove_file_name").text($(this).data("file_name"));
});

$(document).on("click", ".send-file-btn", function () {
  // $("#remove_file_id").val($(this).data("id"));
  $("#send_file_name").val($(this).data("file_name"));
});

// Update Invest content
$(document).on("click", "#editInvest", function () {
  $("#edit_user_full_name").text($(this).data("user_name"));

  let invest_id = $(this).data("id");
  $("#invest_id").val(invest_id);
  $.ajax({
    url: "../utils/middle.php",
    type: "post",
    dataType: "json",
    data: { getDataInvest: "getDataInvest", invest_id: invest_id },
    success: function (result) {
      if (result.data) {
        if ($role == 20) {
          $("#editInvestModal")
            .find("input")
            .not("[type=hidden]")
            .attr("disabled", true);
          $("#editInvestModal").find("select").attr("disabled", true);
        }
        $("#investment").val(result.data.investment);
        $("#price").val(result.data.price);
        $("#size").val(result.data.size);
        $("select[name=payMethod]")
          .eq(1)
          .val(result.data.payment_method ?? 1);
        $("select[name=shipping]")
          .eq(1)
          .val(result.data.shipping ?? 1);
        $("#payed").val(result.data.payed ?? 0);
        $("#wallet").val(result.data.wallet);
        $("#status").val(result.data.status ?? 3);
        $("select[name=tracking_service]")
          .eq(1)
          .val(result.data.tracking_service ?? 1);
        $("input[name=tracking_id]").eq(1).val(result.data.tracking_id);
        $("#payed_confirm_view").hide();
        if (result.data.payed == 1) {
          $("#editInvestModal").find("select").attr("disabled", true);
          $("#payed_date")
            .prop("disabled", true)
            .val(moment(result.data.payed_date).format("YYYY-MM-DD"));
          $("#editInvestModal")
            .find("input")
            .not("[type=hidden]")
            .attr("disabled", true);
          $("#bank_loc").prop("disabled", true).val(0);
          $("#wallet").attr("disabled", false);
          if ($role == 20) {
            $(".re_payed")
              .show()
              .find("select")
              .prop("disabled", Boolean(Number(result.data.re_payed ?? 0)))
              .val(result.data.re_payed ?? 0);
            $(".re_payed_date")
              .show()
              .find("input")
              .prop("disabled", Boolean(Number(result.data.re_payed ?? 0)))
              .val(
                moment(result.data.re_payed_date ?? new Date()).format(
                  "YYYY-MM-DD"
                )
              );
            // console.log(moment((result.data.re_payed_date ?? "")).format('YYYY-MM-DD'));
            if (result.data.re_payed == 1 && result.data.cashed == 1) {
              $(".re_cashed")
                .show()
                .find("select")
                .prop("disabled", Boolean(Number(result.data.re_cashed ?? 0)))
                .val(result.data.re_cashed ?? 0);
              $(".re_cashed_date")
                .show()
                .find("input")
                .prop("disabled", Boolean(Number(result.data.re_cashed ?? 0)))
                .val(
                  moment(result.data.re_cashed_date ?? new Date()).format(
                    "YYYY-MM-DD"
                  )
                );
            }
          }
          if ($role == 2 || $role == 1) {
            $("#payed_confirm_view")
              .show()
              .find("select")
              .prop("disabled", Boolean(Number(result.data.payed_email)))
              .val(result.data.payed_email);
          }
        } else {
          $(".re_payed").hide();
          $(".re_payed_date").hide();
          $(".re_cashed").hide();
          $(".re_cashed_date").hide();
          if ($role == 2 || $role == 1) {
            $("#payed_confirm_view").hide();
          }
          $("#editInvestModal")
            .find("input")
            .not("[type=email]")
            .attr("disabled", false);
          $("#editInvestModal").find("select").attr("disabled", false);
          // $("#wallet").attr("disabled", true);
          if (result.data.payment_method == 1) {
            $("#bank_loc").prop("disabled", false).val(result.data.bank_loc);
          } else {
            $("#bank_loc").prop("disabled", true).val(0);
          }
          $("#payed_date")
            .prop("disabled", false)
            .val(moment().format("YYYY-MM-DD"));
        }
        $("select[name=tracking_service]").eq(1).attr("disabled", true);
        $("input[name=tracking_id]").eq(1).attr("disabled", true);

        // console.log(result.data.tracking_service, result.data.tracking_id);
      }
    },
  });
});

// Update Tracking content
$(document).on("click", "#editTracking", function () {
  let invest_id = $(this).data("id");
  $("#invest_id_").val(invest_id);
  $.ajax({
    url: "../utils/middle.php",
    type: "post",
    dataType: "json",
    data: { getDataInvest: "getDataInvest", invest_id: invest_id },
    success: function (result) {
      if (result.data) {
        $("#tracking_service_").val(
          result.data.tracking_service && result.data.tracking_service != 0
            ? result.data.tracking_service
            : 1
        );
        $("input[name=tracking_id]").val(result.data.tracking_id);
        $("#invest_id_user").text(
          `#${result.data.id} ${result.data.fname} ${result.data.lname}`
        );
        console.log(result.data.tracking_service, result.data.tracking_id);
      }
    },
  });
});

// Update user entry
$(document).on("click", "#editUser", function () {
  let string = $(".create-user-entity").text().replace(" ", "");
  $(".createUser").prop("disabled", false);
  $("#message").html("").css("color", "red");

  let user_id = $(this).attr("data-id");
  $("#createAsinLabel").html(`Edit ${string}`);
  $.ajax({
    url: "../utils/middle.php",
    type: "post",
    dataType: "json",
    data: { getUserInfoById: "getUserInfoById", user_id: user_id },
    success: function (result) {
      if (result.data) {
        let getData = result.data[0];
        let getDataInvest = result.data[1];
        let options = result.options;
        if (getData.role == 3) {
          // $(".team-group").html("");
          // $(".team-group").append(`<label for="symbol">Team</label>
          //                       <select class="form-control" name="team" id="team" required>
          //                           ${options}
          //                       </select>`);
          $(".team-group #team").val(getData.team);
          $(".team_2-group #team_2").val(getData.team_2);
          $(".client-area").hide();

          $("#user_address").attr("required", false);
          $("#user_zip").attr("required", false);
          $("#user_city").attr("required", false);
          $("#user_country").attr("required", false);
          $("#user_tel_one").attr("required", false);
          $("#user_invest").attr("required", false);
          $("#project").attr("required", false);
          $("#user_price").attr("required", false);
          $("#user_size").attr("required", false);
        } else if (getData.role == 4) {
          $(".client-area").show();
          if ($role == 3) {
            $(".team-group").html("");
            $(".team-group").hide();
          } else {
            $(".team-group #team").val(getData.team);
          }

          $("#user_address").attr("required", true);
          $("#user_country").attr("required", true);
          $("#user_zip").attr("required", true);
          $("#user_city").attr("required", true);
          $("#user_tel_one").attr("required", true);
          $("#user_invest").attr("required", true);
          $("#project").attr("required", true);
          $("#user_price").attr("required", true);
          $("#user_size").attr("required", true);
        } else {
          $(".client-area").hide();
          $(".team-group").html("");

          $("#user_address").attr("required", false);
          $("#user_country").attr("required", false);
          $("#user_zip").attr("required", false);
          $("#user_city").attr("required", false);
          $("#user_tel_one").attr("required", false);
          $("#user_invest").attr("required", false);
          $("#project").attr("required", false);
          $("#user_price").attr("required", false);
          $("#user_size").attr("required", false);
        }
        $("#createAsinLabel").html(
          `Edit ${string} <b style='color: #15924e;'>${getData.fname} ${getData.lname}</b>`
        );
        $("#user_type").val(getData.role);
        $("#user_email").val(getData.email);
        $("#user_fname").val(getData.fname);
        $("#user_lname").val(getData.lname);
        $("#gender").val(getData.gender);
        $("#title").val(getData.title);
        $("#office").val(getData.office);
        // console.log(getData);
        $(".user_id_field").val(getData.id);
        $("#user_address").val(getData.address);
        $("#user_country").val(getData.country);
        $("#user_zip").val(getData.zip);
        $("#user_city").val(getData.city);
        $("#user_birth").val(getData.birthday);
        $("#user_place").val(getData.place);
        $("#user_tel_one").val(getData.tel_1);
        $("#user_tel_two").val(getData.tel_2);
        $("#user_notes").val(getData.notes);
        $("#spec_price").val(getData.spec_price > 0 ? getData.spec_price : "");

        $(".nav-tabs.create-user-tab li a:not(.active)")
          .removeClass("disabled")
          .css("cursor", "pointer");
        $(".nav-tabs.create-user-tab li")
          .eq(2)
          .addClass("hide")
          .css("display", "none");
      }
    },
  });
});

$(document).on("click", "#setPassword", function () {
  let user_id = $(this).data("id");
  let email = $(this).data("email");
  let pass = $(this).data("pass");

  $("#user_id").val(user_id);
  $("#passEmail").val(email);
  $("#current_password").val(pass);
  $("#new_password").val("");
});

$(document).on("click", ".create-invest", function () {
  let user_id = $("#user_list").data("user-id");
  $.ajax({
    url: "../utils/middle.php",
    type: "post",
    dataType: "json",
    data: { getUserInfoById: "getUserInfoById", user_id: user_id },
    success: function (result) {
      if (result.data) {
        let userInfo = result.data[0];
        $("#user_full_name").text(userInfo.fname + " " + userInfo.lname);
      }
    },
  });
});

$("#utility_file_remove").click(function (e) {
  $("#utility_file").show();
  $("#utility_already").val("new");
  $("#utility_file_label").hide();
  $("#utility_file_download").css({ visibility: "hidden" });
  $("#utility_file_name").val("");
  $("#utility_status").val("");
  $("#utility_file_remove").hide();
  $("lable[for=utility_file]").text("Utility File");
});

$("#id_file_remove").click(function (e) {
  $("#id_file").show();
  $("#id_already").val("new");
  $("#id_status").val("");
  $("#id_file_download").css({ visibility: "hidden" });
  $("#id_file_name").val("");
  $("#id_file_label").hide();
  $("#id_file_remove").hide();
  $("lable[for=id_file]").text("ID File");
});

$("#nda_file_remove").click(function (e) {
  $("#nda_file").show();
  $("#nda_already").val("new");
  $("#nda_file_download").css({ visibility: "hidden" });
  $("#nda_status").val("");
  $("#nda_file_label").hide();
  $("#nda_file_name").val("");
  $("#nda_file_remove").hide();
  $("lable[for=nda_file]").text("NDA File");
});

// Create user entry
$(document).on("click", ".create-user-entity", function () {
  let string = $(this).text().replace(" ", "");
  $("#createAsinLabel").text(`Create ${string}`);
  $(".client-area").hide();
  $("#user_type").val("");
  $("#user_email").val("");
  $("#user_fname").val("");
  $("#user_lname").val("");
  $("#gender").val("Herr");
  $("#title").val("");
  $("#user_id").val("");
  $("#user_type").val("");
  $("#user_address").val("");
  $("#user_country").val("1");
  $("#user_zip").val("");
  $("#user_tel_one").val("");
  $("#user_tel_two").val("");
  $("#user_notes").val("");
  $("#user_price").val("");
  $(".user_id_field").val("");
  $("#user_size").val("");
  $("#user_invest").val("");
  $("#id_file").show().attr("disabled", false);
  $("#utility_file").show().attr("disabled", false);
  $("#nda_file").show().attr("disabled", false);
  $("#id_file_label").hide();
  $("#utility_file_label").hide();
  $("#nda_file_label").hide();
  $("#id_file").val("");
  $("#utility_file").val("");
  $("#nda_file").val("");
  $("#id_arealy").val("new");
  $("#utility_arealy").val("new");
  $("#nda_arealy").val("new");
  $("label[for=id_file]").text("ID File");
  $("label[for=utility_file]").text("Utility File");
  $("label[for=nda_file]").text("NDA File");
  $("#id_file_download")
    .attr("href", `javascript:void(0);`)
    .css("cursor", "no-drop");
  $("#utility_file_download")
    .attr("href", `javascript:void(0);`)
    .css("cursor", "no-drop");
  $("#nda_file_download")
    .attr("href", `javascript:void(0);`)
    .css("cursor", "no-drop");
  $("#id_file_remove").hide();
  $("#utility_file_remove").hide();
  $("#nda_file_remove").hide();
  $(".nav-tabs.create-user-tab li a:not(.active)")
    .addClass("disabled")
    .css("cursor", "no-drop");
  $(".nav-tabs.create-user-tab li")
    .eq(2)
    .removeClass("hide")
    .css("display", "initial");
});

$("#create_user_form").ajaxForm({
  beforeSend: function () {},
  uploadProgress: function (event, position, total, percentComplete) {},
  complete: function (xhr) {
    let res = JSON.parse(xhr.responseText);
    if (res.success) {
      $(".user_id_field").val(res.user_id);
      $(".nav-tabs.create-user-tab li a:not(.active)")
        .removeClass("disabled")
        .css("cursor", "pointer");
      $('.nav-tabs a[href="#kyc"]').tab("show");
    }
  },
});

$("#sendFileForm").ajaxForm({
  beforeSend: function () {},
  uploadProgress: function (event, position, total, percentComplete) {},
  complete: function (xhr) {
    let res = JSON.parse(xhr.responseText);
    if (res.success) {
      toastr.success(res.message);
      $("#sendFileModal").modal("hide");
    }
  },
});

$("#createUserModal").on("hide.bs.modal", function () {
  let user_id = $(".user_id_field").val();
  if (user_id) location.reload();
});

$("#kyc_form").ajaxForm({
  beforeSend: function () {},
  uploadProgress: function (event, position, total, percentComplete) {},
  complete: function (xhr) {
    console.log(xhr);
    if ($role != 5) {
      if ($(".nav-tabs.create-user-tab li").hasClass("hide")) {
        $("#createUserModal").modal("hide");
      } else {
        $('.nav-tabs a[href="#invest_create"]').tab("show");
      }
    } else {
      location.reload();
    }
  },
});

$("#kyc_kip").click(function () {
  if ($(".nav-tabs.create-user-tab li").hasClass("hide")) {
    $("#createUserModal").modal("hide");
  } else {
    $('.nav-tabs a[href="#invest_create"]').tab("show");
  }
});

$("#invest_skip").click(function () {
  $("#createUserModal").modal("hide");
});

$("#id_file").change(function (e) {
  let user_id = $(".user_id_field").val();
  let file_data = $(this).prop("files")[0];
  if (!file_data) {
    return;
  }
  $(`#kyc_ajax_btn`)
    .prop("disabled", true)
    .html('<i class="fas fa-spinner fa-pulse"></i> Confirm');
  let form_data = new FormData();
  form_data.append("IDfileUpload", "IDfileUpload");
  form_data.append("ID_file", file_data);
  form_data.append("user_id", user_id);

  $.ajax({
    url: "../utils/middle.php",
    type: "POST",
    dataType: "JSON",
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    success: (res) => {
      console.log(res);
      $(`#kyc_ajax_btn`).prop("disabled", false).html("Confirm");
      $("#id_file_name").val(res);
    },
  });
});

$("#utility_file").change(function (e) {
  let user_id = $(".user_id_field").val();
  let file_data = $(this).prop("files")[0];
  if (!file_data) {
    return;
  }
  $(`#kyc_ajax_btn`)
    .prop("disabled", true)
    .html('<i class="fas fa-spinner fa-pulse"></i> Confirm');
  let form_data = new FormData();
  form_data.append("UtilityfileUpload", "UtilityfileUpload");
  form_data.append("Utility_file", file_data);
  form_data.append("user_id", user_id);

  $.ajax({
    url: "../utils/middle.php",
    type: "POST",
    dataType: "JSON",
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    success: (res) => {
      console.log(res);
      $(`#kyc_ajax_btn`).prop("disabled", false).html("Confirm");
      $("#utility_file_name").val(res);
    },
  });
});

$("#nda_file").change(function (e) {
  let user_id = $(".user_id_field").val();
  let file_data = $(this).prop("files")[0];
  if (!file_data) {
    return;
  }
  $(`#kyc_ajax_btn`)
    .prop("disabled", true)
    .html('<i class="fas fa-spinner fa-pulse"></i> Confirm');
  let form_data = new FormData();
  form_data.append("ndafileUpload", "ndafileUpload");
  form_data.append("nda_file", file_data);
  form_data.append("user_id", user_id);

  $.ajax({
    url: "../utils/middle.php",
    type: "POST",
    dataType: "JSON",
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    success: (res) => {
      console.log(res);
      $("#nda_file_name").val(res);
      $(`#kyc_ajax_btn`).prop("disabled", false).html("Confirm");
    },
  });
});

$(".nav-tabs.create-user-tab a").on("click", function (e) {
  // let user_id = 30;
  let user_id = $(".user_id_field").val();
  if (!user_id) {
    console.log(!user_id);
    if ($(this).attr("href") != "#user_create") {
      console.log($(this).attr("href"));
      $(".nav-tabs.create-user-tab a[href='#user_create']").tab("show");
    }
    return;
  }
  if ($(this).attr("href") == "#kyc") {
    $.ajax({
      url: "../utils/middle.php",
      type: "POST",
      dataType: "JSON",
      data: {
        getKYC: "getKYC",
        user_id,
      },
      success: (res) => {
        if ($role == 5) {
          $("input[type=file]").attr("disabled", true);
        }
        if (res.id_file) {
          let info = res.id_file;
          $("#id_file_download")
            .attr("href", `../clients/uploads/${info.file_name}`)
            .css({ cursor: "pointer", visibility: "" });

          $("label[for=id_file]").text("ID File (Uploaded)");
          $("#id_status").val(info.valid != 0 ? info.valid : "");
          $("#id_already").val("uploaded");
          $("#id_file_name").val(info.file_name);
          $("#id_file").hide();
          $("#id_file_remove").hide();
          $("#id_file_label").val("Not Approved").show();
          if (info.valid == 1) {
            $("#id_file_label").val("Already Approved").show();
          } else if (info.valid == 2) {
            $("#id_file_label").val("Already Declined").show();
            $("#id_file_remove").show();
          }
        } else {
          $("#id_file_download")
            .attr("href", `javascript:void(0);`)
            .css({ visibility: "hidden" });
          if ($role == 5) {
            $("#id_status").attr("disabled", true);
          }
        }

        if (res.utility_file) {
          let info = res.utility_file;
          $("#utility_file_download")
            .attr("href", `../clients/uploads/${info.file_name}`)
            .css({ cursor: "pointer", visibility: "" });

          $("label[for=utility_file]").text("Utility File (Uploaded)");
          $("#utility_status").val(info.valid != 0 ? info.valid : "");
          // console.log(info.valid);
          $("#utility_already").val("uploaded");
          $("#utility_file_name").val(info.file_name);
          $("#utility_file").hide();
          $("#utility_file_remove").hide();
          $("#utility_file_label").val("Not Approved").show();
          if (info.valid == 1) {
            $("#utility_file_label").val("Already Approved").show();
          } else if (info.valid == 2) {
            $("#utility_file_label").val("Already Declined").show();
            $("#utility_file_remove").show();
          }
        } else {
          $("#utility_file_download")
            .attr("href", `javascript:void(0);`)
            .css({ visibility: "hidden" });
          if ($role == 5) {
            $("#utility_status").attr("disabled", true);
          }
        }

        if (res.nda_file) {
          let info = res.nda_file;
          $("#nda_file_download")
            .attr("href", `../clients/uploads/${info.file_name}`)
            .css({ cursor: "pointer", visibility: "" });

          $("label[for=nda_file]").text("NDA File (Uploaded)");
          $("#nda_status").val(info.valid != 0 ? info.valid : "");
          console.log(info.valid);
          $("#nda_already").val("uploaded");
          $("#nda_file_name").val(info.file_name);
          $("#nda_file").hide();
          $("#nda_file_remove").hide();
          $("#nda_file_label").val("Not Approved").show();
          if (info.valid == 1) {
            $("#nda_file_label").val("Already Approved").show();
          } else if (info.valid == 2) {
            $("#nda_file_label").val("Already Declined").show();
            $("#nda_file_remove").show();
          }
        } else {
          $("#nda_file_download")
            .attr("href", `javascript:void(0);`)
            .css({ visibility: "hidden" });
          if ($role == 5) {
            $("#nda_status").attr("disabled", true);
          }
        }
      },
    });
  }
});
$("#user_invest_form").ajaxForm({
  beforeSend: function () {},
  uploadProgress: function (event, position, total, percentComplete) {},
  complete: function (xhr) {
    console.log(xhr);
    $("#createUserModal").modal("hide");
  },
});

$(document).on("click", ".cash_setting_view", function () {
  $(".cashed_check_column").toggleClass("d-none");
  $(".cash_setting_confirm").toggleClass("d-none");
  $("#cashed_date").toggleClass("d-none").val(moment().format("YYYY-MM-DD"));
  // $(".cash_setting_view").addClass("d-none");
});

$(document).on("click", ".cash_setting_confirm", function () {
  // $(".cash_setting_view").removeClass("d-none");
  $(".cash_setting_confirm").addClass("d-none");
  $(".cashed_check_column").addClass("d-none");
  $("#cashed_date").addClass("d-none");
  let cashs = [];
  let cashed_date = $("#cashed_date").val();
  $(".cashed_check_column .cashed_flag_check:checked").each(function () {
    cashs.push($(this).val());
  });
  if (cashs.length > 0) {
    $.ajax({
      url: "../utils/middle.php",
      type: "post",
      dataType: "json",
      data: {
        setCashed: "setCashed",
        cashs,
        cashed_date: moment(cashed_date).format("YYYY-MM-DD"),
      },
      success: function () {
        location.reload();
      },
    });
  }
  $(".cashed_flag_check_all").prop("checked", false);
  $(".cashed_flag_check").prop("checked", false);
});

$(document).on("change", ".cashed_flag_check_all", function () {
  $(".cashed_check_column .cashed_flag_check").prop(
    "checked",
    $(this).prop("checked")
  );
});

$(document).on(
  "change",
  ".cashed_check_column .cashed_flag_check",
  function () {
    if (
      $(".cashed_check_column .cashed_flag_check:checked").length ==
      $(".cashed_check_column .cashed_flag_check").length
    ) {
      $(".cashed_flag_check_all").prop("checked", true);
    } else {
      $(".cashed_flag_check_all").prop("checked", false);
    }
  }
);

// Update price entry
$(document).on("click", "#editPrice", function () {
  let string = $(".create-price-entity").text().replace(" ", "");
  $(".createPrice").prop("disabled", false);
  $("#message").html("").css("color", "red");

  let price_id = $(this).data("id");
  $("#createAsinLabel").text(`Edit ${string}`);
  $.ajax({
    url: "../utils/middle.php",
    type: "post",
    dataType: "json",
    data: { getPriceById: "getPriceById", price_id: price_id },
    success: function (result) {
      if (result.data) {
        let getData = result.data[0];
        $("#price_id").val(getData.id);
        $("#project_id").val(getData.project_id);
        $("#date").val(getData.date);
        $("#price").val(getData.price);
      }
    },
  });
});

// Create price entry
$(document).on("click", ".create-price-entity", function () {
  let string = $(this).text().replace(" ", "");
  $("#createAsinLabel").text(`Create ${string}`);
  $("#date").val("");
  $("#project_id").val("1");
  $("#price").val("");
});

// $(document).on("click", "#uploadFileButton", function () {
//   $("#user_upload_id").val($(this).data("id"));
// });

$(document).on("change", "#user_price", function () {
  if ($(this).val() != 0) {
    $("#user_size").val(
      Math.round(($("#user_invest").val() / $(this).val()) * 100) / 100
    );
  } else {
    console.log("empty");
  }
});

$(document).on("change", "#user_invest", function () {
  if ($(this).val() != 0 && $("#user_price").val() != 0) {
    $("#user_size").val(
      Math.round(($("#user_invest").val() / $("#user_price").val()) * 100) / 100
    );
  } else {
    console.log("empty");
  }
});

var bar = $(".status_bar");

$("#uploadForm").ajaxForm({
  beforeSend: function () {
    let fileExist = false;
    let file_name = $("#uploadFile")[0].files[0].name;
    $.ajax({
      url: "../utils/middle.php",
      type: "POST",
      dataType: "JSON",
      async: false,
      data: {
        checkUploadFiles: "checkUploadFiles",
        file_name,
      },
      success: (res) => {
        fileExist = res;
      },
      error: () => console.log("check upload file error"),
    });

    if (fileExist) {
      let text = `"${file_name}" already exists. Do you want to replace it?`;
      if (confirm(text)) {
      } else {
        return false;
      }
    } else {
    }
    $(".upload_status").show();
    bar.attr("aria-valuenow", 0).css("width", 0).html("0% Completed");
  },
  uploadProgress: function (event, position, total, percentComplete) {
    var percentVal = percentComplete + "%";
    bar
      .attr("aria-valuenow", percentComplete)
      .css("width", percentVal)
      .html(percentVal + " Completed");
  },
  complete: function (xhr) {
    // console.log(xhr);
    bar
      .attr("aria-valuenow", 100)
      .css("width", "100%")
      .html("File Uploaded successfully!");
    setTimeout(() => {
      $("#uploadFileModal").modal("hide");
      $(".upload_status").hide();
      $("#uploadFile").val("");
      // toastr.success("File Uploaded successfully!");
      location.reload();
    }, 1500);
  },
});

$("#kycUploadForm").ajaxForm({
  beforeSend: function () {},
  uploadProgress: function (event, position, total, percentComplete) {},
  complete: function (xhr) {
    // console.log(xhr);
    // toastr.success("KYC File Uploaded successfully!");
    location.reload();
  },
});

$("#refresh_new_pass").click(function () {
  let newPass = password_generator(12);
  $("#new_password").val(newPass);
});

$("#current_pass_send").click(function (e) {
  e.preventDefault();
  let user_id = $("#user_id").val();
  let email = $("#passEmail").val();
  let pass = $("#current_password").val();

  $.ajax({
    url: "../utils/middle.php",
    type: "POST",
    dataType: "JSON",
    data: {
      currentPassword: "currentPassword",
      pass,
      email,
    },
    success: (res) => {
      if (res.success) {
        toastr.success(res.message);
      }
    },
  });
});

$("#new_pass_set").click(function (e) {
  e.preventDefault();
  let cPass = $("#current_password").val();
  let pass = $("#new_password").val();
  if (pass == "" || cPass == pass) return;
  let user_id = $("#user_id").val();
  let email = $("#passEmail").val();

  $.ajax({
    url: "../utils/middle.php",
    type: "POST",
    dataType: "JSON",
    data: {
      setPassword: "setPassword",
      pass,
      user_id,
      email,
    },
    success: (res) => {
      if (res.success) {
        toastr.success(res.message);
        $("#current_password").val(pass);
        $("#new_password").val("");
      }
    },
  });
});

$("#new_filepass_set").click(function (e) {
  e.preventDefault();
  let cPass = $("#current_password").val();
  let pass = $("#new_password").val();
  if (pass == "" || cPass == pass) return;

  $.ajax({
    url: "../utils/middle.php",
    type: "POST",
    dataType: "JSON",
    data: {
      setFilePassword: "setFilePassword",
      pass,
    },
    success: (res) => {
      if (res.success) {
        toastr.success(res.message);
        $("#current_password").val(pass);
        $("#new_password").val("");
      }
    },
  });
});

// $("#new_pass_send").click(function (e) {
//   e.preventDefault();
//   let bnPass = $("#new_password").val();
//   let cPass = $("#current_password").val();

//   if (bnPass != cPass) {
//     toastr.warning("Please set password firstly");
//     return;
//   }

//   $("#current_pass_send").trigger("click");
// });

$(document).on("click", "#setPublicFile", function (e) {
  let id = $(this).data("id");
  let file_name = $(this).data("file_name");
  let status = $(this).data("status");
  $("#file_id").val(`${id}-${status == 0 ? 1 : 0}`);
  $(".block-file-desc-big").text(
    status == 0 ? "Activate Public View" : "Disable Public View"
  );
  $("#public_status").text(status == 0 ? "Activate" : "Disable");
  $(".setting-file").text(file_name);
});

$(".setPublicFile").click(function () {
  let data = $("#file_id").val();
  let id = data.split("-")[0];
  let status = data.split("-")[1];

  $.ajax({
    url: "../utils/middle.php",
    type: "post",
    dataType: "json",
    data: { setPublicFile: "setPublicFile", id, status },
    success: function (result) {
      if (result) {
        location.reload();
      }
    },
  });
});

$("#email_copy_clipboard").click(function () {
  $("#passEmail").attr("disabled", false).select();
  document.execCommand("copy");
  $("#passEmail").attr("disabled", true);
  toastr.success("Copied");
});

$("#old_copy_clipboard").click(function () {
  $("#current_password").attr("disabled", false).select();
  document.execCommand("copy");
  // $("#current_password").trigger("blur");
  $("#current_password").attr("disabled", true);
  toastr.success("Copied");
});

$("#new_copy_clipboard").click(function () {
  $("#new_password").select();
  document.execCommand("copy");
  // $("#new_password").trigger("blur");
  toastr.success("Copied");
});

$("#createUserModal").on("shown.bs.modal", function () {
  if ($(".nav-tabs.create-user-tab a[href='#kyc']").hasClass("active")) {
    $(".nav-tabs.create-user-tab a[href='#kyc']").trigger("click");
  }
});

$("#users-btn").mouseenter((e) => {
  $(".user-btn-list").addClass("show");
});

$("#users-btn").mouseleave((e) => {
  $(".user-btn-list").removeClass("show");
});

$(".login-as-client").click(function (e) {
  e.preventDefault();
  let id = $(this).data("id");
  let email = $(this).data("email");
  $.ajax({
    url: "../utils/middle.php",
    type: "POST",
    dataType: "JSON",
    data: { userLogin: "userLogin", id, email },
    success: function (result) {
      if (result) {
        console.log(result);
        let URL = "../user.php?passhash=" + result.hash;
        // window.open(URL, "_blank");
        location.href = URL;
      }
    },
  });
});

$(".copy-address-clipboard").click(function (e) {
  const _this = $(this);
  let text = $(this).data("address").split("-");
  navigator.clipboard.writeText(text.join("\n")).then(
    function () {
      _this.css("opacity", 0);
      setTimeout(() => {
        _this.removeClass("fa-copy");
        _this.addClass("fa-check");
        _this.css("color", "green");
        _this.css("opacity", 1);
      }, 600);

      setTimeout(() => {
        _this.css("opacity", 0);
      }, 2000);

      setTimeout(() => {
        _this.removeClass("fa-check");
        _this.css("color", "#aaa");
        _this.addClass("fa-copy");
        _this.css("opacity", 1);
      }, 2600);
    },
    function (err) {
      console.error("Async: Could not copy text: ", err);
    }
  );
});

$(".email_copy").click(function (e) {
  const _this = $(this);
  let text = $(this).data("email");
  navigator.clipboard.writeText(text).then(
    function () {
      _this.css("opacity", 0);
      setTimeout(() => {
        _this.removeClass("fa-copy");
        _this.addClass("fa-check");
        _this.css("color", "green");
        _this.css("opacity", 1);
      }, 600);

      setTimeout(() => {
        _this.css("opacity", 0);
      }, 2000);

      setTimeout(() => {
        _this.removeClass("fa-check");
        _this.css("color", "#aaa");
        _this.addClass("fa-copy");
        _this.css("opacity", 1);
      }, 2600);
    },
    function (err) {
      console.error("Async: Could not copy text: ", err);
    }
  );
});

$("table tbody tr").click(function () {
  $(this).toggleClass("active");
});

$(document).ready(function () {
  $("[data-toggle=tooltip]").tooltip({
    // trigger: "click",
    container: "tr",
    html: true,
    delay: 0,
  });

  $(".cashed-status").mouseenter(function () {
    let tooltip = $(this).attr("aria-describedby");
    let $tip = $(`#${tooltip}`);
    let re = $(this).hasClass("re-block");
    $tip
      .css({ opacity: 1 })
      .find(".tooltip-arrow")
      .attr(
        "style",
        `border-top-color: ${!re ? "#00b2ff" : "#a31a1a"} !important`
      );
    $tip
      .find(".tooltip-inner")
      .css({ backgroundColor: !re ? "#00b2ff" : "#a31a1a" });
  });

  $(".payed-status").mouseenter(function () {
    let tooltip = $(this).attr("aria-describedby");
    let re = $(this).hasClass("re-block");
    let $tip = $(`#${tooltip}`);
    $tip
      .css({ opacity: 1 })
      .find(".tooltip-arrow")
      .attr(
        "style",
        `border-top-color: ${!re ? "#25b372" : "#a31a1a"} !important`
      );
    $tip
      .find(".tooltip-inner")
      .css({ backgroundColor: !re ? "#25b372" : "#a31a1a" });
  });

  // $(".cashed-status").mouseleave(function () {
  //   let tooltip = $(this).attr("aria-describedby");
  //   let $tip = $(`#${tooltip}`);
  //   $tip.find(".tooltip-arrow").removeAttr("style");
  //   $tip.find(".tooltip-inner").css({ backgroundColor: "" });
  // });

  // .tooltip-arrow:hover border-top-color''''.tooltip-inner background-color

  $("#editInvestModal #pay_method, #editInvestModal #payed").change(
    function () {
      // let payed = $("#editInvestModal #payed").val();
      let payment_method = $("#editInvestModal #pay_method").val();
      if (payment_method == 1) {
        $("#bank_loc").prop("disabled", false);
      } else {
        $("#bank_loc").prop("disabled", true).val(0);
      }
    }
  );
});
