<?php
namespace TestModules\D\Controller;

use Bitrix\Iblock\ORM\Query;
use Bitrix\Main\Engine\Controller;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;
use \Bitrix\Main;
use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Type;
use \Orm\InfoBooks\Utable;
use \Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Application;
class Test extends Controller {

    public function configureActions()
    {
        return [
            'books' => [
                'prefilters' => [

                    //new ActionFilter\Csrf(),
                ],
                'postfilters' => []
            ]
        ];
    }

    private function addbook($response)
    {
        if (empty($response))
            return false;

            $result = \Testmodules\d\Utable::add([
                'NAME' => $response['NAME'],
                'DESCRIPTION' => $response['DESCRIPTIONS'],
                'FILES' => $response['FILE'],
                'PRICE' => $response['PRICE'],
                'DATE_BOOK' => new \Bitrix\Main\Type\DateTime($response['DATE_BOOK'], 'Y-m-d H:i:s'),
            ]);


        return ['SUCESS' => "Y"];

    }



    public function booksAction()
    {
        $context = Application::getInstance()->getContext();
        $request = $context->getRequest();
        $arRequest = $request->getPostList()->toArray();

        $this->addbook($arRequest);

        return $arRequest;
    }




}


