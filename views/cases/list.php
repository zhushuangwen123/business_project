<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 2016/12/7
 * Time: 10:55
 * Email:liyongsheng@meicai.cn
 */

/* @var $this yii\web\View */
/** @var $dataProvider \yii\data\ActiveDataProvider */
use yii\grid\GridView;
use yii\bootstrap\Html;

$this->title = '案例';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-lg-9">
                <div class="panel panel-default panel-<?=\yii\helpers\ArrayHelper::getValue($this->params,'themeColor')?>">
                    <div class="panel-heading" style="border-bottom: none;"><h3 class="panel-title">案例</h3></div>
                </div>
                <div>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'tableOptions'=>['class'=>'table-simple'],
                        'showHeader'=>false,
                        'layout' => "{items}\n{pager}",
                        'columns' => [
                            [
                                'attribute'=>'title',
                                'format'=>'raw',
                                'value'=>function($item){
                                    $html = '<h4>'.Html::a($item->title, ['/cases/item', 'id'=>$item->id]).'</h4>';
                                    $html .= '<p>'.Html::encode($item->description).'</p>';
                                    return $html;
                                }
                            ],
                            [
                                'attribute'=>'created_at',
                                'format'=>'date',
                                'options'=>['class'=>'text-right','style'=>'width:100px']
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
            <div class="col-lg-3">
                <?=\app\widgets\Category::widget(['type'=>\app\models\Content::TYPE_CASE,'title'=>'案例分类','baseUrl'=>'/cases/list',
                    'options'=>['class'=>'panel panel-default panel-'.\yii\helpers\ArrayHelper::getValue($this->params,'themeColor')]
                ])?>
                <?=\app\widgets\LastCases::widget(['options'=>['class'=>'panel panel-default panel-'.\yii\helpers\ArrayHelper::getValue($this->params,'themeColor')]
                ])?>
                <?=\app\widgets\ConfigPanel::widget(['configName'=>'contact_us',
                    'options'=>['class'=>'panel panel-default panel-'.\yii\helpers\ArrayHelper::getValue($this->params,'themeColor')]
                ])?>
                <?=\app\widgets\ConfigPanel::widget(['configName'=>'donate',
                    'options'=>['class'=>'panel panel-default panel-'.\yii\helpers\ArrayHelper::getValue($this->params,'themeColor')]
                ])?>
                <?=\app\widgets\ConfigPanel::widget(['configName'=>'gongyishipin',
                    'options'=>['class'=>'panel panel-default panel-'.\yii\helpers\ArrayHelper::getValue($this->params,'themeColor')]
                ])?>
            </div>
        </div>
    </div>
</div>