<?php
if (!defined('B_PROLOG_INCLUDED') || (B_PROLOG_INCLUDED !== true)) die();
// echo '<pre>',htmlspecialchars(print_r($arResult, true)),'</pre>';exit();
?>
<form method="post" id='search_form'>
	<input type="text" name="search_query" class="search" placeholder="Поиск новостей" value="<?=htmlspecialchars($_POST['search_query'])?>">
	<button type="submit">Искать</button>
</form>
<?php
foreach ($arResult['ELEMENT'] as $cat)
{
	echo '<pre>',htmlspecialchars(print_r($arResult, true)),'</pre>';exit();
	?>
	<a href="/cats/detail/<?=$cat['CODE']?>">
		<p><?= $cat['NAME']?></p>
	</a>
	<p><?= $cat['PREVIEW_TEXT']?></p>
	<?php
}

// $APPLICATION->IncludeComponent(
// 	"bitrix:main.pagenavigation",
// 	"",
// 	[
// 		"NAV_OBJECT" => $arResult['NAV'],
// 		"SEF_MODE" => "Y",
// 	],
// 	false
// );