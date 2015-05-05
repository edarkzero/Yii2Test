<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gente".
 *
 * @property integer $id
 * @property string $name
 * @property integer $gender
 */
class Gente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'gender'], 'required'],
            [['gender'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'gender' => Yii::t('app', 'Gender'),
        ];
    }
}
