<?php echo form_open(site_url('admin/bulk_student_add_using_csv/import') ,
			array('class' => 'form-inline validate',   'enctype' => 'multipart/form-data'));?>
<div class="row">
	<div class="col-md-8">
		<div class="panel panel-primary " data-collapsed="0">
		    <div class="panel-heading">
		        <div class="panel-title">
		            <i class="fa fa-calendar"></i>
		            <?php echo get_phrase('Tambah Banyak Data Siswa');?>
		        </div>
		    </div>
		    <div class="panel-body">
		        <div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-4">
						<div class="form_group">
							<label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('kelas');?></label>
							<select name="class_id" id="class_id" class="form-control selectboxit" required
								onchange="get_sections(this.value)"  data-validate="required"  data-message-required="<?php echo get_phrase('Data tidak boleh kosong');?>">
								<option value=""><?php echo get_phrase('Pilih Kelas');?></option>
								<?php
									$classes = $this->db->get('class')->result_array();
									foreach($classes as $row):
								?>
								<option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>
					<div id="section_holder" class="col-md-4">
						<label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('bagian');?></label>
						<select name="section_id" id="section_id" class="form-control selectboxit">
							<option value=""><?php echo get_phrase('Pilih Kelas dulu');?></option>
						</select>
					</div>
					<div class="col-md-2"></div>
				</div>
				<div class="row">
					<div class="col-md-offset-4 col-md-4" style="padding: 15px;">
						<button type="button" class="btn btn-primary" name="generate_csv" id="generate_csv"><?php echo get_phrase('dapatkan_').'CSV '.get_phrase('file'); ?></button>
					</div>
					<div class="col-md-offset-4 col-md-4" style="padding-bottom:15px;">
					<input type="file" name="userfile" class="form-control file2 inline btn btn-info" data-label="<i class='entypo-tag'></i> Pilih File CSV"
					                   	data-validate="required" data-message-required="<?php echo get_phrase('tidak boleh kosong'); ?>"
					               		accept="text/csv, .csv" />
					</div>
					<div class="col-md-offset-4 col-md-4">
						<button type="submit" class="btn btn-success" name="import_csv" id="import_csv"><?php echo get_phrase('import_CSV'); ?></button>
					</div>
				</div>
		    </div>
		</div>
	</div>
	<div class="col-md-4">
		<blockquote class="blockquote-blue">
			<p>
				<strong>
					Intruksi Menambahkan Data Siswa Secara Massal
				</strong>
			</p>
			<p>
				<ol style="color: #ffffff;font-weight: 200;line-height: 1.5;font-size: 13px;padding-left: 15px;">
					<li style="padding: 5px;"><?php echo get_phrase('
					Pada_Pertama_Pilih_Kelas_Dan_Bagian').'.'; ?></li>
					<li style="padding: 5px;"><?php echo get_phrase('setelah_memiliki_kelas_dan_bagian_klik_').'"dapatkan_CSV_file".'; ?></li>
					<li style="padding: 5px;"><?php echo get_phrase('buka_file_').'"bulk student.csv" File. '.get_phrase('masukan_detail_siswa_seperti_ditulis_di_sana_dan_ingat_ambil_dari_tabel_induk').'.';?></li>
					<li style="padding: 5px;"><?php echo get_phrase('simpan_yang_di_edit_').'"bulk student.csv" File.';?></li>
					<li style="padding: 5px;"><?php echo get_phrase('klik_').'"pilih file CSV" '.get_phrase('dan_pilih_file_yang_baru_saja_di_edit').'.';?></li>
					<li style="padding: 5px;"><?php echo get_phrase('impor_file.');?></li>
					<li style="padding: 5px;"><?php echo get_phrase('tekan_').'"Import file CSV ".';?></li>
				</ol>
			</p>
			<p style="font-weight: 500;">
				***<?php echo get_phrase('sistem_ini_melacak_duplikasi_dalam_ID_email.').' '.get_phrase('
					jadi_silakan_masukkan_ID_email_unik_untuk_setiap_siswa').'.'; ?>
			</p>
		</blockquote>
	</div>
</div>

<?php echo form_close();?>




<a href="" download="bulk_student.csv" style="display: none;" id = "bulk">Download</a>

<script>

</script>
<script type="text/javascript">
var class_selection = '';
jQuery(document).ready(function($) {
$('#submit_button').attr('disabled', 'disabled');

});
	function get_sections(class_id) {
		if (class_id != "") {
			$.ajax({
	            url: '<?php echo site_url('admin/get_sections/');?>' + class_id ,
	            success: function(response)
	            {
	                jQuery('#section_holder').html(response);
	                jQuery('#bulk_add_form').show();
	            }
	        });
		}
	}
	$("#generate_csv").click(function(){
		var class_id 	= $('#class_id').val();
		var section_id 	= $('#section_id').val();

		if(class_id == '' || section_id == '')
			toastr.error("<?php echo get_phrase('please_make_sure_class_and_section_is_selected'); ?>");
		else {
			$.ajax({
			  	url: '<?php echo site_url('admin/generate_bulk_student_csv/');?>' + class_id + '/' + section_id,
			  	success: function(response) {
			    	toastr.success("<?php echo get_phrase('file_generated'); ?>");
						$("#bulk").attr('href', response);
						jQuery('#bulk')[0].click();
			    	//document.location = response;
			  	}
			});
		}
	});
</script>
