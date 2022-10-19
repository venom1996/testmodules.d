<?php
namespace Testmodules\D;

use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Main\Localization\Loc,
    Bitrix\Main\ORM\Data\DataManager,
    Bitrix\Main\ORM\Fields\DatetimeField,
    Bitrix\Main\ORM\Fields\IntegerField,
    Bitrix\Main\ORM\Fields\StringField,
    Bitrix\Main\ORM\Fields\Validators\LengthValidator;

Loc::loadMessages(__FILE__);

/**
 * Class UTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> NAME string(255) mandatory
 * <li> DESCRIPTION string(255) mandatory
 * <li> FILES string(255) mandatory
 * <li> DATE_BOOK datetime mandatory
 * <li> PRICE string(255) mandatory
 * <li> AUTOR string(255) mandatory
 * </ul>
 *
 * @package Bitrix\U
 **/

class Utable extends DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'books_u';
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
                    'title' => Loc::getMessage('U_ENTITY_ID_FIELD')
                ]
            ),
            new StringField(
                'NAME',
                [
                    //'required' => true,
                    'validation' => [__CLASS__, 'validateName'],
                    'title' => Loc::getMessage('U_ENTITY_NAME_FIELD')
                ]
            ),
            new StringField(
                'DESCRIPTION',
                [
                    //'required' => true,
                    'validation' => [__CLASS__, 'validateDescription'],
                    'title' => Loc::getMessage('U_ENTITY_DESCRIPTION_FIELD')
                ]
            ),
            new StringField(
                'FILES',
                [
                    //'required' => true,
                    'validation' => [__CLASS__, 'validateFiles'],
                    'title' => Loc::getMessage('U_ENTITY_FILES_FIELD')
                ]
            ),
            new DatetimeField(
                'DATE_BOOK',
                [
                    //'required' => true,
                    'title' => Loc::getMessage('U_ENTITY_DATE_BOOK_FIELD')
                ]
            ),
            new StringField(
                'PRICE',
                [
                    //'required' => true,
                    'validation' => [__CLASS__, 'validatePrice'],
                    'title' => Loc::getMessage('U_ENTITY_PRICE_FIELD')
                ]
            ),
            new StringField(
                'AUTHOR_ID',
                [
                    //'required' => true,
                    'validation' => [__CLASS__, 'validateAutor'],
                    'title' => Loc::getMessage('U_ENTITY_AUTOR_FIELD')
                ]
            ),
            new ReferenceField(
                'AUTHOR',
                'Testmodules\D\InfoTable',
                ['=this.AUTHOR_ID' => 'ref.ID']
            )
        ];
    }

    /**
     * Returns validators for NAME field.
     *
     * @return array
     */
    public static function validateName()
    {
        return [
            new LengthValidator(null, 255),
        ];
    }

    /**
     * Returns validators for DESCRIPTION field.
     *
     * @return array
     */
    public static function validateDescription()
    {
        return [
            new LengthValidator(null, 255),
        ];
    }

    /**
     * Returns validators for FILES field.
     *
     * @return array
     */
    public static function validateFiles()
    {
        return [
            new LengthValidator(null, 255),
        ];
    }

    /**
     * Returns validators for PRICE field.
     *
     * @return array
     */
    public static function validatePrice()
    {
        return [
            new LengthValidator(null, 255),
        ];
    }

    /**
     * Returns validators for AUTOR field.
     *
     * @return array
     */
    public static function validateAutor()
    {
        return [
            new LengthValidator(null, 255),
        ];
    }
}