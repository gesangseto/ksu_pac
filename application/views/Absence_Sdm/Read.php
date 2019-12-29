<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">
        <a href="javascript:void(0);" class="toggle-sidebar">
          <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span>
        </a> Absensi/ Project : <?= $project[0]['project_name'] ?> - <?= $project[0]['project_owner'] ?>
      </h3>
    </div>
    <div class="panel-body">
      <div class="content-row">

        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title">
              <b>ID : <?= $sdm[0]['id'] ?> - Name : <?= $sdm[0]['fullname'] ?></b>
            </div>
          </div>

          <div class="panel-body">
            <div class="form-group">
              <label class="col-md-2 control-label">Nama Lengkap</label>
              <div class="col-md-5">
                <input type="text" readonly value="<?= $sdm[0]['fullname'] ?>" id="subject" class="form-control" name="title">
              </div>
              <label class="col-md-2 control-label">Nomor ID</label>
              <div class="col-md-3">
                <input type="text" readonly value="<?= $sdm[0]['nik'] ?>" id="subject" class="form-control" name="title">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Tempat Lahir</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $sdm[0]['birth_place'] ?>" id="subject" class="form-control" name="title">
              </div>
              <label class="col-md-2 control-label">Tanggal Lahir</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $sdm[0]['birthday'] ?>" id="subject" class="form-control" name="title">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Jenis Kelamin</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $sdm[0]['gender'] ?>" id="subject" class="form-control" name="title">
              </div>
              <label class="col-md-2 control-label">Status Pernikahan</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $sdm[0]['marital_status'] ?>" id="subject" class="form-control" name="title">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Alamat</label>
              <div class="col-md-10">
                <textarea type="text" readonly value="" id="subject" class="form-control" name="title"><?= $sdm[0]['address'] ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Nomor Telpon</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $sdm[0]['phone_number'] ?>" id="subject" class="form-control" name="title">
              </div>
              <label class="col-md-2 control-label">Pendidikan</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $sdm[0]['education'] ?>" id="subject" class="form-control" name="title">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Kode Jabatan</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $sdm[0]['position_code'] ?>" id="subject" class="form-control" name="title">
              </div>
              <label class="col-md-2 control-label">Jabatan</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $sdm[0]['position_name'] ?>" id="subject" class="form-control" name="title">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
              </div>

            </div>
          </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title">
              <b>Absensi</b>
            </div>
          </div>
          <div class="content-row">
            <div class="row">
              <div class="col-md-12">
                <div class="panel">
                  <div class="tabbable tabs-left clearfix">
                    <ul id="myTab1" class="nav nav-tabs">
                      <?php
                      foreach ($week as $row) {
                        if ($row['status'] == -1) {
                          echo '<li><a href="#week_' . $row['week'] . '" data-toggle="tab" class="btn btn-danger">Week ' . $row['week'] . '</a></li>';
                        } else if ($row['status'] == 0) {
                          echo '<li><a href="#week_' . $row['week'] . '" data-toggle="tab">Week ' . $row['week'] . '</a></li>';
                        } else if ($row['status'] == 1) {
                          echo '<li><a href="#week_' . $row['week'] . '" data-toggle="tab" class="btn btn-warning">Week ' . $row['week'] . '</a></li>';
                        } else if ($row['status'] == 2) {
                          echo '<li><a href="#week_' . $row['week'] . '" data-toggle="tab" class="btn btn-success">Week ' . $row['week'] . '</a></li>';
                        } else if ($row['status'] == 3) {
                          echo '<li><a href="#week_' . $row['week'] . '" data-toggle="tab" class="btn">Week ' . $row['week'] . '</a></li>';
                        }
                      }
                      ?>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <?php
                      foreach ($week as $row) {
                        echo '<div class="tab-pane fade" id="week_' . $row['week'] . '">';
                      ?>
                        <table id="table_<?= $row['week'] ?>" class="table table-hover" style="width:90%">
                          <thead>
                            <tr>
                              <th>Tanggal</th>
                              <th>Time In</th>
                              <th>Istirahat</th>
                              <th>Selesai</th>
                              <th>Time Out</th>
                              <th>Pinjaman</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            foreach ($absence_week as $row_absence) {
                              if ($row['week'] == $row_absence['week']) {
                                $uid = $row['week'];
                                if ($row_absence['time_in'] != '00:00:00' && $row_absence['time_out'] != '00:00:00') {
                                  echo '<tr class="info">';
                                } else {
                                  echo '<tr>';
                                }
                                echo '<td><b>' . @date('D d-m-Y', strtotime($row_absence['date'])) . '</b></td>';
                                echo '<td>' . @$row_absence['time_in'] . '</td>';
                                echo '<td>' .  @$row_absence['rest_start'] . '</td>';
                                echo '<td>' . @$row_absence['rest_finish'] . '</td>';
                                echo '<td>' .  @$row_absence['time_out'] . '</td>';
                                echo '<td>' . @$row_absence['loan_amount  '] . '</td>';
                                echo '<td>';
                                if ($row['status'] == 0 || $row['status'] == -1) {
                                  echo '<a data-toggle="modal" data-target="#' . $row_absence['id'] . '" class="btn btn-warning">edit absen</a>';
                                } else {
                                  echo '<a href="#" class="btn">Cannot edit</a>';
                                }
                                echo '</td>';
                                echo '</tr>';
                                $periode = $row_absence['date'];
                              }
                            }
                            ?>
                        </table>
                      <?php
                        if ($row['status'] == -1) {
                          echo '<div class="form-group has-warning has-feedback">';
                          echo '<label for="inputWarning2" class="control-label">' . @$row['absence_note'] . '</label>';
                          echo '</div>';
                          echo '<a href="' . site_url('') . 'Payroll_Sdm/Create?recreate=true&week=' . $row['week'] . '&sdm_id=' . $_GET['id'] . '&project_id=' . $_GET['project_id'] . '&position_id=' . $sdm[0]['position_id'] . '&periode=' . $periode . '" class="btn btn-danger">Re-Create Payroll</a>';
                        } else if ($row['status'] == 0) {
                          echo '<a href="' . site_url('') . 'Payroll_Sdm/Create?week=' . $row['week'] . '&sdm_id=' . $_GET['id'] . '&project_id=' . $_GET['project_id'] . '&position_id=' . $sdm[0]['position_id'] . '&periode=' . $periode . '" class="btn btn-success">Create Payroll</a>';
                        } else if ($row['status'] == 1) {
                          echo '<a class="btn btn-warning">Pending Aproval</a>';
                        } else if ($row['status'] == 2) {
                          echo '<a href="' . site_url('') . 'Payroll_Sdm/Update?week=' . $row['week'] . '&sdm_id=' . $_GET['id'] . '&project_id=' . $_GET['project_id'] . '&position_id=' . $sdm[0]['position_id'] . '&periode=' . $periode . '&confirmation=true" class="btn btn-success">Konfirmasi</a>';
                        } else if ($row['status'] == 3) {
                          echo '<a target="_blank" href="' . site_url('Print_Document/Payroll_Sdm') . '?week=' . $row['week'] . '&sdm_id=' . $_GET['id'] . '&project_id=' . $_GET['project_id'] . '&print=true" class="btn">Print Payroll </a>';
                          echo '<a href="' . site_url('Absence_Sdm/Read') . '?week=' . $row['week'] . '&sdm_id=' . $_GET['id'] . '&project_id=' . $_GET['project_id'] . '&view=true" class="btn btn-success">View Payroll</a>';
                        }
                        echo '</div>';
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>


    </div><!-- panel body -->

  </div>
</div><!-- content -->
</div>
</div>
<?php
foreach ($absence_week as $row) { ?>
  <div class="modal" id="<?= $row['id'] ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><?= date('D d-m-Y', strtotime($row['date'])) ?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="<?= site_url('Absence_Sdm/Update') ?>" method="POST">
            <div class="row">
              <div class="col-md-12">
                <input type="hidden" name="absence_id" value="<?= $row['id'] ?>">
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                <input type="hidden" name="project_id" value="<?= $_GET['project_id'] ?>">
                <table id="table_<?= $row['week'] ?>" class="table table-hover" style="width:100%">
                  <thead>
                    <tr>
                      <th>Time In</th>
                      <th>Rest start</th>
                      <th>Rest End</th>
                      <th>Time Out</th>
                      <th>Pinjaman</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    echo '<tr>';
                    echo '<td><input type="time"  name="time_in" required class="form-control"></td>';
                    echo '<td><input type="time"  name="rest_start" required class="form-control"></td>';
                    echo '<td><input type="time"  name="rest_finish" required class="form-control"></td>';
                    echo '<td><input type="time"  name="time_out" required class="form-control"></td>';
                    echo '<td><input type="text"  name="loan_amount" required value="0" class="form-control"></td>';
                    echo '<td><input type="text"  name="loan_description" class="form-control"></td>';
                    echo '</tr>';
                    ?>
                  </tbody>
                </table>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="create_absence" value="TRUE">Save</button>
              </div>
              <div class="clearfix"></div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-lg btn-danger btn-block" type="button" data-dismiss="modal">Cloe</button>
        </div>

      </div>
    </div>
  </div>
<?php } ?>