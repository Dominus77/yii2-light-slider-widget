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
    public $sourcePath = '@bower/lightslider/src';

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
        parent::init();
        $this->css = ['css/lightslider.css'];
        $this->js = ['js/lightslider.js'];
    }

    /**
     * @var array
     */
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
