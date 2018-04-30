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

    public function testRun()
    {
        $sliders = ['Slide 1', 'Slide 2', 'Slide 3'];
        $slider = new Slider([
            'id' => 'testId',
            'items' => $sliders,
        ]);
        $this->assertEquals($slider->run(), null);
    }
}
