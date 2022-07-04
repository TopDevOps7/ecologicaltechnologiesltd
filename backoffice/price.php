<?php
  $href = "#createPriceModal";
  $class = "btn site-btn me-3 create-price-entity";
  $icon = "fa-plus-circle";
  $text = "Price";
    include('header.php');
?>

<div class="container-fluid">

  <div class="st-head card-body">
    </br>
    <h3 class="text-center">Price/Chart</h3>
  </div>

  <?php
    $tab = 1;
    if(isset($_GET['tab'])) {
      $tab = $_GET['tab'];
    }
  ?>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link <?= ($tab == 1 ? "active" : "") ?>" data-bs-toggle="tab" href="#list">Price List</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#chart" id="price-chart-tab">Price Chart</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?= ($tab == 3 ? "active" : "") ?>" data-bs-toggle="tab" href="#phase">Phase</a>
    </li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content mb-5">
    <div id="list" class="st-head card-body tab-pane <?= ($tab == 1 ? "active" : "") ?>">
      <div class="row">
        <div class="table-container" style="width: 100%;">
          <div class="table-responsive table-fixed-item">
            <span class="info-showing"></span>
            <table class="table table-striped" id="price_list">
              <thead>
                <tr>
                  <th class="c">Date</th>
                  <th class="c">Price</th>
                  <th class="c no-sort">Options</th>
                </tr>
              </thead>
              <tbody>
                <?php echo $crud->getAllPrice();?>
              </tbody>
            </table>
          </div>
          <div class="p-5 text-center">

          </div>
        </div>
      </div>
    </div>
    <div id="chart" class="container tab-pane fade chart-view-lg"><br>
      <div id="priceChart" style="height:350px; background-color: #fff9;"></div>
    </div>
    <div id="phase" class="st-head card-body tab-pane <?= ($tab == 3 ? "active" : "") ?>">
      <div class="row">
        <div class="table-container" style="width: 100%;">
          <div class="table-responsive table-fixed-item">
            <span class="info-showing"></span>
            <table class="table table-striped" id="phase_table">
              <thead>
                <tr>
                  <th class="c">Phase</th>
                  <th class="no-sort c">Period</th>
                  <th class="c">Token</th>
                  <th class="c">Price</th>
                  <th class="c">Status</th>
                  <th class="no-sort c">Options</th>
                </tr>
              </thead>
              <tbody>
                <?php echo $crud->getAllPhase();?>
              </tbody>
            </table>
          </div>
          <div class="p-5 text-center">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Create Price Modal -->
<div class="modal fade" id="createPriceModal" tabindex="-1" role="dialog" aria-labelledby="createAsinLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-top: 8%;">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="createAsinLabel">Create Price</h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="../utils/middle.php" autocomplete="off">
          <div class="form-group">
            <input type="hidden" class="form-control" id="price_id" name="priceId">
            <label for="date">Date *</label>
            <!-- <div class="input-group date" data-provide="datepicker" data-date-format="dd.mm.yyyy"> -->
            <input type="date" class="form-control" id="date" name="date" required>
            <!-- <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
              </div> -->
            <!-- </div> -->
          </div>

          <div class="form-group">
            <label for="project_id">Project *</label>
            <select id="project_id" name="project_id" class="form-control" required>
              <?php echo $crud->getSelectBox("project"); ?>
            </select>
          </div>
          <div class="form-group">
            <label for="price">Price * </label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Enter the Price" required
              step="any">
          </div>

          <div class="modal-footer mt-5 pb-0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary createPrice" name="createPrice">Confirm</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Edit Period Modal -->
<div class="modal fade" id="editPeriod" tabindex="-1" role="dialog" aria-labelledby="createAsinLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-top: 8%;">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Edit Period</h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="../utils/middle.php" autocomplete="off">
          <input type="hidden" class="form-control" id="phase_id" name="phaseId">
          <div class="form-group">
            <div class="d-flex align-items-center">
              <input type="date" class="form-control" id="fromDate" name="fromDate" required> <span class="px-3"> ~
              </span>
              <input type="date" class="form-control" id="toDate" name="toDate" required>
            </div>
          </div>
          <div class="modal-footer mt-5 pb-0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" name="updatePeriod">Confirm</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Remove Modal -->
<div class="modal fade" id="removePriceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-top: 15%;">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Remove Price?</h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you really want to remove this price?
      </div>
      <div class="modal-footer">
        <input type="hidden" id="remove_price_id">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary removePrice">Confirm</button>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>
<script>
$(function() {

  // Chart setting.
  // Initialize the echarts instance based on the prepared dom

  let priceChart = echarts.init(document.getElementById("priceChart"));
  let option = {
    tooltip: {
      trigger: "axis",
      position: function(pt) {
        return [pt[0], "10%"];
      },
    },
    title: {
      left: "center",
      text: "",
    },
    toolbox: {
      show: false,
      feature: {
        dataZoom: {
          yAxisIndex: "none",
        },
        restore: {},
        saveAsImage: {},
      },
    },
    xAxis: {
      type: "category",
      boundaryGap: false,
      axisLabel: {
        color: "green",
      },
    },
    yAxis: {
      type: "value",
      boundaryGap: [0, "20%"],
      position: "right",
      axisLabel: {
        color: "green",
        formatter: function(value, index) {
          return Number(value).toFixed(1);
        },
      },
    },
    //   dataZoom: [
    //     {
    //       type: "inside",
    //       start: 0,
    //       end: 20,
    //     },
    //     {
    //       type: "inside",
    //       start: 0,
    //       end: 20,
    //     },
    //   ],
    series: [{
      name: "Price",
      type: "line",
      smooth: false,
      symbol: "none",
      animation: true,
      lineStyle: {
        color: "green",
        width: 1,
      },
      areaStyle: {
        opacity: 0.2,
        color: "green",
      },
      data: [],
    }, ],
  };

  function refreshChart() {
    $.ajax({
      url: "../utils/middle.php",
      type: "POST",
      dataType: "JSON",
      data: {
        getPriceList: "getPriceList",
      },
      success: (res) => {
        let data = [];
        res.data.forEach(({
          date,
          price
        }, index, arr) => {
          let sdate = new Date(date + " 00:00:00");
          if (index + 1 == arr.length) {
            if (sdate > new Date()) {
              data.push([moment(date).format("DD.MM.YYYY"), price]);
            } else {
              for (
                sdate; sdate < new Date(); sdate.setDate(sdate.getDate() + 1)
              ) {
                data.push([moment(sdate).format("DD.MM.YYYY"), price]);
              }
            }
            return;
          }
          let edate = new Date(arr[index + 1].date + " 00:00:00");
          for (sdate; sdate < edate; sdate.setDate(sdate.getDate() + 1)) {
            data.push([moment(sdate).format("DD.MM.YYYY"), price]);
          }
        });

        option.series[0].data = data;
        priceChart.setOption(option);
      },
      error: () => {
        console.log("getPriceList error!");
      },
    });
  }

  refreshChart();

  $(window).on("resize", function() {
    if (priceChart != null && priceChart != undefined) {
      priceChart.resize();
    }
  });

  $('#price-chart-tab').on('shown.bs.tab', function() {
    if (priceChart != null && priceChart != undefined) {
      priceChart.resize();
    }
  });

  // $('input[type=date]').datepicker({
  //   autoclose: true,
  //   minViewMode: 1,
  //   format: 'mm/yyyy',
  // })
})
</script>