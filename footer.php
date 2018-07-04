




<!-- footer -->
<footer class="footer" role="contentinfo">
    <div class="container">
        <p>
            &copy; <?php echo date('Y'); ?>  <?php bloginfo('name'); ?> | Website by <a href="//webfactor.ch" title="Webfactor">Webfactor</a>

            <?php if(is_user_logged_in()) : ?>
                 | <a class="logout" href="<?php echo wp_logout_url( site_url('/')  ); ?>">Déconnexion</a>
            <?php else: ?>
                 | <a class="login" href="<?php echo  site_url('/login'); ?>">Connexion Membres</a>
            <?php endif; ?>
        </p>

    </div>
    <div id="footer_bg"></div>
</footer>
<!-- /footer -->














			<?php if(!is_user_logged_in()) : ?>
				<div class="loginformcontainer">
					<div>
						<div class="loginform black_box insideform">
							<h3>Connexion</h3>
							<?php wp_login_form(); ?>
							<p class="forgottenpassword">- Mot de passe oublié -</p>
						</div>
					</div>

					<div class="lostpasswd black_box insideform">
						<h3>Mot de passe oublié</h3>
						<p>Entrez votre adresse email pour recevoir votre nouveau mot de passe</p>
						<form method="post" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="wp-user-form">
							<div class="username">
								<label for="user_login" class="hide"><?php _e('Username or Email'); ?>: </label>
								<input type="text" name="user_login" value="" size="20" id="user_login" tabindex="1001" />
							</div>
							<div class="login_fields">
								<?php do_action('login_form', 'resetpass'); ?>
								<input type="submit" name="user-submit" value="<?php _e('Réinitialiser mon mot de passe'); ?>" class="user-submit" tabindex="1002" />
								<?php $reset = $_GET['reset']; if($reset == true) { echo '<p>Un message a été envoyé sur votre adresse email.</p>'; } ?>
								<input type="hidden" name="redirect_to" value="<?php echo esc_attr($_SERVER['REQUEST_URI']); ?>?reset=true" />
								<input type="hidden" name="user-cookie" value="1" />
							</div>
						</form>
						<p class="notforgotten">- Pas oublié? Connexion -</p>
					</div>
				</div>
			<?php endif; ?>



<?php $tdu  =  get_template_directory_uri() ; ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lib/underscore-min.js"></script>
<script type="text/javascript" src="<?php echo $tdu; ?>/js/lib/moment.min.js"></script>
<script type="text/javascript" src="<?php echo $tdu; ?>/js/lib/clndr.min.js"></script>
<script type="text/javascript" src="<?php echo $tdu; ?>/js/lib/jquery.justifiedGallery.min.js"></script>
<script type="text/javascript" src="<?php echo $tdu; ?>/js/lib/featherlight.min.js"></script>
<script type="text/javascript" src="<?php echo $tdu; ?>/js/lib/featherlight.gallery.min.js"></script>
<script type="text/javascript" src="<?php echo $tdu; ?>/js/lib/jquery.bxslider.min.js"></script>

<!-- <script type='text/javascript' src='<?php echo get_site_url(); ?>/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
<script type="text/javascript" src="<?php echo $tdu; ?>/bower_components/bxslider-4/dist/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="<?php echo $tdu; ?>/bower_components/matchHeight/dist/jquery.matchHeight-min.js"></script>
<script type="text/javascript" src="<?php echo $tdu; ?>/js/min/featherlight.min.js"></script>
<script type="text/javascript" src="<?php echo $tdu; ?>/js/min/featherlight.gallery.min.js"></script>
-->
<script type="text/javascript" src="<?php echo $tdu; ?>/js/min/scripts.bundle.js?v=<?php echo wf_version(); ?>"></script>
<!-- <script type="text/javascript" src="<?php echo $tdu; ?>/js/scripts.js"></script> -->

<?php wp_footer(); ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114588276-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-114588276-1');
</script>


</body>
</html>
