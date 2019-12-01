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
                  <?php
                  $status = NULL;
                  ?>
                  <table id="table" class="table table-hover" style="width:90%">
                    <thead>
                      <tr>
                        <th>Tanggal</th>
                        <th>Time In</th>
                        <th>Istirahat</th>
                        <th>Selesai</th>
                        <th>Time Out</th>
                        <th>Pinjaman</th>
                        <th>Jam Kerja</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $working_time = 0;
                      $total_working_time = 0;
                      $total_loan = 0;
                      foreach ($sdm_absence as $row) {

                        $in = date('H', strtotime($row['time_in']));
                        $out = date('H', strtotime($row['time_out']));
                        $rest_finish = date('H.i', strtotime($row['rest_finish']));
                        $rest_start = date('H.i', strtotime($row['rest_start']));
                        $working_time = $working_time + ($out - $in) - ($rest_finish - $rest_start);
                        // $uid = $row['week'];
                        echo '<tr>';
                        echo '<td><b>' . @date('D d-m-Y', strtotime($row['date'])) . '</b></td>';
                        echo '<td>' . @$row['time_in'] . '</td>';
                        echo '<td>' .  @$row['rest_start'] . '</td>';
                        echo '<td>' . @$row['rest_finish'] . '</td>';
                        echo '<td>' .  @$row['time_out'] . '</td>';
                        echo '<td>' . @$row['loan_amount  '] . '</td>';
                        echo '<td>' . @$working_time . '</td>';
                        echo '</tr>';
                        $total_working_time = $total_working_time + $working_time;
                        $total_loan = $total_loan + @$row['loan_amount  '];
                        $working_time = 0;
                      }
                      ?>
                      <tr>
                        <td colspan="5"><b>Total</b> </td>
                        <td>Rp. <?= @$total_loan ?></td>
                        <td><?= $total_working_time ?> - Jam</td>
                      </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="panel-body">

          <div class="form-group">
            <label class="col-md-2 control-label">Gaji Jabatan</label>
            <div class="col-md-2">
              <input type="text" readonly value="<?= $payroll[0]['position_salary'] ?>" id="subject" class="form-control" name="title">
            </div>
            <label class="col-md-2 control-label">Total Jam</label>
            <div class="col-md-2">
              <input type="text" readonly value="<?= $payroll[0]['working_time'] ?> - Jam" id="subject" class="form-control" name="title">
            </div>
            <label class="col-md-2 control-label">Gaji Kotor</label>
            <div class="col-md-2">
              <input type="text" readonly value="<?= $payroll[0]['gross_income'] ?>" id="subject" class="form-control" name="title">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-8">
            </div>
            <label class="col-md-2 control-label">Total Pinjaman</label>
            <div class="col-md-2">
              <input type="text" readonly value="<?= $payroll[0]['loan_amount'] ?>" id="subject" class="form-control" name="title">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-3">
              <a href="<?= site_url('Payroll_Approval/Update') ?>?sdm_id=<?= $_GET['sdm_id'] ?>&project_id=<?= $_GET['project_id'] ?>&week=<?= $_GET['week'] ?>" class="btn btn-success">Approve </a>
            </div>
            <div class="col-md-3">
              <a data-toggle="modal" data-target="#decline" class="btn btn-info"></i>Decline</a>
            </div>
            <div class="col-md-2"></div>
            <label class="col-md-2 control-label">Gaji Bersih</label>
            <div class="col-md-2">
              <input type="text" readonly value="<?= $payroll[0]['net_income'] ?>" id="subject" class="form-control" name="title">
            </div>
          </div>
        </div>
      </div>
    </div><!-- panel body -->
  </div>
</div><!-- content -->
<div class="modal" id="decline">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Decline</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('Payroll_Approval/Update') ?>" method="POST">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group has-warning has-feedback">
              </div>
              <input type="hidden" name="sdm_id" value="<?= $_GET['sdm_id'] ?>" />
              <input type="hidden" name="project_id" value="<?= $_GET['project_id'] ?>" />
              <input type="hidden" name="week" value="<?= $_GET['week'] ?>" />

              <div class="form-group">
                <label for="inputWarning2" class="control-label">Notes</label>
                <textarea class="form-control" required name="absence_note"></textarea>
              </div>
              <button class="btn btn-lg btn-primary btn-block" type="submit" name="decline" value="TRUE">Decline</button>
            </div>
            <div class="clearfix"></div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-lg btn-danger btn-block" type="button" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</div>
</div>