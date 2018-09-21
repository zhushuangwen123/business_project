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
                <p><font size="4">电话: 13644273918</font></p>
                <p><font size="4">E-mail: haotekeji@126.cn</font></p>
                <p><font size="4">地址: 辽宁省大连经济开发区东北七街18号</font></p>
            </div>
        </div>
        <div class="col-lg-3">
            <?=\app\widgets\Category::widget(['type'=>\app\models\Content::TYPE_PRODUCTS,
                'options'=>['class'=>'panel panel-default panel-'.\yii\helpers\ArrayHelper::getValue($this->params,'themeColor')]
            ])?>
            <?=\app\widgets\Cases::widget(['type'=>\app\models\Content::TYPE_NEW_CASE,
                                           'options'=>['class'=>'panel panel-default panel-'.\yii\helpers\ArrayHelper::getValue($this->params,'themeColor')]
                                          ])?>
            <?=\app\widgets\LastNews::widget(['options'=>['class'=>'panel panel-default panel-'.\yii\helpers\ArrayHelper::getValue($this->params,'themeColor')]
            ])?>
        </div>
    </div>
</div>
