<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered" id="histories">
			<thead>
                <tr>
                    <th width="40"><div><?php echo get_phrase('id');?></div></th>
                    <th><div><?php echo get_phrase('tujuan');?></div></th>
                    <th><div><?php echo get_phrase('deskripsi');?></div></th>
                    <th><div><?php echo get_phrase('metode');?></div></th>
                    <th><div><?php echo get_phrase('jumlah');?></div></th>
                    <th><div><?php echo get_phrase('tanggal');?></div></th>
                    <th><div><?php echo get_phrase('aksi');?></div></th>
                </tr>
            </thead>
		</table>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTable.ext.errMode = 'throw';
        $('#histories').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": "<?php echo site_url('admin/get_payments'); ?>",
                "dataType": "json",
                "type": "POST",
            },
            "columns": [
                { "data": "payment_id" },
                { "data": "title" },
                { "data": "description" },
                { "data": "method" },
                { "data": "amount" },
                { "data": "date" },
                { "data": "options" },
            ],
            "columnDefs": [
                {
                    "targets": [2,3,5,6],
                    "orderable": false
                },
            ]
        });
    });

    function invoice_view_modal(invoice_id) {
        showAjaxModal('<?php echo site_url('modal/popup/modal_view_invoice/');?>' + invoice_id);
    }
</script>
