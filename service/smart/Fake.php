<?php
/**
 * Author:  Maxamadjonov Jaxongir
 *
 * Refactored: Daho
 * Date: 17.05.2020
 *
 */

namespace zetsoft\service\smart;

use Faker;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;
use zetsoft\dbitem\core\NormServiceItem;
use zetsoft\dbitem\data\ALLApp;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\FormDb;
use zetsoft\dbitem\data\Settings;
use zetsoft\models\test\TestDep;
use zetsoft\models\test\Test3;
use zetsoft\models\test\Test5;
use zetsoft\models\test\TestD;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\system\actives\ZModel;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZFileHelper;
use zetsoft\system\helpers\ZInflector;
use zetsoft\system\helpers\ZStringHelper;
use zetsoft\system\kernels\ZFrame;
use zetsoft\system\module\Models;

class Fake extends ZFrame
{

    public const name = 'name';
    public const firstName = 'firstName';
    public const firstNameMale = 'firstNameMale';
    public const firstNameFemale = 'firstNameFemale';
    public const lastName = 'lastName';
    public const title = 'title';
    public const titleMale = 'titleMale';
    public const titleFemale = 'titleFemale';
    public const citySuffix = 'citySuffix';
    public const streetSuffix = 'streetSuffix';
    public const buildingNumber = 'buildingNumber';
    public const city = 'city';
    public const streetName = 'streetName';
    public const streetAddress = 'streetAddress';
    public const secondaryAddress = 'secondaryAddress';
    public const postcode = 'postcode';
    public const address = 'address';
    public const state = 'state';
    public const country = 'country';
    public const latitude = 'latitude';
    public const longitude = 'longitude';
    public const ean13 = 'ean13';
    public const ean8 = 'ean8';
    public const isbn13 = 'isbn13';
    public const isbn10 = 'isbn10';
    public const phoneNumber = 'phoneNumber';
    public const e164PhoneNumber = 'e164PhoneNumber';
    public const company = 'company';
    public const companySuffix = 'companySuffix';
    public const jobTitle = 'jobTitle';
    public const creditCardType = 'creditCardType';
    public const creditCardNumber = 'creditCardNumber';
    public const creditCardExpirationDate = 'creditCardExpirationDate';
    public const creditCardExpirationDateString = 'creditCardExpirationDateString';
    public const creditCardDetails = 'creditCardDetails';
    public const bankAccountNumber = 'bankAccountNumber';
    public const swiftBicNumber = 'swiftBicNumber';
    public const vat = 'vat';
    public const word = 'word';
    public const words = 'words';
    public const sentence = 'sentence';
    public const sentences = 'sentences';
    public const paragraph = 'paragraph';
    public const paragraphs = 'paragraphs';
    public const text = 'text';
    public const email = 'email';
    public const safeEmail = 'safeEmail';
    public const freeEmail = 'freeEmail';
    public const companyEmail = 'companyEmail';
    public const freeEmailDomain = 'freeEmailDomain';
    public const safeEmailDomain = 'safeEmailDomain';
    public const userName = 'userName';
    public const password = 'password';
    public const domainName = 'domain';
    public const domainWord = 'domainWord';
    public const tld = 'tld';
    public const url = 'url';
    public const slug = 'slug';
    public const ipv4 = 'ipv4';
    public const ipv6 = 'ipv6';
    public const localIpv4 = 'localIpv4';
    public const macAddress = 'macAddress';
    public const unixTime = 'unixTime';
    public const dateTime = 'dateTime';
    public const dateTimeAD = 'dateTimeAD';
    public const iso8601 = 'iso8601';
    public const dateTimeThisCentury = 'dateTimeThisCentury';
    public const dateTimeThisDecade = 'dateTimeThisDecade';
    public const dateTimeThisYear = 'dateTimeThisYear';
    public const dateTimeThisMonth = 'dateTimeThisMonth';
    public const amPm = 'amPm';
    public const dayOfMonth = 'dayOfMonth';
    public const dayOfWeek = 'dayOfWeek';
    public const month = 'month';
    public const monthName = 'monthName';
    public const year = 'year';
    public const century = 'century';
    public const timezone = 'timezone';
    public const md5 = 'md5';
    public const sha1 = 'sha1';
    public const sha256 = 'sha256';
    public const locale = 'locale';
    public const countryCode = 'countryCode';
    public const countryISOAlpha3 = 'countryISOAlpha3';
    public const languageCode = 'languageCode';
    public const currencyCode = 'currencyCode';
    public const boolean = 'boolean';
    public const randomDigit = 'randomDigit';
    public const randomDigitNot = 'randomDigitNot';
    public const randomDigitNotNull = 'randomDigitNotNull';
    public const randomLetter = 'randomLetter';
    public const randomAscii = 'randomAscii';
    public const macProcessor = 'macProcessor';
    public const linuxProcessor = 'linuxProcessor';
    public const userAgent = 'userAgent';
    public const chrome = 'chrome';
    public const firefox = 'firefox';
    public const safari = 'safari';
    public const opera = 'opera';
    public const internetExplorer = 'internetExplorer';
    public const windowsPlatformToken = 'windowsPlatformToken';
    public const macPlatformToken = 'macPlatformToken';
    public const linuxPlatformToken = 'linuxPlatformToken';
    public const uuid = 'uuid';
    public const mimeType = 'mimeType';
    public const fileExtension = 'fileExtension';
    public const hexColor = 'hexColor';
    public const safeHexColor = 'safeHexColor';
    public const rgbColor = 'rgbColor';
    public const rgbColorAsArray = 'rgbColorAsArray';
    public const rgbCssColor = 'rgbCssColor';
    public const safeColorName = 'safeColorName';
    public const colorName = 'colorName';
    public const image = 'image';

