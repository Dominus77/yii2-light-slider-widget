<?php

namespace dominus77\lightslider\assets;

use yii\web\AssetBundle;

/**
 * Class SliderAsset
 * @package dominus77\lightslider\assets
 */
class SliderAsset extends AssetBundle
{
    /**
     * @var string
     */
    public static $theme = 'default';

    /**
     * @var string
     */
    public $sourcePath = '@bower/owlcarousel2/dist';

    /**
     * @var array
     */
    public $css = [];

    /**
     * @var array
     */
    public $js = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        $min = YII_ENV_DEV ? '' : '.min';
        $this->css[] = 'assets/owl.carousel' . $min . '.css';
        $this->css[] = 'assets/owl.theme.' . self::$theme . $min . '.css';

        $this->js[] = 'owl.carousel' . $min . '.js';
    }

    /**
     * @var array
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
