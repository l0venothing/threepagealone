<?php  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Esther Roux Portfolio</title>
    <link rel="icon" href="<?php echo base_url('assets/img/iconpc.jpg');?>" />
    <link rel="stylesheet" href="<?= base_url('node_modules/bootstrap/dist/css/bootstrap.min.css');?>">

    <link rel="stylesheet" href="<?= base_url('node_modules/@jorgeinv/font-awesome-5.7.2/css/all.min.css');?>">
    <!-- <link rel="stylesheet" href="<?= base_url('node_modules/font-awesome/css/font-awesome.min.css');?>"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
     <link rel="stylesheet" href="<?= base_url('assets/css/skills.css'); ?>">
    <script  src="<?php echo base_url('node_modules/jquery/dist/jquery.min.js');?>" ></script>
    <script src="<?php echo base_url('node_modules/bootstrap/dist/js/bootstrap.min.js');?>" ></script>
    <script src="<?php echo base_url('node_modules/@jorgeinv/font-awesome-5.7.2/js/all.min.js');?>" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   
    <script src="<?php echo base_url('assets/js/main.js');?>"></script>

    <!-- Main Quill library -->
<!-- <script src="<?php echo base_url();?>assets/quill/quill.js"></script> -->
<script src="<?php echo base_url();?>assets/quill/quill.min.js"></script>
<!-- <script src="<?php echo base_url();?>assets/quill-image-resize-module-master/src/ImageResize.js"></script> -->
<script src="<?php echo base_url();?>assets/quill-image-resize-module-master/image-resize.min.js"></script>
<!-- Theme included stylesheets -->
<link href="<?php echo base_url();?>assets/quill/quill.snow.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/quill/quill.bubble.css" rel="stylesheet">
</head>
<body>
     <?php  $this->load->view('template/base/nav');  ?>
    <div class="container">
        <?= $view_content ?>
    </div>
    <?php  $this->load->view('template/footer/footer');  ?>
</body>
</html>