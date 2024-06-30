<?php
	echo main_sidebar_dropdown([
		"name"=>"Warehouse",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-warehouse","text"=>"Create Warehouse","icon"=>"far fa-circle nav-icon"],
			["route"=>"create-stock","text"=>"Create Stock","icon"=>"far fa-circle nav-icon"]
		
		]
	]);
?>
