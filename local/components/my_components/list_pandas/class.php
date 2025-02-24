<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;

class Component extends CBitrixComponent{
	private function getElement()
	{
		if (!Loader::includeModule("iblock"))
			throw new SystemException("Модуль инфоблоков не подключен.");

		$filter = $this->arParams['FILTER'];
		$searchQuery = trim($this->$_POST['search_query']);
		if(!empty($searchQuery))
		{
			$filter[] = [
				'LOGIC' => 'OR',
				'%NAME' => $searchQuery,
				'%PREVIEW_TEXT' => $searchQuery,
			];
		}
		$params = [
			'filter' => $filter,
			'select' => $this->arParams['SELECT'],
		];

		$result = \Bitrix\Iblock\Elements\ElementPandasapiTable::getList($params);
		while($element = $result->fetch())
			$this->arResult['ELEMENT'][] = $element;
	}
	
	public function executeComponent()
	{
		$this->GetElement();
		$this->includeComponentTemplate();
	}
} 
