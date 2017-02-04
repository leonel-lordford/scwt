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
                    echo "<h2>Editing <i>". $section_title ."</i></h2>";
                    echo "Go back to ". anchor("admin", "Main menu");
                }
                ?>
            </div>
            <div class="row"><hr></div>
            <div class="row">
                <?php
                    echo validation_errors();

                    if(isset($errors)) {
                        echo "<b>". $errors ."</p>";
                    }
                    else {
                        if(isset($data_saved)) {
                            echo "<b>". $data_saved ."</b>";
                        }
                    }

                    echo form_open_multipart('', 'class="text-center lead"');
                    echo form_hidden('id', $story->id);
                ?>
                <div class="form-group col-md-6">
                    <label class="control-label" for="title">Title</label>
                    <textarea class="form-control" rows="4" id="title" name="title"><?php echo $story->title; ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="summary">Summary</label>
                    <textarea class="form-control" rows="4" id="summary" name="summary"><?php echo $story->summary; ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="cover_image">Cover image</label>
                    <?php echo form_upload('cover_image'); ?>
                    <b>Accepted filetypes: gif jpg jpeg png</b>
                    <?php
                    $image_properties = array(
                        'src'    => $story->cover_image,
                        'class'  => 'img-responsive img-thumbnail',
                        'width'  => '256',
                        'height' => '256'
                    );
                    echo img($image_properties);
                    ?>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="external_link">See more link</label>
                    <textarea class="form-control" rows="2" id="external_link" name="external_link"><?php echo $story->external_link; ?></textarea>
                </div>
                <div class="form-group col-sm-12">
                    <button type="submit" class="btn" id="btn_submit">Save</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>

        <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/ie10-viewport-bug-workaround.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/admin.js"); ?>"></script>
    </body>
</html>