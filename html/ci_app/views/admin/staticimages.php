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
            <div class="row">
                <?php
                    echo validation_errors();

                    if(isset($errors)) {
                        echo "<b>Operation failed, please try again.</p>";
                    }
                    else {
                        if(isset($data_saved)) {
                            echo "<b>". $data_saved ."</b>";
                        }
                    }

                    echo form_open_multipart();
                    echo "<p>Select the image you want to change</p>";
                    echo form_hidden('id', $model->id);
                    $options = array(
                        'overview_img_welcome' => 'Overview welcome',
                        'overview_img_transport' => 'Overview transport',
                        'overview_img_accommodation' => 'Overview accommodation',
                        'overview_img_tours' => 'Overview tours',
                        'contact_img_yanet' => 'Contact image: Yanet',
                        'contact_img_abel' => 'Contact image: Abel',
                        'contact_img_jane' => 'Contact image: Jane'
                    );
                    echo form_dropdown('selected_image', $options);
                    echo form_upload('new_image');
                    echo "<p><b>Accepted filetypes: gif jpg jpeg png</b></p>";
                    echo '<button type="submit" class="btn" id="btn_submit">Save</button>';
                    echo form_close();
                ?>
                <div>&nbsp;</div>
                <div class="col-md-3">
                    <p>Overview welcome</p>
                    <?php
                    $image_properties = array(
                        'src'    => $model->overview_img_welcome,
                        'class'  => 'img-responsive img-thumbnail',
                        'width'  => '256',
                        'height' => '256'
                    );
                    echo img($image_properties);
                    ?>
                </div>
                <div class="col-md-3">
                    <p>Overview transport</p>
                    <?php
                    $image_properties = array(
                        'src'    => $model->overview_img_transport,
                        'class'  => 'img-responsive img-thumbnail',
                        'width'  => '256',
                        'height' => '256'
                    );
                    echo img($image_properties);
                    ?>
                </div>
                <div class="col-md-3">
                    <p>Overview accommodation</p>
                    <?php
                    $image_properties = array(
                        'src'    => $model->overview_img_accommodation,
                        'class'  => 'img-responsive img-thumbnail',
                        'width'  => '256',
                        'height' => '256'
                    );
                    echo img($image_properties);
                    ?>
                </div>
                <div class="col-md-3">
                    <p>Overview tours</p>
                    <?php
                    $image_properties = array(
                        'src'    => $model->overview_img_tours,
                        'class'  => 'img-responsive img-thumbnail',
                        'width'  => '256',
                        'height' => '256'
                    );
                    echo img($image_properties);
                    ?>
                </div>
                <div>&nbsp;</div>
                <div class="col-md-3">
                    <p>Contact image: Yanet</p>
                    <?php
                    $image_properties = array(
                        'src'    => $model->contact_img_yanet,
                        'class'  => 'img-responsive img-thumbnail',
                        'width'  => '256',
                        'height' => '256'
                    );
                    echo img($image_properties);
                    ?>
                </div>
                <div class="col-md-3">
                    <p>Contact image: Abel</p>
                    <?php
                    $image_properties = array(
                        'src'    => $model->contact_img_abel,
                        'class'  => 'img-responsive img-thumbnail',
                        'width'  => '256',
                        'height' => '256'
                    );
                    echo img($image_properties);
                    ?>
                </div>
                <div class="col-md-3">
                    <p>Contact image: Jane</p>
                    <?php
                    $image_properties = array(
                        'src'    => $model->contact_img_jane,
                        'class'  => 'img-responsive img-thumbnail',
                        'width'  => '256',
                        'height' => '256'
                    );
                    echo img($image_properties);
                    ?>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/ie10-viewport-bug-workaround.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/admin.js"); ?>"></script>
    </body>
</html>
