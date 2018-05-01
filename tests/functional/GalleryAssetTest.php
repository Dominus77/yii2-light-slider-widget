<?php

namespace tests;

use dominus77\lightslider\assets\GalleryAsset;
use yii\web\AssetBundle;

/**
 * Class GalleryAssetTest
 * @package tests
 */
class GalleryAssetTest extends TestCase
{
    /**
     * @inheritdoc
     */
    public function testRegister()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        GalleryAsset::register($view);
        $this->assertEquals(2, count($view->assetBundles));
        $this->assertTrue($view->assetBundles['dominus77\\lightslider\\assets\\GalleryAsset'] instanceof AssetBundle);
        $content = $view->renderFile('@tests/views/layouts/rawlayout.php');
        $this->assertContains('lightgallery.css', $content);
        $this->assertContains('lightgallery.js', $content);
    }
}
