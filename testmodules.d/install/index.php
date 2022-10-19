<?

IncludeModuleLangFile(__FILE__);
use \Bitrix\Main\ModuleManager;

Class Testmodules_d extends CModule
{

    var $MODULE_ID = "testmodules.d";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $errors;

    function __construct()
    {
        $this->MODULE_VERSION = "1.0.0";
        $this->MODULE_VERSION_DATE = "01.08.2022";
        $this->MODULE_NAME = "Кек";
        $this->MODULE_DESCRIPTION = "Тестовый модуль";
    }

    function DoInstall()
    {
        $this->InstallDB();
        $this->InstallEvents();
        $this->InstallFiles();
        \Bitrix\Main\ModuleManager::RegisterModule($this->MODULE_ID);
        return true;
    }

    function DoUninstall()
    {
        $this->UnInstallDB();
        $this->UnInstallEvents();
        $this->UnInstallFiles();
        \Bitrix\Main\ModuleManager::UnRegisterModule($this->MODULE_ID);
        return true;
    }

    function InstallDB()
    {
        global $DB;
        $this->errors = false;
        $this->errors = $DB->RunSQLBatch($_SERVER['DOCUMENT_ROOT'] . '/local/modules/'.$this->MODULE_ID.'/install/db/install.sql');
        if (!$this->errors) {
            return true;
        } else
            return $this->errors;
    }

    function UnInstallDB()
    {
        global $DB;
        $this->errors = false;
        $this->errors = $DB->RunSQLBatch($_SERVER['DOCUMENT_ROOT'] . '/local/modules/'.$this->MODULE_ID.'/install/db/uninstall.sql');
        if (!$this->errors) {
            return true;
        } else
            return $this->errors;
    }


    function InstallFiles($arParams = array()){
        // код отвечающий за установку компонентов
        if (is_dir($p = $_SERVER['DOCUMENT_ROOT'].'/local/modules/'.$this->MODULE_ID.'/install/components')){
            if ($dir = opendir($p)){
                while (false !== $item = readdir($dir)){
                    if ($item == '..' || $item == '.')
                        continue;
                    CopyDirFiles($p.'/'.$item, $_SERVER['DOCUMENT_ROOT'].'/local/components/'.$item, $ReWrite = True, $Recursive = True);
                }
                closedir($dir);
            }
        }
        return true;
    }

    function UnInstallFiles(){
        if (is_dir($p = $_SERVER['DOCUMENT_ROOT'].'/local/modules/'.$this->MODULE_ID.'/install/components')){
            if ($dir = opendir($p)){
                while (false !== $item = readdir($dir)){
                    if ($item == '..' || $item == '.' || !is_dir($p0 = $p.'/'.$item))
                        continue;

                    $dir0 = opendir($p0);
                    while (false !== $item0 = readdir($dir0))
                    {
                        if ($item0 == '..' || $item0 == '.')
                            continue;
                        DeleteDirFilesEx('/local/components/'.$item.'/'.$item0);
                    }
                    closedir($dir0);
                }
                closedir($dir);
            }
        }
        return true;
    }
}