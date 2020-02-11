<style>
.links-list > .active > a,
.links-list > .active > a:hover,
.links-list > .active > a:focus {
  color: white;
  background: grey;
	padding-top: 27px;
	padding-bottom: 24px;
	padding-left: 5px;
	padding-right: 5px;
}
</style>
<div class="row" style="margin-left:0px; margin-right:0px; position:sticky;top:0px;z-index:999;">
	<!-- <div class="col-md-12 col-sm-12 clearfix" style="text-align:center;">
		<h2 style="font-weight:200; margin:0px;"><?php echo $system_name;?></h2>
    </div>
	 <li>
			<div class="input-group minimal" style="width: 300px;margin-left: 10px;">
				<span class="input-group-addon"><i class="entypo-search"></i></span>
				<input type="text" class="form-control" placeholder="Search student">
			</div>
		</li> -->
	<div class="col-md-12 col-sm-12 clearfix " style="background-color:#ffffff; box-shadow: 0px 10px 30px 0px rgba(82,63,105,0.08); border-radius: 5px;">
		<ul class="list-inline links-list pull-left" style="margin-top:8px;">
			<li>
				<img src="<?php echo base_url('uploads/logo.png');?>"  style="max-height:35px;margin-top: -9px;"/>
				<h4 style="display: inline; padding-left:5px; padding-right:5px; font-weight:bold;"> <?php echo $system_name;?></h4>
			</li>
			<?php if($this->session->userdata('login_type') == 'student'){
				if( $this->session->userdata('is_terima') != 1){ ?>
				<li class="<?php if ($page_name == 'dashboard') echo 'active'; ?>" style="display: inline; padding-left:5px; font-weight:bold;">
					<a href="<?php echo site_url($account_type.'/dashboard'); ?>">
							<i class="entypo-gauge"></i> <?php echo get_phrase('dashboard'); ?>
					</a>
				</li>
				<li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?>" style="display: inline; padding-left:5px; font-weight:bold;">
					<a href="<?php echo site_url($account_type.'/manage_profile'); ?>">
							<i class="entypo-user"></i> <?php echo get_phrase('data_diri'); ?>
					</a>
				</li>
			<?php } } ?>
		</ul>


<!--
		<ul class="list-inline links-list pull-left" style="margin-top:9px;">
			<li class="dropdown language-selector">
				<a href="<?php echo site_url('home');?>" target="_blank">
					<i class="entypo-globe"></i> Website
				</a>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                    <i class="entypo-user"></i>
					<?php
						$name = $this->db->get_where($this->session->userdata('login_type'), array($this->session->userdata('login_type').'_id' => $this->session->userdata('login_user_id')))->row()->name;
						echo $name;
					?>
                </a>

				<?php if ($account_type != 'parent'):?>
				<ul class="dropdown-menu <?php if ($text_align == 'right-to-left') echo 'pull-right'; else echo 'pull-left';?>">
					<li>
						<a href="<?php echo site_url($account_type . '/manage_profile');?>">
                        	<i class="entypo-info"></i>
<<<<<<< HEAD
<<<<<<< HEAD
							<span><?php echo get_phrase('edit_profil');?></span>
=======
							<span><?php echo get_phrase('ubah_profile');?></span>
>>>>>>> 6f0574d9aa071f001c926557b9ee2737919700db
=======
							<span><?php echo get_phrase('ubah_profile');?></span>
>>>>>>> 6f0574d9aa071f001c926557b9ee2737919700db
						</a>
					</li>
					<li>
						<a href="<?php echo site_url($account_type . '/manage_profile');?>">
                        	<i class="entypo-key"></i>
<<<<<<< HEAD
<<<<<<< HEAD
							<span><?php echo get_phrase('ganti_password');?></span>
=======
							<span><?php echo get_phrase('ubah_password');?></span>
>>>>>>> 6f0574d9aa071f001c926557b9ee2737919700db
=======
							<span><?php echo get_phrase('ubah_password');?></span>
>>>>>>> 6f0574d9aa071f001c926557b9ee2737919700db
						</a>
					</li>
				</ul>
				<?php endif;?>
				<?php if ($account_type == 'parent'):?>
				<ul class="dropdown-menu <?php if ($text_align == 'right-to-left') echo 'pull-right'; else echo 'pull-left';?>">
					<li>
						<a href="<?php echo site_url('parents/manage_profile');?>">
                        	<i class="entypo-info"></i>
<<<<<<< HEAD
<<<<<<< HEAD
							<span><?php echo get_phrase('edit_profil');?></span>
