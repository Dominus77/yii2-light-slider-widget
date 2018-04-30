<?php

namespace dominus77\lightslider\assets;

use yii\web\AssetBundle;

/**
 * Class GalleryAsset
 * @package dominus77\lightslider\assets
 */
class GalleryAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/lightgallery/src';

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
        $this->css = ['css/lightgallery.css'];
        $this->js = ['js/lightgallery.js'];
    }

    /**
     * @var array
     */
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
