<hr />
<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('Daftar Pengumuman'); ?>
                </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('tambah pengumuman'); ?>
                </a></li>
        </ul>
        <!------CONTROL TABS END------>


        <div class="tab-content">
            <br>
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
                <div class="row">

                    <div class="col-md-12">

                        <ul class="nav nav-tabs bordered"><!-- available classes "bordered", "right-aligned" -->
                            <li class="active">
                                <a href="#running" data-toggle="tab">
                                    <span><i class="entypo-home"></i>
                                        <?php echo get_phrase('berjalan'); ?></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#archived" data-toggle="tab">
                                    <span><i class="entypo-archive"></i>
                                        <?php echo get_phrase('arsip'); ?></span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <br>
                            <div class="tab-pane active" id="running">

                                <?php include 'running_noticeboard.php'; ?>

                            </div>
                            <div class="tab-pane" id="archived">

                                <?php include 'archived_noticeboard.php'; ?>

                            </div>
                        </div>


                    </div>

                </div>
            </div>
            <!----TABLE LISTING ENDS--->


            <!----CREATION FORM STARTS---->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(site_url('admin/noticeboard/create') , array(
                      'class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data',
                        'target' => '_top')); ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('judul'); ?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="notice_title" required />
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label"><?php echo get_phrase('catatan'); ?></label>
                  		<div class="col-sm-5">
                  		  <textarea class="form-control" rows="5" name="notice"></textarea>
                  		</div>
                  	</div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('tanggal'); ?></label>
                        <div class="col-sm-5">
                            <input type="text" class="datepicker form-control" name="create_timestamp"
                              value="<?php echo date('m/d/Y');?>" required />
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('gambar');?></label>
                      <div class="col-sm-7">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                          <div class="fileinput-new thumbnail" style="width: 300px; height: 150px;" data-trigger="fileinput">
                            <img src="<?php echo base_url(); ?>uploads/placeholder.png" alt="...">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                          <div>
                            <span class="btn btn-white btn-file">
                              <span class="fileinput-new"><?php echo get_phrase('pilih gambar'); ?></span>
                              <span class="fileinput-exists"><?php echo get_phrase('ubah'); ?></span>
                              <input type="file" name="image" accept="image/*">
                            </span>
                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('hapus'); ?></a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
          						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('tampilan di web');?></label>
          						<div class="col-sm-4">
          							<select name="show_on_website" class="form-control selectboxit">
                            <option value="1"><?php echo get_phrase('ya');?></option>
                            <option value="0"><?php echo get_phrase('tidak');?></option>
                        </select>
          						</div>
          					</div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('kirim sms ke semua'); ?></label>
                        <div class="col-sm-4">
                            <select class="form-control selectboxit" name="check_sms">
                                <option value="1"><?php echo get_phrase('ya'); ?></option>
                                <option value="2"><?php echo get_phrase('tidak'); ?></option>
                            </select>
                            <br>
                            <span class="badge badge-primary">
                                <?php
                                if ($active_sms_service == 'clickatell')
                                    echo 'Clickatell ' . get_phrase('aktivasi');
                                if ($active_sms_service == 'twilio')
                                    echo 'Twilio ' . get_phrase('aktivasi');
                                if ($active_sms_service == '' || $active_sms_service == 'disabled')
                                    echo get_phrase('layanan_sms_tidak_diaktifkan');
                                ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" id="submit_button" class="btn btn-info"><?php echo get_phrase('tambah'); ?></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!----CREATION FORM ENDS-->

        </div>
    </div>
</div>
