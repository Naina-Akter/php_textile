<?php
if($page=="create-peoduct"){
	$found=include("views/pages/ui/peoduct/create_peoduct.php");
}elseif($page=="edit-peoduct"){
	$found=include("views/pages/ui/peoduct/edit_peoduct.php");
}elseif($page=="peoducts"){
	$found=include("views/pages/ui/peoduct/manage_peoduct.php");
}elseif($page=="details-peoduct"){
	$found=include("views/pages/ui/peoduct/details_peoduct.php");
}elseif($page=="view-peoduct"){
	$found=include("views/pages/ui/peoduct/view_peoduct.php");
}
?>
