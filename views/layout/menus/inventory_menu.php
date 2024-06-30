<?php
	echo main_sidebar_dropdown([
		"name"=>"Inventroy",
		"icon"=>"nav-icon fa fa-cubes",
		"links"=>[
			 
			["route"=>"create-supplier","text"=>"Create Supplier","icon"=>"far fa-circle nav-icon"],
			["route"=>"create-section","text"=>"Create Section","icon"=>"far fa-circle nav-icon"],
			["route"=>"create-productcategory","text"=>"Product Category","icon"=>"far fa-circle nav-icon"],
			["route"=>"manufacturers","text"=>"Manage Manufacturers","icon"=>"far fa-circle nav-icon"],			 
			["route"=>"products","text"=>"Manage Products","icon"=>"far fa-circle nav-icon"]
		]
	]);
?>
