<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo get_phrase('nilai_dikirim_via_sms') ?></h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <?php echo form_open(site_url('admin/exam_marks_sms/send_sms'));?>

                <div class="col-md-3">
                    <div class="form-group">
                    <label class="control-label"><?php echo get_phrase('ujian');?></label>
                        <select name="exam_id" class="form-control selectboxit">
                        <?php 
                            $exams = $this->db->get_where('exam' , array('year' => $running_year))->result_array();
                            foreach ($exams as $row):
                        ?>
                            <option value="<?php echo $row['exam_id'];?>"><?php echo $row['name'];?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                    <label class="control-label"><?php echo get_phrase('kelas');?></label>
                        <select name="class_id" class="form-control selectboxit">
                        <?php 
                            $classes = $this->db->get('class')->result_array();
                            foreach ($classes as $row):
                        ?>
                            <option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                    <label class="control-label"><?php echo get_phrase('penerima');?></label>
                        <select name="receiver" class="form-control selectboxit" id="receiver">
                            <option value=""><?php echo get_phrase('pilih_penerima');?></option>
                            <option value="student"><?php echo get_phrase('siswa');?></option>
                            <option value="parent"><?php echo get_phrase('wali_murid');?></option>
                        </select>
                    </div>
                </div>
                
                  <div class="col-md-3" style="margin-top: 20px;">
                      <button type="submit" class="btn btn-primary"><?php echo get_phrase('kirim_nilai');?> via SMS</button>
                  </div>

            <?php echo form_close();?>
        </div>
    </div>
</div>

        


<script type="text/javascript">

    $( "form" ).submit(function( event ) {

        var receiver = $('#receiver').val();
        if(receiver == ''){
            toastr.error('<?php echo get_phrase('silahkan_pilih_penerima');?>');
            event.preventDefault();
        } else {
            return true;
        }  
      
    });
</script>