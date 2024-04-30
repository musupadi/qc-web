
    <section class="content-header">
      <h1>
        Product
      </h1>
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
            <!-- /.box-header -->
            <a data-toggle="modal" data-target="#modal-success" class="btn btn-success btn-sm" style="width: 100px; margin-left: 10px"><i class="fa fa-fw fa-plus"></i>Add Product</a>
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
                  <?php $i = 1; ?>
                <?php
                foreach ($product as $data){

                ?>
                <tr>
                  <td><?php echo $data->code?></td>
                  <td><?php echo $data->label?></td>
                  <td><?php echo $data->category?></td>
                  <td><?php echo $data->code_category?></td>
                  <td><?php echo $data->technology?></td>
                  <td><?php echo $data->color?></td>
                  <td><?php echo $data->series?></td>
                  <td style="text-align: center;">
                    <a href="<?php echo base_url('User/EditRole/'.$data->id);?>">
                      <i class="fa fa-fw fa-pencil"></i>
                    </a> 
                    <a href="<?php echo base_url('User/HapusRole/'.$data->id);?>" onclick="return confirm('yakin?');">
                      <i class="fa fa-fw fa-trash"></i>
                    </a>
                    </div>
                    </div>
                  </td>
                </tr>
                <?php  } ?>
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
            <?php echo $this->session->flashdata('pesan');?>
            <!-- /.box-body -->
            <!-- INPUT -->
            <div class="modal modal-success fade" id="modal-success">
            <?php echo form_open_multipart('Product/Add')?>
                <form role="form" action="<?php echo base_url('Product/Add')?>" method="post" >
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
                              <label for="text"><span style="color: red; margin-right: 3px">*</span>Item Code</label>
                              <input type="text" class="form-control" name="code" placeholder="Item Code" required>
                              <p class="text-red"><?php echo form_error('code')?></p>
                            </div>
                            <div class="form-group">
                              <label for="text"><span style="color: red; margin-right: 3px">*</span>Product Name</label>
                              <input type="text" class="form-control" name="label" placeholder="Product Name" required>
                              <p class="text-red"><?php echo form_error('label')?></p>
                            </div>
                            <div class="form-group">
                                <label><span style="color: red; margin-right: 3px">*</span>Product Category</label>
                                <select class="form-control" name="id_category">
                                <?php foreach ($category as $cat) :?>
                                    <option name="option" value="<?php echo $cat->id ?>"><?php echo $cat->label ?></option>
                                <?php endforeach ?>
                                </select>
                             </div>
                            <div class="form-group">
                              <label for="text"><span style="color: red; margin-right: 3px"></span>Code Category</label>
                              <input type="text" class="form-control" name="code_category" placeholder="Code Category">
                              <p class="text-red"><?php echo form_error('code_category')?></p>
                            </div>
                            <div class="form-group">
                                <label><span style="color: red; margin-right: 3px">*</span>Product Technology</label>
                                <select class="form-control" name="id_technology">
                                <?php foreach ($technology as $tech) :?>
                                    <option name="option" value="<?php echo $tech->id ?>"><?php echo $tech->label ?></option>
                                <?php endforeach ?>
                                </select>
                             </div>
                             <div class="form-group">
                              <label for="text"><span style="color: red; margin-right: 3px">*</span>Color Series</label>
                              <input type="text" class="form-control" name="color" placeholder="Color Series" required>
                              <p class="text-red"><?php echo form_error('color')?></p>
                            </div>
                            <div class="form-group">
                              <label for="text"><span style="color: red; margin-right: 3px">*</span>Product Series</label>
                              <input type="text" class="form-control" name="series" placeholder="Product Series" required>
                              <p class="text-red"><?php echo form_error('series')?></p>
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

