<hr />
<div class="row">
	<div class="col-md-12">
		<a href="<?php echo site_url('admin/income/invoices');?>" class="btn btn-<?php echo $inner == 'invoices' ? 'primary' : 'default'; ?>">
			<?php echo get_phrase('kwitansi');?>
		</a>
		<a href="<?php echo site_url('admin/income/payment_history');?>" class="btn btn-<?php echo $inner == 'payment_history' ? 'primary' : 'default'; ?>">
			<?php echo get_phrase('riwayat_pembayaran');?>
		</a>
		<a href="<?php echo site_url('admin/income/student_specific_payment_history');?>" class="btn btn-<?php echo $inner == 'student_specific_payment_history' ? 'primary' : 'default'; ?>">
			<?php echo get_phrase('bayaran_spp_berdasarkan_siswa');?>
		</a>
	</div>
</div>
<hr>
<?php include $inner.'.php'; ?>
