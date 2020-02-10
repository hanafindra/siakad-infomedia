<hr />

<?php echo form_open(site_url('admin/attendance_report_selector')); ?>
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
                                <option value="<?php echo $row['class_id']; ?>"<?php if ($class_id == $row['class_id']) echo 'selected'; ?> ><?php echo $row['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            <?php endif; ?>

            <?php
            $query = $this->db->get_where('section', array('class_id' => $class_id));
            if ($query->num_rows() > 0):
                $sections = $query->result_array();
                ?>
                <div id="section_holder">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('sesi'); ?></label>
                            <select class="form-control selectboxit" name="section_id">
                                <?php foreach ($sections as $row): ?>
                                    <option value="<?php echo $row['section_id']; ?>"
                                            <?php if ($section_id == $row['section_id']) echo 'selected'; ?>><?php echo $row['name']; ?></option>
                                        <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-md-2">
                <div class="form-group">
                    <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('bulan'); ?></label>
                    <select name="month" class="form-control selectboxit" id="month">
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
                                $m = 'juli';
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
                                    <?php if ($month == $i) echo 'selected'; ?>  >
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
                    <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('tahun ajaran'); ?></label>
                    <select class="form-control selectboxit" name="sessional_year">
                        <?php
                        $sessional_year_options = explode('-', $running_year); ?>
                        <option value="<?php echo $sessional_year_options[0]; ?>" <?php if($sessional_year == $sessional_year_options[0]) echo 'selected'; ?>>
                            <?php echo $sessional_year_options[0]; ?></option>
                        <option value="<?php echo $sessional_year_options[1]; ?>" <?php if($sessional_year == $sessional_year_options[1]) echo 'selected'; ?>>
                            <?php echo $sessional_year_options[1]; ?></option>
                    </select>
                </div>
            </div>

            <input type="hidden" name="year" value="<?php echo $running_year; ?>">

            <div class="col-md-2" style="margin-top: 20px;">
                <button type="submit" class="btn btn-info"><?php echo get_phrase('tampilkan'); ?></button>
            </div>

        </div>
    </div>
</div>
<?php echo form_close(); ?>


<?php if ($class_id != '' && $section_id != '' && $month != '' && $sessional_year != ''): ?>

    <br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="text-align: center;">
            <div class="tile-stats tile-white">
                <div class="icon"><i class="entypo-docs"></i></div>
                <h3 style="color: #696969;">
                    <?php
                    $section_name = $this->db->get_where('section', array('section_id' => $section_id))->row()->name;
                    $class_name = $this->db->get_where('class', array('class_id' => $class_id))->row()->name;
                    if ($month == 1)
                        $m = 'Januari';
                    else if ($month == 2)
                        $m = 'Februari';
                    else if ($month == 3)
                        $m = 'Maret';
                    else if ($month == 4)
                        $m = 'April';
                    else if ($month == 5)
                        $m = 'Mei';
                    else if ($month == 6)
                        $m = 'Juni';
                    else if ($month == 7)
                        $m = 'Juli';
                    else if ($month == 8)
                        $m = 'Agustus';
                    else if ($month == 9)
                        $m = 'Sepetember';
                    else if ($month == 10)
                        $m = 'Oktober';
                    else if ($month == 11)
                        $m = 'November';
                    else if ($month == 12)
                        $m = 'Desember';
                    echo get_phrase('lembar kehadiran');
                    ?>
                </h3>
                <h4 style="color: #696969;">
    <?php echo get_phrase('class') . ' ' . $class_name; ?> : <?php echo get_phrase('section');?> <?php echo $section_name; ?><br>
    <?php echo $m . ', ' . $sessional_year; ?>
                </h4>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>


<div class="panel panel-primary ">
    <div class="panel-heading">
        <div class="panel-title">
            <?php echo get_phrase('lembar kehadiran');?>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered" id="my_table">
                    <thead>
                        <tr>
                            <td style="text-align: center;">
        <?php echo get_phrase('siswa'); ?> <i class="entypo-down-thin"></i> | <?php echo get_phrase('tanggal'); ?> <i class="entypo-right-thin"></i>
                            </td>
        <?php
        $year = explode('-', $running_year);
        $days = cal_days_in_month(CAL_GREGORIAN, $month, $sessional_year);

        for ($i = 1; $i <= $days; $i++) {
            ?>
                                <td style="text-align: center;"><?php echo $i; ?></td>
                        <?php } ?>

                        </tr>
                    </thead>

                    <tbody>
                                <?php
                                $data = array();

                                $students = $this->db->get_where('enroll', array('class_id' => $class_id, 'year' => $running_year, 'section_id' => $section_id))->result_array();

                                foreach ($students as $row):
                                    ?>
                            <tr>
                                <td style="text-align: center;">
                                <?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name; ?>
                                </td>
                                <?php
                                $status = 0;
                                for ($i = 1; $i <= $days; $i++) {
                                    $timestamp = strtotime($i . '-' . $month . '-' . $sessional_year);
                                    //$this->db->group_by('timestamp');
                                    $attendance = $this->db->get_where('attendance', array('section_id' => $section_id, 'class_id' => $class_id, 'year' => $running_year, 'timestamp' => $timestamp, 'student_id' => $row['student_id']))->result_array();


                                    foreach ($attendance as $row1):
                                        $month_dummy = date('d', $row1['timestamp']);

                                        if ($i == $month_dummy)
                                        $status = $row1['status'];


                                    endforeach;
                                    ?>
                                    <td style="text-align: center;">
                <?php if ($status == 1) { ?>
                                            <i class="entypo-record" style="color: #00a651;"></i>
                                <?php  } if($status == 2)  { ?>
                                            <i class="entypo-record" style="color: #ee4749;"></i>
                <?php  } $status =0;?>


                                    </td>

            <?php } ?>
        <?php endforeach; ?>

                        </tr>

        <?php ?>

                    </tbody>
                </table>
                <center>
                    <a href="<?php echo site_url('admin/attendance_report_print_view/' . $class_id . '/' . $section_id . '/' . $month . '/' . $sessional_year); ?>"
                       class="btn btn-primary" target="_blank">
        <?php echo get_phrase('cetak lembar kehadiran'); ?>
                    </a>
                </center>
            </div>
        </div>
    <?php endif; ?>
    </div>
</div>

<script type="text/javascript">

    // ajax form plugin calls at each modal loading,
    $(document).ready(function() {

        // SelectBoxIt Dropdown replacement
        if($.isFunction($.fn.selectBoxIt))
        {
            $("select.selectboxit").each(function(i, el)
            {
                var $this = $(el),
                    opts = {
                        showFirstOption: attrDefault($this, 'first-option', true),
                        'native': attrDefault($this, 'native', false),
                        defaultText: attrDefault($this, 'text', ''),
                    };

                $this.addClass('visible');
                $this.selectBoxIt(opts);
            });
        }
    });

</script>

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
