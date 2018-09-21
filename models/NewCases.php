<?php
/**
 * Created by PhpStorm.
 * User: zhushuangwen
 * Date: 2018/09/20
 * Time: 20:00
 * Email:zhushuangwen@sina.cn
 */

namespace app\models;

use app\components\behaviors\UploadBehavior;
use Yii;

/**
 * Class Products
 * @package app\models
 * @method uploadImgFile()
 */
class NewCases extends Content
{
    static $currentType = Content::TYPE_NEW_CASE;

    public $imageFile;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'type', 'status','category_id'], 'required'],
            [['imageFile'], 'file', 'extensions' => 'gif, jpg, png, jpeg','mimeTypes' => 'image/jpeg, image/png',],
            [['type', 'status', 'admin_user_id', 'category_id','created_at', 'updated_at'], 'integer'],
            [['title', 'image', 'keywords', 'description'], 'string', 'max' => 255],
        ];
    }
    /**
     * @return \app\models\ContentDetail
     */
    public function detail()
    {
        if ($this->isNewRecord) {
            return new ContentDetail(['scenario' => ContentDetail::SCENARIO_PRODUCTS]);
        } else {
            /** @var ContentDetail $model */
            $model = $this->hasOne(ContentDetail::className(), ['content_id' => 'id'])->one();
            $model->scenario = ContentDetail::SCENARIO_PRODUCTS;
            return $model;
        }
    }

    public function beforeSave($insert)
    {
        $res = parent::beforeSave($insert);

        if($res==false){
            return $res;
        }
        if (!$this->validate()) {
            Yii::info('Model not updated due to validation error.', __METHOD__);
            return false;
        }
        $file = $this->uploadImgFile();

        if($file){
            $this->image = $file;
        }
        return true;
    }

    public function behaviors()
    {
        return [
            [
                'class'=>UploadBehavior::className(),
                'saveDir'=>'cases-img/'
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'typeText'=>'类型',
            'category_id'=>'分类',
            'image' => '图片',
            'imageFile' => '图片',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'status' => '状态',
            'statusText' => '状态',
            'hits' => '点击数',
            'created_at'=>'创建时间'
        ];
    }
}