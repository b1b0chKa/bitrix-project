<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

foreach($arResult['ELEMENT'] as $cat)
{
	?>
	<p><?=$cat['NAME'] ?></p>
	<p><?=$cat['DETAIL_TEXT'] ?></p>
	<?php
}