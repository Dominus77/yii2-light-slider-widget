# JQuery LightSlider Widget

[![Latest Stable Version](https://poser.pugx.org/dominus77/yii2-light-slider-widget/v/stable)](https://packagist.org/packages/dominus77/yii2-light-slider-widget)
[![License](https://poser.pugx.org/dominus77/yii2-light-slider-widget/license)](https://packagist.org/packages/dominus77/yii2-light-slider-widget)
[![Build Status](https://travis-ci.org/Dominus77/yii2-light-slider-widget.svg?branch=master)](https://travis-ci.org/Dominus77/yii2-light-slider-widget)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Dominus77/yii2-light-slider-widget/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Dominus77/yii2-light-slider-widget/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/Dominus77/yii2-light-slider-widget/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Dominus77/yii2-light-slider-widget/?branch=master)
[![Total Downloads](https://poser.pugx.org/dominus77/yii2-light-slider-widget/downloads)](https://packagist.org/packages/dominus77/yii2-light-slider-widget)
[![PayPal donate button](https://img.shields.io/badge/paypal-donate-yellow.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KNSWKBG7P8ENU "Donate once-off to this project using Paypal")

Renders a [JQuery LightSlider](http://sachinchoolur.github.io/lightslider/) widget for Yii2.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist dominus77/yii2-light-slider-widget "~1.0"
```

or add

```
"dominus77/yii2-light-slider-widget": "~1.0"
```

to the require section of your `composer.json` file.


## Usage

Once the extension is installed, simply use it in your code by  :

```php
<?= \dominus77\lightslider\Slider::widget([
    'items' => ['Slide 1', 'Slide 2', 'Slide 3', 'Slide 4', 'Slide 5', 'Slide 6', 'Slide 7'],
    'clientOptions' => [            
        'item' => 3,
        'autoWidth' => false,
        'slideMove' => 1, // slidemove will be 1 if loop is true
        'slideMargin' => 10,
        //...        
    ],
    'listOptions' => [],
    'itemOptions' => [],
]) ?>
```

## Integrate with [lightGallery](http://sachinchoolur.github.io/lightGallery/)
```php
<?= \dominus77\lightslider\Slider::widget([
    'id' => 'myGalleryID',
    'items' => [
        [
            'item' => \yii\helpers\Html::img(Yii::getAlias('@web/uploads/img/image1.jpg')),
            'options' => [
                'data-thumb' => \Yii::getAlias('@web/uploads/img/thumb/image1.jpg'),
                'data-src' => \Yii::getAlias('@web/uploads/img/largeImage1.jpg'),
                //...
            ]
        ],
        [
            'item' => \yii\helpers\Html::img(Yii::getAlias('@web/uploads/img/image2.jpg')),
            'options' => [
                'data' => [
                    'thumb' => \Yii::getAlias('@web/uploads/img/thumb/image2.jpg'),
                    'src' => \Yii::getAlias('@web/uploads/img/largeImage2.jpg'),
                ],
                //...
            ]
        ],
    ],
    'clientOptions' => [            
        'gallery' => true,
        'item' => 1,
        'loop' => true,
        'thumbItem' => 9,
        'slideMargin' => 0,
        'enableDrag' => false,
        'currentPagerPosition' => 'left',
        'onSliderLoad' => new \yii\web\JsExpression("function(el) {
            el.lightGallery({
                selector: '#myGalleryID .lslide'
            });
        }"),
        //...        
    ],
]) ?>
```

## More Information
Please, check the [JQuery LightSlider](http://sachinchoolur.github.io/lightslider/)

## License
The MIT License (MIT). Please see [License File](https://github.com/Dominus77/yii2-light-slider-widget/blob/master/LICENSE.md) for more information.
