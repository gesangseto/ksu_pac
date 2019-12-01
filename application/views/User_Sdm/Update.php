<div class="col-xs-12 col-sm-9 content">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a href="javascript:void(0);" class="toggle-sidebar">
                    <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span>
                </a> Administrator / Create User System
            </h3>
        </div>
        <div class="panel-body">
            <div class="content-row">
                <div class="row">
                    <div class="col-md-4">
                        <a href="<?= site_url('User_Sdm') ?>" class="btn btn-primary glyphicon glyphicon-arrow-left"></a>
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
                        <form method="POST" action="<?= site_url('') ?>User_Sdm/Update">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="id" value="<?= $sdm[0]['id'] ?>">
                                    <label>Nomor Pengenal </label>
                                    <input type="text" placeholder="eg. ktp" required value="<?= $sdm[0]['nik'] ?>" name="nik" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label>Nama Lengkap </label>
                                    <input type="text" name="fullname" required value="<?= $sdm[0]['fullname'] ?>" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Tempat Lahir </label>
                                    <input type="text" placeholder="" required name="birth_place" value="<?= $sdm[0]['birth_place'] ?>" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label>Tanggal Lahir </label>
                                    <input type="date" name="birthday" required class="form-control" value="<?= $sdm[0]['birthday'] ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label> Jenis Kelamin</label>
                                    <div class="row">
                                        <?php
                                        if ($sdm[0]['gender'] == "Perempuan") {
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
                                        if ($sdm[0]['marital_status'] == "Menikah") {
                                            echo '<div class="col-md-4">';
                                            echo '<input type="radio" name="marital_status" checked required value="Menikah"> Menikah<br>';
                                            echo '</div>';
                                            echo '<div class="col-md-4">';
                                            echo '<input type="radio" name="marital_status"   value="Belum Menikah"> Belum Menikah<br>';
                                            echo '</div>';
                                            echo '<div class="col-md-4">';
                                            echo '<input type="radio" name="marital_status"   value="Cerai"> Cerai<br>';
                                            echo '</div>';
                                        } else if ($sdm[0]['marital_status'] == "Cerai") {
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
                                    <textarea rows="3" name="address" class=" form-control"><?= $sdm[0]['address'] ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label>Pendidikan terakhir </label>
                                    <select type="text" rows="3" required name="education" class="form-control">
                                        <option value="<?= $sdm[0]['education'] ?>" selected><?= $sdm[0]['education'] ?></option>
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
                                    <label>Nomor Telpon </label>
                                    <input type="text" value="<?= $sdm[0]['phone_number'] ?>" required name="phone_number" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label>Coment </label>
                                    <textarea rows="3" name="description" required class="form-control"><?= $sdm[0]['description'] ?></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label>Filter Jabatan </label>
                                    <div class="input-group">
                                        <input type="search" id="SearchID" placeholder="Code or Name" class="form-control">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" onclick="SearchPosition()"><span>
                                                </span> Filter</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-8" id="SearchResult">
                                    <label>Jabatan</label>
                                    <select name="position_id" required class="form-control">
                                        <option selected value="<?= $sdm[0]['position_id'] ?>"><?= $sdm[0]['position_name'] ?> - <?= $sdm[0]['position_code'] ?> </option>
                                        <optgroup label="Lainnya">
                                            <?php
                                            foreach ($all_position as $row) {
                                                echo '<option value="' . $row['id'] . '">' . $row['position_name'] . ' - ' . $row['position_code'] . '</option>';
                                            }
                                            ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <button class="form-control btn btn-success" type="submit"><b>Save</b></button>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="form-control btn btn-info" href="<?= site_url('User_Sdm') ?>">Cancel</a>
                                        </div>
                                        <div class="col-md-8">
                                        </div>
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

<script>
    function SearchPosition() {
        var SearchID = $('#SearchID').val();
        if (SearchID) {
            $.ajax({
                type: 'GET',
                url: '<?= site_url("Ajax_Data/search_position"); ?>?filter=' + SearchID,
                success: function(isi) {
                    $('#SearchResult').html(isi);
                }
            });
        }
    }
</script>