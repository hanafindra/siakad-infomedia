<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('daftar_trasportasi');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>
        
	
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
                <table class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div><?php echo get_phrase('rute');?></div></th>
                    		<th><div><?php echo get_phrase('nomor_kendaraan');?></div></th>
                    		<th><div><?php echo get_phrase('deskripsi');?></div></th>
                    		<th><div><?php echo get_phrase('tarif');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($transports as $row):?>
                        <tr>
							<td><?php echo $row['route_name'];?></td>
							<td><?php echo $row['number_of_vehicle'];?></td>
							<td><?php echo $row['description'];?></td>
							<td><?php echo $row['route_fare'];?></td>
							
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS-->
            
            
			
            
		</div>
	</div>
</div>