<section class="content-header">
      <h1>
        Input User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-newspaper-o"></i>User</a></li>
        <li class="active">Input User</li>
      </ol>
    </section>
    <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <?php echo form_open_multipart('Forecast/add')?>
                <form role="form" action="<?php echo base_url('Forecast/add')?>" method="post" >
                  <div class="box-body">
                    <div class="form-group">
                      <label for="text"><span style="color: red; margin-right: 3px">*</span>Forecast Name</label>
                        <input type="text" class="form-control" name="label" placeholder="Forecast Name" required>
                      <p class="text-red"><?php echo form_error('label')?></p>
                    </div>
                    <div class="form-group">
                      <label for="text"><span style="color: red; margin-right: 3px">*</span>Jumlah Forecast</label>
                      <input type="number" class="form-control" name="forecast" placeholder="Jumlah Forecast" required>
                      <p class="text-red"><?php echo form_error('username')?></p>
                    </div>
                    <div class="form-group">
                        <label for="datepicker">Date</label>
                        <br>
                        <input type="date" class="form-control" style="width: 100%" id="date" name="date" style="color: black;">
                      <p class="text-red"><?php echo form_error('password')?></p>
                    </div>
                    <div class="form-group">
                      <label for="text"><span style="color: red; margin-right: 3px">*</span>Safety Stock</label>
                      <input type="qty" class="form-control" name="stock" placeholder="stock" required>
                      <p class="text-red"><?php echo form_error('email')?></p>
                    </div>
                    <div class="form-group">
                      <label for="text"><span style="color: red; margin-right: 3px">*</span>Qty</label>
                      <input type="qty" class="form-control" name="qty" placeholder="qty" required>
                      <p class="text-red"><?php echo form_error('email')?></p>
                    </div>
                    <div class="form-group">
                        <label for="text"><span style="color: red; margin-right: 3px">*</span>Product Product</label>
                        <select id="id_product" name="id_product" class="select2" style="width: 100%;" >
                            <?php foreach ($product as $data) : ?>
                                <option value="<?= $data->id ?>"><?= $data->label ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="text"><span style="color: red; margin-right: 3px">*</span>Pilih PIC</label>    
                        <select id="id_user" name="id_user[]" class="select2" style="width: 100%;" multiple>
                            <?php foreach ($pic as $data) : ?>
                                <option value="<?= $data->id ?>"><?= $data->name ?>&nbsp;&nbsp;&nbsp;</option>
                            <?php endforeach ?>
                        </select>
                        <!-- Tombol untuk menyimpan nilai id dan nama pengguna yang dipilih -->
                    </div>
                    <div class="form-group">
                        <label for="text"><span style="color: red; margin-right: 3px">*</span>Pilih Customer</label>    
                        <select id="id_customer" name="id_customer" class="select2" style="width: 100%;">
                            <?php foreach ($customer as $data) : ?>
                                <option value="<?= $data->id ?>"><?= $data->label ?></option>
                            <?php endforeach ?>
                        </select>
                        <!-- Tombol untuk menyimpan nilai id dan nama pengguna yang dipilih -->
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    <a href="<?php echo base_url('User')?>">Batal</a>
                  </div>
                </form>
              </div>
              <!-- /.box -->
            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </section>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Select2 JS -->
<script>
    $(document).ready(function() {
        $('#id_product').select2();
        $('#id_user').select2(); 
        $('#id_customer').select2();   
    });
</script>

  