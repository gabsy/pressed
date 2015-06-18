<?php
/*********************************************************************************************

Register Global Sidebars

*********************************************************************************************/
if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'name' => 'Blog Sidebar',
    'id' => 'blog_sidebar',
	'before_widget' => '<div class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'name' => 'Articles Sidebar',
    'id' => 'articles_sidebar',
	'before_widget' => '<div class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'name' => 'Footer 1 Sidebar',
    'id' => 'footer1_sidebar',
	'before_widget' => '<div class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'name' => 'Footer 2 Sidebar',
    'id' => 'footer2_sidebar',
	'before_widget' => '<div class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

/*********************************************************************************************

Register Latest Articles Widget

*********************************************************************************************/
class site5framework_latest_articles_widget extends WP_Widget {
    function __construct() {
        parent::__construct(false, $name = 'Site5 Latest Aritcles Widget', array( 'description' => 'Display list of latest articles' ) );
    }

    /*
     * Displays the widget form in the admin panel
     */
    function form( $instance ) {
            $articles_no = esc_attr( $instance['articles_no'] );
            $widget_title = esc_attr( $instance['widget_title'] );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e('Title:', 'site5framework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo $widget_title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'articles_no' ); ?>"><?php _e('Number of articles to display:', 'site5framework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'articles_no' ); ?>" name="<?php echo $this->get_field_name( 'articles_no' ); ?>" type="text" value="<?php echo $articles_no; ?>" />
        </p>

        <?php
    }

    /*
     * Renders the widget in the sidebar
     */
    function widget( $args, $instance ) {
        //echo $args['before_widget'];
        ?>
        <!-- start newsletter widget -->
            <div class="widget">
                <h3><?php echo $instance['widget_title'];?></h3>
                <ul>
                    <li>
                        <?php
                            $query = new WP_Query();
                            $query->query('post_type=article&posts_per_page='.$instance['articles_no']);
                            ?>
                            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                            <a href="<?php the_permalink();?>"><?php the_title();?></a>
                            <?php endwhile; endif;
                            wp_reset_query();
                        ?>
                    </li>
                </ul>
            </div>
        <!-- end newsletter widget -->

        <?php
        //echo $args['after_widget'];
    }
};

// Initialize the widget
add_action( 'widgets_init', create_function( '', 'return register_widget( "site5framework_latest_articles_widget" );' ) );

/*********************************************************************************************

Register Recommended Articles Widget

*********************************************************************************************/
class site5framework_recommended_articles_widget extends WP_Widget {
    function __construct() {
        parent::__construct(false, $name = 'Site5 Recommended Aritcles Widget', array( 'description' => 'Display list of recommended articles' ) );
    }

    /*
     * Displays the widget form in the admin panel
     */
    function form( $instance ) {
            $articles_no = esc_attr( $instance['articles_no'] );
            $widget_title = esc_attr( $instance['widget_title'] );
						$articles_tag = esc_attr( $instance['articles_tag'] );
						$articles_type = esc_attr( $instance['articles_type'] );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e('Title:', 'site5framework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo $widget_title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'articles_type' ); ?>"><?php _e('Posts type:', 'site5framework') ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id( 'articles_type' ); ?>" name="<?php echo $this->get_field_name( 'articles_type' ); ?>">
							<option value="post" <?php if($articles_type == 'post') {echo 'selected="selected"';} ?>>Blog Post</option>
							<option value="article" <?php if($articles_type == 'article') { echo 'selected="selected"';} ?>>Article</option>
            </select>
        </p>
         <p>
            <label for="<?php echo $this->get_field_id( 'articles_tag' ); ?>"><?php _e('Tag:', 'site5framework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'articles_tag' ); ?>" name="<?php echo $this->get_field_name( 'articles_tag' ); ?>" type="text" value="<?php echo $articles_tag; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'articles_no' ); ?>"><?php _e('Number of articles to display:', 'site5framework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'articles_no' ); ?>" name="<?php echo $this->get_field_name( 'articles_no' ); ?>" type="text" value="<?php echo $articles_no; ?>" />
        </p>

        <?php
    }

    /*
     * Renders the widget in the sidebar
     */
    function widget( $args, $instance ) {
        //echo $args['before_widget'];
        ?>
        <!-- start newsletter widget -->
            <div class="widget">
                <h3><?php echo $instance['widget_title'];?></h3>
                <ul>

                        <?php
                            $query = new WP_Query();
                            $query->query('post_type='.$instance['articles_type'].'&tag='.$instance['articles_tag'].'&posts_per_page='.$instance['articles_no']);
                            ?>
                            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                           <li> <a href="<?php the_permalink();?>"><?php the_title();?></a></li>
                            <?php endwhile; endif;
                            wp_reset_query();
                        ?>

                </ul>
            </div>
        <!-- end newsletter widget -->

        <?php
        //echo $args['after_widget'];
    }
};

// Initialize the widget
add_action( 'widgets_init', create_function( '', 'return register_widget( "site5framework_recommended_articles_widget" );' ) );

/*********************************************************************************************

Register Newsletter Widget

*********************************************************************************************/
class site5framework_newsletter_widget extends WP_Widget {
    function __construct() {
        parent::__construct(false, $name = 'Newsletter Widget', array( 'description' => 'Insert a newsletter form.' ) );
    }