    public $rekursiv = true;
    public $imageSize = self::imageSize['gmail'];
    public $classes = [];

    public const imageSize = [
        'xga' => '/1024/768/',
        'github' => '/500/500/',
        'gmail' => '/143/59/',
        'small' => '/180/240/',
        'medium' => '/375/500/',
        'avatar' => '/100/75/',
        'thumbnail' => '/75/100/',
        'square' => '/75/75/'
    ];

    #region Vars
    private $faker;
    public $hasOne = [];
    public $hasMulti = [];
    public $hasMany = [];


#endregion

    #region Test

    public function test()
    {
        $this->testD();
    }

    public function testD()
    {
        $this->classes = [TestD::class];
        $this->model();
        vdd(TestD::find()->select('sender')->asArray()->all());
    }

    #endregion
#region ALL

    public function init()
    {

        parent::init(); // TODO: Change the autogenerated stub

        $this->faker = Faker\Factory::create();
        $this->faker->addProvider(new Faker\Provider\ru_RU\Person($this->faker));
        $this->faker->addProvider(new Faker\Provider\ru_RU\Address($this->faker));
        $this->faker->addProvider(new Faker\Provider\ru_RU\Company($this->faker));
        $this->faker->addProvider(new Faker\Provider\ru_RU\PhoneNumber($this->faker));
        $this->faker->addProvider(new Faker\Provider\ru_RU\Internet($this->faker));
        $this->faker->addProvider(new Faker\Provider\ru_RU\Payment($this->faker));
        $this->faker->addProvider(new Faker\Provider\ru_RU\Text($this->faker));
        $this->faker->addProvider(new Faker\Provider\ru_RU\Color($this->faker));

        $this->faker->addProvider(new Faker\Provider\Barcode($this->faker));
        $this->faker->addProvider(new Faker\Provider\DateTime($this->faker));
        $this->faker->addProvider(new Faker\Provider\HtmlLorem($this->faker));
        $this->faker->addProvider(new Faker\Provider\UserAgent($this->faker));
        $this->faker->addProvider(new Faker\Provider\Image($this->faker));
    }


    public function run()
    {
        $this->model();
        $this->form();
    }

    public function check($condition)
    {
        if ($condition) return true;
        return false;
    }
    #endregion


#region Model

