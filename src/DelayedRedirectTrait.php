<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) yiizh.com
 */

namespace yiizh\extensions\DelayedRedirect;

use yii\helpers\ArrayHelper;
use yii\helpers\Url;

trait DelayedRedirectTrait
{
    /**
     * @param string|array $url 跳转到的 URL 地址
     * @param int $delay 延迟的秒数
     * @param string|null $title 显示的标题
     * @param string|null $subTitle 显示的副标题
     * @param string|null $desc 显示的描述
     * @return string
     */
    public function delayedRedirect($url, $delay = 3, $title = null, $subTitle = null, $desc = null)
    {
        $view = ArrayHelper::getValue(\Yii::$app->params, 'delayedRedirect.view', '@yiizh/extensions/DelayedRedirect/views/delayed-redirect');
        $url = Url::to($url);

        return \Yii::$app->controller->render($view, [
            'title' => $title,
            'subTitle' => $subTitle,
            'desc' => $desc,
            'delay' => $delay,
            'url' => $url
        ]);
    }
}