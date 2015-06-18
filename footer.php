<!-- Footer -->
		<footer>
			<div class="block">
				<div class="grid4">
					<div class="col">
						<?php
							if(has_nav_menu('footer_nav1')){
								footer_nav(1);
							}
						?>
					</div>
					<div class="col">
						<?php
							if(has_nav_menu('footer_nav2')){
								footer_nav(2);
							}
						?>
					</div>
					<div class="col">
						<?php
							if(has_nav_menu('footer_nav3')){
								footer_nav(3);
							}
						?>
						<?php dynamic_sidebar( 'footer1_sidebar' ); ?>
					</div>
					<div class="col">
						<?php
							if(has_nav_menu('footer_nav4')){
								footer_nav(4);
							}
						?>
						<?php dynamic_sidebar( 'footer2_sidebar' ); ?>
					</div>
				</div>
			<div class="copyright center">
				&copy; 2015 Pressed. All Rights Reserved.
			</div>
			</div>
		</footer>
		<!-- end Footer -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
         <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.fullPage.min.js"></script>
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/plugins.js"></script>
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/main.js"></script>
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/contactform.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $('#fullpage').fullpage({
                //verticalCentered: false,
                anchors: ['pressed', 'whatispressed', 'whoispressed', 'learnmore'],
                resize :false,
                //navigation:true,
                //keyboardScrolling: true,
                //scrollingSpeed: 700,
                autoScrolling:false

            });
        });
    </script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!--<script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-42516074-19', 'auto');
          ga('send', 'pageview');

        </script>-->
         <?php wp_footer(); ?>
    </body>
</html>
