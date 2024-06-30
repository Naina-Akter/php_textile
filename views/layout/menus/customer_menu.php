<?php
	echo main_sidebar_dropdown([
		"name"=>"Customer",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-customer","text"=>"Create Customer","icon"=>"far fa-circle nav-icon"],
			["route"=>"customers","text"=>"Manage Customer","icon"=>"far fa-circle nav-icon"],
			["route"=>"create-contact","text"=>"Create Contact","icon"=>"far fa-circle nav-icon"]
		]
	]);
?>
