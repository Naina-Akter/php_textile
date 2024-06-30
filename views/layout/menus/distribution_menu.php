<?php
	echo main_sidebar_dropdown([
		"name"=>"Distribution",
		"icon"=>"nav-icon fa fa-random",
		"links"=>[
			["route"=>"create-contact","text"=>"Create Order","icon"=>"far fa-circle nav-icon"],
			["route"=>"contacts","text"=>"Manage Order","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
