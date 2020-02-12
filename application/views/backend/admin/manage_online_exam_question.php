<?php
    $online_exam_details = $this->db->get_where('online_exam', array('online_exam_id' => $online_exam_id))->row_array();
    $added_question_info = $this->db->get_where('question_bank', array('online_exam_id' => $online_exam_id))->result_array();
?>
<hr>
<div class="row">
    <div class="col-md-6">
        <h4><i class="entypo-docs"></i>&nbsp; <?php echo get_phrase('kertas_pertanyaan');?></h4>
    </div>
    <div class="col-md-6">
        <button type="button" class="btn btn-info pull-right" id="questions_print">
            <i class="entypo-print"></i> &nbsp;<?php echo get_phrase('cetak');?>
        </button>
        <div id="print_options">
            <a href="<?php echo site_url('admin/online_exam_questions_print_view/'.$online_exam_id.'/answers');?>" class="btn btn-white pull-right" id="questions_print_with_answers">
                <i class="entypo-print"></i> &nbsp; <?php echo get_phrase('cetak_dengan_jawaban');?>
            </a>
            <a href="<?php echo site_url('admin/online_exam_questions_print_view/'.$online_exam_id.'/no_answers');?>" class="btn btn-white pull-right" id="questions_print_without_answers">
                <i class="entypo-print"></i> &nbsp; <?php echo get_phrase('cetak_tanpa_jawaban');?>
            </a>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-menu"></i>
                    <?php echo get_phrase('daftar_pertanyaan');?>
                </div>
            </div>
            <div class="panel-body">
                <table  class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center;" width="5%"><div>#</div></th>
                            <th style="text-align: center;"><div><?php echo get_phrase('tipe');?></div></th>
                            <th style="text-align: center;" width="60%"><div><?php echo get_phrase('pertanyaan');?></div></th>
                            <th style="text-align: center;" width="10%"><div><?php echo get_phrase('nilai');?></div></th>
                            <th style="text-align: center;"><div><?php echo get_phrase('opsi');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (sizeof($added_question_info) == 0):?>
                            <tr>
                                <td colspan="4"><?php echo get_phrase('belum_ada_pertanyaan_yang_ditambahkan'); ?></td>
                            </tr>

                            <?php
                            elseif (sizeof($added_question_info) > 0):
                            $i = 0;
                            foreach ($added_question_info as $added_question): ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo ++$i; ?></td>
                                    <td><?php echo get_phrase($added_question['type']);?></td>
                                    <?php if ($added_question['type'] == 'isi_yang_kosong'): ?>
                                        <td><?php echo str_replace('^', '____', $added_question['question_title']); ?></td>
                                    <?php else: ?>
                                        <td><?php echo $added_question['question_title']; ?></td>
                                    <?php endif; ?>
                                    <td style="text-align: center;"><?php echo $added_question['mark']; ?></td>
                                    <td style="text-align: center;">
                                        <!-- <a href="<?php echo site_url('admin/update_online_exam_question/'.$added_question['question_bank_id']); ?>" class = "btn btn-primary btn-xs" data-toggle="tooltip" title="<?php echo get_phrase('edit'); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> -->
                                        <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/update_online_exam_question/'.$added_question['question_bank_id']);?>')" class="btn btn-primary btn-xs" data-toggle="tooltip" title="<?php echo get_phrase('edit'); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href = "#" onclick="confirm_modal('<?php echo site_url('admin/delete_question_from_online_exam/'.$added_question['question_bank_id']);?>');" class = "btn btn-danger btn-xs"  data-toggle="tooltip" title="<?php echo get_phrase('delete'); ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-info-circled"></i>
                    <?php echo get_phrase('detail_ujian');?>
                </div>
            </div>
            <div class="panel-body">
                <table  class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><b><?php echo get_phrase('judul_ujian');?></b></td>
                            <td><?php echo $online_exam_details['title']; ?></td>
                            <td><b><?php echo get_phrase('tanggal');?></b></td>
                            <td><?php echo date('M d, Y', $online_exam_details['exam_date']); ?></td>
                        </tr>
                        <tr>
                            <td><b><?php echo get_phrase('kelas');?></b></td>
                            <td><?php echo $this->db->get_where('class', array('class_id' => $online_exam_details['class_id']))->row()->name; ?></td>
                            <td><b><?php echo get_phrase('waktu');?></b></td>
                            <td><?php echo $online_exam_details['time_start'].' - '.$online_exam_details['time_end']; ?></td>
                        </tr>
                        <tr>
                            <td><b><?php echo get_phrase('sesi');?></b></td>
                            <td><?php echo $this->db->get_where('section', array('section_id' => $online_exam_details['section_id']))->row()->name; ?></td>
                            <td><b><?php echo get_phrase('persentase_kelulusan');?></b></td>
                            <td><?php echo $online_exam_details['minimum_percentage'].'%'; ?></td>
                        </tr>
                        <tr>
                            <td><b><?php echo get_phrase('subjek');?></b></td>
                            <td><?php echo $this->db->get_where('subject', array('subject_id' => $online_exam_details['subject_id']))->row()->name; ?></td>
                            <td><b><?php echo get_phrase('jumlah_nilai');?></b></td>
                            <td>
                                <?php if (sizeof($added_question_info) == 0):?>
                                    <?php echo 0; ?>
                                <?php elseif (sizeof($added_question_info) > 0):?>
                                    <?php
                                        $total_mark = 0;
                                        foreach ($added_question_info as $single_question) {
                                            $total_mark = $total_mark + $single_question['mark'];
                                        }
                                        echo $total_mark;
                                     ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('tambah_pertanyaan');?>
                </div>
            </div>
            <div class="panel-body">   
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('tipe_pertanyaan');?></label>
                    <div class="col-sm-8">
                        <select class="selectboxit" name="question_type" id="question_type">
                            <option value=""><?php echo get_phrase('pilih_tipe_pertanyaan');?></option>
                            <option value="multiple_choice"><?php echo get_phrase('pilihan_ganda');?></option>
                            <option value="true_false"><?php echo get_phrase('benar_atau_salah');?></option>
                            <option value="fill_in_the_blanks"><?php echo get_phrase('isi_yang_kosong');?></option>
                        </select>
                    </div>
                </div>
                <br><br>
                <div id="question_holder"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function() {
        $('#print_options').hide();
        $('#questions_print').on('click', function() {
            $('#print_options').fadeIn();
        });
        $('#question_type').on('change', function() {
            var question_type = $(this).val();
            if (question_type == '') {
                $('#question_holder').html('<div class="alert alert-danger">Silahkan pilih tipe pertanyaan</div>');
                return;
            }
            var online_exam_id = '<?php echo $online_exam_id;?>';
            $.ajax({
                url: '<?php echo site_url('admin/load_question_type/');?>' + question_type + '/' + online_exam_id
            }).done(function(response) {
                $('#question_holder').html(response);
            });
        });
    });
    
</script>