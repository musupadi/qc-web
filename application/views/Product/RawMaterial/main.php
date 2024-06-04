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
                    <h3 class="box-title">Raw Material</h3>
                </div>
                <!-- /.box-header -->
                <a data-toggle="modal" data-target="#modal-add" class="btn btn-success btn-sm" style="width: 120px; margin-left: 10px">
                    <i class="fa fa-fw fa-plus"></i>Add Raw Material
                </a>
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
                                    <a data-toggle="modal" data-target="#modal-edit" onclick='InputData("<?= $data->id ?>", "<?= $data->label ?>")'>
                                        <i class="fa fa-fw fa-pencil"></i>
                                    </a> 
                                    <a href="<?= base_url('Product/DeleteCategory/'.$data->id) ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                        <i class="fa fa-fw fa-trash"></i>
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
                    <?= form_open_multipart('Product/AddRawMaterial/') ?>
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
                                            <input type="text" class="form-control" name="code" placeholder="Material Code" required>
                                            <p class="text-red"><?= form_error('code') ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="label"><span style="color: red; margin-right: 3px">*</span>Name</label>
                                            <input type="text" class="form-control" name="label" placeholder="Raw Material Label" required>
                                            <p class="text-red"><?= form_error('label') ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_rawmat_category"><span style="color: red; margin-right: 3px">*</span>Category</label>
                                            <select class="form-control" name="id_rawmat_category" required>
                                            <?php foreach ($rawmat_category as $category): ?>
                                                <option value="<?= $category->id ?>"><?= $category->label ?></option>
                                             <?php endforeach; ?>
                                                <!-- Populate categories here -->
                                            </select>
                                            <p class="text-red"><?= form_error('category') ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_country"><span style="color: red; margin-right: 3px">*</span>Country</label>
                                            <select class="form-control" name="id_country" required>
                                            <?php foreach ($countries as $countries): ?>
                                                <option value="<?= $countries->id ?>"><?= $countries->label ?></option>
                                             <?php endforeach; ?>
                                            </select>
                                            <p class="text-red"><?= form_error('countries') ?></p>
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

                <!-- Edit Raw Material Modal -->
                <div class="modal modal-info fade" id="modal-edit">
                    <?= form_open_multipart('Product/EditRawMaterial/') ?>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title">Edit Raw Material</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="box-body">
                                        <input type="hidden" class="form-control" name="id" id="id" placeholder="ID" required>
                                        <div class="form-group">
                                            <label for
