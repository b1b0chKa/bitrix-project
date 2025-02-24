<?php 
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;
use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Application;
use Bitrix\Main\SystemException;
use Bitrix\Iblock\PropertyTable;

class Component extends CBitrixComponent{
	private function getElement()
	{
		if (!Loader::includeModule("iblock"))
			throw new SystemException("Модуль инфоблоков не подключен.");

		$iblockId = $this->arParams['FILTER']['IBLOCK_ID'];
		$pageSize = $this->arParams['PAGE_SIZE'];
		// $prop = $this->arParams['PROPERTY'];

		$nav = new \Bitrix\Main\UI\PageNavigation("cats-page");
		$nav->allowAllRecords(false)
			->setPageSize($pageSize)
			->initFromUri();

		$searchQuery = trim($_POST['search_query']);

		$filter = $this->arParams['FILTER'];
		if (!empty($searchQuery))
		{
			$filter[] = [
				'LOGIC' => 'OR',
				'%NAME' => $searchQuery,
				'%PREVIEW_TEXT' => $searchQuery,
				'%DETAIL_TEXT' => $searchQuery,
			];
		}

		// if(!empty($prop))
			// $filter[] = ['PROPERTY_DLINA.VALUE' => $arParams['PROPERTY']];
			// $filter[] = ['PROPERTY_DLINANAME' => $arParams['PROPERTY']];

		$params = [
			'filter' => $filter,
			'select' => $this->arParams['SELECT'],
			'limit' => $pageSize,
			'count_total' => [
				'COUNT_TOTAL' => true,
			],
			'offset' => $nav->getOffset(),
		];

		$result = \Bitrix\Iblock\Elements\ElementCatsapiTable::getList($params);
		while($element = $result->fetch())
			$this->arResult['ELEMENT'][] = $element;

		$nav->setRecordCount($result->getCount());
		$this->arResult['NAV'] = $nav;
	}
	
	public function executeComponent()
	{
		$this->GetElement();
		$this->includeComponentTemplate();
	}
} 
