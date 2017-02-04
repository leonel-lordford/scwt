<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Santa Clara Walking Tour</title>
        <link href="<?php echo base_url("assets/bootstrap/css/bootstrap.css"); ?>" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div>&nbsp;</div>
                <div class="col-sm-4 col-sm-offset-4">
                    <?php
                        if(isset($name)) {
                            echo '<h3>Welcome back, <i>' . $name . '</i></h3>';
                        }
                        else {
                            echo validation_errors();

                            if(isset($wrong_captcha)) {
                                echo $wrong_captcha;
                            }

                            echo form_open('', 'class="text-center lead"');

                            if (isset($captcha)) {
                                echo '<div class="form-group">
                                    <label class="control-label" for="captcha">Enter captcha</label>';
                                    echo $captcha;
                                    echo '<input type="text" class="form-control" id="captcha" name="captcha" placeholder="Captcha">
                                    </div>';
                            }
                            echo '<button type="submit" class="btn" id="btn_submit">Login</button>
                                </form>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/holder.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/ie10-viewport-bug-workaround.js"); ?>"></script>
    </body>
</html>
