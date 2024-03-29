<!-- data table -->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<!-- SWAL Fire -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Body Here -->
<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">
        <a href="javascript:void(0);" class="toggle-sidebar">
          <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span>
        </a> Project / Read
      </h3>
    </div>
    <div class="panel-body">
      <div class="content-row">
        <a href="<?= site_url('Project') ?>"><span class="btn fa fa-angle-left" title="Maximize Panel"> &nbsp;Back</span></a>

      </div>
      <div class="content-row">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title"><b>Data Pribadi</b>
            </div>
            <div class="panel-options">
            </div>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label class="col-md-2 control-label">Nama Lengkap</label>
              <div class="col-md-5">
                <input type="text" readonly value="<?= @$project[0]['fullname'] ?>" id="subject" class="form-control" name="title">
              </div>
              <label class="col-md-2 control-label">Nomor ID</label>
              <div class="col-md-3">
                <input type="text" readonly value="<?= $project[0]['nik'] ?>" id="subject" class="form-control" name="title">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Tempat Lahir</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $project[0]['birth_place'] ?>" id="subject" class="form-control" name="title">
              </div>
              <label class="col-md-2 control-label">Tanggal Lahir</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $project[0]['birthday'] ?>" id="subject" class="form-control" name="title">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Jenis Kelamin</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $project[0]['gender'] ?>" id="subject" class="form-control" name="title">
              </div>
              <label class="col-md-2 control-label">Status Pernikahan</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $project[0]['marital_status'] ?>" id="subject" class="form-control" name="title">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Alamat</label>
              <div class="col-md-10">
                <textarea type="text" readonly value="" id="subject" class="form-control" name="title"><?= $project[0]['address'] ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Nomor Telpon</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $project[0]['phone_number'] ?>" id="subject" class="form-control" name="title">
              </div>
              <label class="col-md-2 control-label">Pendidikan</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $project[0]['education'] ?>" id="subject" class="form-control" name="title">
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title"><b>Data Pekerjaan</b>
            </div>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label class="col-md-2 control-label">Tempat Bekerja</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $project[0]['working_place'] ?>" id="subject" class="form-control" name="title">
              </div>
              <label class="col-md-2 control-label">Jabatan</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $project[0]['working_position'] ?>" id="subject" class="form-control" name="title">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Alamat Kantor</label>
              <div class="col-md-4">
                <textarea type="text" readonly class="form-control" name="title"><?= $project[0]['working_address'] ?></textarea>
              </div>
              <label class="col-md-2 control-label">Nomor Telpon Kantor</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $project[0]['working_phone_number'] ?>" class="form-control" name="title">
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title"><b>Data Project</b>
            </div>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label class="col-md-2 control-label">Nama Project</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $project[0]['project_name'] ?>" id="subject" class="form-control" name="title">
              </div>
              <label class="col-md-2 control-label">Budget</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $project[0]['project_price'] ?>" id="subject" class="form-control" name="title">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Alamat Project</label>
              <div class="col-md-4">
                <textarea type="text" readonly class="form-control" name="title"><?= $project[0]['project_address'] ?></textarea>
              </div>
              <label class="col-md-2 control-label">Project Time</label>
              <div class="col-md-2">
                <input type="text" readonly value="<?= $project[0]['start_date'] ?>" class="form-control" name="title">
              </div>
              <div class="col-md-2">
                <input type="text" readonly value="<?= $project[0]['finish_date']  ?>" class="form-control" name="title">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Project Status</label>
              <div class="col-md-2">
                <input type="text" readonly value="<?= $project[0]['status'] ?>" class="form-control" name="title">
              </div>
              <?php
              if ($project[0]['status'] == "Running") {
                echo '<div class="col-md-2">';
                echo '<a href="' . site_url('Project/Update') . '?project_id=' . $_GET['id'] . '&finishing=true" class="form-control btn btn-success">Change to Finish</a>';
                echo '</div>';
              }
              ?>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title"><b>Data Pekerja</b>
            </div>
          </div>
          <div class="panel-body">

            <div class="row">
              <div class="col-md-4">
                <?php if ($project[0]['status'] == 'New') {
                  echo ' <a class="btn btn-primary" href="' . site_url('Absence_Sdm/Create') . '?project_id=' . $_GET['id'] . '">Tambah Pekerja</a>';
                  echo '&nbsp;';
                  echo '<a class="btn btn-info" href="' . site_url('Project/Update') . '?project_id=' . $_GET['id'] . '&req_approval=true">Request Approval</a>';
                } else if ($project[0]['status'] == 'Decline') {
                  echo ' <a class="btn btn-primary" href="' . site_url('Absence_Sdm/Create') . '?project_id=' . $_GET['id'] . '">Tambah Pekerja</a>';
                  echo '&nbsp;';
                  echo '<a class="btn btn-warning" href="' . site_url('Project/Update') . '?project_id=' . $_GET['id'] . '&req_approval=true">Request Approval</a>';
                  echo '&nbsp;';
                  echo '<div class="form-group has-warning has-feedback">';
                  echo '<label for="inputWarning2" class="control-label">' . @$project[0]['project_note'] . '</label>';
                  echo '</div>';
                } else if ($project[0]['status'] == 'Pending Approval') {
                  echo '<div class="form-group has-warning has-feedback">';
                  echo '<label for="inputWarning2" class="control-label">Waiting for approve</label>';
                  echo '</div>';
                } else if ($project[0]['status'] == 'Approved') {
                  echo '<a class="btn btn-success" href="' . site_url('Project/Update') . '?project_id=' . $_GET['id'] . '&running=true">Start Project</a>';
                } ?>
              </div>

              <div class="col-md-12">
                <table id="example" class="table table-hover" style="width:100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Fullname</th>
                      <th>ID</th>
                      <th>Phone Number</th>
                      <th>Working Day</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $no = 1;
                    $working_day = 0;
                    foreach ($uniq as $row_uniq) {
                      foreach ($absence as $row) {
                        if ($row_uniq['sdm_id'] == $row['sdm_id']) {
                          if ($row['time_in'] != '00:00:00') {
                            $working_day = $working_day + 1;
                          }
                        }
                      }
                      echo '<tr>';
                      echo '<td>' . $no . '</td>';
                      echo '<td>' . $row_uniq['fullname'] . '</td>';
                      echo '<td>' . $row_uniq['sdm_id'] . '</td>';
                      echo '<td>' . $row_uniq['phone_number'] . '</td>';
                      echo '<td>' . $working_day . '</td>';
                      echo '<td>';
                      if ($project[0]['status'] == 'New' || $project[0]['status'] == 'Decline') {
                        echo '<a href="' . site_url('Absence_Sdm/Delete') . '?sdm_id=' . $row['id'] . '&project_id=' . $row['project_id'] . '" class="btn btn-danger"><i class="fa fa-trash"></i></a>';
                        echo '<a href="' . site_url('Absence_Sdm/Read') . '?id=' . $row['id'] . '&project_id=' . $row['project_id'] . '" class="btn btn-success"><i class="fa fa-search"></i></a>';
                      } else if ($project[0]['status'] == 'Running') {
                        echo '<a href="' . site_url('Absence_Sdm/Read') . '?id=' . $row['id'] . '&project_id=' . $row['project_id'] . '" class="btn btn-success"><i class="fa fa-search"></i></a>';
                      }
                      echo '</td>';
                      echo '</tr>';
                      $no++;
                    }
                    ?>

                </table>
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
<script>
  $(document).ready(function() {
    $('#example').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'excelHtml5',
        'pdfHtml5'
      ]
    });
  });
</script>
<script>
  function hapus(uid) {
    swal({
        title: "Are you sure delete?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = "<?= site_url('Absence_Sdm/Delete?id='); ?>" + uid;
        } else {
          swal("User is safe!");
        }
      });
  }
</script>