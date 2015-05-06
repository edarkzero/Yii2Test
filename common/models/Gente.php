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

    /**
     * @return array
     *
     */
    public function getGenderData($all = false)
    {
        $data = [0=>Yii::t('app','Male'),1=>Yii::t('app','Female')];

        if($all)
            return $data;
        else
        {
            if(isset($data[$this->gender]))
                return $data[$this->gender];
            else
                return null;
        }
    }
}
