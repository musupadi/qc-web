
<section class="content-header">
      <h1>
        Logs
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-newspaper-o"></i>Forecast</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Forecast</h3>
            </div>
            <!-- /.box-header -->
            <a href="<?php echo base_url('Forecast/Add')?>" class="btn btn-success btn-sm" style="margin-left: 10px"><i class="fa fa-fw fa-plus"></i>Input Forecast</a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Product Code</th>
                  <th>Product Name</th>
                  <th>Sales Representative</th>
                  <th>Forecast</th>
                  <th>Date</th>
                  <th>Safety Stock</th>
                  <th>Qty</th>
                  <th>Customer</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                <?php
                foreach ($forecast as $data){

                ?>
                <tr>
                  <td><?php echo $i++?></td>
                  <td><?php echo $data->code?></td>
                  <td><?php echo $data->label?></td>
                  <td>
                    <?php
                      foreach ($sales[$i-2] as $salesData){
                    ?>
                    <a class="btn btn-success btn-sm"></i><?php echo $salesData->name?></a>
                    <?php  } ?>
                  </td>
                  <th><?php echo $data->forecast?></th>
                  <th><?= date_format(date_create($data->date),"M")?></th>
                  <th><?php echo $data->stock?></th>
                  <th><?php echo $data->qty?></th>
                  <th><?php echo $data->name?></th>
                </tr>
                </tr>
                <?php  } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Product Code</th>
                  <th>Product Name</th>
                  <th>Sales Representative</th>
                  <th>Forecast</th>
                  <th>Date</th>
                  <th>Safety Stock</th>
                  <th>Qty</th>
                  <th>Customer</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <?php echo $this->session->flashdata('pesan');?>
            <!-- /.box-body -->
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

