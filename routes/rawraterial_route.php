<?php
if($page=="create-rawraterial"){
	$found=include("views/pages/ui/rawraterial/create_rawraterial.php");
}elseif($page=="edit-rawraterial"){
	$found=include("views/pages/ui/rawraterial/edit_rawraterial.php");
}elseif($page=="raw_raterial"){
	$found=include("views/pages/ui/rawraterial/manage_rawraterial.php");
}elseif($page=="details-rawraterial"){
	$found=include("views/pages/ui/rawraterial/details_rawraterial.php");
}elseif($page=="view-rawraterial"){
	$found=include("views/pages/ui/rawraterial/view_rawraterial.php");
}
?>
