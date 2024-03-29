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
    private $modalCreateForm = 'modal-ajax-create';
    private $createForm = 'create-form';
    private $modalUpdateForm = 'modal-ajax-update';
    private $updateForm = 'update-form';

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

    /**
     * @return string
     */
    public function getModalCreateForm()
    {
        return self::tableName().$this->modalCreateForm;
    }

    /**
     * @return string
     */
    public function getCreateForm()
    {
        return self::tableName().$this->createForm;
    }

    /**
     * @return string
     */
    public function getModalUpdateForm()
    {
        return self::tableName().$this->modalUpdateForm;
    }

    /**
     * @return string
     */
    public function getUpdateForm()
    {
        return self::tableName().$this->updateForm;
    }
}
