<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class DetailNewsComponent extends \CBitrixComponent
{
    public function executeComponent()
    {
        if (!CModule::IncludeModule('iblock'))
        {
            ShowError('Модуль инфоблоков не установлен');
            return;
        }

        $code = $this->arParams['CODE'];

        $det = CIBlockElement::GetList(
            [],
            [
                'ACTIVE' => 'Y',
                'CODE' => $code,
            ],
            false,
            false,
            [
                'ID',
                'DETAIL_PAGE_URL',
                'NAME',
                'DETAIL_TEXT',
                'DATE_ACTIVE_FROM',
            ]
        );

        while ($element = $det->GetNext())
        {
            $detail_news_item = [
                'DETAIL_PAGE_URL' => $element['DETAIL_PAGE_URL'],
                'ID' => $element['ID'],
                'NAME' => $element['NAME'],
                'DETAIL_TEXT' => $element['DETAIL_TEXT'],
                'CODE' => $element['CODE'],
                'DATE_ACTIVE_FROM' => $element['DATE_ACTIVE_FROM'],
            ];
        }

        $this->arResult['detailNews'] = $detail_news_item;
        $this->includeComponentTemplate();
    }
}