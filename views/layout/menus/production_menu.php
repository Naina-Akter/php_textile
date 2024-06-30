<?php
	echo main_sidebar_dropdown([
		"name"=>"Production",
		"icon"=>"nav-icon fa fa-bar-chart",
		"links"=>[			
			["route"=>"boms","text"=>"Manage BoM","icon"=>"far fa-circle nav-icon"],
            ["route"=>"production-orders","text"=>"Manage Order","icon"=>"far fa-circle nav-icon"],
			["route"=>"productions","text"=>"Manage Production","icon"=>"far fa-circle nav-icon"]
		]
	]);
?>
