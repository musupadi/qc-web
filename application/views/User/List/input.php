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
                <?php echo form_open_multipart('User/Postuser')?>
                <form role="form" action="<?php echo base_url('User/Postuser')?>" method="post" >
                  <div class="box-body">
                    <div class="form-group">
                      <label for="text"><span style="color: red; margin-right: 3px">*</span>Full Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                      <p class="text-red"><?php echo form_error('name')?></p>
                    </div>
                    <div class="form-group">
                      <label for="text"><span style="color: red; margin-right: 3px">*</span>Username</label>
                      <input type="text" class="form-control" name="username" placeholder="Username" required>
                      <p class="text-red"><?php echo form_error('username')?></p>
                    </div>
                    <div class="form-group">
                      <label for="text"><span style="color: red; margin-right: 3px">*</span>Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Password" required>
                      <p class="text-red"><?php echo form_error('password')?></p>
                    </div>
                    <div class="form-group">
                      <label for="text"><span style="color: red; margin-right: 3px">*</span>Email</label>
                      <input type="email" class="form-control" name="email" placeholder="Email" required>
                      <p class="text-red"><?php echo form_error('email')?></p>
                    </div>
                    <div class="form-group">
                        <label><span style="color: red; margin-right: 3px">*</span>Pilih Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" onchange="pilihlevel(this)">
                          <option value="0">Laki-laki</option>
                          <option value="1">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="text"><span style="color: red; margin-right: 3px">*</span>Contact</label>
                      <input type="number" class="form-control" name="kontak" placeholder="Kontak" required>
                      <p class="text-red"><?php echo form_error('kontak')?></p>
                    </div>
                    <div class="form-group">
                        <label><span style="color: red; margin-right: 3px">*</span>Select Role</label>
                        <select class="form-control" name="id_role" onchange="pilihlevel(this)">
                          <?php foreach ($role as $data){ ?>
                              <option value="<?php echo $data->id?>"><?php echo $data->label ?></option>
                          <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="file-upload" class="custom-file-upload">
                        <i class="fa fa-cloud-upload"></i> Upload Photo Profile</label>
                        <input type="file" class="form-control" name="gambar" size="20" id="file-upload">
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