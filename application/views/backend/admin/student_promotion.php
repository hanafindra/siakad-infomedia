<hr />
<div class="row">
    <div class="col-md-12">
        <blockquote class="blockquote-blue">
            <p>
                <strong>Perhatian!</strong>
            </p>
            <p>
                Kenaikan kelas pada siswa harus melalui proses pada menu ini.
                Pastikan untuk memilih kelas selanjutnya dengan benar dari menu pilih sebelum menaikkan kelas.
                Jika Anda tidak ingin menaikkan siswa ke kelas berikutnya, silakan pilih opsi itu agar siswa tidak naik ke kelas berikutnya tetapi
                akan membuat siswa berada di kelas yang sama.
            </p>
        </blockquote>
    </div>
</div>
<?php echo form_open(site_url('admin/student_promotion/promote'));?>
<div class="row">
<?php
    $running_year_array             = explode ( "-" , $running_year );
    $next_year_first_index          = $running_year_array[1];
    $next_year_second_index         = $running_year_array[1]+1;
    $next_year                      = $next_year_first_index. "-" .$next_year_second_index;
?>
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo get_phrase('Pengaturan Kenaikan Kelas') ?></h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <div class="col-sm-3" style="margin-top: 15px;">
                    <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('Dari Tahun Ajaran');?></label>
                        <select name="running_year" class="form-control selectboxit">
                        <option value="<?php echo $running_year;?>">
                            <?php echo $running_year;?>
                        </option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3">
                    <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('Ke Tahun Ajaran');?></label>
                        <select name="promotion_year" class="form-control selectboxit" id="promotion_year">
                        <option value="<?php echo $next_year;?>">
                            <?php echo $next_year;?>
                        </option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3">
                    <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('Dari Kelas');?></label>
                        <select name="promotion_from_class_id" id="from_class_id" class="form-control selectboxit"
                            >
                            <option value=""><?php echo get_phrase('pilih');?></option>
                            <?php
                                $classes = $this->db->get('class')->result_array();
                                foreach($classes as $row):
                            ?>
                            <option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3">
                    <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('Ke Kelas');?></label>
                        <select name="promotion_to_class_id" id="to_class_id" class="form-control selectboxit">
                            <option value=""><?php echo get_phrase('pilih');?></option>
                            <?php foreach($classes as $row):?>
                            <option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>

                <center>
                    <button class="btn btn-info" type="button" style="margin:10px;" onclick="get_students_to_promote('<?php echo $running_year;?>')">
                        <?php echo get_phrase('Proses');?></button>
                </center>

            </div>
        </div>
	</div>

</div>

<div id="students_for_promotion_holder"></div>

<?php echo form_close();?>

<script type="text/javascript">

    function get_students_to_promote(running_year)
    {
        from_class_id   = $("#from_class_id").val();
        to_class_id     = $("#to_class_id").val();
        promotion_year  = $("#promotion_year").val();

        if (from_class_id == "" || to_class_id == "") {
            toastr.error("<?php echo get_phrase('Silahkan pilih kelas awal dan tujuan kelas');?>")
            return false;
        }
        $.ajax({
            url: '<?php echo site_url('admin/get_students_to_promote/');?>' + from_class_id + '/' + to_class_id + '/' + running_year + '/' + promotion_year,
            success: function(response)
            {
                jQuery('#students_for_promotion_holder').html(response);
            }
        });
        return false;
    }

</script>
