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
                        echo "<b>". $errors ."</p>";
                    }
                    else {
                        if(isset($data_saved)) {
                            echo "<b>". $data_saved ."</b>";
                        }
                    }

                    echo form_open('', 'class="text-center lead"');
                    echo form_hidden('id', $model->id);
                ?>
                <div class="form-group col-md-6">
                    <label class="control-label" for="overview">Overview heading</label>
                    <textarea class="form-control" rows="4" id="overview" name="overview"><?php echo $model->overview; ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="overview_welcome">Overview welcome</label>
                    <textarea class="form-control" rows="4" id="overview_welcome" name="overview_welcome"><?php echo $model->overview_welcome; ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="overview_transport">Overview transport</label>
                    <textarea class="form-control" rows="4" id="overview_transport" name="overview_transport"><?php echo $model->overview_transport; ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="overview_accommodation">Overview accommodation</label>
                    <textarea class="form-control" rows="4" id="overview_accommodation" name="overview_accommodation"><?php echo $model->overview_accommodation; ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="overview_tours">Overview tours</label>
                    <textarea class="form-control" rows="4" id="overview_tours" name="overview_tours"><?php echo $model->overview_tours; ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="stories">Stories heading</label>
                    <textarea class="form-control" rows="4" id="stories" name="stories"><?php echo $model->stories; ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="friends">Friends heading</label>
                    <textarea class="form-control" rows="4" id="friends" name="friends"><?php echo $model->friends; ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="address">Address</label>
                    <textarea class="form-control" rows="4" id="address" name="address"><?php echo $model->address; ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="phone">Phone</label>
                    <textarea class="form-control" rows="4" id="phone" name="phone"><?php echo $model->phone; ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="email">Email</label>
                    <textarea class="form-control" rows="4" id="email" name="email"><?php echo $model->email; ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="contact_info_yanet">Contact info: Yanet</label>
                    <textarea class="form-control" rows="4" id="contact_info_yanet" name="contact_info_yanet"><?php echo $model->contact_info_yanet; ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="contact_info_abel">Contact info: Abel</label>
                    <textarea class="form-control" rows="4" id="contact_info_abel" name="contact_info_abel"><?php echo $model->contact_info_abel; ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="contact_info_jane">Contact info: Jane</label>
                    <textarea class="form-control" rows="4" id="contact_info_jane" name="contact_info_jane"><?php echo $model->contact_info_jane; ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="transport">Transport heading</label>
                    <textarea class="form-control" rows="4" id="transport" name="transport"><?php echo $model->transport; ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="accommodation">Accommodation heading</label>
                    <textarea class="form-control" rows="4" id="accommodation" name="accommodation"><?php echo $model->accommodation; ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="tours">Tours heading</label>
                    <textarea class="form-control" rows="4" id="tours" name="tours"><?php echo $model->tours; ?></textarea>
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
