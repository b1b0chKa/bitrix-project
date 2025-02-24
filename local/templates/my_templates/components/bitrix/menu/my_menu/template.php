<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
// echo '<pre>',htmlspecialchars(print_r($arResult, true)),'</pre>';exit();
?>

<a href="/" class="linkImg"><img src="/local/templates/my_templates/images/Logo.svg" alt="Логотип" class="img"></a>
<?php foreach ($arResult as $menuItem)
{
	?>
	<a href="<?=$menuItem['LINK']?>" class="main"><p class="mainText"><?=$menuItem['TEXT']?></p></a>
	<?php
}

    