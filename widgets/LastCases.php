<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 2016/12/10
 * Time: 15:03
 * Email:liyongsheng@meicai.cn
 */

namespace app\widgets;
use app\models\Cases;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

class LastCases extends Panel
{
    public $title = '最新案例';
    public $limit=5;
    public $showDate = false;
    public $itemOptions = ['class'=>'list-group-item', 'baseUrl'=>'/cases/item'];
    /**
     *
     * @return null|string
     */
    public function renderBodyBegin()
    {
        if($this->showBody==false){
            return null;
        }
        $newsList = Cases::find()
            ->where(['status'=>Cases::STATUS_ENABLE])
            ->limit($this->limit)
            ->orderBy('id desc')
            ->all();
        $html = Html::beginTag('ul', ['class'=>'list-group']);
        foreach($newsList as $item) {
            $url = Url::to([ArrayHelper::remove($this->itemOptions,'baseUrl', '/cases/item'), 'id'=>$item['id']]);
            $html .= Html::beginTag('li', $this->itemOptions);
            $html .='<a href="'.$url.'">'.$item['title'].'</a>';
            if($this->showDate){
                $html .= '<span class="badge pull-right">'.date('Y-m-d').'</span>';
            }
            $html .= Html::endTag('li');
        }
        $html .= Html::endTag('ul');
        return $html;
    }

    public function run()
    {
        echo Html::beginTag('div', $this->options) . "\n";
        echo $this->renderHeader() . "\n";
        echo $this->renderBodyBegin() . "\n";
        echo Html::endTag('div');
    }
}