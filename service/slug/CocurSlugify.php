<?php

namespace zetsoft\service\slug;

use Cocur\Slugify\Slugify;
use zetsoft\system\kernels\ZFrame;

require Root . '/vendors/string/ALL/vendor/autoload.php';

/**
 * Class CocurSlugify
 * @package zetsoft\service\slug
 * @author NurbekMakhmudov
 * @Todo Converts a string into a slug.
 * https://github.com/cocur/slugify
 * https://packagist.org/packages/cocur/slugify
 */
class CocurSlugify extends ZFrame
{

    //start|NurbekMakhmudov|2020-10-15

    private $slug;

    /**
     * initialization
     */
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->slug = new Slugify();
    }


    /**
     * @param $msg
     * @return |null
     * @author NurbekMakhmudov
     * @todo Removes all special characters from a string.
     * if you need change the separator and  lowercase
     */
    public function slugify($msg, $separator = '-', $lowercase = true)
    {
        if ($msg === null) return null;

        $res = $this->slug->slugify($msg, [
            'separator' => $separator,
            'lowercase' => $lowercase
        ]);
        return $res;
    }


    #region Examples

    public function slugifyExample()
    {
//        echo $this->slugify("Когда МИР  хочет поговорить");
//        echo $this->slugify("Когда МИР  хочет поговорить", '_');
        echo $this->slugify("Когда МИР  хочет поговорить", '_', false);
    }

    #endregion


    //end|NurbekMakhmudov|2020-10-15

}
