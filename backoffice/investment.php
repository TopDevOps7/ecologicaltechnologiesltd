<?php
$user_id = '';
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $href = '#createUserModal';
    $class = 'btn site-btn create-invest';
    $icon = 'fa-plus-circle';
    $text = 'Investment';
} else {
    $text = '';
}
include 'header.php';
$investAll = $crud->getInvestDetailsFromHash($user_id);
$user = $crud->getUserById($user_id);
$count = 0;
$countnew = 0;
foreach ($investAll as $key => $invest) {

  if($invest['kyc'] != 2) {
    continue;
  }
  
  if($invest['user_id'] == 7 || $invest['user_id'] == 58 || $invest['user_id'] == 36703) {
    continue;
  }
  
  if(isset($invest['tracking_id']) && $invest['tracking_id'] != "") {
    continue;
  }
  $count++; 
  break;
}

foreach ($investAll as $key => $invest) {
  
  if($invest['user_id'] == 7 || $invest['user_id'] == 58 || $invest['user_id'] == 36703) {
    continue;
  }
  
  if(isset($invest['tracking_id']) && $invest['tracking_id'] != "") {
    continue;
  }
  $countnew++; 
  break;
}
?>
<script>
$role = "<?= $role ?>";
$count = "<?= count($investAll) ?>";
<?php 
  $active = count(array_filter($investAll, function($v, $k) {
    return $v['status'] == 1;
  }, ARRAY_FILTER_USE_BOTH));
  $waiting = count(array_filter($investAll, function($v, $k) {
    return $v['status'] != 2 && $v['status'] != 1;
  }, ARRAY_FILTER_USE_BOTH));
  $cancelled = count(array_filter($investAll, function($v, $k) {
    return $v['status'] == 2;
  }, ARRAY_FILTER_USE_BOTH));
?>
$user_id = "<?= $user_id ?>";
</script>

