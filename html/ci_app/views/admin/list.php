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
                if(isset($section_title)) {
                    echo "<h2>Managing <i>". $section_title ."</i></h2>";
                    echo "Go back to ". anchor("admin", "Main menu");
                }
                ?>
            </div>
            <div class="row"><hr></div>
            <?php
                switch ($section_title) {
                    case 'Stories':
                        echo '<div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>List of stories (top 10)</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>';
                        foreach ($stories as $s) {
                            echo '<tr>
                                    <td>'. anchor('admin/edit/s/'. $s['id'], $s['title']) .'</td>
                                    <td>
                                        <span class="glyphicon glyphicon-trash" onclick="javascript:confirm_delete()"></span>
                                    </td>
                                </tr>';
                        }
                        echo '</tbody>
                            </table>
                        </div>';
                        break;
                }
            ?>
        </div>

        <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/ie10-viewport-bug-workaround.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/admin.js"); ?>"></script>
    </body>
</html>
<!--
icono de eliminar
<td>
'. anchor('admin/del/s/'. $s['id'], '<span class="glyphicon glyphicon-trash" onclick="javascript:confirm_delete()"></span>') .'
</td>

                                    -->
