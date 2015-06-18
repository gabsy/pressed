<?php /* Template Name: Contact */
get_header(); ?>

<div class="main">
	<div class="block">
		<h2 class="center page-title"><?php the_title();?><br>
			<span class="tagline"><?php echo get_post_meta($post->ID, 'tagline', true); ?></span>
		</h2>
		<div class="content-full-width">
		<div class="grid2">
			<div class="col">
			<h3 style="margin-top:0;">Want to shoot us a message?</h3>
			<!--<div id="form-messages">
				<p class="simple-error error" <?php if(isset($hasError)) echo 'style="display:block;"' ?>>Please fill in all the required fields and make sure you enter a valid email address.</p>
                    <p class="simple-success thanks" <?php if(isset($emailSent)) echo 'style="display:block;"' ?>><strong>Thank you!</strong> Your message was successfully sent. We should be in touch soon.</p>
			</div>-->
				<form id="ajax-contact" method="post" action="<?php echo get_stylesheet_directory_uri(); ?>/mailer.php">
						<div class="field">
							<label for="name">Name*:</label>
							<input type="text" id="name" name="name" required>
						</div>
						<div class="field">
							<label for="email">Email*:</label>
							<input type="email" id="email" name="email" required>
						</div>

						<div class="field">
							<label for="company">Message:</label>
							<textarea rows="5" id="message" name="message"></textarea>
						</div>

					<div class="field">
						<button type="submit">Send</button>
					</div>


			</form>
			</div>
			<div class="col center">
					<p><strong>Mailing Address:</strong><br>
				1722 N College Ave<br>
				Suite C-196<br>
				Fayetteville AR 72703
				</p>
				<p>
				<strong>Email:</strong> management@presssed.net
				</p>
				<p>
				<strong>Fax Number:</strong> +1-925-478-3115
				</p>
				<p><br><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/medal.png" alt="Join The Team" style="width:100px;">
					<a href="#"><h4>Join The Team</h4></a>
				</p>
			</div>
		</div>

				</div>
		<br>

		</div>
	</div>

<?php get_footer(); ?>