<section class="content-header">
    <h1>
        Countries
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Product Master</a></li>
        <li class="active">Countries</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Raw Material -> Countries (Supplier)</h3>
                </div>
                <!-- /.box-header -->
                <a data-toggle="modal" data-target="#modal-success" class="btn btn-success btn-sm" style="width: 120px; margin-left: 10px">
                    <i class="fa fa-fw fa-plus"></i>Add Countries
                </a>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px;">#</th>
                                <th>Country Name</th>
                                <th style="width: 40px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach ($countries as $countries): ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $countries->label ?></td>
                                <td style="text-align: center;">
                                    <a data-toggle="modal" data-target="#modal-edit" onclick='InputData("<?= $countries->id ?>", "<?= $countries->label ?>")'>
                                        <i class="fa fa-fw fa-pencil"></i>
                                    </a> 
                                    <a href="<?= base_url('Product/DeleteRawMaterialCountries/'.$countries->id) ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                        <i class="fa fa-fw fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="width: 10px;">#</th>
                                <th>Country Name</th>
                                <th style="width: 40px;">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <?= $this->session->flashdata('pesan'); ?>
                <!-- /.box-body -->

                <!-- Add Raw Material Countries Modal -->
                <div class="modal modal-success fade" id="modal-success">
                    <?= form_open_multipart('Product/AddRawMaterialCountries/') ?>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title">Input Country</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="label"><span style="color: red; margin-right: 3px">*</span>Name</label>
                                            <input type="text" class="form-control" name="label" placeholder="Label Name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline">Save changes</button>
                                </div>
                            </div>
                        </div>
                    <?= form_close() ?>
                </div>
                <!-- /.modal -->

                <!-- Edit Raw Material Countrries Modal -->
                <div class="modal modal-info fade" id="modal-edit">
                    <?= form_open_multipart('Product/EditRawMaterialCountries/') ?>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title">Edit Country</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="box-body">
                                        <input type="hidden" class="form-control" name="id" id="id" placeholder="ID" required>
                                        <div class="form-group">
                                            <label for="label"><span style ="color: red; margin-right: 3px">*</span>Name</label>
                                            <input type="text" class="form-control" name="label" id="name" placeholder="Label Name" required>
                                            <p class="text-red"><?= form_error('label') ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline">Save changes</button>
                                </div>
                            </div>
                        </div>
                    <?= form_close() ?>
                </div>
                <!-- /.modal -->

            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

<script>
function InputData(id, name) {
    document.getElementById('id').value = id;
    document.getElementById('name').value = name;
}
</script>

