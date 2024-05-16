<section class="content-header">
  <h1>Product</h1>
  <ol class="breadcrumb">
    <li class="active"><a href="#"><i class="fa fa-newspaper-o"></i>Product</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Product</h3>
        </div>
        <!-- Add Product Button -->
        <a data-toggle="modal" data-target="#modal-success" class="btn btn-success btn-sm" style="width: 100px; margin-left: 10px"><i class="fa fa-fw fa-plus"></i>Add Product</a>

        <!-- Product Table -->
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
              <?php foreach ($product as $data) : ?>
              <tr>
                <td><?php echo $data->code ?></td>
                <td><?php echo $data->label ?></td>
                <td><?php echo $data->category ?></td>
                <td><?php echo $data->code_category ?></td>
                <td><?php echo $data->technology ?></td>
                <td><?php echo $data->color ?></td>
                <td><?php echo $data->series ?></td>
                <td style="text-align: center;">
                  <a href="<?php echo base_url('Product/Forecast/' . $data->id); ?>"><i class="fa fa-fw fa-bar-chart"></i></a><br>  
                  <a data-toggle="modal" data-target="#modal-edit" 
                    onclick='InputData("<?php echo $data->id ?>", "<?php echo $data->code ?>", "<?php echo $data->label ?>", "<?php echo $data->category ?>", "<?php echo $data->code_category ?>", "<?php echo $data->technology ?>", "<?php echo $data->color ?>", "<?php echo $data->series ?>")'>
                    <i class="fa fa-fw fa-pencil"></i>
                  </a> 
                  <a href="<?php echo base_url('Product/Delete/' . $data->id); ?>" onclick="return confirm('Are you sure you want to delete <?php echo $data->label ?>?');">
                    <i class="fa fa-fw fa-trash"></i>
                  </a>
                </td>
              </tr>
              <?php endforeach; ?>
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

        <!-- Add Product Modal -->
        <div class="modal modal-success fade" id="modal-success">
          <?php echo form_open_multipart('Product/Add') ?>
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <h4 class="modal-title">Input Product</h4>
                </div>
                <div class="modal-body">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="code"><span style="color: red; margin-right: 3px">*</span>Item Code</label>
                      <input type="text" class="form-control" name="code" placeholder="Item Code" required>
                      <p class="text-red"><?php echo form_error('code') ?></p>
                    </div>
                    <div class="form-group">
                      <label for="label"><span style="color: red; margin-right: 3px">*</span>Product Name</label>
                      <input type="text" class="form-control" name="label" placeholder="Product Name" required>
                      <p class="text-red"><?php echo form_error('label') ?></p>
                    </div>
                    <div class="form-group">
                      <label for="id_category"><span style="color: red; margin-right: 3px">*</span>Product Category</label>
                      <select class="form-control" name="id_category">
                        <?php foreach ($category as $cat) : ?>
                          <option value="<?php echo $cat->id ?>"><?php echo $cat->label ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="code_category">Code Category</label>
                      <input type="text" class="form-control" name="code_category" placeholder="Code Category">
                      <p class="text-red"><?php echo form_error('code_category') ?></p>
                    </div>
                    <div class="form-group">
                      <label for="id_technology"><span style="color: red; margin-right: 3px">*</span>Product Technology</label>
                      <select class="form-control" name="id_technology">
                        <?php foreach ($technology as $tech) : ?>
                          <option value="<?php echo $tech->id ?>"><?php echo $tech->label ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="color"><span style="color: red; margin-right: 3px">*</span>Color Series</label>
                      <input type="text" class="form-control" name="color" placeholder="Color Series" required>
                      <p class="text-red"><?php echo form_error('color') ?></p>
                    </div>
                    <div class="form-group">
                      <label for="series"><span style="color: red; margin-right: 3px">*</span>Product Series</label>
                      <input type="text" class="form-control" name="series" placeholder="Product Series" required>
                      <p class="text-red"><?php echo form_error('series') ?></p>
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

        <!-- Edit Product Modal -->
        <div class="modal modal-info fade" id="modal-edit">
          <?php echo form_open_multipart('Product/Edit') ?>
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <h4 class="modal-title">Edit Product</h4>
                </div>
                <div class="modal-body">
                  <div class="box-body">
                    <input type="hidden" class="form-control" name="id" id="id" placeholder="Item Code" required>
                    <div class="form-group">
                      <label for="code"><span style="color: red; margin-right: 3px">*</span>Item Code</label>
                      <input type="text" class="form-control" name="code" id="code" placeholder="Item Code" required>
                      <p class="text-red"><?php echo form_error('code') ?></p>
                    </div>
                    <div class="form-group">
                      <label for="label"><span style="color: red; margin-right: 3px">*</span>Product Name</label>
                      <input type="text" class="form-control" name="label" id="label" placeholder="Product Name" required>
                      <p class="text-red"><?php echo form_error('label') ?></p>
                    </div>
                    <div class="form-group">
                      <label for="id_category"><span style="color: red; margin-right: 3px">*</span>Product Category</label>
                      <select class="form-control" name="id_category" id="id_category">
                        <?php foreach ($category as $cat) : ?>
                          <option value="<?php echo $cat->id ?>"><?php echo $cat->label ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="code_category">Code Category</label>
                      <input type="text" class="form-control" name="code_category" id="code_category" placeholder="Code Category">
                      <p class="text-red"><?php echo form_error('code_category') ?></p>
                    </div>
                    <div class="form-group">
                      <label for="id_technology"><span style="color: red; margin-right: 3px">*</span>Product Technology</label>
                      <select class="form-control" name="id_technology" id="id_technology">
                        <?php foreach ($technology as $tech) : ?>
                          <option value="<?php echo $tech->id ?>"><?php echo $tech->label ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="color"><span style="color: red; margin-right: 3px">*</span>Color Series</label>
                      <input type="text" class="form-control" name="color" id="color" placeholder="Color Series" required>
                      <p class="text-red"><?php echo form_error('color') ?></p>
                    </div>
                    <div class="form-group">
                      <label for="series"><span style="color: red; margin-right: 3px">*</span>Product Series</label>
                      <input type="text" class="form-control" name="series" id="series" placeholder="Product Series" required>
                      <p class="text-red"><?php echo form_error('series') ?></p>
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

      </div>
    </div>
  </div>
</section>

<script>
function InputData(id, code, name, category, code_category, technology, color, series) {
  document.getElementById('id').value = id;
  document.getElementById('code').value = code;
  document.getElementById('label').value = name;
  document.getElementById('id_category').value = category;
  document.getElementById('code_category').value = code_category;
  document.getElementById('id_technology').value = technology;
  document.getElementById('color').value = color;
  document.getElementById('series').value = series;
}
</script>
