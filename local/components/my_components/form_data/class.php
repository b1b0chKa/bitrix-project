<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\Application;
use Bitrix\Main\SystemException;
use Bitrix\Iblock\Iblock;

class ContactFormComponent extends CBitrixComponent
{
    private function getUserData()
    {
        if (!Loader::includeModule("iblock")) {
            throw new SystemException("Модуль инфоблоков не подключен.");
        }

        $iblockId = (int) $this->arParams["IBLOCK_ID"]; // ID инфоблока

        $entityClass = Iblock::wakeUp($iblockId)->getEntityDataClass();

        if (!class_exists($entityClass)) {
            throw new SystemException("Ошибка: ORM-класс для инфоблока не найден.");
        }

		$pageSize = $this->arParams['PAGE_SIZE'];

        $result = $entityClass::getList([
            "select" => $this->arParams['SELECT'],
            "filter" => ["ACTIVE" => "Y"],
            "order"  => ["ID" => "DESC"],
            "limit"  => $pageSize,
        ]);
        while($user = $result->fetch())
            $this->arResult['USER_DATA'][] = $user;

    }

    public function executeComponent()
    {
        $this->getUserData();
        $this->includeComponentTemplate();
    }
}
?>
