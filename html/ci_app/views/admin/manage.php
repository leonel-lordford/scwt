<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Santa Clara Walking Tour<?php if(isset($title)) echo " - " . $title; else echo " - Admin" ?></title>
        <link href="<?php echo base_url("assets/bootstrap/css/bootstrap.css"); ?>" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="row">&nbsp;</div>
            <div class="row">
                <?php
                if(isset($name)) {
                    echo "<h2>Welcome back, <i>". $name ."</i></h2>";
                    echo "When you're done, please ". anchor("admin/logout", "logout");
                }
                ?>
            </div>
            <div class="row"><hr></div>
            <div class="row">
                <p>Manage <a href="<?php echo site_url('admin/list/text'); ?>">static text</a></p>
                <p>Manage <a href="<?php echo site_url('admin/list/images'); ?>">static images</a></p>
                <p>Manage <a href="<?php echo site_url('admin/list/stories'); ?>">stories</a></p>
                <p>Manage <a href="<?php echo site_url('admin/list/friends'); ?>">friends comments</a></p>
            </div>
        </div>
        <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/ie10-viewport-bug-workaround.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/admin.js"); ?>"></script>
    </body>
</html>
