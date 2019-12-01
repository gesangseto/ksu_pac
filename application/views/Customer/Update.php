<div class="col-xs-12 col-sm-9 content">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a href="javascript:void(0);" class="toggle-sidebar">
                    <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span>
                </a> Customer / Update
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
                        <form method="POST" action="<?= site_url('') ?>Customer/Update">
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" placeholder="eg. ktp" required name="id" value="<?= $customer[0]['id'] ?>" class="form-control" autocomplete="off">
                                    <label>Nomor Pengenal </label>
                                    <input type="text" placeholder="eg. ktp" required value="<?= $customer[0]['nik'] ?>" name="nik" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label>Nama Lengkap </label>
                                    <input type="text" value="<?= $customer[0]['fullname'] ?>" name="fullname" required class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Tempat Lahir </label>
                                    <input type="text" placeholder="" value="<?= $customer[0]['birth_place'] ?>" required name="birth_place" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label>Tanggal Lahir </label>
                                    <input type="date" name="birthday" value="<?= $customer[0]['birthday'] ?>" required class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label> Jenis Kelamin</label>
                                    <div class="row">
                                        <?php
                                        if ($customer[0]['gender'] == "Perempuan") {
                                            echo '<div class="col-md-6">';
                                            echo '<input type="radio" name="gender" required value="Laki-laki"> Laki-laki<br>';
                                            echo '</div>';
                                            echo '<div class="col-md-6">';
                                            echo '<input type="radio" name="gender" checked required value="Perempuan"> Perempuan<br>';
                                            echo '</div>';
                                        } else {
                                            echo '<div class="col-md-6">';
                                            echo '<input type="radio" name="gender" checked required value="Laki-laki"> Laki-laki<br>';
                                            echo '</div>';
                                            echo '<div class="col-md-6">';
                                            echo '<input type="radio" name="gender" required value="Perempuan"> Perempuan<br>';
                                            echo '</div>';
                                        } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label> Status Pernikahan</label>
                                    <div class="row">
                                        <?php
                                        if ($customer[0]['marital_status'] == "Menikah") {
                                            echo '<div class="col-md-4">';
                                            echo '<input type="radio" name="marital_status" checked required value="Menikah"> Menikah<br>';
                                            echo '</div>';
                                            echo '<div class="col-md-4">';
                                            echo '<input type="radio" name="marital_status"   value="Belum Menikah"> Belum Menikah<br>';
                                            echo '</div>';
                                            echo '<div class="col-md-4">';
                                            echo '<input type="radio" name="marital_status"   value="Cerai"> Cerai<br>';
                                            echo '</div>';
                                        } else if ($customer[0]['marital_status'] == "Cerai") {
                                            echo '<div class="col-md-4">';
                                            echo '<input type="radio" name="marital_status" required value="Menikah"> Menikah<br>';
                                            echo '</div>';
                                            echo '<div class="col-md-4">';
                                            echo '<input type="radio" name="marital_status"   value="Belum Menikah"> Belum Menikah<br>';
                                            echo '</div>';
                                            echo '<div class="col-md-4">';
                                            echo '<input type="radio" name="marital_status"   checked value="Cerai"> Cerai<br>';
                                            echo '</div>';
                                        } else {
                                            echo '<div class="col-md-4">';
                                            echo '<input type="radio" name="marital_status" required value="Menikah"> Menikah<br>';
                                            echo '</div>';
                                            echo '<div class="col-md-4">';
                                            echo '<input type="radio" name="marital_status" checked  value="Belum Menikah"> Belum Menikah<br>';
                                            echo '</div>';
                                            echo '<div class="col-md-4">';
                                            echo '<input type="radio" name="marital_status"   value="Cerai"> Cerai<br>';
                                            echo '</div>';
                                        } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Alamat Lengkap </label>
                                    <textarea rows="3" name="address" required class="form-control"><?= $customer[0]['address'] ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label>Pendidikan terakhir </label>
                                    <select type="text" rows="3" required name="education" class="form-control">
                                        <option value="<?= $customer[0]['education'] ?>" selected><?= $customer[0]['education'] ?></option>
                                        <optgroup label="Pilihan">
                                            <option value="Tidak Sekolah">Tidak sekolah</option>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="D3">D3</option>
                                            <option value="S1">S1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                    <label>Nomor Telpon </label>
                                    <input type="text" value="<?= $customer[0]['phone_number'] ?>" required name="phone_number" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <h4>Data Pekerjaan </h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Tempat bekerja </label>
                                    <input type="text" value="<?= $customer[0]['working_place'] ?>" required name="working_place" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label>Posisi </label>
                                    <input type="text" name="working_position" value="<?= $customer[0]['working_position'] ?>" required class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nomor Telpon kantor</label>
                                    <input type="text" value="<?= $customer[0]['working_phone_number'] ?>" required name="working_phone_number" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label>Alamat Kantor </label>
                                    <textarea rows="3" name="working_address" required class="form-control"><?= $customer[0]['working_address'] ?></textarea>
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