<h3>Contact</h3>
<div class="row text-center">
    <div class="col-xs-6 form-contact contenu "> 
    <?php echo validation_errors("<p class='alert alert-dissmissable alert-danger'>"); ?>
    <form action="<?php echo base_url('Contact/contact_form'); ?>" method="POST" class="form-horizontal contenu-contact" role="form">
                <div class="form-group">
                    <div class="col-md-6">
                        <input type="text" name="nom" value="Votre Nom" id="contact-nom" placeholder="Votre nom" class="form-control input-contact"
                            style="width: 100%;">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="email" value="Votre adresse email" id="contact-email" placeholder="Votre email" class="form-control input-contact"
                            style="width: 100%;">
                    </div>
                    <div class="col-md-12 contenu-contact">
                        <textarea name="message" value="Votre message" rows="10" type="text" class="form-control" placeholder="Votre message"></textarea>
                    </div>
                    <div class="col-md-6">
                        <div class="g-recaptcha Captcha" data-sitekey="6Lc-ciIUAAAAABvG3Am8WEGWiB6RtcadyBXiYOPv"></div>
                    </div>
                    <div class="col-md-5 col-ms-offset-1 pull-right envoyer">
                        <div class="Sub-Btn">
                            <input type="submit" class="btn btn-large btn-block btn-danger btnContact" value="Envoyer">
                        </div>
                    </div>
                </div>
            </form>
    </div>  
</div>