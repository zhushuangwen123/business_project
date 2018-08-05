<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\Feedback */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\models\Feedback;

$this->title = '联系我们';
$this->params['breadcrumbs'][] = $this->title;
empty($model) && $model = new Feedback();
?>
<div class="site-contact">
    <div class="row">

        <div class="col-lg-9">
            <div class="panel-body">
                <p><font size="4">联系人: 王经理</font></p>
                <p><font size="4">电话:13644273918</font></p>
                <p><font size="4">E-mail: 383448528@qq.com</font></p>
                <p><font size="4">地址: 辽宁省自由贸易试验区大连保税区海富路9-1号</font></p>
            </div>
        </div>
        <div class="col-lg-3">
            <?=\app\widgets\Category::widget(['type'=>\app\models\Content::TYPE_PRODUCTS,
                'options'=>['class'=>'panel panel-default panel-'.\yii\helpers\ArrayHelper::getValue($this->params,'themeColor')]
            ])?>
            <?=\app\widgets\LastNews::widget(['options'=>['class'=>'panel panel-default panel-'.\yii\helpers\ArrayHelper::getValue($this->params,'themeColor')]
            ])?>
            <?=\app\widgets\LastCases::widget(['options'=>['class'=>'panel panel-default panel-'.\yii\helpers\ArrayHelper::getValue($this->params,'themeColor')]
                                             ])?>
        </div>
    </div>
</div>
