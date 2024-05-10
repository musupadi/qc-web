
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
            <a data-toggle="modal" data-target="#modal-success" class="btn btn-success btn-sm" style="margin-left: 10px"><i class="fa fa-fw fa-plus"></i>Import Excel</a>
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
                  <a data-toggle="modal" data-target="#modal-success" class="btn btn-success btn-sm" onclick="input('<?=$data->id ?>', '<?=$data->code ?>', '<?=$data->label ?>')"><i class="fa fa-fw fa-plus"></i>Input Product</a>
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
            <?php echo form_open_multipart('Qc/importExcel')?>
                <form role="form" action="<?php echo base_url('Qc/importExcel')?>" method="post" >
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
                              <label for="text"><span style="color: red; margin-right: 3px">*</span>Download Template Excel</label>
                              <br>
                              <a href="<?php echo base_url('file/qc_template.xlsx') ?>" download="QC Template.xlsx">
                                <i class="fa fa-cloud-download"></i> Download Excel
                              </a>
                            </div>
                            <div class="form-group">
                              <label for="text"><span style="color: red; margin-right: 3px">*</span>Import Excel</label>
                              <br>
                              <label for="file-upload" class="custom-file-upload">
                              <i class="fa fa-cloud-upload"></i> Upload Excel</label>
                              <input type="file" class="form-control" name="excel_file" size="20" id="file-upload">
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

