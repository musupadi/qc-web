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
                <?php foreach ($users as $data){
                  
                  ?>
                <?php echo form_open_multipart('User/Edit/'.$data->id)?>
                <form role="form" action="<?php echo base_url('User/Edit/'.$data->id)?>" method="post" >
                  
                <div class="box">
                  <?php }?>
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