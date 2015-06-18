<?php get_header();?>
 <div class="section center" id="what-is-pressed">
                <div class="block">
                    <h2>What is Pressed?</h2>
                    <div class="grid2">
                        <div class="col">
                            <p class="center"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/rocket.svg" alt=""></p>
                            Pressed is the easiest way to launch your own fully managed WordPress hosting brand that you can feel good about hosting your customers and clients on. Pressed offers a dedicated platform, completely optimized for WordPress websites, on rock solid infrastructre that can be white-labeled for your brand.
                        </div>
                        <div class="col">
                            <p class="center"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/support.png" alt=""></p>
                            The best part is that you never have to manage a single server, handle security updates, manage billing or even deal with customer support! Pressed handles all of this for you, including offering  support to your customers - so they can get the help they need when they need it, and you can get a good night's sleep
                        </div>
                    </div>
                </div>
                <a href="#learnmore" class="button">Learn More</a>
            </div>
            <div class="section center" id="who-is-pressed" >
                <div class="block">
                    <h2>Who Is Pressed?</h2>
                    <p>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/team.svg" alt="">
                    </p>
                    
                    <div class="grid2">
                        <div class="col">
                            The Pressed team is made up of hosting industry veterns with decades of combined experience in web hosting and WordPress.
                        </div>
                        <div class="col">
                            Having helped tens of thousands of WordPress hosting customers to date, we decided to develop a product that would allow WordPress designers, developers and agencies to offer their own fully managed WordPress hosting service. 
                        </div>
                    </div>
                </div>
                <a href="#learnmore" class="button">Learn More</a>
            </div>
            <div class="section center" id="learn-more" >
                <div class="block">
                    <h2>Want to learn more?</h2>
                    <p>Pressed is currently accepting applications for launch partners. If you would like more information on Pressed and how easy it is to launch your own fully managed WordPress hosting service, please complete the form below.</p>
                <div id="form-messages">
                    <!--<p class="simple-error error" <?php if(isset($hasError)) echo 'style="display:block;"' ?>>Please fill in all the required fields and make sure you enter a valid email address.</p>
                    <p class="simple-success thanks" <?php if(isset($emailSent)) echo 'style="display:block;"' ?>><strong>Thank you!</strong> Your message was successfully sent. We should be in touch soon.</p> -->
                </div>
                <form id="ajax-contact" method="post" action="<?php echo get_stylesheet_directory_uri(); ?>/mailer.php">
                    <div class="grid2 clearfix">
                        <div class="col">
                            <div class="field">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                             <div class="field">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            
                        </div>
                        <div class="col">
                           
                            <div class="field">
                                <label for="company">Company:</label>
                                <input type="text" id="company" name="company">
                            </div>
                            <div class="field">
                                <label for="company_website">Website:</label>
                                <input type="text" id="company_website" name="company_website">
                            </div>
                            
                        </div>
                        <div class="field">
                                <button type="submit">Send</button>
                            </div>
                        
                    </div>

                    
                </form>                 
                </div>
            </div>
<?php get_footer();?>