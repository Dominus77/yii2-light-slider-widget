<?php

namespace dominus77\lightslider;

use yii\base\Widget;
use yii\web\JsExpression;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use dominus77\lightslider\assets\SliderAsset;

/**
 * Class Slider
 * Renders a JQuery LightSlider widget for Yii2.
 * @package dominus77\lightslider
 * @see http://sachinchoolur.github.io/lightslider/
 *
 * <?= Slider::widget([
 *  'items' => ['Slide 1', 'Slide 2', 'Slide 3', 'Slide 4', 'Slide 5', 'Slide 6', 'Slide 7', '...'],
 *  'clientOptions' => [
 *      'item' => 3,
 *      'autoWidth' => false,
 *      'slideMove' => 1, // slidemove will be 1 if loop is true
 *      'slideMargin' => 10,
 *      //...
 *  ],
 * ]); ?>
 */
class Slider extends Widget
{
    /**
     * @var string|integer
     * 'id' => 'myId',
     */
    public $id = '';

    /**
     * Items
     * @var array
     *
     * [
     * '<h1>Slide 1</h1><p>Text 1</p>',
     * '<h1>Slide 2</h1><p>Text 2</p>',
     * '...',
     * ]
     */
    public $items = [];

    /**
     * @var array
     * @see http://sachinchoolur.github.io/lightslider/
     */
    public $clientOptions = [];

    /**
     * List Options
     * @var array
     * 'listOptions' => ['class' => 'myListCssClass']
     */
    public $listOptions = [];

    /**
     * Items options
     * @var array
     * 'itemOptions' => ['class' => 'myItemsCssClass']
     */
    public $itemOptions = [];

    /**
     * @var integer|string
     */
    private $_id;

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        $this->_id = $this->id ? $this->id : $this->getId();
        $this->listOptions['id'] = $this->_id;
    }

    /**
     * Renders widget
     * @inheritdoc
     */
    public function run()
    {
        if ($this->items) {
            $this->registerAssets();
            echo Html::beginTag('ul', $this->listOptions) . PHP_EOL;
            foreach ($this->items as $key => $item) {
                echo Html::tag('li', $item, $this->itemOptions) . PHP_EOL;
            }
            echo Html::endTag('ul') . PHP_EOL;
        }
    }

    /**
     * Set client options
     * @return string
     */
    public function getOptions()
    {
        $options = [];
        $options = ArrayHelper::merge($options, $this->clientOptions);
        return json_encode($options);
    }

    /**
     * Register resource
     */
    public function registerAssets()
    {
        $options = $this->getOptions();
        $view = $this->getView();
        SliderAsset::register($view);
        $script = new JsExpression("
            $('#{$this->_id}').lightSlider({$options});
        ");
        $view->registerJs($script, $view::POS_READY);
    }
}
