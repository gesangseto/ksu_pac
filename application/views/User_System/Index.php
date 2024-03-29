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
                </a>
                Administrator / Mapping
            </h3>
        </div>
        <div class="panel-body">
            <div class="content-row">
                <div class="row">
                    <div class="col-md-4">
                        <a class="btn btn-primary" href="<?= site_url('User_System/Create') ?>">Add Admin</a>
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
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Join Time</th>
                                    <th>Update Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                @$no = 1;
                                foreach ($user as $row) {
                                    ?>
                                    <tr>
                                        <td><?= @$no ?></td>
                                        <td><?= @$row['id'] ?></td>
                                        <td><b><?= @$row['username'] ?></b></td>
                                        <td><?= @$row['email'] ?></td>
                                        <td><?= @$row['create_time'] ?></td>
                                        <td><?= @$row['update_time'] ?></td>
                                        <td>
                                            <button onclick="hapus(<?= @$row['id']; ?>)" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            <a href="<?= site_url('User_System/Update') ?>?id=<?= $row['id'] ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                            <a href="<?= site_url('User_System/Read') ?>?id=<?= $row['id'] ?>" class="btn btn-success"><i class="fa fa-search"></i></a>
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
</div><!-- content -->
</div>
</div>
<!--footer-->
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
                title: "Are you sure delete this user?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "<?= site_url('User_System/Delete?id='); ?>" + uid;
                } else {
                    swal("User is safe!");
                }
            });
    }
</script>