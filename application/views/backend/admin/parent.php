
            <a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('modal/popup/modal_parent_add/');?>');"
                class="btn btn-primary pull-right">
                <i class="entypo-plus-circled"></i>
                <?php echo get_phrase('Tambah Data Wali Murid');?>
                </a>
                <br><br>
               <table class="table table-bordered" id="parents">
                    <thead>
                        <tr>
                            <th width="60"><div><?php echo get_phrase('id_wali_murid');?></div></th>
                            <th><div><?php echo get_phrase('nama');?></div></th>
                            <th><div><?php echo get_phrase('email').'/'.get_phrase('username');?></div></th>
                            <th><div><?php echo get_phrase('telepon');?></div></th>
                            <th><div><?php echo get_phrase('profesi');?></div></th>
                            <th><div><?php echo get_phrase('aksi');?></div></th>
                        </tr>
                    </thead>
                </table>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">

    jQuery(document).ready(function($) {
        $.fn.dataTable.ext.errMode = 'throw';
        $('#parents').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": "<?php echo site_url('admin/get_parents') ?>",
                "dataType": "json",
                "type": "POST",
            },
            "columns": [
                { "data": "parent_id" },
                { "data": "name" },
                { "data": "email" },
                { "data": "phone" },
                { "data": "profession" },
                { "data": "options" },
            ],
            "columnDefs": [
                {
                    "targets": [5],
                    "orderable": false
                },
            ]
        });
    });

    function parent_edit_modal(parent_id) {
        showAjaxModal('<?php echo site_url('modal/popup/modal_parent_edit/');?>' + parent_id);
    }

    function parent_delete_confirm(parent_id) {
        confirm_modal('<?php echo site_url('admin/parent/delete/');?>' + parent_id);
    }

</script>
