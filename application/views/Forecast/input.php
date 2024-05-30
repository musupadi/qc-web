<section class="content-header">
    <h1>
        Input Forecast
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-newspaper-o"></i>Forecast</a></li>
        <li class="active">Input Forecast</li>
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
                <?php echo form_open_multipart('Forecast/add'); ?>
                <form role="form" action="<?php echo base_url('Forecast/add'); ?>" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="label"><span style="color: red; margin-right: 3px">*</span>Forecast Name</label>
                            <input type="text" class="form-control" name="label" placeholder="Forecast Name" required>
                            <p class="text-red"><?php echo form_error('label'); ?></p>
                        </div>
                        <div class="form-group">
                            <label for="forecast"><span style="color: red; margin-right: 3px">*</span>Jumlah Forecast</label>
                            <input type="number" class="form-control" name="forecast" placeholder="Jumlah Forecast" required>
                            <p class="text-red"><?php echo form_error('forecast'); ?></p>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <br>
                            <input type="date" class="form-control" id="date" name="date" style="color: black;">
                            <p class="text-red"><?php echo form_error('date'); ?></p>
                        </div>
                        <div class="form-group">
                            <label for="stock"><span style="color: red; margin-right: 3px">*</span>Safety Stock</label>
                            <input type="text" class="form-control" name="stock" placeholder="Safety Stock" required>
                            <p class="text-red"><?php echo form_error('stock'); ?></p>
                        </div>
                        <div class="form-group">
                            <label for="qty"><span style="color: red; margin-right: 3px">*</span>Qty</label>
                            <input type="text" class="form-control" name="qty" placeholder="Qty" required>
                            <p class="text-red"><?php echo form_error('qty'); ?></p>
                        </div>
                        <div class="form-group">
                            <label for="id_product"><span style="color: red; margin-right: 3px">*</span>Product</label>
                            <select id="id_product" name="id_product" class="select2" style="width: 100%;" required>
                                <?php foreach ($product as $data) : ?>
                                    <option value="<?= $data->id ?>"><?= $data->label ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_user"><span style="color: red; margin-right: 3px">*</span>Pilih PIC</label>
                            <select id="id_user" name="id_user[]" class="select2" style="width: 100%;" multiple required>
                                <?php foreach ($pic as $data) : ?>
                                    <option value="<?= $data->id ?>"><?= $data->name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_customer"><span style="color: red; margin-right: 3px">*</span>Pilih Customer</label>
                            <select id="id_customer" name="id_customer" class="select2" style="width: 100%;" required>
                                <?php foreach ($customer as $data) : ?>
                                    <option value="<?= $data->id ?>"><?= $data->label ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                        <a href="<?php echo base_url('User'); ?>" class="btn btn-default">Batal</a>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>


<!-- Include Select2 JS -->
<script>
    $(document).ready(function() {
        $('#id_product').select2();
        $('#id_user').select2();
        $('#id_customer').select2();
    });
</script>
