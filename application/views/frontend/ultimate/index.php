<?php
  $school_title = $this->frontend_model->get_frontend_general_settings('school_title');
  $theme        = $this->frontend_model->get_frontend_general_settings('theme');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>
      <?php echo $page_title; ?> | <?php echo $school_title;?>
    </title>

    <?php include 'metas.php';?>
    <?php include 'stylesheets.php';?>
  </head>
  <style>
  .modal-backdrop {
    z-index: 2;
  }
  .modal-dialog {
    z-index: 99;
  }
  </style>
  <body>
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <?php include $page_name . '.php';?>
    <!-- ========== HEADER ========== -->
    <?php if($page_name != 'home'){   ?>
    <header id="header" class="u-header u-header--bg-transparent u-header--white-nav-links-md u-header--sub-menu-dark-bg-md u-header--abs-top"
            data-header-fix-moment="500"
            data-header-fix-effect="slide">
      <div class="u-header__section">
        <div id="logoAndNav" class="container">
          <!-- <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space fixed-top"> -->
          <nav class="navbar navbar-expand-sm bg-light navbar-dark fixed-top" style="padding-top: 0px !important; padding-bottom: 0px !important;z">
              <?php include 'navigation.php';?>
          </nav>
        </div>
      </div>
    </header>
    <!-- ========== END HEADER ========== -->

    <?php } include 'footer.php';?>

    <?php include 'javascripts.php'; ?>

  </body>
</html>
