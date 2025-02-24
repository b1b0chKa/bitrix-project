<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

header("Content-Type: application/json");

if (!CModule::IncludeModule("iblock"))
{
    echo json_encode(["success" => false, "errors" => ["general" => "Ошибка загрузки модуля инфоблоков."]]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $response = [
        "success" => false,
        "errors" => []
    ];

    $name = trim($_POST["name"]);
    $phone = trim($_POST["phoneNumber"]);

    if (empty($name))
    {
        $response["errors"]["name"] = "Error: invalid name";
    }
    elseif (strlen($name) < 2)
    {
        $response["errors"]["name"] = "Error: invalid name";
    }


    if (empty($phone))
    {
        $response["errors"]["phoneNumber"] = "Error: invalid phone";
    }
    elseif (!preg_match("/^\+7\d{10}$/", $phone))
    {
        $response["errors"]["phoneNumber"] = "Error: invalid phone";
    }

    if (empty($response["errors"]))
    {
        $response["success"] = true;
        $IBLOCK_ID = 5;

        $infoblock = new CIBlockElement;
        $fields =[
            'IBLOCK_ID' => $IBLOCK_ID,
            'NAME' => $name,
            'ACTIVE' => 'Y',
            'PROPERTY_VALUES' => [
                'PHONE' => $phone,
                'NAME' => $name,
            ],
        ];
        
        if ($ELEMENT_ID = $infoblock->Add($fields))
        {
            $respons['success'] = true;
            $respons['message'] = 'Форма успешно отправлена!';
        }
        else
        {
            $response["errors"]["general"] = "Ошибка сохранения: " . $infoblock->LAST_ERROR;
        }
    }


    echo json_encode($response);
    exit;
}