    /*
     * Displays the widget form in the admin panel
     */
    function form( $instance ) {
            $newsletter_url = esc_attr( $instance['newsletter_url'] );
            $newsletter_title = esc_attr( $instance['newsletter_title'] );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'newsletter_url' ); ?>"><?php _e('Newsletter Form URL:', 'site5framework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'newsletter_url' ); ?>" name="<?php echo $this->get_field_name( 'newsletter_url' ); ?>" type="text" value="<?php echo $newsletter_url; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'newsletter_title' ); ?>"><?php _e('Newsletter Title:', 'site5framework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'newsletter_title' ); ?>" name="<?php echo $this->get_field_name( 'newsletter_title' ); ?>" type="text" value="<?php echo $newsletter_title; ?>" />
        </p>

        <?php
    }

    /*
     * Renders the widget in the sidebar
     */
    function widget( $args, $instance ) {
        echo $args['before_widget'];
        if(isset($_SERVER['HTTPS'])) $newsletter_url = str_replace("http://site5.us1.list-manage1.com","//site5.us1.list-manage.com",$instance['newsletter_url']);
        else $newsletter_url = $instance['newsletter_url'];
        ?>
        <!-- start newsletter widget -->

            <script type="text/javascript">
            // delete this script tag and use a "div.mce_inline_error{ XXX !important}" selector
            // or fill this in and it will be inlined when errors are generated
            var mc_custom_error_style = '';
            </script>
            <div id="mc_embed_signup">
            <form action="<?php echo $newsletter_url; ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate newsletter sidebar" target="_blank"  style="margin:0 auto;display:block;width:auto;">
            <h3><?php echo $instance['newsletter_title']; ?></h3>
            <div id="mce-responses">
                <div class="response" id="mce-error-response"></div>
                <div class="response" id="mce-success-response" ></div>
            </div>
            <div class="mc-field-group">
            <input type="text" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="email address">
            </div>

                    <div><input type="submit" value="SUBSCRIBE" name="subscribe" id="mc-embedded-subscribe" class="btn"></div>

                <!--<a href="#" id="mc_embed_close" class="mc_embed_close">Close</a>-->
            </form>
            </div>
            <script type="text/javascript">
            var fnames = new Array();var ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';
            try {
            var jqueryLoaded=jQuery;
            jqueryLoaded=true;
            } catch(err) {
            var jqueryLoaded=false;
            }
            var head= document.getElementsByTagName('head')[0];
            if (!jqueryLoaded) {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js';
            head.appendChild(script);
            if (script.readyState && script.onload!==null){
                script.onreadystatechange= function () {
                      if (this.readyState == 'complete') mce_preload_check();
                }
            }
            }
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'http://downloads.mailchimp.com/js/jquery.form-n-validate.js';
            head.appendChild(script);
            var err_style = '';
            try{
            err_style = mc_custom_error_style;
            } catch(e){
            err_style = 'margin: 1em 0 0 0; padding: 1em 0.5em 0.5em 0.5em; background: ERROR_BGCOLOR none repeat scroll 0% 0%; font-weight: bold; float: none; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; color: ERROR_COLOR;';
            }
            var head= document.getElementsByTagName('head')[0];
            var style= document.createElement('style');
            style.type= 'text/css';
            if (style.styleSheet) {
            style.styleSheet.cssText = '.mce_inline_error {' + err_style + '}';
            } else {
            style.appendChild(document.createTextNode('.mce_inline_error {' + err_style + '}'));
            }
            head.appendChild(style);
            setTimeout('mce_preload_check();', 250);
            var mce_preload_checks = 0;
            function mce_preload_check(){
            if (mce_preload_checks>40) return;
            mce_preload_checks++;
            try {
                var jqueryLoaded=jQuery;
            } catch(err) {
                setTimeout('mce_preload_check();', 250);
                return;
            }
            try {
                var validatorLoaded=jQuery("#fake-form").validate({});
            } catch(err) {
                setTimeout('mce_preload_check();', 250);
                return;
            }
            mce_init_form();
            }
            function mce_init_form(){
            jQuery(document).ready( function(jQuery) {
              var options = {
                errorClass: 'mce_inline_error',
                errorElement: 'span',
                onkeyup: function(){},
                onfocusout:function(){},
                onblur:function(){},
                errorPlacement: function(error,element) {
                     //error.add('#mce-responses');
                     jQuery('#mce-responses').append(error);
                     jQuery('#mce-responses').css({"height":"auto"});

                }
            };
              var mce_validator = jQuery("#mc-embedded-subscribe-form").validate(options);
              options = { url: '<?php echo $newsletter_url; ?>&c=?', type: 'GET', dataType: 'json', contentType: "application/json; charset=utf-8",
                            beforeSubmit: function(){
                                jQuery('#mce_tmp_error_msg').remove();
                                jQuery('.datefield','#mc_embed_signup').each(
                                    function(){

                                        var txt = 'filled';
                                        var fields = new Array();
                                        var i = 0;
                                        jQuery(':text', this).each(
                                            function(){
                                                fields[i] = this;
                                                i++;
                                            });
                                        jQuery(':hidden', this).each(
                                            function(){
                                                if ( fields[0].value=='MM' && fields[1].value=='DD' && fields[2].value=='YYYY' ){
                                                    this.value = '';
                                                } else if ( fields[0].value=='' && fields[1].value=='' && fields[2].value=='' ){
                                                    this.value = '';
                                                } else {
                                                    this.value = fields[0].value+'/'+fields[1].value+'/'+fields[2].value;
                                                }
                                            });
                                    });
                                return mce_validator.form();
                            },
                            success: mce_success_cb

                        };
              jQuery('#mc-embedded-subscribe-form').ajaxForm(options);


            });
            }
            function mce_success_cb(resp){
            jQuery('#mce-success-response').hide();
            jQuery('#mce-error-response').hide();
            if (resp.result=="success"){
                jQuery('#mce-'+resp.result+'-response').show();
                jQuery('#mce-'+resp.result+'-response').html(resp.msg);
                jQuery('#mce-responses').css({"height":"auto"});
                jQuery('#mc-embedded-subscribe-form').each(function(){
                    this.reset();
                });
            } else {
                var index = -1;
                var msg;
                try {
                    var parts = resp.msg.split(' - ',2);
                    if (parts[1]==undefined){
                        msg = resp.msg;
                    } else {
                        i = parseInt(parts[0]);
                        if (i.toString() == parts[0]){
                            index = parts[0];
                            msg = parts[1];
                        } else {
                            index = -1;
                            msg = resp.msg;
                        }
                    }
                } catch(e){
                    index = -1;
                    msg = resp.msg;
                }
                try{
                    if (index== -1){
                        jQuery('#mce-'+resp.result+'-response').show();
                        jQuery('#mce-'+resp.result+'-response').html(msg);
                        jQuery('#mce-responses').css({"height":"auto"});
                    } else {
                        err_id = 'mce_tmp_error_msg';
                        html = '<div id="'+err_id+'" style="'+err_style+'"> '+msg+'</div>';

                        var input_id = '#mc_embed_signup';
                        var f = jQuery(input_id);
                        if (ftypes[index]=='address'){
                            input_id = '#mce-'+fnames[index]+'-addr1';
                            f = jQuery(input_id).parent().parent().get(0);
                        } else if (ftypes[index]=='date'){
                            input_id = '#mce-'+fnames[index]+'-month';
                            f = jQuery(input_id).parent().parent().get(0);
                        } else {
                            input_id = '#mce-'+fnames[index];
                            f = jQuery().parent(input_id).get(0);
                        }
                        if (f){
                            jQuery(f).append(html);
                            jQuery(input_id).focus();
                        } else {
                            jQuery('#mce-'+resp.result+'-response').show();
                            jQuery('#mce-'+resp.result+'-response').html(msg);
                            jQuery('#mce-responses').css({"height":"auto"});
                        }
                    }
                } catch(e){
                    jQuery('#mce-'+resp.result+'-response').show();
                    jQuery('#mce-'+resp.result+'-response').html(msg);
                    jQuery('#mce-responses').css({"height":"auto"});
                }
            }
            }
            </script>
            <?php /*
            <form class="newsletter sidebar validate" action="<?php echo $instance['newsletter_url']; ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate style="margin:0 auto;display:block;width:auto;text-align:center;">
                    <label><?php echo $instance['newsletter_title']; ?></label>
                    <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL"  placeholder="your email" required>
                    <input type="submit" value="SUBSCRIBE" name="subscribe" id="mc-embedded-subscribe" class="button">
                </form>
                */ ?>
        <!-- end newsletter widget -->

        <?php
        echo $args['after_widget'];
    }
};

// Initialize the widget
add_action( 'widgets_init', create_function( '', 'return register_widget( "site5framework_newsletter_widget" );' ) );