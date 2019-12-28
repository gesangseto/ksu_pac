<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">
        <a href="javascript:void(0);" class="toggle-sidebar">
          <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span>
        </a> SDM User/ View
      </h3>
    </div>
    <div class="panel-body">
      <div class="content-row">

        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title"><b>ID : <?= $sdm[0]['id'] ?></b>
            </div>

            <div class="panel-options">
              <a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal" href="#sample-modal"><i class="entypo-cog"></i></a>
              <a data-rel="collapse" href="#"><i class="entypo-down-open"></i></a>
              <a data-rel="close" href="#!/tasks" ui-sref="Tasks"><i class="entypo-cancel"></i></a>
            </div>
          </div>

          <div class="panel-body">
            <form novalidate="" role="form" class="form-horizontal">
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
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                  <a href="<?= site_url('Absence_Sdm/Read') ?>?id=<?= $sdm[0]['id'] ?>" class="btn btn-success">
                    <i class="fa fa-search"></i>&nbsp; Absensi</a>
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