<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Restoran</title>
      <meta name="keywords" content="Profile">
      <meta name="description" content="Profile">
      <link rel="shortcut icon" href="<?php echo assets_url(); ?>images/fav-icon.png"/>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="<?php echo assets_url(); ?>admin/css/themify-icons.css">
      <link rel="stylesheet" href="<?php echo assets_url(); ?>admin/css/metisMenu.css">
      <link rel="stylesheet" href="<?php echo assets_url(); ?>admin/css/slicknav.min.css">
      <link rel="stylesheet" href="<?php echo assets_url(); ?>admin/css/typography.css">
      <link rel="stylesheet" href="<?php echo assets_url(); ?>admin/css/slicknav.min.css">
      <link rel="stylesheet" href="<?php echo assets_url(); ?>admin/css/default-css.css">
      <link rel="stylesheet" href="<?php echo assets_url(); ?>admin/css/styles.css">
      <link rel="stylesheet" href="<?php echo assets_url(); ?>admin/css/responsive.css">
   </head>
   <body>
      <form action="<?php echo site_url('admin/login/do_login'); ?>" method="post">
      <section class="white-section login-sec" style="background:url(<?= assets_url()?>admin/images/login-page-img.jpg)">
         <div class="col-12">
            <div class="col-md-6 mx-auto">
               <div class="login-sec-total">
                  <div class="admin-logo">
                     <img src="<?php echo assets_url(); ?>admin/images/login-page-img.jpg">
                  </div>
                  
                  <h1 class="text-center">Admin Login</h1>
                  <?php if($this->session->flashdata('error_msg')!=""){ ?>
                  <div class="alert alert-danger" role="alert">
                     <?php echo $this->session->flashdata('error_msg'); ?>
                  </div>
                  <?php } ?>
                  <div class="form-group mt-4">
                     <label for="login_email">Email Id</label>
                     <br />
                     <div class="input-group">
                        <input type="text" placeholder="enter your email" name="email">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="login_password">Password</label>
                     <br />
                     <div class="input-group">
                        <input type="text" placeholder="enter your password" name="password">
                     </div>
                  </div>
                  <br><br>
                    <button type="submit" class="btn btn-default">Submit</button>
               </div>
               
            </div>
         </div>
      </section>
    </form>
      <script src="<?php echo assets_url(); ?>admin/js/jquery-3.5.1.min.js"></script>
      <script src="<?php echo assets_url(); ?>bootstrap/js/popper.min.js"></script>
      <script src="<?php echo assets_url(); ?>bootstrap/js/bootstrap.min.js"></script>
      <script src="<?php echo assets_url(); ?>admin/js/metisMenu.min.js"></script>
      <script src="<?php echo assets_url(); ?>admin/js/jquery.slimscroll.min.js"></script>
      <script src="<?php echo assets_url(); ?>admin/js/jquery.slicknav.min.js"></script>
      <script src="<?php echo assets_url();?>sweetalert/sweetalert2.min.js"></script>
      <script src="<?php echo assets_url(); ?>admin/js/jquery.blockUI.js"></script>
      <script src="<?php echo assets_url(); ?>admin/js/plugins.js"></script>
   </body>
</html>