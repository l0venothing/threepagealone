<?php  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Esther Roux Learning Code Igniter</title>
    <link rel="stylesheet" href="<?= base_url('node_modules/bootstrap/dist/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?= base_url('node_modules/font-awesome/css/font-awesome.min.css');?>">
     <script src="base_url('node_modules/jquery/dist/jquery.min.js"></script>
    <script src="base_url('node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
     <?php  $this->load->view('template/base/nav');  ?>
    <div class="container">
        <?= $view_content ?>
    </div>
</body>
</html>