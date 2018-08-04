<?php
include('./conf/config.php');
include('./conf/define.php');

include('./view/View.php');
include('./view/LinkListView.php');
include('./view/LinkEditView.php');
include('./view/LinkInfoView.php');
include('./view/MessageView.php');
include('./view/ErrorView.php');

include('./control/FrontController.php');
include('./control/BrowseLinkController.php');
include('./control/RegisterLinkController.php');
include('./control/UpdateLinkController.php');
include('./control/DeleteLinkController.php');

include('./dao/DAO.php');
include('./dao/LinkDAO.php');

include('./entity/Link.php');

session_cache_limiter('none');
session_start();

$controller = new FrontController();

$page = $controller->execute();
$page->display();
?>
