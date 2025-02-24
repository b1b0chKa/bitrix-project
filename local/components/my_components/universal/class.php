<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;
use Bitrix\Iblock\ElementTable;
use Bitrix\Main\UI\PageNavigation;
use Bitrix\Main\SystemException;
use Bitrix\Iblock;
use Bitrix\Iblock\PropertyTable;
use Bitrix\Iblock\ElementPropertyTable;
use Bitrix\Iblock\Elements\ElementNewsapiTable;

class UniversalComponent extends CBitrixComponent
{
	private function GetNews()
	{
		if (!Loader::includeModule("iblock"))
			throw new SystemException("Модуль инфоблоков не подключен.");

		$iblockId = $this->arParams['FILTER']['IBLOCK_ID'];
		$idNav = ($this->arParams['ID_PAGINATION']);
		$pageSize = (int)($this->arParams['PAGE_SIZE']);

		if(!empty($idNav))
		{
			$pagination = new PageNavigation($idNav);
			$pagination->allowAllRecords(false)
				->setPageSize($pageSize)
				->initFromUri();
		}

		$params = [
			'filter' => $this->arParams['FILTER'],
			'select' => $this->arParams['SELECTT'],
			'order' => $this->arParams['ORDER'],
			'limit' => $pageSize,
		];

		if(!empty($idNav))
		{
			$params['offset'] = $pagination->getOffset();
			$params['count_total'] = ['COUNT_TOTAL' => true];
		}

		$result = \Bitrix\Iblock\Elements\ElementNewsapiTable::getList($params);

		while ($items = $result->fetch())
			$this->arResult['NEWS_ITEMS'][] = $items;
		
		if(!empty($idNav))
		{
			$totalCount = $result->getCount();
			$pagination->setRecordCount($totalCount);
			$this->arResult['PAG'] = $pagination;
		}
	}

	public function executeComponent()
	{
		try
		{
			$this->getNews();
			$this->includeComponentTemplate();
		}
		catch (SystemException $e)
		{
			ShowError($e->getMessage());
		}   
	}
}	
