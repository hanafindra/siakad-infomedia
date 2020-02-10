<?php
  $header_logo  = $this->frontend_model->get_frontend_general_settings('header_logo');
  $system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row('description');
?>
  <div class="u-header-center-aligned-nav__col">
    <!-- Logo -->
    <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center u-header__navbar-brand-text-white" href="<?php echo site_url('home');?>">
      <img src="<?php echo base_url();?>uploads/frontend/<?php echo $header_logo;?>"
        style="height:35px; width:35px;" />
      <span class="u-header__navbar-brand-text text-black"><?php echo $system_name; ?></span>
    </a>
    <!-- Responsive Toggle Button -->
    <button type="button" class="navbar-toggler btn u-hamburger u-hamburger--white text-black"
            aria-label="Toggle navigation"
            aria-expanded="false"
            aria-controls="navBar"
            data-toggle="collapse"
            data-target="#navBar">
      <span id="hamburgerTrigger" class="u-hamburger__box">
        <span class="u-hamburger__inner"></span>
      </span>
    </button>
  </div>

  <!-- Navigation -->
  <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
    <ul class="navbar-nav u-header__navbar-nav">
      <li class="nav-item u-header__nav-item <?php if($page_name == 'home') echo 'active';?>">
        <a class="nav-link u-header__nav-link text-black"
          href="<?php echo site_url('home');?>">Beranda</a>
      </li>
      <!-- <li class="nav-item u-header__nav-item <?php if($page_name == 'noticeboard' || $page_name == 'notice_details') echo 'active';?>">
        <a class="nav-link u-header__nav-link text-black"
          href="<?php echo site_url('home/noticeboard');?>">Noticeboard</a>
      </li> -->
      <li class="nav-item u-header__nav-item <?php if($page_name == 'event') echo 'active';?>">
        <a class="nav-link u-header__nav-link text-black "
          href="<?php echo site_url('home/events');?>">Acara</a>
      </li>
      <li class="nav-item u-header__nav-item <?php if($page_name == 'teacher') echo 'active';?>">
        <a class="nav-link u-header__nav-link text-black"
          href="<?php echo site_url('home/teachers');?>">Guru</a>
      </li>
      <li class="nav-item u-header__nav-item <?php if($page_name == 'gallery' || $page_name == 'gallery_view') echo 'active';?>">
        <a class="nav-link u-header__nav-link text-black"
          href="<?php echo site_url('home/gallery');?>">Galeri</a>
      </li>
      <!-- <li class="nav-item u-header__nav-item <?php if($page_name == 'about') echo 'active';?>">
        <a class="nav-link u-header__nav-link text-black"
          href="<?php echo site_url('home/about');?>">Profil</a>
      </li> -->
      <li class="nav-item u-header__nav-item <?php if($page_name == 'contact') echo 'active';?>">
        <a class="nav-link u-header__nav-link text-black"
          href="<?php echo site_url('home/contact');?>">Kontak</a>
      </li>
      <li class="nav-item u-header__nav-item <?php if($page_name == 'contact') echo 'active';?>">
        <button type="button" id="masuk" onclick="toggleView(this)" class="btn btn-rounded btn-primary" data-toggle="modal" data-target="#masukModal" data-backdrop="static" data-keyboard="false">Masuk</button>
        <!-- <a href="<?php echo site_url('login');?>" type="button" class="btn btn-rounded btn-primary">Masuk</a> -->
      </li>
      <li class="nav-item u-header__nav-item <?php if($page_name == 'contact') echo 'active';?>" style="padding-left:5px;">
        <button type="button" id="daftar" onclick="toggleView(this)" class="btn btn-rounded btn-warning" data-toggle="modal" data-target="#masukModal">Daftar</button>
      </li>

    </ul>
  </div>
  <!-- End Navigation -->

  <!-- Modal -->
  <div class="modal fade" id="masukModal" tabindex="99">
    <div class="modal-dialog modal-lg" style="padding:0px;">
      <div class="modal-content" style="">
        <!-- <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> -->
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-6 col-md-6 login-fancy-bg bg-overlay-black-10" style="background: url(<?php echo base_url();?>assets/login/login_bg.jpg);">
                    <div class="login-fancy pos-r">
                        <div class="text-center">
                            <div style="padding: 65px;" class="d-none d-md-block"></div>
                            <img src="<?php echo base_url().'uploads/logo.png'; ?>" height="25" />
                            <h2 class="text-white mb-20"></h2>
                            <h4 class="text-white mb-20"><?php echo get_settings('system_name');?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 white-bg">
                    <div class="login-fancy pb-40 clearfix" id = "login_area">
                        <h3 class="mb-30"><?php echo get_phrase('masuk'); ?></h3>
                        <form method="post" class="mb-5" id="form_login">
                            <div class="section-field mb-5">
                                <label  for="name"><?php echo get_phrase('email'); ?>* </label>
                                <input id="email" class="web form-control" type="email" placeholder="<?php echo get_phrase('email'); ?>" name="email" required>
                            </div>
                            <div class="section-field mb-5">
                                <label for="Password"><?php echo get_phrase('password'); ?>* </label>
                                <input id="Password" class="Password form-control" type="password" placeholder="<?php echo get_phrase('password'); ?>" name="password" required>
                            </div>
                            <button type="button" class="btn btn-rounded btn-primary" id="btn_masuk"><?php echo get_phrase('masuk'); ?></button>
                            <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><?php echo get_phrase('tutup'); ?></button>
                        </form>

                        <div class="section-field mb-5">
                            <div class="remember-checkbox mb-30">
                                <a href="#" class="float-right" id="forgot_password_button" onclick="toggleView(this)"><?php echo get_phrase('lupa password'); ?>?</a>
                                <a href="#" class="float-left" id="daftar" onclick="toggleView(this)"><i class="entypo-left-open"></i>Daftar</a>
                            </div>
                        </div>
                    </div>

                    <div class="login-fancy pb-40 clearfix" id = "forgot_password_area" style="display: none;">
                        <h3 class="mb-5"><?php echo get_phrase('lupa password'); ?></h3>
                        <form class="mb-5" action="<?php echo site_url('login/reset_password');?>" method="post">
                            <div class="section-field mb-5">
                                <label for="name"><?php echo get_phrase('email'); ?>* </label>
                                <input id="forgot_password_email" class="web form-control" type="email" placeholder="<?php echo get_phrase('email'); ?>" name="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary"><?php echo get_phrase('kirim'); ?></button>
                        </form>

                        <div class="section-field">
                            <div class="remember-checkbox mb-5">
                                <a href="#" class="float-right" id = "login_button" onclick="toggleView(this)"><?php echo get_phrase('kembali masuk'); ?>?</a>
                            </div>
                        </div>
                    </div>

                    <div class="login-fancy pb-40 clearfix" id="register_area" style="display: none;">
                        <h3 class="mb-30"><?php echo get_phrase('Daftar'); ?></h3>
                        <form id="form_register" method="post" class="mb-5">
                          <div class="section-field mb-5">
                              <label  for="name"><?php echo get_phrase('nama lengkap'); ?>* </label>
                              <input id="nama" class="web form-control" type="text" placeholder="<?php echo get_phrase('nama lengkap'); ?>" name="nama" required>
                          </div>
                            <div class="section-field mb-5">
                                <label  for="name"><?php echo get_phrase('email'); ?>* </label>
                                <input id="email_regis" class="web form-control" type="email" placeholder="<?php echo get_phrase('email'); ?>" name="email" required>
                            </div>
                            <div class="section-field mb-5">
                                <label for="Password"><?php echo get_phrase('password'); ?>* </label>
                                <input id="Password" class="Password form-control" type="password" placeholder="<?php echo get_phrase('password'); ?>" name="password" required>
                            </div>
                            <button type="button" class="btn btn-rounded btn-primary" id="btn_daftar"><?php echo get_phrase('daftar'); ?></button>
                            <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><?php echo get_phrase('tutup'); ?></button>
                        </form>

                        <div class="section-field mb-5">
                            <div class="remember-checkbox mb-30">
                                <a href="#" class="float-right" id="forgot_password_button" onclick="toggleView(this)"><?php echo get_phrase('lupa password'); ?>?</a>
                                <a href="#" class="float-left" id="masuk" onclick="toggleView(this)"><i class="entypo-left-open"></i>Masuk</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
      </div>
    </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function(){
    $("#masukModal").appendTo("body");
    $("#btn_daftar").click(function(){
      swal({
        title: "Apakah data yang anda masukkan sudah benar?",
        text: "Karena anda tidak akan dapat mendaftar dengan email yang sama!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
              type: "POST",
              url: <?php base_url();?>'/siakad/register',
              data: $("#form_register").serialize(),
              dataType: 'json',
              beforeSend: function(){
                $.blockUI({ message: '<div class="col-md-12" style="text-align:center;">\
                                          <center><div class="loader"></div></center>\
                                          <h5>Please Wait..</h5>\
                                      </div>',
                            css: {  background:'grey', 'border-radius':'10px', padding : '5px' }
                          });
              },
              success: function(result) {
                if(status == 'success'){
                  toastr.success(result.message, result.status, {timeOut: 5000})
                } else {
                  toastr.warning(result.message, result.status, {timeOut: 5000})
                }
                $.unblockUI();
              },
              error: function() {
                console.log("error");
                swal("Terjadi kesalahan, silahkan hubungi admin", {icon: "warning"});
                $.unblockUI();
              }
          });
        }
        else { swal("Lah kok gak jadi daftar?");}
      });
      });

      $("#btn_masuk").click(function(){
        $.ajax({
            type: "POST",
            url: <?php base_url();?>'/siakad/login/validate_login',
            data: $("#form_login").serialize(),
            dataType: 'json',
            beforeSend: function(){
              $.blockUI({ message: '<div class="col-md-12" style="text-align:center;">\
                                        <center><div class="loader"></div></center>\
                                        <h5>Please Wait..</h5>\
                                    </div>',
                          css: {  background:'grey', 'border-radius':'10px', padding : '5px' }
                        });
            },
            success: function(result) {
              var status = result.status;
              if(status == 'success'){
                toastr.success(result.message, 'Berhasil masuk', {timeOut: 5000})
              } else {
                toastr.warning(result.message, 'Gagal masuk', {timeOut: 5000})
              }

              if(result.status == 'success'){window.location = result.redirect;}
              $.unblockUI();
            },
            error: function() {
              console.log("error");
              swal("Terjadi kesalahan, silahkan hubungi admin", {icon: "warning"});
                // toastr.error('We do have the Kapua suite available.', 'Turtle Bay Resort', {timeOut: 5000})
              // $.unblockUI();
            }
        });
      });
    });
    function toggleView(elem) {
        if (elem.id === 'forgot_password_button') {
            $('#login_area').hide();
            $('#forgot_password_area').show();
            $('#register_area').hide();
        }else if (elem.id === 'login_button' || elem.id === 'masuk') {
            $('#login_area').show();
            $('#forgot_password_area').hide();
            $('#register_area').hide();
        }else if (elem.id === 'register_area' || elem.id === 'daftar') {
            $('#register_area').show();
            $('#forgot_password_area').hide();
            $('#login_area').hide();
        }
    }
  </script>
