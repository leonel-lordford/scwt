<div class="row text-center" id="contact">
    <div class="row text-center">
        <div class="container">
            <div>
                <h1 class="section-title">Contact us</h1>
                <span>Know more about our family and contact us if you want.</span>
            </div>
            <hr class="featurette-divider">
        </div>
    </div>
    <div class="container">
        <div class="row section-container">
            <div class="col-sm-4">
                <img src="<?php if (isset($contact_img_yanet)) echo 'data:image/jpg;base64,'. $contact_img_yanet; ?>" alt="Yanet's contact image" width="256" height="256" class="img-responsive img-thumbnail">
                <h2>Yanet</h2>
                <p><?php if (isset($contact_info_yanet)) echo $contact_info_yanet; else echo "Yanet"; ?></p>
                <p></p>
            </div>
            <div class="col-sm-4">
                <img src="<?php if (isset($contact_img_abel)) echo 'data:image/jpg;base64,'. $contact_img_abel; ?>" alt="Abel's contact image" width="256" height="256" class="img-responsive img-thumbnail">
                <h2>Abel</h2>
                <p><?php if (isset($contact_info_abel)) echo $contact_info_abel; else echo "Abel"; ?></p>
                <p></p>
            </div>
            <div class="col-sm-4">
                <img src="<?php if (isset($contact_img_jane)) echo 'data:image/jpg;base64,'. $contact_img_jane; ?>" alt="Jane's contact image" width="256" height="256" class="img-responsive img-thumbnail">
                <h2>Jane</h2>
                <p><?php if (isset($contact_info_jane)) echo $contact_info_jane; else echo "Jane"; ?></p>
                <p></p>
            </div>
        </div>
        <div class="row">
            <div class="row" id="contact-form">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="clearfix">
                        <h3><span class="fa fa-map-marker"></span></h3>
                        <span><?php if (isset($address)) echo $address; else echo "Address"; ?></span>
                    </div>
                    <div class="clearfix">
                        <h3><span class="fa fa-phone-square"></span></h3>
                        <span><?php if (isset($phone)) echo "<a href='tel:". $phone ."'>" . $phone ; else echo "Phone"; echo "</a>"?></span>
                    </div>
                    <div class="clearfix">
                        <h3><span class="fa fa-envelope"></span></h3>
                        <span><a href="mailto:info@santaclarawalkingtour.com?subject=About Santa Clara Walking Tour">info@santaclarawalkingtour.com</a></span>
                    </div>
                    <ul class="social-link list-inline">
                        <li class="facebook">
                            <a href="http://facebook.com/santaclarawalkingtour"><span class="fa fa-facebook-square fa-2x"></span></a>
                        </li>
                        <li class="twitter">
                            <a href="http://twitter.com/santaclarawalkingtour"><span class="fa fa-twitter-square fa-2x"></span></a>
                        </li>
                        <li class="gplus">
                            <a href="http://plus.google.com/santaclarawalkingtour"><span class="fa fa-google-plus-square fa-2x"></span></a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-offset-1 col-sm-4">
                    <span class="help-block"><i class="fa fa-pencil-square">&nbsp;</i>Contact us</span>
                    <form role="form" name="form_message">
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" name="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control input-lg" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <textarea name="message" class="form-control input-lg" placeholder="Comment or question" rows="5"></textarea>
                        </div>
                        <button class="btn btn-default" type="submit" id="btn_send">
                            <i class="fa fa-save">&nbsp;</i>Send message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>