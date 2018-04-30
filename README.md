# JQuery LightSlider Widget
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
        //...        
    ],
]) ?>
```
## More Information
Please, check the [JQuery LightSlider](http://sachinchoolur.github.io/lightslider/)

## License
The MIT License (MIT). Please see [License File](https://github.com/Dominus77/yii2-light-slider-widget/blob/master/LICENSE.md) for more information.
