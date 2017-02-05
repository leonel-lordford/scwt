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
        <link href="<?php echo base_url("assets/css/admin.css"); ?>" rel="stylesheet">
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
            <div class="row">
                <?php
                    if(isset($errors)) {
                        echo '<div class="alert alert-error alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <strong>' . $errors . '</strong>
                                </div>';
                    }
                    else {
                        if(isset($data_saved)) {
                            echo '<div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <strong>' . $data_saved . '</strong>
                                </div>';
                        }
                    }
                ?>
            </div>
            <?php
                switch ($section_title) {
                    case 'Stories':
                        echo anchor('admin/add/s', 'New story');
                        echo '<div class="row"><hr></div>';
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
                                    <td>'. form_open('admin/del/s/') . form_hidden('id', $s['id']) .'
                                        <span class="hand glyphicon glyphicon-trash" data-toggle="modal" data-target="#confirm"></span>
                                        <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="confirm_label" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="confirm_label">Confirm</h4>
                                              </div>
                                              <div class="modal-body">
                                                Delete story <b>"'. $s['title'] .'"</b>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        '. form_close() .'
                                    </td>
                                </tr>';
                        }
                        echo '</tbody>
                            </table>
                        </div>';
                        break;
                        case 'Friends':
                        echo anchor('admin/add/c', 'New comment');
                        echo '<div class="row"><hr></div>';
                        echo '<div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>List of friend comments (top 10)</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>';
                        foreach ($comments as $c) {
                            echo '<tr>
                                    <td>'. anchor('admin/edit/c/'. $c['id'], $c['author'] . " - " . word_limiter($c['opinion'], 10)) .'</td>
                                    <td>'. form_open('admin/del/c/') . form_hidden('id', $c['id']) .'
                                        <span class="hand glyphicon glyphicon-trash" data-toggle="modal" data-target="#confirm"></span>
                                        <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="confirm_label" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="confirm_label">Confirm</h4>
                                              </div>
                                              <div class="modal-body">
                                                Delete story <b>"'. $c["author"] . " - " . word_limiter($c["opinion"], 10) .'"</b>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        '. form_close() .'
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