<div class="container-fluid">

  <!-- <div class="logout-btn" style="float: right;">
    <a href="../logout.php"><i class="fas fa-sign-out-alt"></i></a>
  </div> -->
  <!-- <div class="card-status-container">
    </br>
  </div> -->

  <div class="st-head card-body">
    </br>
    <h3 class="text-center"><?= $user_id ? '' : 'Full ' ?>Investment List
      <?= $user_id
          ? "<br> <strong>{$user['fname']} {$user['lname']}</strong> "
          : '' ?>
    </h3>
    <div class="row">
      <div class="table-container" style="width: 100%;">
        <div class="table-responsive table-fixed-item">
          <div class="info-view" style="<?= ($role != 20) ? 'padding-top: 15px;' : '' ?>">
            <span class="info-showing"></span>
            <?php if($role != 21 && $role != 20) { ?>
            <div class="filtering">
              <label class="checkbox-inline d-inline-flex align-items-center ml-4" style="font-size: 14px;"><input
                  style="margin-right: 0.5rem;" type="checkbox" value="active">
                active (<?= $active ?>)</label>
              <label class="checkbox-inline d-inline-flex align-items-center ml-4" style="font-size: 14px;"><input
                  style="margin-right: 0.5rem;" type="checkbox" value="waiting approval"> waiting
                approval (<?= $waiting ?>)</label>
              <label class="checkbox-inline d-inline-flex align-items-center ml-4" style="font-size: 14px;"><input
                  style="margin-right: 0.5rem;" type="checkbox" value="cancelled"> cancelled (<?= $cancelled ?>)</label>
            </div>
            <?php } ?>
            <?php if($role == 20) { ?>
            <div class="actions d-flex align-items-center" style="margin-left: 15px; cursor: pointer; z-index: 10;">
              <i class="fas fa-book cash_setting_view mr-3"></i>
              <input type="date" id="cashed_date" value='<?= date('Y-m-d') ?>' style="height: 34px"
                class="form-input mb-1 mr-3 form-control form-control-sm d-none">
              <button class="cash_setting_confirm d-none btn mb-1 btn-dark"
                style="font-size: 14px; padding: 5px 15px;">Set Cashed</button>
              <!-- <i class="fas fa-check cash_setting_confirm"></i> -->
            </div>
            <?php } ?>
          </div>
          <table class="table table-striped" id="user_list" data-user-id="<?= $user_id ?>">
            <thead>
              <tr>
                <th class="c">Investor</th>
                <th class="c cashed_check_column d-none">
                  <input class="cashed_flag_check_all" type="checkbox" value="<?= $value['id'] ?>">
                </th>
                <th class="c">Phone</th>
                <th class="c">Date / ID</th>
                <th class="c">KYC / NDA</th>
                <th class="c">Project</th>
                <th class="c">Token</th>
                <th class="c">Price</th>
                <th class="c">EUR</th>
                <th class="c">Payed</th>
                <?php if ($role == 1 || $role == 2 || $role == 3) { ?>
                <!-- <th class="c">Tracking Service</th> -->
                <th class="c" style="min-width: 100px; padding-right: 25px; padding-left: 25px;">Tracking ID</th>
                <th class="c">Certificate</th>
                <?php } ?>
                <?php if ($role != 21 && $role != 20) { ?>
                <th class="c">Status</th>
                <?php } ?>
                <?php if ($role == 21) { ?>
                <th class="c">Tracking Service</th>
                <th class="c" style="min-width: 100px; padding-right: 25px; padding-left: 25px;">Tracking ID</th>
                <th class="c">Certificate</th>
                <?php } ?>
                <?php if ($role != '5') { ?>
                <th class="c no-sort">Options</th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($investAll as $key => $value) {

                  $date = '';
                  if (isset($value['created_at'])) {
                      $date = date_create($value['created_at']);
                      $date = date_format($date, 'd.m.Y');
                  }

                  // $notes = "";
                  // if($value['self_registered'] == 1) {
                  //     $notes = "<br><span class='user-status self_registered' style='width: auto;'>self_registered</span>";
                  // }

                  $kyc = "<span class='kyc-status waiting-for-files'></span>";
                  if ($value['kyc'] == 1) {
                      $kyc = "<span class='kyc-status pending'></span>";
                  } elseif ($value['kyc'] == 2) {
                      $kyc =
                          "<span class='kyc-status active'><i class='fa fa-check'></i></span>";
                  } elseif ($value['kyc'] == 3) {
                      $kyc = "<span class='kyc-status block'></span>";
                  }

                  ?>
              <tr>
                <td class='symbol-detect' data-search="<?= $value[
                    'fname'
                ] ?> <?= $value['lname'] ?> <?= $value['userId'] ?>" data-sort="<?= $value['lname'] ?>">
                  <div class='d-flex justify-content-between'>
                    <p><b><?= $value['fname'] ?> <?= $value['lname'] ?></b></p>
                    <p><?= $value['userId'] ?></p>
                  </div>
                  <p><?= $value['address'] ?></p>

                  <div class="d-flex justify-content-between">
                    <p><?= $value['zip'] ?> <?= $value['city'] ?></p>
                    <i data-address="<?= $value['fname'] ?> <?= $value['lname'] ?>-<?= $value['address'] ?>-<?= $value['zip'] ?> <?= $value['city'] ?>"
                      class="fas fa-copy copy-address-clipboard" style="cursor: pointer; color: #aaa; font-size: 12px;"
                      data-toggle="tooltip" title="Copy address"></i>
                    <?php if ($role == 21 || $role == 20) { ?>
                    <?php } ?>
                  </div>
                  <br>
                  <p class="d-flex align-items-center justify-content-between"><?= $value['email'] ?>
                    <i class="fas fa-copy email_copy" data-toggle="tooltip" title="Copy Email"
                      style="color: #aaa; flex-wrap: nowrap; cursor: pointer; font-size: 12px;"
                      data-email="<?= $value['email'] ?>"></i>
                  </p>
                </td>
                <td class="c cashed_check_column d-none"
                  data-sort=<?= ($value['cashed'] != 1 && $value['payed'] == 1) ? 0 : 1 ?>>
                  <?php if ($value['cashed'] != 1 && $value['payed'] == 1) { ?>
                  <input class="cashed_flag_check" style="margin-top: 5px;" type="checkbox" value="<?= $value['id'] ?>">
                  <?php } ?>
                </td>
                <td class='symbol-detect c'>
                  <p><?= $value['tel_1'] ?></p>
                  <p><?= $value['tel_2'] ?></p>
                </td>
                <td class='symbol-detect c' data-sort='<?= $value['id'] ?>'>
                  <p><?= $date ?></p>
                  <span class="user-status investment_id">#<?= $value[
                      'id'
                      ] ?>
                    <?php if(isset($value['z_id']) && $value['z_id'] != 0) { ?>
                    <br>
                    <div class="align-items-end d-flex justify-content-center">
                      <i class="fa-solid fa-file-signature" style="font-size: 0.9em; margin-right: 0.1em;"></i>
                      <span style="padding-top: 5px;"><?= $value['z_id'] ?></span>
                    </div>
                    <?php } ?>
                  </span>
                </td>
                <td class="c"><?= $kyc; ?></td>
                <td class="c"><?php echo $value['project_name']; ?></td>
                <td class="text-right" data-search="<?= $value['size'] ?>">
                  <?php echo number_format($value['size'], 0, ',', '.'); ?></td>
                <td class="text-right"><?php echo number_format($value['price'], 2, ',', '.'); ?></td>
                <td class="text-right" data-search="<?= $value[
                    'investment'
                ] ?>">
                  <?php echo number_format(
                      $value['investment'],
                      2,
                      ',',
                      '.'
                  ); ?></td>
                <td class="c">
                  <?php if($value['payed'] == 1) { ?>
                  <span
                    class='user-status payed-status active align-items-baseline justify-content-center <?= $value['re_payed'] == 1 ? "re-block" : ""?>'
                    style="cursor: pointer;" data-html="true" data-toggle="tooltip" title="<?php 
                    $date=date_create($value['payed_date']);
                    $date1=date_create($value['re_payed_date']);
                    echo date_format($date,"d.m.Y")."<br>". ($value['re_payed'] == 1 ? date_format($date1,"d.m.Y") : "");
                    ?>">payed
                    <?php if ($value['payed_email'] == 1) { ?>
                    <i class="fas fa-envelope pl-1"></i>
                    <?php } ?>
                    <?php if ($value['re_payed'] == 1) { ?>
                    <br>
                    re-payed
                    <?php } ?>
                  </span>
                  <?php } else if ($value['status'] != 2){ ?>
                  <span class='user-status block'>pending</span>
                  <?php } ?>
                  <?php if($value['cashed'] == 1) { ?>
                  <br>
                  <span
                    class='user-status cashed-status mt-2 active align-items-baseline justify-content-center <?= $value['re_cashed'] == 1 ? "re-block" : ""?>'
                    data-html="true" data-toggle="tooltip" title="<?php 
                    $date=date_create($value['cashed_date']);
                    $date1=date_create($value['re_cashed_date']);
                    echo date_format($date,"d.m.Y")."<br>". ($value['re_cashed'] == 1 ? date_format($date1,"d.m.Y") : "");
                    ?>">cashed
                    <?php if ($value['re_cashed'] == 1) { ?>
                    <br>
                    re-cashed
                    <?php } ?>
                  </span>
                  <?php } ?>
                </td>
                <?php if ($role == 1 || $role == 2 || $role == 3) { ?>
                <!-- <td class="c">
                    <?php if ($value['tracking_service'] && $value['tracking_service'] != "") {
                      echo $tracking_services[$value['tracking_service']];
                    } ?></td> -->
                <td class="c">
                  <a class="custom" target="_blank"
                    href="<?= $url = $tracking_service_urls[$value['tracking_service']] ?><?= $value['tracking_id'] ?>">
                    <?= $value['tracking_id'] ?>
                  </a>
                </td>
                <td class="c">
                  <?php if ($value['payed'] == 1 && $value['re_payed'] != 1) { ?>
                  <a class="custom" href='../utils/pdfGenerate.php?id=<?= $value['id'] ?>'
                    title='Download Certification' download>#<?= $value['cert_num'] ?></a>
                  <?php } ?>
                </td>
                <?php } ?>
                <?php if ($role != 21 && $role != 20) { ?>
                <td class="c">
                  <?php echo $value['status'] == 1
                      ? "<span class='user-status active'>active</span>"
                      : ($value['status'] == 2 ? "<span class='user-status block'>cancelled</span>" : "<span class='user-status investment_id mt-0' style='font-size: 0.75em !important; border: none !important; width: 110px; color: white; background: darkgray;'>waiting approval</span>"); ?>
                </td>
                <?php } ?>
                <?php if ($role == 21) { ?>
                <td class="c">
                  <?php if ($value['tracking_service'] && $value['tracking_service'] != "") {
                      echo $tracking_services[$value['tracking_service']];
                    } ?></td>
                <td class="c">
                  <a class="custom" target="_blank"
                    href="<?= $url = $tracking_service_urls[$value['tracking_service']] ?><?= $value['tracking_id'] ?>">
                    <?= $value['tracking_id'] ?>
                  </a>
                </td>
                <td class="c">
                  <?php if ($value['payed'] == 1) { ?>
                  <a class="custom" href='../utils/pdfGenerate.php?id=<?= $value['id'] ?>'
                    title='Download Certification' download>#<?= $value['cert_num'] ?></a>
                  <?php } ?>
                </td>
                <?php } ?>
                <?php if ($role != '5') { ?>
                <td class="c">
                  <?php if ($value['status'] != 2) { if ($role != 21) { ?>
                  <a href='#' data-id='<?= $value[
                      'id'
                  ] ?>' id='editInvest' data-user_name="<?= $value['fname'] ?> <?= $value['lname'] ?>"
                    title='Edit Investment' data-bs-toggle='modal' data-bs-target='#editInvestModal'><i
                      class='fas fa-edit'></i></a>
                  <?php } else { ?>
                  <a href='#' data-id='<?= $value[
                      'id'
                  ] ?>' id='editTracking' title='Edit Tracking Data' data-bs-toggle='modal'
                    data-bs-target='#editTrackingModal'><i class='fas fa-edit'></i></a>
                  <?php } } ?>
                </td>
                <?php } ?>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Create User Modal -->
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createAsinLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="createAsinLabel">Create Investment for <strong id="user_full_name"
            style="color: #15924e;"></strong></h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="fa">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="user_invest_form" action="../utils/middle.php" method="POST">
          <input type="hidden" class="form-control user_id_field" name="userId" value="<?= $user_id ??
              '' ?>">
          <div class="form-group">
            <label for="additions">Investment (EUR) * </label>
            <input type="number" class="form-control" id="user_invest" name="userInvest"
              placeholder="Enter the Investment" step="any" required>
          </div>
          <div class="form-group">
            <label for="symbol">Project *</label>
            <select class="form-control" name="project" id="project" required>
              <?php echo $crud->getSelectBox('project'); ?>
            </select>
          </div>
          <div class="d-flex" style="justify-content: space-between;">
            <div class="form-group">
              <label for="additions">Price *</label>
              <input type="number" class="form-control" id="user_price" name="userPrice" placeholder="Enter the Price"
                step="any" required>
            </div>
            <div class="form-group">
              <label for="additions">Token *</label>
              <input type="number" class="form-control" id="user_size" name="userSize" placeholder="Enter the Size"
                required>
            </div>
          </div>
          <div class="form-group">
            <label for="pay_method">Payment Method *</label>
            <Select class="form-control" id="pay_method" name="payMethod">
              <Option value="1">Bank</Option>
              <Option value="2"><?= $ln['crypto'] ?></Option>
            </Select>
          </div>
          <div class="form-group">
            <label for="shipping">Postal Shipping *</label>
            <Select class="form-control" id="shipping" name="shipping">
              <Option value="1">Yes</Option>
              <Option value="2">No</Option>
            </Select>
          </div>
          <?php if ($role == 20) { ?>
          <div class="form-group">
            <label for="tracking_service">Trackin gService</label>
            <Select class="form-control" id="tracking_service" name="tracking_service">
              <?php echo $tracking_service_options; ?>
              <!-- <Option value="2">Dt.Post</Option>
              <Option value="3">FedEx</Option> -->
            </Select>
          </div>
          <div class="form-group">
            <label for="tracking_id">Tracking ID</label>
            <input type="text" class="form-control" id="tracking_id" name="tracking_id">
          </div>
          <?php } ?>
          <div class="modal-footer mt-5 pb-0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary userInvestAjax" name="userInvestAjax">Confirm</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Invest Modal -->
