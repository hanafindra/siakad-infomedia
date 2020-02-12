<?php
	$edit_data	=	$this->db->get_where('payment' , array(
		'payment_id' => $param2
	))->result_array();
	foreach ($edit_data as $row):
?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_biaya');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(site_url('accountant/expense/edit/'. $row['payment_id']) , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('judul');?></label>

						<div class="col-sm-6">
							<input type="text" class="form-control" name="title" data-validate="required" data-message-required="<?php echo get_phrase('nilai_benar');?>"
							value="<?php echo $row['title'];?>" >
						</div>
					</div>

					<div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('kategori');?></label>
                        <div class="col-sm-6">
                            <select name="expense_category_id" class="form-control selectboxit" required>
                                <option value=""><?php echo get_phrase('pilih_kategori_biaya');?></option>
                                <?php
                                	$categories = $this->db->get('expense_category')->result_array();
                                	foreach ($categories as $row2):
                                ?>
                                <option value="<?php echo $row2['expense_category_id'];?>"
                                	<?php if ($row['expense_category_id'] == $row2['expense_category_id'])
                                		echo 'selected';?>>
                                			<?php echo html_escape($row2['name']);?>
                                				</option>
                            <?php endforeach;?>
                            </select>
                        </div>
                    </div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('deskripsi');?></label>

						<div class="col-sm-6">
							<input type="text" class="form-control" name="description" value="<?php echo $row['description'];?>" >
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('jumlah');?></label>

						<div class="col-sm-6">
							<input type="text" class="form-control" name="amount" value="<?php echo $row['amount'];?>"
                                data-validate="required" data-message-required="<?php echo get_phrase('nilai_benar');?>">
						</div>
					</div>

					<div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('metode_pembayaran');?></label>
                        <div class="col-sm-6">
                            <select name="method" class="form-control selectboxit">
                                <option value="1" <?php if ($row['method'] == 1) echo 'selected';?>><?php echo get_phrase('tunai');?></option>
                                <option value="2" <?php if ($row['method'] == 2) echo 'selected';?>><?php echo get_phrase('cek');?></option>
                                <option value="3" <?php if ($row['method'] == 3) echo 'selected';?>><?php echo get_phrase('kartu_kredit');?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('tanggal');?></label>
                        <div class="col-sm-6">
                            <input type="text" class="datepicker form-control" name="timestamp"
                            value="<?php echo date('d M,Y', $row['timestamp']);?>"
                                data-validate="required" data-message-required="<?php echo get_phrase('nilai_benar');?>" />
                        </div>
                    </div>

                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('perbarui');?></button>
						</div>
					</div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>
