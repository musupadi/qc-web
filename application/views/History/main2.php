<section class="content-header">
      <h1>
        History Transaction
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">History Transaction</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">History</h3>
              
            </div>
            <a data-toggle="modal" data-target="#modal-success" class="btn btn-success btn-sm" style="width: 130px; margin-left: 10px"><i class="fa fa-fw fa-calendar"></i>Filter Date</a>
            <a data-toggle="modal" data-target="#modal-success2" class="btn btn-success btn-sm" style="width: 130px; margin-left: 10px"><i class="fa fa-fw  fa-file-pdf-o"></i>Save PDF</a>
            
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Name</th>
                  <th>Warehouse</th>
                  <th>Balance Prev</th>
                  <th>Balance</th>
                  <th>Balance Now</th>
                  <th>Reason</th>
                  <th>Description</th>
                  <th>User</th>
                  <th>Time</th>
                  <th>Search</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $id = 1;
                foreach ($history as $data) {

                ?>
                <tr style="text-align: center">
                  <td style="text-align: left"><?php echo $id++?></td>
                  <td style="text-align: left"><?php echo $data->item_name?></td>
                  <td style="text-align: left"><?php echo $data->warehouse?></td>
                  <td style="text-align: left"><?php echo $data->qty1 ?></td>
                  <td style="text-align: left"><?php echo $data->balance ?></td>
                  <td style="text-align: left"><?php echo $data->qty2?></td>
                  <td style="text-align: left"><?php echo $data->reason?></td>
                    <?php if ( $data->description == 1 ) : ?>
                      <td class="btn btn-success" style="font-size: 1.2rem; padding: 7px; margin-top: 3px; padding: 7px 11.5px">In</td>
                    <?php endif ;?>
                    <?php if ( $data->description == 0 ) : ?>
                      <td class="btn btn-warning" style="font-size: 1.2rem; padding: 7px; margin-top: 3px">Out</td>
                    <?php endif ;?>
                  <td style="text-align: left"><?php echo $data->user?></td>
                  <td style="text-align: left"><?= date_format(date_create($data->created_at),"d M Y - H:i:s")?></td>
                  <td class="btn btn-success" style="font-size: 1.2rem; padding: 7px; margin-top: 3px; padding: 7px 11.5px"><i class="fa fa-fw fa-search"></i></td>
                </tr>
                <?php  } ?>
                      
                </tbody>
                <tfoot>
                  <tr>
                    <th style="width: 10px;">#</th>
                    <th>Name</th>
                    <th>Warehouse</th>
                    <th>Balance Prev</th>
                    <th>Balance</th>
                    <th>Balance Now</th>
                    <th>Reason</th>
                    <th>Description</th>
                    <th>User</th>
                    <th>Time</th>
                    <th>Search</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            
            <?php echo $this->session->flashdata('pesan');?>
            <div class="modal modal-success fade" id="modal-success">
              <?php echo form_open_multipart('Home/HistoryTransactionFilter')?>
                  <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add Stock</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                              <div class="form-group">
                                  <label for="datepicker" style="width: 100px;">Start Date : </label>
                                  <input type="date" id="start_date" name="start_date" style="color: black;">
                              </div>
                            </div>
                            <div class="box-body">
                            <div class="form-group">
                                <label for="datepicker" style="width: 100px;">End Date Date : </label>
                                <input type="date" id="end_date" name="end_date" style="color: black;">
                            </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline">Save changes</button>
                        </div>
                    </div>
                  </div>
                </form>
            </div>
            <div class="modal modal-success fade" id="modal-success2">
              <?php echo form_open_multipart('Home/PdfTransaction')?>
                  <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Save PDF</h4>
                        </div>
                        <div class="modal-body">
                        <?php foreach ($user as $data) : ?>
                          <input type="hidden" class="form-control" name="name" value="<?= $data->name ?>">
                          <input type="hidden" class="form-control" name="username" value="<?= $data->username ?>">
                          <input type="hidden" class="form-control" name="email" value="<?= $data->email ?>">
                          <input type="hidden" class="form-control" name="department" value="<?= $data->department ?>">
                          <input type="hidden" class="form-control" name="phone_number" value="<?= $data->phone_number ?>">
                        <?php endforeach ?>
                        <input type="hidden" class="form-control" name="start_date" value="<?php echo $start_date?>">
                        <input type="hidden" class="form-control" name="end_date" value="<?php echo $end_date?>">
                            <div class="box-body">
                              <div class="form-group">
                              <label style="width: 100px;">Pilih Item</label>
                                <select id="id_item" name="id_item" class="select2" style="width: 100%;" >
                                  <option value="">Semua</option>
                                  <?php foreach ($item as $data) : ?>
                                    <option value="<?= $data->id ?>"><?= $data->name ?></option>
                                  <?php endforeach ?>
                                 
                                  <!-- Add more options as needed -->
                                </select>
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline">Save changes</button>
                        </div>
                    </div>
                  </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Select2 JS -->
    <script src="vendor/select2/select2/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#id_item').select2();
        });
    </script>
    