<div class="col-xs-12 col-sm-9 content">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a href="javascript:void(0);" class="toggle-sidebar">
                    <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span>
                </a> Project / Create
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
                        <form method="POST" action="<?= site_url('') ?>Project/Create">
                            <div class="row">
                                <input type="hidden" required name="id" value="<?= strtotime(date('Y-m-d H:i:s')); ?>">
                                <input type="hidden" required name="status" value="New">
                                <div class="col-md-6">
                                    <label>Filter </label>
                                    <div class="input-group">
                                        <input type="search" id="SearchID" placeholder="ID or NIK or Name" class="form-control">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" onclick="SearchSdm()"><span>
                                                </span> Filter</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6" id="SearchResult">
                                    <label>Nama Customer</label>
                                    <select name="customer_id" required class="form-control">
                                        <option">-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nama Project </label>
                                    <input type="text" name="project_name" required class="form-control" autocomplete="off">
                                </div>

                                <div class="col-md-6">
                                    <label>Budget Project </label>
                                    <input type="text" name="project_price" required class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Keterangan Project </label>
                                    <textarea rows="3" name="project_description" required class="form-control"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label>Alamat Project </label>
                                    <textarea rows="3" name="project_address" required class="form-control"></textarea>
                                </div>
                                <div class="col-md-3">
                                    <label>Start Project </label>
                                    <input type="date" name="start_date" required class="form-control" autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <label>Finish Project </label>
                                    <input type="date" name="finish_date" required class="form-control" autocomplete="off">
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

<script>
    function SearchSdm() {
        var SearchID = $('#SearchID').val();
        if (SearchID) {
            $.ajax({
                type: 'GET',
                url: '<?= site_url("Ajax_Data/search_customer"); ?>?filter=' + SearchID,
                success: function(isi) {
                    $('#SearchResult').html(isi);
                }
            });
        }
    }
</script>