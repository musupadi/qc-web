
    <section class="content-header">
      <h1>
        User Management
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
                  <td><?= $i++; ?></td>
                  <td><?php echo $data->label?></td>
                  <td><?php echo $data->label?></td>
                  <td><?php echo $data->label?></td>
                  <td><?php echo $data->label?></td>
                  <td><?php echo $data->label?></td>
                  <td><?php echo $data->label?></td>
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
            <?php echo form_open_multipart('User/TambahRole/')?>
                <form role="form" action="<?php echo base_url('User/TambahRole/')?>" method="post" >
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Input Kategori</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                              <label for="text"><span style="color: red; margin-right: 3px">*</span>Role Name</label>
                              <input type="text" class="form-control" name="label" placeholder="Role Name" required>
                              <p class="text-red"><?php echo form_error('label')?></p>
                            </div>
                            <div class="form-group">
                              <label for="text"><span style="color: red; margin-right: 3px">*</span>Role Level</label>
                              <input type="number" class="form-control" name="level" placeholder="Role Level" required>
                              <p class="text-red"><?php echo form_error('level')?></p>
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

