<?php
// echo '<pre>',htmlspecialchars(print_r($arResult, true)),'</pre>';exit();
?>
<form action="post">
	<input type="text" placeholder='Поиск' name='search_query' value='<?=htmlspecialchars($_POST['search_query'])?>'>
	<button type="submit">Искать</button>
</form>
<?php
foreach($arResult['ELEMENT'] as $element)
{
	?>
	<a href="/pandas/detail/<?=$element['CODE']?>">
		<?=$element['NAME']?>
	</a>
	<P><?=$element['PREVIEW_TEXT']?></P>
	<?php
}