<div class="modal fade" id="editInvestModal" tabindex="-1" role="dialog" aria-labelledby="createAsinLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="createAsinLabel">Edit Investment&nbsp;<strong id="edit_user_full_name"
            style="color: #15924e;"></strong></h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="fa">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="../utils/middle.php">
          <div class="form-group">
            <input type="hidden" id="invest_id" name="investId">
            <input type="hidden" class="form-control user_id_field" name="userId" value="<?= $user_id ??
                '' ?>">
            <label for="investment">Investment (EUR)*</label>
            <input type="number" class="form-control" id="investment" name="investment" placeholder="Enter Investment"
              required step="any">
          </div>
          <div class="d-flex" style="justify-content: space-between;">
            <div class="form-group" style="width: 45%">
              <label for="additions">Price *</label>
              <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price" required
                step="any">
            </div>
            <div class="form-group" style="width: 45%">
              <label for="additions">Token *</label>
              <input type="number" class="form-control" id="size" name="size" placeholder="Enter size" required>
            </div>
          </div>
          <div class="d-flex" style="justify-content: space-between;">
            <div class="form-group" style="width: 45%">
              <label for="pay_method">Payment Method *</label>
              <Select class="form-control" id="pay_method" name="payMethod">
                <Option value="1">Bank</Option>
                <Option value="2"><?= $ln['crypto'] ?></Option>
              </Select>
            </div>
            <div class="form-group" style="width: 45%">
              <label for="shipping">Postal Shipping *</label>
              <Select class="form-control" id="shipping" name="shipping">
                <Option value="1">Yes</Option>
                <Option value="2">No</Option>
              </Select>
            </div>
          </div>
          <?php if ($role == 2 || $role == 1) { ?>
          <div class="form-group" id="payed_confirm_view">
            <label for="payed_email">Email Payed Confirmation</label>
            <Select class="form-control" id="payed_email" name="payed_email">
              <Option value="0">No</Option>
              <Option value="1">Yes</Option>
            </Select>
          </div>
          <?php } ?>
          <?php if ($role == 20) { ?>
          <div class="d-flex" style="justify-content: space-between;">
            <div class="form-group" style="width: 45%;">
              <div class="d-flex justify-content-between align-items-end">
                <div class="form-group" style="flex: 0.9">
                  <label for="payed">Payed</label>
                  <Select class="form-control" id="payed" name="payed">
                    <Option value="1">Yes</Option>
                    <Option value="0">No</Option>
                  </Select>
                </div>
                <div class="form-group">
                  <Select class="form-control" id="bank_loc" name="bank_loc">
                    <Option value="0">D</Option>
                    <Option value="1">K</Option>
                  </Select>
                </div>
              </div>
            </div>
            <div class="form-group" style="width: 45%;">
              <div class="form-group">
                <label for="payed_date">Payed Date</label>
                <input type="date" class="form-control" id="payed_date" name="payed_date">
              </div>
            </div>
          </div>
          <div class="d-flex" style="justify-content: space-between;">
            <div class="form-group re_payed" style="display: none; width: 45%;">
              <label for="re_payed">Re-Payed</label>
              <Select class="form-control" id="re_payed" name="re_payed">
                <Option value="0">No</Option>
                <Option value="1">Yes</Option>
              </Select>
            </div>
            <div class="form-group re_payed_date" style="width: 45%; display: none;">
              <label for="re_payed_date">Re-Payed Date</label>
              <input type="date" class="form-control" id="re_payed_date" name="re_payed_date">
            </div>
          </div>
          <div class="d-flex" style="justify-content: space-between;">
            <div class="form-group re_cashed" style="display: none; width: 45%;">
              <label for="re_cashed">Re-Cashed</label>
              <Select class="form-control" id="re_cashed" name="re_cashed">
                <Option value="0">No</Option>
                <Option value="1">Yes</Option>
              </Select>
            </div>
            <div class="form-group re_cashed_date" style="width: 45%; display: none;">
              <label for="re_cashed_date">Re-Cashed Date</label>
              <input type="date" class="form-control" id="re_cashed_date" name="re_cashed_date">
            </div>
          </div>
          <?php } ?>
          <div class="form-group">
            <label for="initial_amount">Wallet for Distribution</label>
            <input type="text" class="form-control" id="wallet" name="wallet" placeholder="Enter wallet address">
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <Select class="form-control" id="status" name="status">
              <Option value="1">Active</Option>
              <Option value="2">Cancelled</Option>
              <Option value="3">Waiting Approval</Option>
            </Select>
          </div>
          <?php if ($role == 20) { ?>
          <!-- <div class="form-group">
            <label for="tracking_service">Tracking Service</label>
            <Select class="form-control" id="tracking_service" name="tracking_service">
              <Option value="1">UPS</Option>
              <Option value="2">Dt.Post</Option>
              <Option value="3">FedEx</Option>
            </Select>
          </div>
          <div class="form-group">
            <label for="tracking_id">Tracking ID</label>
            <input type="text" class="form-control" id="tracking_id" name="tracking_id">
          </div> -->
          <?php } ?>
          <div class="modal-footer mt-5 pb-0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary update-invest" name="updateInvest">Confirm</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Edit Invest Modal -->
