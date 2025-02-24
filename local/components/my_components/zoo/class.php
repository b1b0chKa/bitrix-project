<?php

use Bitrix\Main\Loader;
use Bitrix\Main\UI\PageNavigation;


class Zoo extends CBitrixComponent
{
	private function getElement()
	{
		Loader::includeModule("iblock");

		$pageSize = $this->arParams['PAGE_SIZE'];

		$nav = new PageNavigation("animals");
		$nav->allowAllRecords(false)
			->setPageSize($pageSize)
			->initFromUri();


		$params = [
			'filter' => $this->arParams['FILTER'],
			'offset' => $nav->getOffset(),
			'limit' => $pageSize,
			'select' => $this->arParams['SELECT'],
			'count_total' => [
				'COUNT_TOTAL' => true,
			]
		];

		$result = \Bitrix\Iblock\Elements\ElementTestapiTable::getList($params);

		while($element = $result->fetch())
			$this->arResult['ELEMENTS'][] = $element;

		$nav->setRecordCount($result->getCount());
		$this->arResult['NAV'] = $nav;
	}
	public function executeComponent()
	{
		$this->GetElement();
		$this->includeComponentTemplate();
	}
}