<?php

require_once("Tax-meta-class.php");

if (is_admin()){

	//All meta boxes prefix
	$prefix = 'pressed_';
    

    $config = array(
       'id' => 'articlecat_meta_box',                         // meta box id, unique per meta box
       'title' => 'Article Category Meta Box',                      // meta box title
       'pages' => array('articlecat'),                    // taxonomy name, accept categories, post_tag and custom taxonomies
       'context' => 'side',                           // where the meta box appear: normal (default), advanced, side; optional
       'fields' => array(),                             // list of meta fields (can be added by field arrays)
       'local_images' => true,                         // Use local or hosted images (meta box images for add/remove)
       'use_with_theme' => true                        //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
    );
    
    $articlecat_meta = new Tax_Meta_Class($config);
    //Image field
    $articlecat_meta->addImage('image_field_id',array('name'=> 'Featured Image'));
    
    /*
    * Don't Forget to Close up the meta box deceleration
    */
    //Finish Taxonomy Extra fields Deceleration
    $articlecat_meta->Finish();

}