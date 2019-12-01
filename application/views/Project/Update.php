<div class="col-xs-12 col-sm-9 content">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a href="javascript:void(0);" class="toggle-sidebar">
                    <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span>
                </a> Project / Update
            </h3>
        </div>
        <div class="panel-body">
            <div class="content-row">
                <div class="row">
                    <div class="col-md-4">
                        <label><b>
                                <!-- <h4>Data Pribadi </h4> -->
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
                        <form method="POST" action="<?= site_url('') ?>Project/Update">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" required name="id" value="<?= $_GET["id"] ?>">
                                    <label>Customer</label>
                                    <select type="text" rows="3" required name="customer_id" class="form-control">
                                        <option value="<?= $project[0]["id"] ?>" selected> <?= $project[0]["fullname"] ?> - <?= $project[0]["nik"] ?></option>
                                        <!-- <optgroup label="Data Customer"> -->
                                        <?php
                                        foreach ($all_customer as $row) {
                                            // echo '<option value="' . $row["id"] . '">' . $row["fullname"] . ' - ' . $row["nik"] . '</option>';
                                        }
                                        ?>
                                        </optgroup>
                                    </select> </div>
                                <div class="col-md-6">
                                    <label>Nama Project </label>
                                    <input type="text" name="project_name" required class="form-control" value="<?= $project[0]["project_name"] ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Alamat Project </label>
                                    <textarea rows="3" name="project_address" required class="form-control"><?= $project[0]["project_address"] ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label>Budget Project </label>
                                    <input type="text" name="project_price" required class="form-control" value="<?= $project[0]["project_price"] ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Keterangan Project </label>
                                    <textarea rows="3" name="project_description" required class="form-control"> <?= $project[0]["project_description"] ?></textarea>
                                </div>
                                <div class="col-md-3">
                                    <label>Start Project </label>
                                    <input type="date" name="start_date" value="<?= $project[0]["start_date"] ?>" required class="form-control" autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <label>Finish Project </label>
                                    <input type="date" name="finish_date" value="<?= $project[0]["finish_date"] ?>" required class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <button class="form-control btn btn-success" type="submit"><b>Save</b></button>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="form-control" onclick="window.location.href(<?= site_url('Project') ?>); return false;">Cancel</button>
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