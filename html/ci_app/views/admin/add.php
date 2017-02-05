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
                    echo "<h2>Adding <i>". $section_title ."</i></h2>";
                    echo "Go back to ". anchor("admin", "Main menu");

                    switch ($section_title) {
                        case 'Stories':
                            echo " | Go back to ". anchor("admin/list/stories", "Stories");
                        break;
                        case 'Friends':
                            echo " | Go back to ". anchor("admin/list/friends", "Friends");
                        break;
                    }
                }
                ?>
            </div>
            <div class="row"><hr></div>
            <div class="row">
                <?php
                    echo validation_errors();

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
                <?php
                if(isset($story)) {
                    echo form_open_multipart('', 'id="form_story" class="text-center lead"');
                ?>
                <div class="form-group col-md-6">
                    <label class="control-label" for="title">Title</label>
                    <span class="hidden error" id="title_error">* enter a valid title</span>
                    <textarea class="form-control" rows="4" id="title" name="title"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="summary">Summary</label>
                    <span class="hidden error" id="summary_error">* enter a valid summary</span>
                    <textarea class="form-control" rows="4" id="summary" name="summary"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="cover_image">Cover image</label>
                    <span class="hidden error" id="cover_image_error">* select a valid image</span>
                    <?php echo form_upload('cover_image', "", 'id="cover_image"'); ?>
                    <b>Accepted filetypes: gif jpg jpeg png</b>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="external_link">See more link</label>
                    <span class="hidden error" id="external_link_error">* enter a valid link</span>
                    <textarea class="form-control" rows="2" id="external_link" name="external_link"></textarea>
                </div>
                <div class="form-group col-sm-12">
                    <button type="submit" class="btn" id="btn_submit">Save</button>
                </div>
                <?php echo form_close(); ?>
                <?php
                }
                else {
                if(isset($comment)) {
                    echo form_open_multipart('', 'id="form_comment" class="text-center lead"');
                ?>
                <div class="form-group col-md-6">
                    <label class="control-label" for="author">Author</label>
                    <span class="hidden error" id="author_error">* enter a valid author</span>
                    <textarea class="form-control" rows="2" id="author" name="author"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="opinion">Opinion</label>
                    <span class="hidden error" id="opinion_error">* enter a valid opinion</span>
                    <textarea class="form-control" rows="4" id="opinion" name="opinion"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="image">Image</label>
                    <span class="hidden error" id="image_error">* select a valid image</span>
                    <?php echo form_upload('image', "", 'id="image"'); ?>
                    <b>Accepted filetypes: gif jpg jpeg png</b>
                </div>
                <div class="form-group col-sm-12">
                    <button type="submit" class="btn" id="btn_submit">Save</button>
                </div>
                <?php echo form_close(); ?>
                <?php
                    } // if ($comment)
                } // if ($story)
                ?>
            </div>
        </div>

        <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/ie10-viewport-bug-workaround.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/admin.js"); ?>"></script>
    </body>
</html>
