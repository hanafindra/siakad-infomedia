<button onclick="showAjaxModal('<?php echo site_url('modal/popup/modal_study_material_add');?>');"
    class="btn btn-primary pull-right"><i class="entypo-plus-circled"></i>
        <?php echo get_phrase('Tambah Dokumen'); ?>
</button>
<div style="clear:both;"></div>
<br>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo get_phrase('Bahan Pengajaran') ?></h3>
    </div>
    <div class="panel-body">
        <table class="table table-bordered" id="">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo get_phrase('tanggal');?></th>
                    <th><?php echo get_phrase('nama materi');?></th>
                    <th><?php echo get_phrase('deskripsi');?></th>
                    <th><?php echo get_phrase('kelas');?></th>
                    <th><?php echo get_phrase('mata pelajaran');?></th>
                    <th><?php echo get_phrase('download silabus');?></th>
                    <th><?php echo get_phrase('aksi');?></th>
                </tr>
            </thead>

            <tbody>
                <?php
                $count = 1;
                foreach ($study_material_info as $row) { ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo date("d M, Y", $row['timestamp']); ?></td>
                        <td><?php echo $row['title']?></td>
                        <td><?php echo $row['description']?></td>
                        <td>
                            <?php $name = $this->db->get_where('class' , array('class_id' => $row['class_id'] ))->row()->name;
                                echo $name;?>
                        </td>
                        <td>
                            <?php $name = $this->db->get_where('subject' , array('subject_id' => $row['subject_id'] ))->row()->name;
                                echo $name;?>
                        </td>
                        <td>
                            <a href="<?php echo base_url().'uploads/document/'.$row['file_name']; ?>" class="btn btn-blue btn-icon icon-left">
                                <i class="entypo-download"></i>
                                <?php echo get_phrase('download');?>
                            </a>
                        </td>
                        <td>
                            <a  onclick="showAjaxModal('<?php echo site_url('modal/popup/modal_study_material_edit/'.$row['document_id']);?>');"
                                class="btn btn-default btn-sm btn-icon icon-left">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                            </a>
                            <a href="<?php echo site_url('admin/study_material/delete/'.$row['document_id']);?>"
                                class="btn btn-danger btn-sm btn-icon icon-left" onclick="return confirm('Are you sure to delete?');">
                                    <i class="entypo-cancel"></i>
                                    <?php echo get_phrase('hapus');?>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<script type="text/javascript">
    jQuery(document).ready(function ($)
    {
        $("#table-2").dataTable();
    });
</script>