=======
							<span><?php echo get_phrase('ubah_profile');?></span>
>>>>>>> 6f0574d9aa071f001c926557b9ee2737919700db
=======
							<span><?php echo get_phrase('ubah_profile');?></span>
>>>>>>> 6f0574d9aa071f001c926557b9ee2737919700db
						</a>
					</li>
					<li>
						<a href="<?php echo site_url('parents/manage_profile');?>">
                        	<i class="entypo-key"></i>
<<<<<<< HEAD
<<<<<<< HEAD
							<span><?php echo get_phrase('ganti_password');?></span>
=======
							<span><?php echo get_phrase('ubah_password');?></span>
>>>>>>> 6f0574d9aa071f001c926557b9ee2737919700db
=======
							<span><?php echo get_phrase('ubah_password');?></span>
>>>>>>> 6f0574d9aa071f001c926557b9ee2737919700db
						</a>
					</li>
				</ul>
				<?php endif;?>
			</li>

			<li>
				<a href="<?php echo site_url('login/logout');?>">
					<?php echo get_phrase('keluar'); ?><i class="entypo-logout right"></i>
				</a>
			</li>
		</ul> -->

		<!-- Profile Info -->
		<ul class="user-info pull-right pull-none-xsm" style="margin-top: 6px;">
			<li class="profile-info dropdown pull-right"><!-- add class "pull-right" if you want to place this from right -->

				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img src="<?php echo $this->crud_model->get_image_url($account_type, $account_type_id);?>" alt="" class="img-circle" width="44">
					<?php
						$name = $this->db->get_where($account_type, array($account_type.'_id' => $this->session->userdata('login_user_id')))->row()->name;
						echo $name;
					?>

					<div style="margin-top: -15px;
							    font-size: 10px;
							    text-align: left;
							    padding-left: 53px;
							    color: #707696;">
						<p style="<?php if($this->session->userdata('login_type') == 'admin') echo'margin-top: 0px'; ?>"><?php echo $this->session->userdata('login_type');?></p>
					</div>
				</a>

				<ul class="dropdown-menu">

					<!-- Reverse Caret -->
					<li class="caret"></li>

					<!-- Profile sub-links -->
					<?php if($this->session->userdata('login_type') == 'student'){
						if( $this->session->userdata('is_terima') == 1){ ?>
					<li>
						<a href="<?php echo site_url($account_type . '/manage_profile');?>">
							<i class="flaticon-rotate"></i>
<<<<<<< HEAD
<<<<<<< HEAD
							<?php echo get_phrase('edit_profil');?>
=======
							<?php echo get_phrase('ubah_profile');?>
>>>>>>> 6f0574d9aa071f001c926557b9ee2737919700db
=======
							<?php echo get_phrase('ubah_profile');?>
>>>>>>> 6f0574d9aa071f001c926557b9ee2737919700db
						</a>
					</li>
				<?php } } else { ?>
					<li>
						<a href="<?php echo site_url($account_type . '/manage_profile');?>">
							<i class="flaticon-rotate"></i>
<<<<<<< HEAD
<<<<<<< HEAD
							<?php echo get_phrase('edit_profil');?>
=======
							<?php echo get_phrase('ubah_profile');?>
>>>>>>> 6f0574d9aa071f001c926557b9ee2737919700db
=======
							<?php echo get_phrase('ubah_profile');?>
>>>>>>> 6f0574d9aa071f001c926557b9ee2737919700db
						</a>
					</li>
				<?php } ?>
					<li>
						<a href="<?php echo site_url($account_type . '/manage_profile');?>">
							<i class="flaticon-lock"></i>
<<<<<<< HEAD
<<<<<<< HEAD
							<?php echo get_phrase('ganti_password');?>
=======
							<?php echo get_phrase('ubah_password');?>
>>>>>>> 6f0574d9aa071f001c926557b9ee2737919700db
=======
							<?php echo get_phrase('ubah_password');?>
>>>>>>> 6f0574d9aa071f001c926557b9ee2737919700db
						</a>
					</li>

					<li>
						<a href="<?php echo site_url('login/logout');?>">
							<i class="flaticon-paper-plane-1"></i>
							<?php echo get_phrase('keluar');?>
						</a>
					</li>

				</ul>
			</li>

		</ul>
	</div>

</div>

<hr style="margin-top:0px;" />

<script type="text/javascript">
	function get_session_changer()
	{
		$.ajax({
            url: '<?php echo site_url('admin/get_session_changer');?>',
            success: function(response)
            {
                jQuery('#session_static').html(response);
            }
        });
	}
</script>
