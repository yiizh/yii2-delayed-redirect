<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) yiizh.com
 */

use yii\web\JqueryAsset;
use yii\web\View;

/**
 * @var $this View
 * @var $title null|string
 * @var $subTitle null|string
 * @var $desc null|string
 * @var $delay int
 * @var $url string
 */

$this->title = $title;

$this->registerMetaTag([
    'http-equiv' => 'refresh',
    'content' => '3;url=' . $url
]);

JqueryAsset::register($this);
$this->registerJs(<<<JS
    var interval = 100;
    var total = {$delay}*1000;
    var start = 0;
    
    var timer = setInterval(function() {
        start+=interval;
        var persent = Math.ceil(start/total*100);
        console.log(persent);
        setProgress(persent);
    }, interval);
    
    setTimeout(function() {
        clearInterval(timer);
    },{$delay}*1000);
    
    function setProgress(persent) {
        var progress = $('#progress');
        progress.attr({
            'aria-valuenow': persent,
            'style':'width: '+persent+"%"
        }).text(persent+'%');
    }
JS
)
?>
<div class="delayed-redirect" style="padding: 200px 15px 15px 15px;">
    <h3 class="text-center"><?= $title ?>
        <small><?= $subTitle ?></small>
    </h3>
    <div class="progress">
        <div id="progress" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0"
             aria-valuemin="0" aria-valuemax="100"
             style="width: 0;">
            0%
        </div>
    </div>
    <p class="text-muted"><?= $desc ?></p>
</div>
