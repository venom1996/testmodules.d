<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use \Bitrix\Main;
use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Type;
use \Orm\InfoBooks\Utable;
use \Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Application;
use \Bitrix\Main\Type\DateTime;
use Bitrix\Main\Grid\Options as GridOptions;
use Bitrix\Main\UI\PageNavigation;
class D7Books extends CBitrixComponent  {


    public function configureActions()
    {

        return [
            'greet' => [
                'prefilters' => [

                ]
            ]
        ];
    }

    protected function checkModule ()
    {
        if(!Main\Loader::includeModule('testmodules.d')) {
            throw new Main\LoaderException(Locc::getMessage('Модуль не установлен'));
        }

    }

    //Вывод в грид
    public function getBooks()
    {
        $list_id = 'example_list';

        $grid_options = new GridOptions($list_id);
        $sort = $grid_options->GetSorting(['sort' => ['ID' => 'DESC'], 'vars' => ['by' => 'by', 'order' => 'order']]);
        $nav_params = $grid_options->GetNavParams();


        $nav = new PageNavigation('request_list');
        $nav->allowAllRecords(true)
            ->setPageSize($nav_params['nPageSize'])
            ->initFromUri();


        $res = Testmodules\D\Utable::getList([
            'select' => ['*', 'FIO_AUTHOR' => 'AUTHOR.FIO_AUTOR', 'CITY' => 'AUTHOR.CITY'],
            'offset'      => $nav->getOffset(),
            'limit'       => $nav->getLimit(),
            'order'       => $sort['sort'],
        ])->fetchAll();

        if(!empty($res)) {
            foreach ($res as $row) {
                $list[] = [
                    'data' => [
                        'NAME' => $row['NAME'],
                        'DESCRIPTION' => $row['DESCRIPTION'],
                        'FILE' => $row['FILES'],
                        'DATE_BOOK' => $row['DATE_BOOK'],
                        'PRICE' => $row['PRICE'],
                        'AUTHOR' => $row['FIO_AUTHOR'],
                        'CITY' => $row['CITY']
                    ],
                ];
            }
        }
        return $list;
    }


    public function executeComponent()
    {

        $this->includeComponentLang('class.php');
        $this->checkModule();

        $this->getBooks();
        $this->arResult = $this->getBooks();

        $this->includeComponentTemplate();
    }


}