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
        </a> Customer / Read
      </h3>
    </div>
    <div class="panel-body">
      <div class="content-row">

        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title"><b>Data Pribadi</b>
            </div>

            <div class="panel-options">
              <a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal" href="#sample-modal"><i class="entypo-cog"></i></a>
              <a data-rel="collapse" href="#"><i class="entypo-down-open"></i></a>
              <a data-rel="close" href="#!/tasks" ui-sref="Tasks"><i class="entypo-cancel"></i></a>
            </div>
          </div>

          <div class="panel-body">
            <div class="form-group">
              <label class="col-md-2 control-label">Nama Lengkap</label>
              <div class="col-md-5">
                <input type="text" readonly value="<?= $customer[0]['fullname'] ?>" id="subject" class="form-control" name="title">
              </div>
              <label class="col-md-2 control-label">Nomor ID</label>
              <div class="col-md-3">
                <input type="text" readonly value="<?= $customer[0]['nik'] ?>" id="subject" class="form-control" name="title">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Tempat Lahir</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $customer[0]['birth_place'] ?>" id="subject" class="form-control" name="title">
              </div>
              <label class="col-md-2 control-label">Tanggal Lahir</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $customer[0]['birthday'] ?>" id="subject" class="form-control" name="title">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Jenis Kelamin</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $customer[0]['gender'] ?>" id="subject" class="form-control" name="title">
              </div>
              <label class="col-md-2 control-label">Status Pernikahan</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $customer[0]['marital_status'] ?>" id="subject" class="form-control" name="title">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Alamat</label>
              <div class="col-md-10">
                <textarea type="text" readonly value="" id="subject" class="form-control" name="title"><?= $customer[0]['address'] ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Nomor Telpon</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $customer[0]['phone_number'] ?>" id="subject" class="form-control" name="title">
              </div>
              <label class="col-md-2 control-label">Pendidikan</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $customer[0]['education'] ?>" id="subject" class="form-control" name="title">
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title"><b>Data Pekerjaan</b>
            </div>

            <div class="panel-options">
              <a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal" href="#sample-modal"><i class="entypo-cog"></i></a>
              <a data-rel="collapse" href="#"><i class="entypo-down-open"></i></a>
              <a data-rel="close" href="#!/tasks" ui-sref="Tasks"><i class="entypo-cancel"></i></a>
            </div>
          </div>

          <div class="panel-body">
            <div class="form-group">
              <label class="col-md-2 control-label">Tempat Bekerja</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $customer[0]['working_place'] ?>" id="subject" class="form-control" name="title">
              </div>
              <label class="col-md-2 control-label">Jabatan</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $customer[0]['working_position'] ?>" id="subject" class="form-control" name="title">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Alamat Kantor</label>
              <div class="col-md-4">
                <textarea type="text" readonly class="form-control" name="title"><?= $customer[0]['working_address'] ?></textarea>
              </div>
              <label class="col-md-2 control-label">Nomor Telpon Kantor</label>
              <div class="col-md-4">
                <input type="text" readonly value="<?= $customer[0]['working_phone_number'] ?>" class="form-control" name="title">
              </div>
            </div>
          </div>
        </div>

        <div class="panel-body">
          <div class="content-row">
            <div class="row">
              <div class="col-md-4">
                <a href="<?= site_url('Project/Create') ?>?id=<?= $customer[0]['id'] ?>" class="btn btn-warning">
                  <i class="fa fa-plus"></i>&nbsp; Create Project</a>
              </div>

              <div class="col-md-8">
                <?php if (isset($message)) {
                  if ($status == 0) {
                    echo '<div class="alert alert-block alert-danger">';
                    echo '<button type="button" class="close" data-dismiss="alert">';
                    echo '<i class="ace-icon fa fa-times"></i>';
                    echo '</button>';
                    echo $message;
                    echo '</div>';
                  } else {
                    echo '<div class="alert alert-block alert-success">';
                    echo '<button type="button" class="close" data-dismiss="alert">';
                    echo '<i class="ace-icon fa fa-times"></i>';
                    echo '</button>';
                    echo $message;
                    echo '</div>';
                  }
                } ?>
              </div>

              <div class="col-md-12">
                <table id="example" class="table table-hover" style="width:100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Project</th>
                      <th>Pemilik Project</th>
                      <th>Alamat Project</th>
                      <th>Status Project</th>
                      <th>Start Date</th>
                      <th>Finish Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    @$no = 1;
                    foreach ($project as $row) {
                      ?>
                      <tr>
                        <td><?= @$no ?></td>
                        <td><?= @$row['project_name'] ?></td>
                        <td><b><?= @$row['fullname'] ?></b></td>
                        <td><?= @$row['project_address'] ?></td>
                        <td><?= @$row['status'] ?></td>
                        <td><?= @$row['start_date'] ?></td>
                        <td><?= @$row['finish_date'] ?></td>
                        <td>
                          <button onclick="hapus(<?= @$row['project_id']; ?>)" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                          <a href="<?= site_url('Project/Update') ?>?id=<?= $row['project_id'] ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                          <a href="<?= site_url('Project/Read') ?>?id=<?= $row['project_id'] ?>" class="btn btn-success"><i class="fa fa-search"></i></a>
                        </td>
                      </tr>
                    <?php
                      $no++;
                    } ?>
                </table>
              </div>
            </div>
          </div>
        </div><!-- panel body -->

      </div>

    </div><!-- panel body -->
  </div>
</div><!-- content -->
</div>
</div>
<script>
  function hapus(uid) {
    swal({
        title: "Are you sure delete this user?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = "<?= site_url('Project/Delete?id='); ?>" + uid;
        } else {
          swal("User is safe!");
        }
      });
  }
</script>