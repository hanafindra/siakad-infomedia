<hr />
<div class="row">
	<div class="col-md-12">

			<ul class="nav nav-tabs bordered">
				<li class="<?php if($active_tab == 'invoices') echo 'active'; ?>">
					<a href="#unpaid" data-toggle="tab">
						<span class="hidden-xs"><?php echo get_phrase('faktur');?></span>
					</a>
				</li>
				<li>
					<a href="#paid" data-toggle="tab">
						<span class="hidden-xs"><?php echo get_phrase('riwayat_pembayaran');?></span>
					</a>
				</li>
				<li class="<?php if($active_tab == 'student_specific_payment_history') echo 'active'; ?>">
					<a href="#paid_student_specific" data-toggle="tab">
						<span class="hidden-xs"><?php echo get_phrase('detail_riwayat_pembayaran_siswa');?></span>
					</a>
				</li>
			</ul>

			<div class="tab-content">
			<br>
				<div class="tab-pane <?php if($active_tab == 'invoices') echo 'active'; ?>" id="unpaid">


						<table class="table table-bordered">
                	<thead>
                		<tr>
                			<th>#</th>
                    		<th><div><?php echo get_phrase('siswa');?></div></th>
                    		<th><div><?php echo get_phrase('judul');?></div></th>
                            <th><div><?php echo get_phrase('total');?></div></th>
                            <th><div><?php echo get_phrase('pembayaran');?></div></th>
                            <th><div><?php echo get_phrase('status');?></div></th>
                    		<th><div><?php echo get_phrase('tanggal');?></div></th>
                    		<th><div><?php echo get_phrase('aksi');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php
                    		$count = 1;
                    		$this->db->where('year' , $running_year);
                    		$this->db->order_by('creation_timestamp' , 'desc');
                    		$invoices = $this->db->get('invoice')->result_array();
                    		foreach($invoices as $row):
                    	?>
                        <tr>
                        	<td><?php echo $count++;?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id']);?></td>
							<td><?php echo $row['title'];?></td>
							<td><?php echo $row['amount'];?></td>
                            <td><?php echo $row['amount_paid'];?></td>
                            <?php if($row['due'] == 0):?>
                            	<td>
                            		<button class="btn btn-success btn-xs"><?php echo get_phrase('sudah_bayar');?></button>
                            	</td>
                            <?php endif;?>
                            <?php if($row['due'] > 0):?>
                            	<td>
                            		<button class="btn btn-danger btn-xs"><?php echo get_phrase('belum_bayar');?></button>
                            	</td>
                            <?php endif;?>
							<td><?php echo date('d M,Y', $row['creation_timestamp']);?></td>
							<td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    <?php echo get_phrase('akasi');?> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <?php if ($row['due'] != 0):?>

                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/modal_take_payment/'.$row['invoice_id']);?>');">
                                            <i class="entypo-bookmarks"></i>
                                                <?php echo get_phrase('ambil_pembayaran');?>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <?php endif;?>

                                    <!-- VIEWING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/modal_view_invoice/'.$row['invoice_id']);?>');">
                                            <i class="entypo-credit-card"></i>
                                                <?php echo get_phrase('lihat_faktur');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>

                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/modal_edit_invoice/'.$row['invoice_id']);?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                        </a>
                                    </li>
                                    <li class="divider"></li>

                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php echo site_url('admin/invoice/delete/'.$row['invoice_id']);?>');">
                                            <i class="entypo-trash"></i>
                                                <?php echo get_phrase('hapus');?>
                                            </a>
                                                    </li>
                                </ul>
                            </div>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>

				</div>
				<div class="tab-pane" id="paid">

					<table class="table table-bordered datatable example">
					    <thead>
					        <tr>
					            <th><div>#</div></th>
					            <th><div><?php echo get_phrase('judul');?></div></th>
					            <th><div><?php echo get_phrase('deskripsi');?></div></th>
					            <th><div><?php echo get_phrase('metode_pembayaran');?></div></th>
					            <th><div><?php echo get_phrase('jumlah');?></div></th>
					            <th><div><?php echo get_phrase('tanggal');?></div></th>
					            <th></th>
					        </tr>
					    </thead>
					    <tbody>
					        <?php
					        	$count = 1;
					        	$this->db->where('payment_type' , 'income');
					        	$this->db->order_by('timestamp' , 'desc');
					        	$payments = $this->db->get('payment')->result_array();
					        	foreach ($payments as $row):
					        ?>
					        <tr>
					            <td><?php echo $count++;?></td>
					            <td><?php echo $row['title'];?></td>
					            <td><?php echo $row['description'];?></td>
					            <td>
					            	<?php
					            		if ($row['method'] == 1)
					            			echo get_phrase('tunai');
					            		if ($row['method'] == 2)
					            			echo get_phrase('cek');
					            		if ($row['method'] == 3)
					            			echo get_phrase('kartu_kredit');
					                    if ($row['method'] == 'paypal')
					                    	echo 'paypal';
					            	?>
					            </td>
					            <td><?php echo $row['amount'];?></td>
					            <td><?php echo date('d M,Y', $row['timestamp']);?></td>
					            <td align="center">
					            	<a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/modal_view_invoice/'.$row['invoice_id']);?>');"
					            		class="btn btn-default">
					            			<?php echo get_phrase('lihat_faktur');?>
					            	</a>
					            </td>
					        </tr>
					        <?php endforeach;?>
					    </tbody>
					</table>

				</div>

				<div class="tab-pane <?php if($active_tab == 'student_specific_payment_history') echo 'active'; ?>" id="paid_student_specific">

					<br>
					<?php echo form_open(site_url('admin/income/student_specific_payment_history/filter_history'));?>
						<div class="row">

							<div class="col-md-offset-4 col-md-3">
								<div class="form-group">
									<select name="student_id" class="form-control selectboxit">
										<option value="all" <?php if($student_id == 'all') echo 'selected'; ?>>
											<?php echo get_phrase('semua_siswa');?>
										</option>
										<?php
										$enrolls = $this->db->get_where('enroll', array('year' =>  $running_year))->result_array();
										print_r($enrolls);
										foreach($enrolls as $row) {
											$student_info = $this->db->get_where('student', array('student_id' =>  $row['student_id']))->row(); ?>
											<option value="<?php echo $row['student_id']; ?>" <?php if($student_id == $row['student_id']) echo 'selected'; ?>>
												<?php echo $student_info->name; ?>
											</option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-md-2">
								<button type="submit" class="btn btn-info" style="margin-top: 5px;"><?php echo get_phrase('cari');?></button>
							</div>

						</div>
					<?php echo form_close();?>

					<table class="table table-bordered datatable example">
					    <thead>
					        <tr>
					            <th><div>#</div></th>
					            <th><div><?php echo get_phrase('judul');?></div></th>
					            <th><div><?php echo get_phrase('deskripsi');?></div></th>
					            <th><div><?php echo get_phrase('metode_pembayaran');?></div></th>
					            <th><div><?php echo get_phrase('jumlah');?></div></th>
					            <th><div><?php echo get_phrase('tanggal');?></div></th>
					            <th></th>
					        </tr>
					    </thead>
					    <tbody>
					        <?php
				        	$count = 1;
				        	if($student_id != 'all')
				        		$this->db->where('student_id', $student_id);
				        	$this->db->where('payment_type' , 'income');
				        	$this->db->order_by('timestamp' , 'desc');
				        	$payments = $this->db->get('payment')->result_array();
				        	foreach ($payments as $row): ?>
						        <tr>
						            <td><?php echo $count++;?></td>
						            <td><?php echo $row['title'];?></td>
						            <td><?php echo $row['description'];?></td>
						            <td>
						            	<?php
						            		if ($row['method'] == 1)
						            			echo get_phrase('tunai');
						            		if ($row['method'] == 2)
						            			echo get_phrase('cek');
						            		if ($row['method'] == 3)
						            			echo get_phrase('kartu_kredit');
						                    if ($row['method'] == 'paypal')
						                    	echo 'paypal';
						            	?>
						            </td>
						            <td><?php echo $row['amount'];?></td>
						            <td><?php echo date('d M,Y', $row['timestamp']);?></td>
						            <td align="center">
						            	<a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/modal_view_invoice/'.$row['invoice_id']);?>');"
						            		class="btn btn-default">
						            			<?php echo get_phrase('lihat_faktur');?>
						            	</a>
						            </td>
						        </tr>
					        <?php endforeach; ?>
					    </tbody>
					</table>

				</div>

			</div>


	</div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function($)
	{

	});
</script>
