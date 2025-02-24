<?php
echo '<pre>',htmlspecialchars(print_r($arResult, true)),'</pre>';exit();
?>

<div class="">
	<a href="/zoo">Все</a>
	<?php
	foreach ($arResult['SECTION'] as $section)
	{
		// echo '<pre>',htmlspecialchars(print_r($section, true)),'</pre>';exit();
		?>
		<a href="/zoo?ID=<?= $section['ID'] ?>"><?=$section['NAME']?></a>
		<?php
	}
	// echo '<pre>',htmlspecialchars(print_r($arResult, true)),'</pre>';exit();
	?>
</div>
<?php
foreach ($arResult['ELEMENTS'] as $item) 
{
	// echo '<pre>',htmlspecialchars(print_r($item, true)),'</pre>';exit();
	?>
	<p><?=$item['NAME']?></p>
	<p><?=$item['PREVIEW_TEXT']?></p>
	<?php
}


$APPLICATION->IncludeComponent(
	"bitrix:main.pagenavigation",
	"",
	array(
		"NAV_OBJECT" => $arResult['NAV'],
		"SEF_MODE" => "N",
	),
	false
);
// ?>