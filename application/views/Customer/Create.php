<div class="col-xs-12 col-sm-9 content">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a href="javascript:void(0);" class="toggle-sidebar">
                    <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span>
                </a> Customer / Create
            </h3>
        </div>
        <div class="panel-body">
            <div class="content-row">
                <div class="row">
                    <div class="col-md-4">
                        <label><b>
                                <h4>Data Pribadi </h4>
                            </b></label>
                    </div>
                    <div class="col-md-8 form-signin">
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
                        <form method="POST" action="<?= site_url('') ?>Customer/Create">
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" required name="id" value="<?= strtotime(date('Y-m-d H:i:s')); ?>">
                                    <label>Nomor Pengenal </label>
                                    <input type="text" placeholder="eg. ktp" required name="nik" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label>Nama Lengkap </label>
                                    <input type="text" name="fullname" required class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Tempat Lahir </label>
                                    <input type="text" placeholder="" required name="birth_place" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label>Tanggal Lahir </label>
                                    <input type="date" name="birthday" required class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label> Jenis Kelamin</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="radio" name="gender" required value="Laki-laki"> Laki-laki<br>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" name="gender" value="Perempuan"> Perempuan<br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label> Status Pernikahan</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="radio" required name="marital_status" value="Menikah"> Menikah<br>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="radio" name="marital_status" value="Belum Menikah"> Belum Menikah<br>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="radio" name="marital_status" value="Cerai"> Cerai<br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Alamat Lengkap </label>
                                    <textarea rows="3" name="address" required class="form-control"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label>Pendidikan terakhir </label>
                                    <select type="text" rows="3" required name="education" class="form-control">
                                        <option value="" selected disabled>Pilih</option>
                                        <option value="Tidak Sekolah">Tidak sekolah</option>
                                        <option value="SD">SD</option>
                                        <option value="SD">SMP</option>
                                        <option value="SD">SMA</option>
                                        <option value="SD">D3</option>
                                        <option value="SD">S1</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                    <label>Nomor Telpon </label>
                                    <input type="text" placeholder="number only" required name="phone_number" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <h4>Data Pekerjaan </h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Tempat bekerja </label>
                                    <input type="text" placeholder="eg. ktp" required name="working_place" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label>Posisi </label>
                                    <input type="text" name="working_position" required class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nomor Telpon kantor</label>
                                    <input type="text" placeholder="" required name="working_phone_number" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label>Alamat Kantor </label>
                                    <textarea rows="3" name="working_address" required class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <button class="form-control btn btn-success" type="submit"><b>Save</b></button>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="form-control" onclick="window.history.go(-1); return false;">Cancel</button>
                                    </div>
                                    <div class="col-md-8">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- panel body -->
    </div>
</div><!-- content -->
</div>
</div>

<!--footer-->