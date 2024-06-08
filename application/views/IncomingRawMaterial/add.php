<section class="content-header">
    <h1>
        Raw Material
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Product Master</a></li>
        <li class="active">Raw Material</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Input Raw Material</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px;">#</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Country</th>
                                <th style="width: 40px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; 
                        foreach ($rawmaterial as $data): ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $data->code ?></td>
                                <td><?= $data->label ?></td>
                                <td><?= $data->category ?></td>
                                <td><?= $data->countries ?></td>
                                <td style="text-align: center;">
                                <a data-toggle="modal" data-target="#modal-add" class="btn btn-success btn-sm" onclick='InputData("<?= $data->id ?>", "<?= $data->label ?>", "<?= $data->code ?>")'>
                                    <i class="fa fa-fw fa-plus"></i>
                                </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="width: 10px;">#</th>
                                <th>Raw Material Code</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Country</th>
                                <th style="width: 40px;">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <?= $this->session->flashdata('pesan'); ?>
                <!-- /.box-body -->

                <!-- Add Raw Material Modal -->
                <div class="modal modal-success fade" id="modal-add">
                    <?= form_open_multipart('IncomingRawMaterial/add') ?>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title">Add Raw Material</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="code"><span style="color: red; margin-right: 3px">*</span>Code</label>
                                            <input type="text" class="form-control" name="code" id="code" placeholder="Code" required disabled>
                                            <p class="text-red"><?= form_error('code') ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="name"><span style="color: red; margin-right: 3px">*</span>Raw Material Name</label>
                                            <input type="hidden" class="form-control" name="id" id="id" placeholder="Name" required>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" required disabled>
                                            <p class="text-red"><?= form_error('name') ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="quantity"><span style="color: red; margin-right: 3px">*</span>Quantity</label>
                                            <input type="number" class="form-control" name="quantity" placeholder="Quantity" required>
                                            <p class="text-red"><?= form_error('quantity') ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="mfg_date"><span style="color: red; margin-right: 3px">*</span>MFG Date</label>
                                            <input type="date" class="form-control" name="mfg_date" placeholder="MFG Date" required>
                                            <p class="text-red"><?= form_error('mfg_date') ?></p>
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
function InputData(id, name,code) {
    document.getElementById('name').value = name;
    // Assuming there's a hidden input field for id
    // <input type="hidden" id="id" name="id">
    document.getElementById('id').value = id;
    document.getElementById('code').value = code;
}
</script>
