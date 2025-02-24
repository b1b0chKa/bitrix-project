<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


?>
<!DOCTYPE html>
<html>
<?php
$APPLICATION->ShowPanel();
$APPLICATION->ShowHead();
?>
<head>
    <link href='<?='SITE_TEMPLATE_PATH'?>/local/templates/my_templates/css/styles.css' type='text/css' rel='stylesheet'/>

</head>
<body>
<header class='header'>
    <?$APPLICATION->IncludeComponent(
        "bitrix:menu", 
        "my_menu",
        [
            "ROOT_MENU_TYPE" => "top",

			"USE_EXT" => 'N',
        ],
    );?>
</header>
<main>
