<hr />

<?php echo form_open(site_url('admin/attendance_report_selector/')); ?>
<div class="panel panel-primary ">
    <div class="panel-heading">
        <div class="panel-title">
            <?php echo get_phrase('Laporan Kehadiran Siswa');?>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">

            <?php
            $query = $this->db->get('class');
            if ($query->num_rows() > 0):
                $class = $query->result_array();

                ?>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('kelas'); ?></label>
                        <select class="form-control selectboxit" name="class_id" onchange="select_section(this.value)">
                            <option value=""><?php echo get_phrase('pilih'); ?></option>
                            <?php foreach ($class as $row): ?>
                            <option value="<?php echo $row['class_id']; ?>" ><?php echo $row['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            <?php endif; ?>

            <div id="section_holder">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('sesi'); ?></label>
                        <select class="form-control selectboxit" name="section_id">
                            <option value=""><?php echo get_phrase('pilih kelas dulu') ?></option>

                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                 <div class="form-group">
                    <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('bulan'); ?></label>
                    <select name="month" class="form-control selectboxit">
                        <?php
                        for ($i = 1; $i <= 12; $i++):
                            if ($i == 1)
                                $m = 'januari';
                            else if ($i == 2)
                                $m = 'februari';
                            else if ($i == 3)
                                $m = 'maret';
                            else if ($i == 4)
                                $m = 'april';
                            else if ($i == 5)
                                $m = 'mei';
                            else if ($i == 6)
                                $m = 'juni';
                            else if ($i == 7)
                                $m = 'julo';
                            else if ($i == 8)
                                $m = 'agustus';
                            else if ($i == 9)
                                $m = 'september';
                            else if ($i == 10)
                                $m = 'oktober';
                            else if ($i == 11)
                                $m = 'november';
                            else if ($i == 12)
                                $m = 'desember';
                            ?>
                            <option value="<?php echo $i; ?>"
                                  <?php if($month == $i) echo 'selected'; ?>  >
                                        <?php echo get_phrase($m); ?>
                            </option>
                            <?php
                        endfor;
                        ?>
                    </select>
                 </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('tahun pelajaran'); ?></label>
                    <select class="form-control selectboxit" name="sessional_year">
                        <?php
                        $sessional_year_options = explode('-', $running_year); ?>
                        <option value="<?php echo $sessional_year_options[0]; ?>"><?php echo $sessional_year_options[0]; ?></option>
                        <option value="<?php echo $sessional_year_options[1]; ?>"><?php echo $sessional_year_options[1]; ?></option>
                    </select>
                </div>
            </div>

            <input type="hidden" name="operation" value="selection">
            <input type="hidden" name="year" value="<?php echo $running_year;?>">

        	<div class="col-md-2" style="margin-top: 20px;">
        		<button type="submit" class="btn btn-info"><?php echo get_phrase('tampilkan');?></button>
        	</div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    function select_section(class_id) {

        $.ajax({
            url: '<?php echo site_url('admin/get_section/'); ?>' + class_id,
            success: function (response)
            {

                jQuery('#section_holder').html(response);
            }
        });
    }
</script>
