# JQuery LightSlider Widget

[![Latest Stable Version](https://poser.pugx.org/dominus77/yii2-light-slider-widget/v/stable)](https://packagist.org/packages/dominus77/yii2-light-slider-widget)
[![License](https://poser.pugx.org/dominus77/yii2-light-slider-widget/license)](https://github.com/Dominus77/yii2-light-slider-widget/blob/master/LICENSE.md)
[![Total Downloads](https://poser.pugx.org/dominus77/yii2-light-slider-widget/downloads)](https://packagist.org/packages/dominus77/yii2-light-slider-widget)

Renders a [JQuery LightSlider](http://sachinchoolur.github.io/lightslider/) widget for Yii2.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist dominus77/yii2-light-slider-widget "^1.0"
```

or add

```
"dominus77/yii2-light-slider-widget": "^1.0"
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
]) ?>
```
## More Information
Please, check the [JQuery LightSlider](http://sachinchoolur.github.io/lightslider/)

## License
The MIT License (MIT). Please see [License File](https://github.com/Dominus77/yii2-light-slider-widget/blob/master/LICENSE.md) for more information.
