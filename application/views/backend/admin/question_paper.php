<table class="table table-bordered table-striped datatable" id="table_export">
    <thead>
        <tr>
            <th style="width: 60px;">#</th>
            <th><?php echo get_phrase('judul');?></th>
            <th><?php echo get_phrase('kelas');?></th>
            <th><?php echo get_phrase('ujian');?></th>
            <th><?php echo get_phrase('guru');?></th>
            <th><?php echo get_phrase('aksi');?></th>
        </tr>
    </thead>

    <tbody>
        <?php
        $count = 1;
        $this->db->order_by('question_paper_id', 'desc');
        $question_papers = $this->db->get('question_paper')->result_array();
        foreach ($question_papers as $row) { ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $row['title']?></td>
                <td>
                    <?php echo $this->db->get_where('class', array('class_id' => $row['class_id']))->row()->name; ?>
                </td>
                <td>
                    <?php echo $this->db->get_where('exam', array('exam_id' => $row['exam_id']))->row()->name; ?>
                </td>
                <td>
                    <?php echo $this->db->get_where('teacher', array('teacher_id' => $row['teacher_id']))->row()->name; ?>
                </td>
                <td>
                    <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/question_paper_view/'.$row['question_paper_id']);?>');"
                        class="btn btn-default btn-sm btn-icon icon-left">
                            <i class="entypo-eye"></i>
                            <?php echo get_phrase('lihat lembar pertanyaan');?>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<!-- DATA TABLE EXPORT CONFIGURATIONS -->
<script type="text/javascript">

    jQuery(document).ready(function($)
    {
        $('#table_export').dataTable();
    });

</script>
