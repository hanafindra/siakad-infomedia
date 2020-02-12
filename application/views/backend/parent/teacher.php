<br><br>
<table class="table table-bordered datatable" id="teachers">
    <thead>
        <tr>
            <th width="60"><div><?php echo get_phrase('id_guru');?></div></th>
            <th width="80"><div><?php echo get_phrase('foto');?></div></th>
            <th><div><?php echo get_phrase('nama');?></div></th>
            <th><div><?php echo get_phrase('email').'/'.get_phrase('nama_pengguna');?></div></th>
            <th><div><?php echo get_phrase('telepon');?></div></th>
        </tr>
    </thead>
</table>



<!---  DATA TABLE EXPORT CONFIGURATIONS -->
<script type="text/javascript">

    jQuery(document).ready(function($) {
        $.fn.dataTable.ext.errMode = 'throw';
        $('#teachers').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": "<?php echo site_url('parents/get_teachers') ?>",
                "dataType": "json",
                "type": "POST",
            },
            "columns": [
                { "data": "teacher_id" },
                { "data": "photo" },
                { "data": "name" },
                { "data": "email" },
                { "data": "phone" },
            ],
            "columnDefs": [
                {
                    "targets": [1],
                    "orderable": false
                },
            ]
        });
    });

</script>