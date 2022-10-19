<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
global $APPLICATION;

$APPLICATION->SetTitle("");


$APPLICATION->IncludeComponent(
    "componmodules:module.books",
    "",
    [
        "DISPLAY_TOP_PAGER" => "Y",
        "DISPLAY_BOTTOM_PAGER" => "Y",

    ]
);


$APPLICATION->IncludeComponent(
	"componmodules:add.books",
	"",
[
    'AJAX_MODE' => 'Y',
]
);


?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>




