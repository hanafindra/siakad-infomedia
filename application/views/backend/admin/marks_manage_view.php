<?php echo form_open(site_url('admin/marks_selector'));?>
	<div class="panel panel-primary">
	    <div class="panel-heading">
	        <h3 class="panel-title"><?php echo get_phrase('Pengaturan Pengingat Ujian') ?></h3>
	    </div>
	    <div class="panel-body">
	    	<div class="row">

				<div class="col-md-3">
					<div class="form-group">
					<label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('ujian');?></label>
						<select name="exam_id" class="form-control selectboxit" required>
							<?php
								$exams = $this->db->get_where('exam' , array('year' => $running_year))->result_array();
								foreach($exams as $row):
							?>
							<option value="<?php echo $row['exam_id'];?>"
								<?php if($exam_id == $row['exam_id']) echo 'selected';?>><?php echo $row['name'];?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
					<label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('kelas');?></label>
						<select name="class_id" class="form-control selectboxit" onchange="get_class_subject(this.value)">
							<option value=""><?php echo get_phrase('select_class');?></option>
							<?php
								$classes = $this->db->get('class')->result_array();
								foreach($classes as $row):
							?>
							<option value="<?php echo $row['class_id'];?>"
								<?php if($class_id == $row['class_id']) echo 'selected';?>><?php echo $row['name'];?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>

				<div id="subject_holder">
					<div class="col-md-2">
						<div class="form-group">
						<label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('sesi');?></label>
							<select name="section_id" id="section_id" class="form-control selectboxit">
								<?php
									$sections = $this->db->get_where('section' , array(
										'class_id' => $class_id
									))->result_array();
									foreach($sections as $row):
								?>
								<option value="<?php echo $row['section_id'];?>"
									<?php if($section_id == $row['section_id']) echo 'selected';?>>
										<?php echo $row['name'];?>
								</option>
								<?php endforeach;?>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						<label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('materi');?></label>
							<select name="subject_id" id="subject_id" class="form-control selectboxit">
								<?php
									$subjects = $this->db->get_where('subject' , array(
										'class_id' => $class_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
									))->result_array();
									foreach($subjects as $row):
								?>
								<option value="<?php echo $row['subject_id'];?>"
									<?php if($subject_id == $row['subject_id']) echo 'selected';?>>
										<?php echo $row['name'];?>
								</option>
								<?php endforeach;?>
							</select>
						</div>
					</div>
					<div class="col-md-1" style="margin-top: 20px;">
						<center>
							<button type="submit" class="btn btn-info"><?php echo get_phrase('lihat');?></button>
						</center>
					</div>
				</div>

			</div>
	    </div>
	</div>

<?php echo form_close();?>

<div class="row" style="text-align: center;">
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
		<div class="tile-stats tile-white">
			<div class="icon"><i class="entypo-chart-bar"></i></div>

			<h3 style="color: #696969;"><?php echo get_phrase('nilai_untuk');?> <?php echo $this->db->get_where('exam' , array('exam_id' => $exam_id))->row()->name;?></h3>
			<h4 style="color: #696969;">
				<?php echo get_phrase('kelas');?> <?php echo $this->db->get_where('class' , array('class_id' => $class_id))->row()->name;?> :
				<?php echo get_phrase('sesi');?> <?php echo $this->db->get_where('section' , array('section_id' => $section_id))->row()->name;?>
			</h4>
			<h4 style="color: #696969;">
				<?php echo get_phrase('subjek');?> : <?php echo $this->db->get_where('subject' , array('subject_id' => $subject_id))->row()->name;?>
			</h4>
		</div>
	</div>
	<div class="col-sm-4"></div>
</div>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="panel panel-primary">
		    <div class="panel-heading">
		        <h3 class="panel-title"><?php echo get_phrase('siapkan_informasi_pembayaran') ?></h3>
		    </div>
		    <div class="panel-body">
		    	<?php echo form_open(site_url('admin/marks_update/'.$exam_id.'/'.$class_id.'/'.$section_id.'/'.$subject_id));?>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th><?php echo get_phrase('id');?></th>
							<th><?php echo get_phrase('nama');?></th>
							<th><?php echo get_phrase('nilai_diperoleh');?></th>
							<th><?php echo get_phrase('komentar');?></th>
						</tr>
					</thead>
					<tbody>
					<?php
						$count = 1;
						$marks_of_students = $this->db->get_where('mark' , array(
							'class_id' => $class_id,
								'section_id' => $section_id ,
									'year' => $running_year,
										'subject_id' => $subject_id,
											'exam_id' => $exam_id
						))->result_array();
						foreach($marks_of_students as $row):
					?>
						<tr>
							<td><?php echo $count++;?></td>

	                        <td><?php echo $this->db->get_where('student',array('student_id'=>$row['student_id']))->row()->student_code;?></td>

							<td>
								<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name;?>
							</td>
							<td>
								<input type="text" class="form-control" name="marks_obtained_<?php echo $row['mark_id'];?>"
									value="<?php echo $row['mark_obtained'];?>">
							</td>
							<td>
								<input type="text" class="form-control" name="comment_<?php echo $row['mark_id'];?>"
									value="<?php echo $row['comment'];?>">
							</td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>

				<center>
					<button type="submit" class="btn btn-success" id="submit_button">
						<i class="entypo-check"></i> <?php echo get_phrase('simpan_perubahan');?>
					</button>
				</center>
				<?php echo form_close();?>
		    </div>
		</div>


	</div>
	<div class="col-md-2"></div>
</div>





<script type="text/javascript">
	function get_class_subject(class_id) {
	if (class_id !== '') {
	$.ajax({
            url: '<?php echo site_url('admin/marks_get_subject/');?>' + class_id ,
            success: function(response)
            {
                jQuery('#subject_holder').html(response);
            }
        });
	  }
	}
</script>
