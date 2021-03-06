<hr />

<div class="row" style="margin: 3px 0px 3px 0px">

    <button class="btn btn-primary pull-right">
        <i class="entypo-user"></i> <?php echo $this->crud_model->get_type_name_by_id('student', $student_id); ?>
    </button>
    <br><br>
    <table class="table table-bordered" id="table_export">
        <thead>
            <tr>
                <th>#</th>
                <th><?php echo get_phrase('judul'); ?></th>
                <th><?php echo get_phrase('deskripsi'); ?></th>
                <th><?php echo get_phrase('subyek');?></th>
                <th><?php echo get_phrase('pengunggah'); ?></th>
                <th><?php echo get_phrase('tanggal'); ?></th>
                <th><?php echo get_phrase('mengajukan'); ?></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php
            $count = 1;
            $class_id = $this->db->get_where('enroll', array(
                        'student_id' => $student_id, 'year' => $running_year
                    ))->row()->class_id;
            $syllabus = $this->db->get_where('academic_syllabus', array(
                        'class_id' => $class_id, 'year' => $running_year
                    ))->result_array();
            foreach ($syllabus as $row):
                ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td>
                        <?php
                        echo $this->db->get_where('subject', array(
                            'subject_id' => $row['subject_id']
                        ))->row()->name;
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->db->get_where($row['uploader_type'], array(
                            $row['uploader_type'] . '_id' => $row['uploader_id']
                        ))->row()->name;
                        ?>
                    </td>
                    <td><?php echo date("d/m/Y", $row['timestamp']); ?></td>
                    <td>
                        <?php echo substr($row['file_name'], 0, 20); ?><?php if (strlen($row['file_name']) > 20) echo '...'; ?>
                    </td>
                    <td align="center">
                        <a class="btn btn-default btn-xs"
                           href="<?php echo site_url('parents/download_academic_syllabus/'.$row['academic_syllabus_code']); ?>">
                            <i class="entypo-download"></i> <?php echo get_phrase('unduh'); ?>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>