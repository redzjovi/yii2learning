<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "po".
 *
 * @property integer $id
 * @property string $po_no
 * @property string $description
 * @property integer $total
 *
 * @property PoItem[] $poItems
 */
class Po extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'po';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['po_no', 'description', 'total'], 'required'],
            [['description'], 'string'],
            [['total'], 'integer'],
            [['po_no'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'po_no' => Yii::t('app', 'Po No'),
            'description' => Yii::t('app', 'Description'),
            'total' => Yii::t('app', 'Total'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoItems()
    {
        return $this->hasMany(PoItem::className(), ['po_id' => 'id']);
    }
}
