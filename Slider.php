<?php

namespace dominus77\lightslider;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;
use dominus77\lightslider\assets\SliderAsset;
use dominus77\lightslider\assets\GalleryAsset;

/**
 * Class Slider
 * Renders a JQuery LightSlider widget for Yii2.
 * @package dominus77\lightslider
 * @see http://sachinchoolur.github.io/lightslider/
 *
 * Render Slider
 * -------------------------------------------------
 * <?= \dominus77\lightslider\Slider::widget([
 *  'items' => ['Slide 1', 'Slide 2', 'Slide 3', 'Slide 4', 'Slide 5', 'Slide 6', 'Slide 7', '...'],
 *  'clientOptions' => [
 *      'item' => 3,
 *      'autoWidth' => false,
 *      'slideMove' => 1, // slidemove will be 1 if loop is true
 *      'slideMargin' => 10,
 *      //...
 *  ],
 *  'listOptions' => [],
 *  'itemOptions' => [],
 * ]); ?>
 *
 * Integrate with lightGallery (http://sachinchoolur.github.io/lightGallery/)
 * -------------------------------------------------
 * <?= \dominus77\lightslider\Slider::widget([
 *  'id' => 'myGalleryID',
 *  'items' => [
 *      [
 *          'item' => \yii\helpers\Html::img(Yii::getAlias('@web/uploads/img/image1.jpg')),
 *          'options' => [
 *              'data-thumb' => \Yii::getAlias('@web/uploads/img/thumb/image1.jpg'),
 *              'data-src' => \Yii::getAlias('@web/uploads/img/largeImage1.jpg'),
 *              //...
 *          ]
 *      ],
 *      [
 *          'item' => \yii\helpers\Html::img(Yii::getAlias('@web/uploads/img/image2.jpg')),
 *          'options' => [
 *              'data' => [
 *                  'thumb' => \Yii::getAlias('@web/uploads/img/thumb/image2.jpg'),
 *                  'src' => \Yii::getAlias('@web/uploads/img/largeImage2.jpg'),
 *              ],
 *              //...
 *          ]
 *      ],
 *      //...
 *  ],
 *  'clientOptions' => [
 *      'gallery' => true,
 *      'item' => 1,
 *      'loop' => true,
 *      'thumbItem' => 9,
 *      'slideMargin' => 0,
 *      'enableDrag' => false,
 *      'currentPagerPosition' => 'left',
 *      'onSliderLoad' => new \yii\web\JsExpression("function(el) {
 *           el.lightGallery({
 *               selector: '#myGalleryID .lslide'
 *          });
 *      }"),
 *      //...
 *  ],
 *  //...
 * ]); ?>
 */
class Slider extends Widget
{
    /**
     * @var string
     * 'id' => 'myId',
     */
    public $id = '';

    /**
     * Set Items
     * @var array
     *
     * Example 1: Indexed items array
     * ---------------------------------
     * $items = [
     *  '<h1>Slide 1</h1><p>Text 1</p>',
     *  '<h1>Slide 2</h1><p>Text 2</p>',
     *  '...',
     * ]
     *
     * Example 2: Associative items array
     * ---------------------------------
     * $items = [
     *  [
     *      'item' => '<h1>Slide 1</h1><p>Text 1</p>',
     *      'options' => [
     *          'class' => 'text-success',
     *      ]
     *  ],
     *  [
     *      'item' => '<h1>Slide 2</h1><p>Text 2</p>',
     *      'options' => [
     *          'class' => 'text-danger',
     *      ]
     *  ],
     *  //...
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
     *
     * Usage:
     * 'listOptions' => ['class' => 'myListCssClass']
     * Result:
     * <ul class="myListCssClass">...</ul>
     */
    public $listOptions = [];

    /**
     * Global Items options
     * @var array
     *
     * Usage:
     * 'itemsOptions' => ['class' => 'myItemsCssClass']
     * Result:
     * <li class="myItemsCssClass">...</li>
     */
    public $itemsOptions = [];

    /**
     * @var string
     */
    private $_selector = '';

    /**
     * @var array
     */
    private $_options = [];

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        $this->_selector = $this->id ? $this->id : $this->getId();
        $this->listOptions['id'] = $this->_selector;
        $this->_options = $this->getOptions();
    }

    /**
     * Renders widget
     * @return string|void
     */
    public function run()
    {
        if (!empty($this->items)) {
            $this->registerAssets();
            echo PHP_EOL . Html::beginTag('ul', $this->listOptions) . PHP_EOL;
            if (ArrayHelper::isAssociative($this->items[0])) {
                $this->renderAssociativeItems();
            } else {
                $this->renderIndexedItems();
            }
            echo Html::endTag('ul') . PHP_EOL;
        }
    }

    /**
     * Render Indexed array items
     */
    public function renderIndexedItems()
    {
        foreach ($this->items as $key => $item) {
            echo Html::tag('li', $item, $this->itemsOptions) . PHP_EOL;
        }
    }

    /**
     * Render Associative array items
     */
    public function renderAssociativeItems()
    {
        foreach ($this->items as $item) {
            $itemData = [];
            if (isset($item['options'])) {
                foreach ($item['options'] as $key => $data) {
                    $itemData[$key] = $data;
                }
            }
            $itemOptions = ArrayHelper::merge($itemData, $this->itemsOptions);
            echo Html::tag('li', $item['item'], $itemOptions) . PHP_EOL;
        }
    }

    /**
     * Set client options
     * @return array
     */
    public function getOptions()
    {
        $options = [];
        return ArrayHelper::merge($options, $this->clientOptions);
    }

    /**
     * Register resource
     */
    public function registerAssets()
    {
        $options = Json::encode($this->_options);
        $view = $this->getView();
        SliderAsset::register($view);
        if (isset($this->_options['gallery']) && $this->_options['gallery'] === true) {
            GalleryAsset::register($view);
        }
        $script = new JsExpression("
            var slider = $('#{$this->_selector}').lightSlider({$options});
        ");
        $view->registerJs($script, $view::POS_READY);
    }
}
