<hr />
<?php echo form_open(site_url('teacher/marks_selector'));?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo get_phrase('pengelolaan_nilai') ?></h3>
    </div>
    <div class="panel-body">
		<div class="row">
			<div class="col-md-2">
				<div class="form-group">
				<label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('ujian');?></label>
					<select name="exam_id" class="form-control selectboxit">
						<option value=""><?php echo get_phrase('pilih_ujian');?></option>
						<?php
							$exams = $this->db->get_where('exam' , array('year' => $running_year))->result_array();
							foreach($exams as $row):
						?>
						<option value="<?php echo $row['exam_id'];?>"><?php echo $row['nama'];?></option>
						<?php endforeach;?>
					</select>
				</div>
			</div>

			<div class="col-md-2">
				<div class="form-group">
				<label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('kelas');?></label>
					<select name="class_id" class="form-control selectboxit" onchange="get_class_subject(this.value)">
						<option value=""><?php echo get_phrase('pilih_kelas');?></option>
						<?php
		                $classes = $this->db->get('class')->result_array();
							foreach($classes as $row):
						?>
						<option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
						<?php endforeach;?>
					</select>
				</div>
			</div>

			<div id="subject_holder">
				<div class="col-md-3">
					<div class="form-group">
					<label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('bagian');?></label>
						<select name="" id="" class="form-control selectboxit" disabled="disabled">
							<option value=""><?php echo get_phrase('pilih_kelas_dalu');?></option>		
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
					<label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('mata_pelajaran');?></label>
						<select name="" id="" class="form-control selectboxit" disabled="disabled">
							<option value=""><?php echo get_phrase('pilih_kelas_dalu');?></option>		
						</select>
					</div>
				</div>
				<div class="col-md-2" style="margin-top: 20px;">
					<center>
						<button type="submit" class="btn btn-info" id = "submit"><?php echo get_phrase('kelola nilai');?></button>
					</center>
				</div>
			</div>

		</div>
	</div>
</div>
<?php echo form_close();?>

<script type="text/javascript">
jQuery(document).ready(function($) {
	$("#submit").attr('disabled', 'disabled');
});
	function get_class_subject(class_id) {
		if (class_id !== '') {
		$.ajax({
            url: '<?php echo site_url('teacher/marks_get_subject/');?>' + class_id ,
            success: function(response)
            {
                jQuery('#subject_holder').html(response);
            }
        });
		$('#submit').removeAttr('disabled');
	}
	 else{
	  	$('#submit').attr('disabled', 'disabled');
	  }
	}
</script>