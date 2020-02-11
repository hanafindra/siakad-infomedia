
<a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('modal/popup/expense_add/');?>');"
class="btn btn-primary pull-right">
<i class="entypo-plus-circled"></i>
<?php echo get_phrase('tambah_biaya');?>
</a>
<br><br>
<table class="table table-bordered" id="expenses">
    <thead>
        <tr>
            <th width="40"><div><?php echo get_phrase('id_pembayaran');?></div></th>
            <th><div><?php echo get_phrase('judul');?></div></th>
            <th><div><?php echo get_phrase('kategori');?></div></th>
            <th><div><?php echo get_phrase('metode_pembayaran');?></div></th>
            <th><div><?php echo get_phrase('jumlah');?></div></th>
            <th><div><?php echo get_phrase('tanggal');?></div></th>
            <th><div><?php echo get_phrase('pilihan');?></div></th>
        </tr>
    </thead>
</table>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">

    jQuery(document).ready(function($) {
        $.fn.dataTable.ext.errMode = 'throw';
        $('#expenses').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": "<?php echo site_url('accountant/get_expenses') ?>",
                "dataType": "json",
                "type": "POST",
            },
            "columns": [
                { "data": "payment_id" },
                { "data": "title" },
                { "data": "category" },
                { "data": "method" },
                { "data": "amount" },
                { "data": "date" },
                { "data": "options" },
            ],
            "columnDefs": [
                {
                    "targets": [2,5,6],
                    "orderable": false
                },
            ]
        });
    });

    function expense_edit_modal(payment_id) {
        showAjaxModal('<?php echo site_url('modal/popup/expense_edit/');?>' + payment_id);
    }

    function expense_delete_confirm(payment_id) {
        confirm_modal('<?php echo site_url('accountant/expense/delete/');?>' + payment_id);
    }

</script>
