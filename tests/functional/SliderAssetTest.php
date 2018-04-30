<?php

namespace tests;

use dominus77\lightslider\assets\SliderAsset;
use yii\web\AssetBundle;

/**
 * Class SliderAssetTest
 * @package tests
 */
class SliderAssetTest extends TestCase
{
    /**
     * @inheritdoc
     */
    public function testRegister()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        SliderAsset::register($view);
        $this->assertEquals(2, count($view->assetBundles));
        $this->assertTrue($view->assetBundles['dominus77\\lightslider\\assets\\SliderAsset'] instanceof AssetBundle);
        $content = $view->renderFile('@tests/views/layouts/rawlayout.php');
        $this->assertContains('lightslider.css', $content);
        $this->assertContains('lightslider.js', $content);
    }
}
