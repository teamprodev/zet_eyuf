<?php

namespace zetsoft\service\smart;

use zetsoft\models\test\TestMapGoogle;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZFileHelper;
use zetsoft\system\helpers\ZInflector;
use zetsoft\system\helpers\ZStringHelper;
use zetsoft\system\kernels\ZFrame;
use zetsoft\system\module\Models;

class Cruds extends ZFrame
{
    #region Vars

    private const moduleName = 'cruds';

    private const pathView = '@zetsoft/binary/views';

    private $_pathControl;
    private $_pathwebhtm;
    private $_pathRest;

    #endregion

    #region Core

    public function init()
    {
        parent::init();

        $this->_pathControl = Az::getAlias('@zetsoft/cnweb/' . App . '/' . self::moduleName);
        $this->_pathRest = Az::getAlias('@zetsoft/cnrest/' . self::moduleName);
        $this->_pathwebhtm = Az::getAlias('@zetsoft/webhtm/' . App . '/' . self::moduleName);

        $this->layout = [
            'controller' => file_get_contents(Az::getAlias('@zetsoft/binary/giiapp/control.php')),
            'activeController' => file_get_contents(Az::getAlias('@zetsoft/binary/giiapp/activeControl.php')),
        ];
    }

    public function run()
    {
        $classes = Az::$app->smart->migra->scan();

        $this->web($classes);
        $this->rest($classes);
    }

    public function clean()
    {
        ZFileHelper::removeDirectory($this->_pathControl);
        ZFileHelper::removeDirectory($this->_pathwebhtm);

        Az::info('Control and Viewer Folders are deleted!');
    }

    #endregion


    #region Web

    public function web($classes)
    {

        global $boot;

        $template = $this->layout['controller'];

        /** @var Models[] $classes */
        foreach ($classes as $class) {

            /** @var Models $entity */
            $entity = new $class();

            if ($entity === null) {
                Az::warning($class, 'Classname is Null');
                continue;
            }

            if (null === $entity->configs) {
                Az::warning($class, '$entity->configs is Null');
                continue;
            }

            if (!$entity->configs->makeMenu) {
                Az::warning($class, 'GenCrud is False');
                continue;
            }

            $className = bname($class);
            $filesName = $className . 'Controller.php';


            $pathControl = $this->_pathControl;

            $namespace = App . "/" . self::moduleName;
            $namespace = ZFileHelper::normWindows($namespace);


            $result = strtr($template, [
                'ZControlName' => $className,
                'ZNamespace' => $namespace,
                'ZAPP' => 'Web',
            ]);

            ZFileHelper::createDirectory($pathControl);
            $fileName = $pathControl . '/' . $filesName;

            if (!file_exists($fileName)) {
                Az::info($filesName, 'Processing: ');
                file_put_contents($fileName, $result);
            } else {
                if ($boot->env('overwriteControl')) {
                    Az::info($filesName, 'Overwriting: ');
                    file_put_contents($fileName, $result);
                } else
                    Az::info($filesName, 'Skipping: ');
            }

            $this->views($class, $entity);
        }
    }

    #endregion


    #region Rest

    public function rest($classes)
    {
        global $boot;

        $template = $this->layout['activeController'];

        /** @var Models[] $classes */
        foreach ($classes as $class) {

            /** @var Models $entity */
            $entity = new $class();

            if ($entity === null) {
                Az::warning($class, 'Classname is Null');
                continue;
            }

            if (null === $entity->configs) {
                Az::warning($class, '$entity->configs is Null');
                continue;
            }

            if (!$entity->configs->makeMenu) {
                Az::warning($class, 'GenCrud is False');
                continue;
            }

            $className = bname($class);
            $filesName = $className . 'Controller.php';


            $pathRest = $this->_pathRest;

            $namespace = 'cnrest/' . self::moduleName;
            $namespace = ZFileHelper::normWindows($namespace);


            $result = strtr($template, [
                'ZControlName' => $className,
                'ZNamespace' => $namespace,
                'ZControlZAPP' => 'ZActiveControl',
            ]);

            ZFileHelper::createDirectory($pathRest);
            $fileName = $pathRest . '/' . $filesName;

            if (!file_exists($fileName)) {
                Az::info($filesName, 'Processing: ');
                file_put_contents($fileName, $result);
            } else {
                if ($boot->env('overwriteActiveControl')) {
                    Az::info($filesName, 'Overwriting: ');
                    file_put_contents($fileName, $result);
                } else
                    Az::info($filesName, 'Skipping: ');
            }
        }
    }

    #endregion


    #region Views

    /**
     *
     * Function  views
     * @param $class
     * @param Models $entity
     * @throws \yii\base\Exception
     */
    private function views($class, $entity)
    {

        $source = Az::getAlias(self::pathView);

        $modelPath = bname($class);
        $baseName = bname($class);

        $modelPath = ZInflector::actionize($modelPath);

        $destination = "{$this->_pathwebhtm}/{$modelPath}";

        ZFileHelper::createDirectory($destination);
        ZFileHelper::copyDirectory($source, $destination, [
            'beforeCopy' => function ($from, $to) {
                global $boot;

                if (!$boot->env('overwriteView'))
                    if (file_exists($to)) {
                        Az::debug($to, 'We Dont overwrite view file');
                        return false;
                    }

                Az::debug($to, 'Overwriting View File');
                return true;
            }
        ]);


        $title = strtolower($entity->configs->title);
        ZFileHelper::replaceInPath('ZFullClassName', $class, $destination);
        ZFileHelper::replaceInPath('ZClassName', $baseName, $destination);
        ZFileHelper::replaceInPath('ZModelTitle', $title, $destination);

        $icon = $entity->configs->icon;
        if (empty($icon))
            $icon = Az::$app->utility->mains->icon();

        ZFileHelper::replaceInPath('ZModelIcon', $icon, $destination);

    }

    #endregion

}
