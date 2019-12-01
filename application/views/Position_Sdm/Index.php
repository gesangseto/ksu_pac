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
                </a> Position SDM</h3>
        </div>
        <div class="panel-body">

            <div class="content-row">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="row">
                                <div class="col-md-4">
                                    <a data-toggle="modal" data-target="#new_position" class="btn btn-info"></i>Create New</a>
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
                                    <table id="example1" class="table table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Posisi</th>
                                                <th>Nama Posisi</th>
                                                <th>Gaji Posisi</th>
                                                <th>Wilayah</th>
                                                <th>Last Update</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            @$no = 1;
                                            @$count = 0;
                                            foreach ($all_position as $row) {
                                                echo '<tr>';
                                                echo '<td>' . $no . '</td>';
                                                echo '<td><b>' . $row['position_code'] . '</b></td>';
                                                echo '<td>' . $row['position_name'] . '</td>';
                                                echo '<td>' . $row['position_salary'] . '</td>';
                                                echo '<td>' . $row['workspace'] . '</td>';
                                                echo '<td>' . $row['update_time'] . '</td>';
                                                echo '<td>';
                                                echo '<a onclick="hapus(' . $row['id'] . ')" class="btn btn-danger"><i class="fa fa-trash"></i></a>';
                                                echo '<a data-toggle="modal" data-target="#edit_' . $row['id'] . '" class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
                                                echo '</td>';
                                                echo '</tr>';
                                                $no++;
                                                @$count = 0;
                                            } ?>
                                    </table>
                                </div>
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
<!--footer-->
<?php
foreach ($all_position as $row) { ?>
    <div class="modal" id="edit_<?= $row['id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Position</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('Position_Sdm/Update') ?>" method="POST">
                        <div class="row">
                            <div class="col-md-12">

                                <input type="hidden" class="form-control" required name="id" value="<?= $row['id'] ?>" autocomplete="off" />

                                <div class="form-group">
                                    <label for="inputWarning2" class="control-label">Kode Posisi</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                        </div>
                                        <input type="text" class="form-control" required name="position_code" value="<?= $row['position_code'] ?>" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputWarning2" class="control-label">Nama Posisi</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                        </div>
                                        <input type="text" class="form-control" value="<?= $row['position_name'] ?>" required name="position_name" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputWarning2" class="control-label">Gaji Posisi</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                        </div>
                                        <input type="text" class="form-control" value="<?= $row['position_salary'] ?>" required name="position_salary" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputWarning2" class="control-label">Wilayah</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                        </div>
                                        <input type="text" class="form-control" value="<?= $row['workspace'] ?>" required name="workspace" autocomplete="off" />
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
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
<?php } ?>
<div class="modal" id="new_position">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create New Position</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('Position_Sdm/Create') ?>" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputWarning2" class="control-label">Kode Posisi</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                    </div>
                                    <input type="test" class="form-control" required name="position_code" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputWarning2" class="control-label">Nama Posisi</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                    </div>
                                    <input type="text" class="form-control" required name="position_name" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputWarning2" class="control-label">Gaji Posisi</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                    </div>
                                    <input type="text" class="form-control" required name="position_salary" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputWarning2" class="control-label">Wilayah</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                    </div>
                                    <input type="text" class="form-control" required name="workspace" autocomplete="off" />
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Create</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-lg btn-danger btn-block" type="button" data-dismiss="modal">Cloe</button>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#example1').DataTable({
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
        console.log(uid);
        swal({
                title: "Are you sure delete this?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "<?= site_url('Position_Sdm/Delete?id='); ?>" + uid;
                } else {
                    swal("Map is safe!");
                }
            });
    }
</script>