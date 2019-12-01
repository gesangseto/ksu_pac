<div class="col-xs-12 col-sm-9 content">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a href="javascript:void(0);" class="toggle-sidebar">
                    <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span>
                </a> Absence (Pekerja) / Create
            </h3>
        </div>
        <div class="panel-body">
            <div class="content-row">
                <div class="row">
                    <div class="col-md-4">
                        <a href="javascript:window.history.go(-1);" class="btn btn-primary glyphicon glyphicon-arrow-left"></a>
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
                        <form method="POST" action="<?= site_url('') ?>Absence_Sdm/Create">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Project Tersedia </label>
                                    <select name="project_id" id="project_id" required class="form-control">
                                        <optgroup label="Lainnya">
                                            <?php foreach ($available_project as $row) {
                                                echo '<option value="' . $row['project_id'] . '">' . $row['project_name'] . '</option>';
                                            } ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <div class="row" id="Result">
                                <div class="col-md-6">
                                    <label>Keterangan Project </label>
                                    <textarea type="text" readonly required class="form-control"></textarea>
                                </div>
                                <div class="col-md-3">
                                    <label>Start Date </label>
                                    <input type="date" readonly required class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label>Finish Date</label>
                                    <input type="date" readonly required class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label>Alamat</label>
                                    <textarea required readonly class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
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
                                    <label>Nama Sdm</label>
                                    <select name="sdm_id" required name="sdm_id" class="form-control">
                                        <option">-</option>
                                    </select>
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
                url: '<?= site_url("Ajax_Data/search_sdm"); ?>?filter=' + SearchID,
                success: function(isi) {
                    $('#SearchResult').html(isi);
                }
            });
        }
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#project_id').on('change', function() {
            var ProjectID = $(this).val();
            console.log(ProjectID);
            if (ProjectID) {
                $.ajax({
                    type: 'GET',
                    url: '<?php echo site_url("Ajax_Data/project_autofill"); ?>',
                    data: 'id=' + ProjectID,
                    success: function(html) {
                        $('#Result').html(html);
                    }
                });
            } else {
                $('#kota').html('<option value=""></option>');
            }
        });

    });
</script>