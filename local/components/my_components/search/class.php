<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;
use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Application;
use Bitrix\Main\SystemException;

class SearchComponent extends CBitrixComponent
{
    private function getAutocompleteResults($query)
    {
        if (!Loader::includeModule("iblock"))
			throw new SystemException("Модуль инфоблоков не подключен.");

        $this->arResult['QUERY'] = $query;

        $iblockId = $this->arParams['FILTER']['IBLOCK_ID'];
        if (!$iblockId || !$query)
            return [];

        $params = [
            'filter' => [
                [
                    'LOGIC' => 'OR',
                    '%NAME' => $query,
                    '%PREVIEW_TEXT' => $query,
                ],
                'ACTIVE' => 'Y',
                'IBLOCK_ID' => $this->arParams['FILTER'],
            ],
            'select' => [
                'ID',
                'NAME',
                'CODE',
                'PREVIEW_TEXT'
            ],
            'limit' => $this->arParams['PAGE_SIZE'],
        ];  

        return ElementTable::getList($params)->fetchAll();
    }

    public function executeComponent()
    {
        $request = Application::getInstance()->getContext()->getRequest();
        $query = trim($request->getPost('search_query'));

        $this->arResult['SEARCH_RESULT'] = $this->getAutocompleteResults($query);

        $this->includeComponentTemplate();
    }
}
