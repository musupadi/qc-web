<section class="content-header">
  <h1>
    Checking Result
  </h1>
  <ol class="breadcrumb">
    <li class="active"><a href="#"><i class="fa fa-newspaper-o"></i>Quality Control</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Quality Control</h3>
        </div>
        <!-- /.box-header -->
        <a data-toggle="modal" data-target="#modal-success" class="btn btn-success btn-sm" style="margin-left: 10px">
          <i class="fa fa-fw fa-plus"></i> Import Excel
        </a>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Item Code</th>
                <th>Product Name</th>
                <th>Type Category</th>
                <th>Code Category</th>
                <th>Product Technology</th>
                <th>Color Series</th>
                <th>Product Series</th>
                <th style="width: 40px;">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($product as $data) { ?>
              <tr>
                <td><?php echo htmlspecialchars($data->code); ?></td>
                <td><?php echo htmlspecialchars($data->label); ?></td>
                <td><?php echo htmlspecialchars($data->category); ?></td>
                <td><?php echo htmlspecialchars($data->code_category); ?></td>
                <td><?php echo htmlspecialchars($data->technology); ?></td>
                <td><?php echo htmlspecialchars($data->color); ?></td>
                <td><?php echo htmlspecialchars($data->series); ?></td>
                <td style="text-align: center;">
                  <a data-toggle="modal" data-target="#modal-add" class="btn btn-success btn-sm" 
                     onclick="input('<?php echo htmlspecialchars($data->id); ?>', '<?php echo htmlspecialchars($data->code); ?>', '<?php echo htmlspecialchars($data->label); ?>')">
                    <i class="fa fa-fw fa-plus"></i> Input Product
                  </a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Item Code</th>
                <th>Product Name</th>
                <th>Type Category</th>
                <th>Code Category</th>
                <th>Product Technology</th>
                <th>Color Series</th>
                <th>Product Series</th>
                <th style="width: 40px;">Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <?php echo $this->session->flashdata('pesan'); ?>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- Import Excel Modal -->
      <div class="modal modal-success fade" id="modal-success">
        <?php echo form_open_multipart('Qc/importExcel'); ?>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Import Excel</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                  <label><span style="color: red; margin-right: 3px">*</span>Download Template Excel</label>
                  <br>
                  <a href="<?php echo base_url('file/qc_template.xlsx'); ?>" download="QC Template.xlsx">
                    <i class="fa fa-cloud-download"></i> Download Excel
                  </a>
                </div>
                <div class="form-group">
                  <label><span style="color: red; margin-right: 3px">*</span>Import Excel</label>
                  <br>
                  <label for="file-upload" class="custom-file-upload">
                    <i class="fa fa-cloud-upload"></i> Upload Excel
                  </label>
                  <input type="file" class="form-control" name="excel_file" size="20" id="file-upload">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline">Save changes</button>
            </div>
          </div>
        </div>
        <?php echo form_close(); ?>
      </div>
      <!-- /.modal -->

      <!-- Add Product Modal -->
      <div class="modal modal-info fade" id="modal-add">
        <?php echo form_open_multipart('Qc/Add'); ?>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Input Product</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <input type="hidden" class="form-control" name="id_product" id="id" placeholder="Item Code" required>
                <div class="form-group">
                  <label for="code"><span style="color: red; margin-right: 3px">*</span>Item Code</label>
                  <input type="text" class="form-control" name="code" id="code" placeholder="Item Code" required disabled>
                  <p class="text-red"><?php echo form_error('code'); ?></p>
                </div>
                <div class="form-group">
                  <label for="label"><span style="color: red; margin-right: 3px">*</span>Product Name</label>
                  <input type="text" class="form-control" name="label" id="label" placeholder="Product Name" required disabled>
                  <p class="text-red"><?php echo form_error('label'); ?></p>
                </div>
                <div class="form-group">
                  <label for="load_number">LN</label>
                  <input type="text" class="form-control" name="load_number" placeholder="Load Number">
                  <p class="text-red"><?php echo form_error('load_number'); ?></p>
                </div>
                <div class="form-group">
                  <label for="qty"><span style="color: red; margin-right: 3px">*</span>QTY</label>
                  <input type="text" class="form-control" name="qty" placeholder="Quantity" required>
                  <p class="text-red"><?php echo form_error('qty'); ?></p>
                </div>
                <div class="form-group">
                  <label for="datepicker">Production Date:</label>
                  <input type="date" name="production_date" class="form-control" style="color: black;">
                  <p class="text-red"><?php echo form_error('production_date'); ?></p>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline">Save changes</button>
            </div>
          </div>
        </div>
        <?php echo form_close(); ?>
      </div>
      <!-- /.modal -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

<script>
  function input(id, code, label) {
    document.getElementById('id').value = id;
    document.getElementById('code').value = code;
    document.getElementById('label').value = label;
  }
</script>
