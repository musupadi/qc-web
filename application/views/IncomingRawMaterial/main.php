
<section class="content-header">
      <h1>
        Incoming Raw Material
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-newspaper-o"></i>Incoming Raw Material</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Incoming Raw Material </h3>
            </div>
            <!-- /.box-header -->
            <a href="<?php echo base_url("IncomingRawMaterial/Adding")?>" class="btn btn-success btn-sm" style="width: 200px; margin-left: 10px">
                    <i class="fa fa-fw fa-plus"></i>Add Incoming Raw Material
            </a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Incoming Date</th>
                  <th>Raw Material Code</th>
                  <th>Type Category</th>
                  <th>Name</th>
                  <th>Quantity (kg)</th>
                  <th>MFG Date</th>
                  <th>EXP Date</th>
                  <th style="width:30px">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                <?php
                foreach ($rawmaterial as $data){

                ?>
                <tr>
                  <td><?php echo $i++?></td>
                  <td><?php echo date('d-F-Y', strtotime($data->updated_at)); ?></td>
                  <td><?php echo $data->code?></td>
                  <td><?php echo $data->category?></td>
                  <td><?php echo $data->label?></td>
                  <td><?php echo $data->qty?></td>
                  <td><?php echo date('d-F-Y', strtotime($data->mfg_date)); ?></td>  
                  <td><?php echo date('d-F-Y', strtotime($data->exp_date)); ?></td>
                  
                  <td style="text-align: center;">
                        
                                    <a href="<?= base_url('IncomingRawMaterial'.$data->id) ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                        <i class="fa fa-fw fa-trash"></i>
                                    </a>
                                </td>
                
                </tr>
                <?php  } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Incoming Date</th>
                  <th>Raw Material Code</th>
                  <th>Type Category</th>
                  <th>Name</th>
                  <th>Quantity (kg)</th>
                  <th>MFG Date</th>
                  <th>EXP Date</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <?php echo $this->session->flashdata('pesan');?>
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
                                    <h4 class="modal-title">Add Incoming Raw Material</h4>
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
            <!-- INPUT -->
            <div class="modal modal-success fade" id="modal-success">
            <?php echo form_open_multipart('Qc/Add')?>
                <form role="form" action="<?php echo base_url('Qc/Add')?>" method="post" >
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Input Product</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                              <label for="text"><span style="color: red; margin-right: 3px">*</span>Color Series</label>
                              <input type="hidden" class="form-control" name="id" id="id" placeholder="Color Series" required>
                              <p class="text-red"><?php echo form_error('id')?></p>
                            </div>
                            <div class="form-group">
                              <label for="text"><span style="color: red; margin-right: 3px">*</span>Item Code</label>
                              <input type="text" class="form-control" name="code" id="code" placeholder="Item Code" required disabled>
                              <p class="text-red"><?php echo form_error('code')?></p>
                            </div>
                            <div class="form-group">
                              <label for="text"><span style="color: red; margin-right: 3px">*</span>Product Name</label>
                              <input type="text" class="form-control" name="label" id="label" placeholder="Product Name" required disabled>
                              <p class="text-red"><?php echo form_error('label')?></p>
                            </div>
                            <div class="form-group">
                              <label for="text"><span style="color: red; margin-right: 3px">*</span>Load Number</label>
                              <input type="text" class="form-control" name="load_number" id="load_number" placeholder="Load Number" required>
                              <p class="text-red"><?php echo form_error('load_number')?></p>
                            </div>
                            <div class="form-group">
                              <label for="text"><span style="color: red; margin-right: 3px">*</span>QTY (KG)</label>
                              <input type="number" class="form-control" name="qty" id="qty" placeholder="Load Number" required>
                              <p class="text-red"><?php echo form_error('load_number')?></p>
                            </div>     
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

<script>
  function input(id,code,label)
  {
    document.getElementById('id').value = id;
    document.getElementById('code').value = code;
    document.getElementById('label').value = label;
  }
  function adjust_data(id, name, qty,ItemName)
  {
    console.log(id);
    document.getElementById('ids').value = id;
    document.getElementById('names').value = name;
    document.getElementById('qtys').value = qty;
    document.getElementById('ItemNames').value = ItemName;
  }
</script>