    public function model()
    {
        $classes = Az::$app->smart->migra->scan();
        if (!empty($this->classes))
            $classes = $this->classes;
        /*$classes = [
            TestDep::class
        ];*/

        foreach ($classes as $class) {
            /** @var Models $object */
            $object = new $class();
            Az::debug('Starting ' . $object::className() . ' checking.');

            if ($object->configs->faker)
                for ($i = 0; $i < $object->configs->fakerCount; $i++) {
                    $model = clone $object;

                    foreach ($model->columns as $key => $column) {

                        if ($column->dbType === dbTypeJsonb) {
                            if ($column->faker) {
                                $config = ZArrayHelper::getValue($column->options, 'config');
                                if ($config != null) {
                                    $clases = ZArrayHelper::getValue($config, 'formClass');
                                    if ($classes != null) {
                                        $model->$key = $this->recursiv($clases);
                                        $model->save();
                                        continue;
                                    }
                                }
                            }
                        }

                        switch (true) {
                            case !empty($column->fakerFunc):
                                $fakerType = $column->faker;
                                $func = $column->fakerFunc;
                                $val = call_user_func_array([$this->faker, $fakerType], $func);
                                break;

                            case !empty($column->fakerData):
                                $val = $column->fakerData;
                                $va = new $val;
                                $val = $va->lang();
                                $model->$key = $val;
                                break;

                            case !empty($column->faker):
                                $fakerType = $column->faker;
                                $val = $this->faker->$fakerType;
                                break;


                        }

                        if ($column->faker === null)
                            continue;


                        $model->$key = $val;

                    }

                    $model->save();
                }


        }
    }

    private function relation($classes)
    {
        foreach ($classes as $class) {

            /** @var Models $model */
            $model = new $class();

            $hasManyTables = [];
            $hasMultiTables = [];
            $hasOnetables = [];

            /** @var FormDb $formDB */
            foreach ($model->allApp()->columns as $key => $formDB) {
                switch (true) {

                    case $formDB->fkMulti:
                        $tableName = $formDB->fkMulti;

                        $className = ZInflector::camelize($tableName);

                        $hasMultiTables[] = [
                            'className' => $className,
                            'key' => $key,
                        ];

                        break;

                    case !empty($formDB->fkTable):
                        $tableName = $formDB->fkTable;

                        $className = ZInflector::camelize($tableName);
                        $className = 'zetsoft\\models\\' . $this->catModel($className) . '\\' . $className;

                        $hasManyTables[] = [
                            'className' => $className,
                            'key' => $key,
                        ];
                        $hasOnetables[] = [
                            'className' => bname($className),
                            'key' => $key,
                        ];

                        break;

                    case ZStringHelper::endsWith($key, '_ids'):
                        $tableName = str_replace('_ids', '', $key);

                        $className = Inflector::camelize($tableName);

                        $hasMultiTables[] = [
                            'className' => $className,
                            'key' => $key,
                        ];
                        break;

                    case ZStringHelper::endsWith($key, '_id'):
                        $tableName = str_replace('_id', '', $key);

                        $className = Inflector::camelize($tableName);

                        $hasManyTables[] = [
                            'className' => $className,
                            'key' => $key,
                        ];
                        $hasOnetables[] = [
                            'className' => $className,
                            'key' => $key,
                        ];

                        break;


                }
            }

            foreach ($hasOnetables as $hasOneTable) {

                $this->hasOne[bname($class)][$hasOneTable['className']][$hasOneTable['key']] = 'id';
            }

            foreach ($hasMultiTables as $hasMultiTable)
                $this->hasMulti[bname($class)][$hasMultiTable['className']][$hasMultiTable['key']] = 'id';

            foreach ($hasManyTables as $hasManyTable)
                $this->hasMany[bname($hasManyTable['className'])][bname($class)][$hasManyTable['key']] = 'id';
        }
    }

    private function recursiv($class)
    {
        $save = [];
        $object = new $class();
        $model = clone $object;
        if ($model->configs->faker)
            foreach ($model->columns as $key => $column) {

                if ($column->dbType === dbTypeJsonb && $this->rekursiv) {
                    //$this->rekursiv=false;
                    $clases = $column->options['config']['formClass'];
                    $save[$key] = $this->recursiv($clases);
                    continue;
                }
                if ($column->faker === null) {
                    $save[$key] = '';
                    continue;
                }
                $fakerType = $column->faker;
                $val = $this->faker->$fakerType;
                $save[$key] = $val;
            } else return null;
        return $save;
    }

#endregion


}
