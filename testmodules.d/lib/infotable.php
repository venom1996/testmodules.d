<?php
namespace Testmodules\D;

use Bitrix\Main\Localization\Loc,
    Bitrix\Main\ORM\Data\DataManager,
    Bitrix\Main\ORM\Fields\IntegerField,
    Bitrix\Main\ORM\Fields\StringField,
    Bitrix\Main\ORM\Fields\Validators\LengthValidator;

Loc::loadMessages(__FILE__);

/**
 * Class InfoTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> FIO_AUTOR string(255) mandatory
 * <li> CITY string(255) mandatory
 * </ul>
 *
 * @package Bitrix\Info
 **/

class InfoTable extends DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'autor_info';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return [
            new IntegerField(
                'ID',
                [
                    'primary' => true,
                    'autocomplete' => true,
                    'title' => Loc::getMessage('INFO_ENTITY_ID_FIELD')
                ]
            ),
            new StringField(
                'FIO_AUTOR',
                [
                    //'required' => true,
                    //'validation' => [__CLASS__, 'validateFioAutor'],
                    'title' => Loc::getMessage('INFO_ENTITY_FIO_AUTOR_FIELD')
                ]
            ),
            new StringField(
                'CITY',
                [
                    //'required' => true,
                    //'validation' => [__CLASS__, 'validateCity'],
                    'title' => Loc::getMessage('INFO_ENTITY_CITY_FIELD')
                ]
            ),
        ];
    }

    /**
     * Returns validators for FIO_AUTOR field.
     *
     * @return array
     */
    public static function validateFioAutor()
    {
        return [
            new LengthValidator(null, 255),
        ];
    }

    /**
     * Returns validators for CITY field.
     *
     * @return array
     */
    public static function validateCity()
    {
        return [
            new LengthValidator(null, 255),
        ];
    }
}