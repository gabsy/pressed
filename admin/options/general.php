<?php
$options[] = array( "name" => "General",
						"sicon" => "advancedsettings.png",
                        "type" => "heading");

    $options[] = array( "name" => "Company Logo",
                        "desc" => "Click to 'Upload Image' button and upload your logo. If nothing is uploaded, default WWWH svg logo will be used.",
                        "id" => SN."clogo",
                        "std" => "",
                        "type" => "upload");

	$options[] = array( "name" => "Custom Favicon",
                        "desc" => "You can use your own custom favicon. Click to 'Upload Image' button and upload your favicon.",
                        "id" => SN."custom_shortcut_favicon",
                        "std" => "",
                        "type" => "upload");
    
    $options[] = array( "name" => "Analytics Code",
                        "desc" => "",
                        "id" => SN."analytics",
                        "std" => "",
                        "type" => "textarea");
