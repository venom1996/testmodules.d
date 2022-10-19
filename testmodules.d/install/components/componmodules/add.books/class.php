<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


use \Bitrix\Main;
use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Type;
use \Orm\InfoBooks\Utable;
use \Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Application;


class D7BooksAdd extends CBitrixComponent  {


    protected function checkModule ()
    {
        if(!Main\Loader::includeModule('testmodules.d')) {
            throw new Main\LoaderException(Locc::getMessage('Модуль не установлен'));
        }

    }




    public function executeComponent()
    {
        $this->checkModule();

        $this->includeComponentTemplate();
    }


}