<div class="modal fade" id="editTrackingModal" tabindex="-1" role="dialog" aria-labelledby="createAsinLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="createAsinLabel" style="font-size: 1.6rem;">Edit Tracking Data &nbsp;<strong
            id="invest_id_user" style="color: #15924e;"></strong></h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span class="fa" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="../utils/middle.php">
          <input type="hidden" class="form-control" id="invest_id_" name="investId">
          <div class="form-group">
            <label for="tracking_service_">Tracking Service</label>
            <Select class="form-control" id="tracking_service_" name="tracking_service" required>
              <!-- <Option value=""></Option> -->
              <?php echo $tracking_service_options; ?>
              <!-- <Option value="2">Dt.Post</Option>
              <Option value="3">FedEx</Option> -->
            </Select>
          </div>
          <div class="form-group">
            <label for="tracking_id">Tracking ID</label>
            <input type="text" class="form-control" id="tracking_id" name="tracking_id" required>
          </div>
          <div class="modal-footer mt-5 pb-0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary update-invest" name="updateTrackingData">Confirm</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
<script>
if ($role == 5 && $count == 0 && $user_id) {
  $("a[data-bs-target='#createUserModal'").css("display", "flex");
}
$(function() {
  <?php if ($role >= 20) { ?>
  $(".modal").on("shown.bs.modal", function() {
    $(this).find("select:visible:first").focus();
  });
  <?php } ?>
});

$("#size, #user_size").keydown(e => {
  if (e.keyCode == 190 || e.keyCode == 110 || e.keyCode == 190 || e.keyCode == 189 || e.keyCode == 69 || e
    .keyCode == 107) e.preventDefault();
  // If the input is empty and the key pressed is "0" nothing is printed
  if (!e.target.value && e.key == 0) {

    e.preventDefault();

  } else {
    const regex = new RegExp(/(^\d*$)|(Backspace|Tab|Delete|ArrowLeft|ArrowRight)/);
    if (!event.key.match(regex)) event.preventDefault();
    // If the key pressed is not a number or a period, nothing is printed
    // if (!/[0-9.]/.test(e.key)) {
    //   e.preventDefault();
    // }

  }
});

<?php if($count == 0 ) { ?>
$("#export-kyc").css({
  background: "#af0909",
  textDecoration: "line-through",
  cursor: "no-drop"
}).click(e => e.preventDefault()).attr('href', '#');
<?php } ?>

<?php if($countnew == 0 ) { ?>
$("#export-new").css({
  background: "#af0909",
  textDecoration: "line-through",
  cursor: "no-drop"
}).click(e => e.preventDefault()).attr('href', '#');
<?php } ?>
</script>