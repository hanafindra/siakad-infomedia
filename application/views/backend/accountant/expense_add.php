<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('tambah_biaya');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(site_url('accountant/expense/create/'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('judul');?></label>

						<div class="col-sm-6">
							<input type="text" class="form-control" name="title" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="" autofocus>
						</div>
					</div>

					<div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('kategori');?></label>
                        <div class="col-sm-6">
                            <select name="expense_category_id" id = 'expense_category_id' class="form-control selectboxit">
                                <option value=""><?php echo get_phrase('pilih_kategori_biaya');?></option>
                                <?php
                                	$categories = $this->db->get('expense_category')->result_array();
                                	foreach ($categories as $row):
                                ?>
                                <option value="<?php echo $row['expense_category_id'];?>"><?php echo html_escape($row['name']);?></option>
                            <?php endforeach;?>
                            </select>
                        </div>
                    </div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('deskripsi');?></label>

						<div class="col-sm-6">
							<input type="text" class="form-control" name="description" value="" >
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('jumlah');?></label>

						<div class="col-sm-6">
							<input type="text" class="form-control" name="amount" value=""
                                data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
						</div>
					</div>

					<div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('metode_pembayaran');?></label>
                        <div class="col-sm-6">
                            <select name="method" class="form-control selectboxit">
                                <option value="1"><?php echo get_phrase('tunai');?></option>
                                <option value="2"><?php echo get_phrase('cek');?></option>
                                <option value="3"><?php echo get_phrase('kartu kredit');?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('tanggal');?></label>
                        <div class="col-sm-6">
                            <input type="text" class="datepicker form-control" name="timestamp"
                                data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                        </div>
                    </div>

                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" id = 'submit' class="btn btn-info"><?php echo get_phrase('tambah_biaya');?></button>
						</div>
					</div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>
<script type = 'text/javascript'>
                var expense_category_id = '';
                jQuery(document).ready(function($) {
                    $("#submit").attr('disabled', 'disabled');
                });

                function check_validation(){
                    if(expense_category_id !== ''){
                        $('#submit').removeAttr('disabled');
                    }
                    else{
                        $("#submit").attr('disabled', 'disabled');
                    }
                }
                $('#expense_category_id').change(function(){
                    expense_category_id = $('#expense_category_id').val();
                    check_validation();
                });
            </script>
