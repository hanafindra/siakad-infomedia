<div class="row">
	<div class="col-md-12">
		<style>
		.form-margin{
		    padding:10px;
		}
		</style>
		<ul class="nav nav-tabs bordered">
			<li class="active"><a href="#data_diri" data-toggle="tab"><i class="entypo-user"></i> <?php echo get_phrase('form_pendaftaran');?></a></li>
			<li><a href="#ubah_password" data-toggle="tab"><i class="entypo-lock"></i><?php echo get_phrase('ubah_password');?></a></li>

			<li class="pull-right" style="padding:6px;"><button type="button" class="btn btn-info" id="simpan_semua"><?php echo get_phrase('simpan semua perubahan');?></button></li>
			<!-- <div class="col-md-1"></div>
			<div class="form-margin col-md-5">
				<button type="button" class="btn btn-primary"><?php echo get_phrase('proses pendaftaran');?></button>
			</div> -->
		</ul>

		<div class="tab-content">
    	<!--EDITING FORM STARTS-->
			<div class="tab-pane box active" id="data_diri" style="padding: 5px">
        <div class="box-content">
				<form method="post" class="mb-5" id="form_data">
					<?php foreach($edit_data as $row):?>
						<div class="row">
							<div class="col-md-7">
								<div class="row">
								<h4 style="background:grey; padding:10px; color:white; font-weight:bold;">Data Pribadi Siswa</h4>
								<div class="form-margin col-md-6">
	                  <label>Nama Lengkap</label>
										<input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" required/>
	              </div>
	              <div class="form-margin col-md-6">
	                  <label>NIK (Kependidikan)</label>
                    <input type="text" class="form-control" name="nis" value="<?php echo $row['nis'];?>"/>
	              </div>
	              <div class="form-margin col-md-6">
	                  <label>Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>" required/>
	              </div>
	              <div class="form-margin col-md-6">
	                  <label>Tgl Lahir</label>
                    <input type="text" class="form-control datepicker" name="birthday" value="<?php echo $row['birthday'];?>" data-start-view="2">
	              </div>
	              <div class="form-margin col-md-6">
	                  <label><?php echo get_phrase('jenis_kelamin');?></label>
                    <select name="sex" class="form-control selectboxit">
                      <option value=""><?php echo get_phrase('select');?></option>
                      <option value="male" <?php if($row['sex'] == 'male')echo 'selected';?>>Laki-laki</option>
                      <option value="female"<?php if($row['sex'] == 'female')echo 'selected';?>>Perempuan</option>
                    </select>
	              </div>
	              <div class="form-margin col-md-6">
	                  <label>Agama</label>
                    <select name="religion" class="form-control selectboxit">
                      <option value=""><?php echo get_phrase('select');?></option>
                      <option value="islam" <?php if($row['religion'] == 'islam')echo 'selected';?>>Islam</option>
                      <option value="kristen"<?php if($row['religion'] == 'kristen')echo 'selected';?>>Kristen</option>
                    </select>
	              </div>
	              <div class="form-margin col-md-6">
	                  <label>No. Telepon</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'];?>"/>
	              </div>
	              <div class="form-margin col-md-6">
	                  <label>Tinggi Badan</label>
                    <input type="text" class="form-control" name="tb" value="<?php echo $row['tinggi_badan'];?>"/>
	              </div>
	              <div class="form-margin col-md-6">
	                  <label>Berat Badan</label>
                    <input type="text" class="form-control" name="bb" value="<?php echo $row['berat_badan'];?>"/>
	              </div>
	              <div class="form-margin col-md-3">
	                  <label>Anak Ke</label>
                    <input type="text" class="form-control" name="anak_ke" value="<?php echo $row['anak_ke'];?>"/>
	              </div>
	              <div class="form-margin col-md-3">
	                  <label>Jumlah Saudara Kandung</label>
                    <input type="text" class="form-control" name="jumlah_saudara" value="<?php echo $row['jumlah_saudara'];?>"/>
	              </div>
								</div>
								<div class="row">
								<h4 style="background:grey; padding:10px; color:white; font-weight:bold;">Data Orangtua Siswa</h4>
								<div class=" col-md-6">
									<div class="fileinput-new thumbnail" style="!important;background: -moz-linear-gradient(45deg, #eda663 0%, #f9c94d 39%); /* FF3.6-15 */
									background: -webkit-linear-gradient(45deg, #eda663 0%,#f9c94d 39%); /* Chrome10-25,Safari5.1-6 */
									background: linear-gradient(45deg, #eda663 0%,#f9c94d 39%); padding:10px;" data-trigger="fileinput">
											<img src="../assets/images/dad.png" style="width:100px; height:100px;">
									</div>
		              <div class="form-margin">
		                  <label>Nama Lengkap Ayah</label>
	                    <input type="text" class="form-control" name="nama_ayah" value="Solikhin"/>
		              </div>
		              <div class="form-margin">
		                  <label>Tgl Lahir Ayah</label>
	                    <input type="text" class="form-control" name="lahir_ayah" value="07/13/1989"/>
		              </div>
		              <div class="form-margin">
		                  <label>Pendidikan Terkhir Ayah</label>
	                    <input type="text" class="form-control" name="pendidikan_ayah" value="S1"/>
		              </div>
		              <div class="form-margin">
		                  <label>Pekerjaan Ayah</label>
	                    <input type="text" class="form-control" name="pekerjaan_ayah" value="Swasta"/>
		              </div>
		              <div class="form-margin">
		                  <label>Penghasilan Ayah</label>
	                    <input type="text" class="form-control" name="penghasilan_ayah" value="100000000"/>
		              </div>
								</div>
								<div class=" col-md-6">
									<div class="fileinput-new thumbnail" style="!important;background: -moz-linear-gradient(45deg, #87e0fd 0%, #53cbf1 40%, #05abe0 100%); /* FF3.6-15 */
									background: -webkit-linear-gradient(45deg, #87e0fd 0%,#53cbf1 40%,#05abe0 100%); /* Chrome10-25,Safari5.1-6 */
									background: linear-gradient(45deg, #87e0fd 0%,#53cbf1 40%,#05abe0 100%); padding:10px;" data-trigger="fileinput">
											<img src="../assets/images/mom.png" style="width:100px; height:100px;">
									</div>
		              <div class="form-margin">
		                  <label>Nama Lengkap Ibu</label>
	                    <input type="text" class="form-control" name="nama_ibu" value="Sri"/>
		              </div>
		              <div class="form-margin">
		                  <label>Tgl Lahir Ibu</label>
	                    <input type="text" class="form-control" name="lahir_ibu" value="07/13/1989"/>
		              </div>
		              <div class="form-margin">
		                  <label>Pendidikan Terkhir Ibu</label>
	                    <input type="text" class="form-control" name="pendidikan_ibu" value="SMA"/>
		              </div>
		              <div class="form-margin">
		                  <label>Pekerjaan Ibu</label>
	                    <input type="text" class="form-control" name="pekerjaan_ibu" value="IRT"/>
		              </div>
		              <div class="form-margin">
		                  <label>Penghasilan Ibu</label>
	                    <input type="text" class="form-control" name="penghasilan_ibu" value="2000000"/>
		              </div>
								</div>
							</div>
							</div>
						<?php endforeach; ?>
					</form><div class="col-md-1"></div>
					<div class="col-md-4" style="position:sticky;top:90px; padding:10px;margin:10px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
						<div style="background-image: url('../assets/images/bgschool.jpg'); object-fit: cover; padding: 10px; border-radius:20px;">
						<div class="fileinput fileinput-new" data-provides="fileinput" style=" margin-left:35% !important;">
								<div class="fileinput-new thumbnail" style=" width:100px; height:100px;" data-trigger="fileinput">
										<img src="<?php echo $this->crud_model->get_image_url('student' , $row['student_id']);?>" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
										<span class="btn btn-white btn-file">
												<span class="fileinput-new">Select image</span>
												<span class="fileinput-exists">Change</span>
												<input type="file" name="userfile" accept="image/*">
										</span>
										<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
						</div>
						</div>
						<h4 style="background:grey; padding:10px; color:white; font-weight:bold;">Data Upload</h4>
						<div class="form-margin">
								<label>Akta Kelahiran</label>
								<input type="file" class="form-control" name="phone"/>
						</div>
						<div class="form-margin">
								<label>Kartu Keluarga</label>
								<input type="file" class="form-control" name="kartu_keluarga"/>
						</div>
						<div class="form-margin">
								<label>Ijazah Terakhir</label>
								<input type="file" class="form-control" name="ijazah"/>
						</div>
					</div>
				</div>
        </div>
			</div>
			<div class="tab-pane box" id="ubah_password" style="padding: 5px">
				<div class="box-content padded">
					<?php foreach($edit_data as $row):
						echo form_open(site_url('student/manage_profile/change_password'), array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
							<div class="form-group">
									<label class="col-sm-3 control-label"><?php echo get_phrase('current_password');?></label>
									<div class="col-sm-5">
											<input type="password" class="form-control" name="password" value="" required/>
									</div>
							</div>
							<div class="form-group">
									<label class="col-sm-3 control-label"><?php echo get_phrase('new_password');?></label>
									<div class="col-sm-5">
											<input type="password" class="form-control" name="new_password" value="" required/>
									</div>
							</div>
							<div class="form-group">
									<label class="col-sm-3 control-label"><?php echo get_phrase('confirm_new_password');?></label>
									<div class="col-sm-5">
											<input type="password" class="form-control" name="confirm_new_password" value="" required/>
									</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
										<button type="submit" class="btn btn-info"><?php echo get_phrase('update_profile');?></button>
								</div>
							</div>
						</form>
						<?php endforeach; ?>
				</div>
			</div>
    <!--EDITING FORM ENDS-->

		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$("#simpan_semua").click(function(){
		swal({
			title: "Apakah data yang anda masukkan sudah benar?",
			text: "Silahkan periksa kembali!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
						type: "POST",
						url: <?php base_url();?>'/siakad/student/update_profile_info',
						data: $("#form_data").serialize(),
						dataType: 'json',
						beforeSend: function(){
							$.blockUI({ message: '<div class="col-md-12" style="text-align:center;">\
																				<center><div class="loader"></div></center>\
																				<h5>Please Wait..</h5>\
																		</div>',
													css: {  background:'grey', 'border-radius':'10px', padding : '5px' }
												});
						},
						success: function(result) {
							console.log(result);
							swal(result.message, {icon: result.status});
							$.unblockUI();
						},
						error: function() {
							console.log("error");
							swal("Terjadi kesalahan, silahkan hubungi admin", {icon: "warning"});
							$.unblockUI();
						}
				});
			}
			else { swal("Lah kok gak jadi daftar?");}
		});
		});
	});
</script>
