# JQuery LightSlider Widget

[![Latest Stable Version](https://poser.pugx.org/dominus77/yii2-light-slider-widget/v/stable)](https://packagist.org/packages/dominus77/yii2-light-slider-widget)
[![License](https://poser.pugx.org/dominus77/yii2-light-slider-widget/license)](https://packagist.org/packages/dominus77/yii2-light-slider-widget)
[![build](https://github.com/Dominus77/yii2-light-slider-widget/workflows/build/badge.svg)](https://github.com/Dominus77/yii2-light-slider-widget/actions?query=workflow%3Abuild)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Dominus77/yii2-light-slider-widget/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Dominus77/yii2-light-slider-widget/?branch=master)
[![codecov](https://codecov.io/gh/Dominus77/yii2-light-slider-widget/branch/master/graph/badge.svg?token=1F4iI3jrio)](https://codecov.io/gh/Dominus77/yii2-light-slider-widget)
[![Total Downloads](https://poser.pugx.org/dominus77/yii2-light-slider-widget/downloads)](https://packagist.org/packages/dominus77/yii2-light-slider-widget)
[![SymfonyInsight](https://insight.symfony.com/projects/8af85dad-6fae-40d2-8260-9c72ee0875a7/mini.svg)](https://insight.symfony.com/projects/8af85dad-6fae-40d2-8260-9c72ee0875a7)

Renders a [JQuery LightSlider](http://sachinchoolur.github.io/lightslider/) widget and Integrate
with [lightGallery](http://sachinchoolur.github.io/lightGallery/) for Yii2.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
php composer.phar require dominus77/yii2-light-slider-widget
```

or add

```bash
"dominus77/yii2-light-slider-widget": "^1.0"
```

to the require section of your `composer.json` file.

## Usage

Once the extension is installed, simply use it in your code by  :

```php
<?= \dominus77\lightslider\Slider::widget([
    'items' => ['Slide 1', 'Slide 2', 'Slide 3', 'Slide 4', 'Slide 5', 'Slide 6', 'Slide 7'],
    'clientOptions' => [
        // settings: http://sachinchoolur.github.io/lightslider/settings.html
        'item' => 3,
        'autoWidth' => false,
        'slideMove' => 1, // slidemove will be 1 if loop is true
        'slideMargin' => 10,
        //...        
    ],
    'listOptions' => [], // Set <ul> options
    'itemsOptions' => [], // Set options <li> all
]) ?>
```

## Integrate with [lightGallery](http://sachinchoolur.github.io/lightGallery/)

```php
<?= \dominus77\lightslider\Slider::widget([
    'id' => 'myGalleryID',
    'items' => [
        [
            'item' => \yii\helpers\Html::img(\Yii::getAlias('@web/uploads/img/image1.jpg')),
            'options' => [
                'data-thumb' => \Yii::getAlias('@web/uploads/img/thumb/image1.jpg'),
                'data-src' => \Yii::getAlias('@web/uploads/img/largeImage1.jpg'),
                //...
            ]
        ],
        [
            'item' => \yii\helpers\Html::img(\Yii::getAlias('@web/uploads/img/image2.jpg')),
            'options' => [
                'data' => [
                    'thumb' => \Yii::getAlias('@web/uploads/img/thumb/image2.jpg'),
                    'src' => \Yii::getAlias('@web/uploads/img/largeImage2.jpg'),
                ],
                //...
            ]
        ],
        //...
    ],
    'clientOptions' => [            
        'gallery' => true,
        'item' => 1,
        'loop' => true,
        'thumbItem' => 9,
        'slideMargin' => 0,
        'enableDrag' => false,
        'currentPagerPosition' => 'left',
        'onSliderLoad' => new \yii\web\JsExpression("
            function(el) {
                el.lightGallery({
                    // options: http://sachinchoolur.github.io/lightGallery/docs/api.html
                    selector: '#myGalleryID .lslide'
                });
            }
        "),
        //...        
    ],
    //...
]) ?>
```

## Tests

```bash
vendor/bin/phpunit
```

## More Information

Please, check the [JQuery LightSlider](http://sachinchoolur.github.io/lightslider/) and
[lightGallery](http://sachinchoolur.github.io/lightGallery/docs/api.html)

## License

The MIT License (MIT). Please
see [License File](https://github.com/Dominus77/yii2-light-slider-widget/blob/master/LICENSE.md) for more information.

## Sensio Labs

[![SymfonyInsight](https://insight.symfony.com/projects/8af85dad-6fae-40d2-8260-9c72ee0875a7/big.svg)](https://insight.symfony.com/projects/8af85dad-6fae-40d2-8260-9c72ee0875a7)
