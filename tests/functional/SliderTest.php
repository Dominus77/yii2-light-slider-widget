<?php

namespace tests;

use yii\helpers\Json;
use dominus77\lightslider\Slider;

/**
 * Class SliderTest
 * @package tests
 */
class SliderTest extends TestCase
{
    /**
     * check getOptions()
     */
    public function testGetClientOptions()
    {
        $slider = new Slider(['clientOptions' => ['item' => 3]]);
        $clientOptions = [
            'item' => 3,
        ];
        $this->assertJson(Json::encode($clientOptions), $slider->getOptions());
    }

    public function testRunSlider()
    {
        $sliders = ['Slide 1', 'Slide 2', 'Slide 3'];
        $slider = new Slider([
            'id' => 'testId',
            'items' => $sliders,
        ]);
        $this->assertEquals($slider->run(), null);
    }

    public function testRunGallery()
    {
        $sliders = [
            [
                'item' => \yii\helpers\Html::img(\Yii::getAlias('@web/uploads/img/image1.jpg')),
                'options' => [
                    'data-thumb' => \Yii::getAlias('@web/uploads/img/thumb/image1.jpg'),
                    'data-src' => \Yii::getAlias('@web/uploads/img/largeImage1.jpg'),
                ]
            ],
            [
                'item' => \yii\helpers\Html::img(\Yii::getAlias('@web/uploads/img/image2.jpg')),
                'options' => [
                    'data' => [
                        'thumb' => \Yii::getAlias('@web/uploads/img/thumb/image2.jpg'),
                        'src' => \Yii::getAlias('@web/uploads/img/largeImage2.jpg'),
                    ]
                ],
            ]
        ];
        $slider = new Slider([
            'id' => 'testId',
            'items' => $sliders,
            'clientOptions' => [
                'gallery' => true,
            ],
        ]);
        $this->assertEquals($slider->run(), null);
    }
}
