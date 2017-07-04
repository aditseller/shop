<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shipping".
 *
 * @property integer $id_shipping
 * @property string $shipping
 * @property string $price_shipping
 *
 * @property Transaction[] $transactions
 */
class Shipping extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shipping';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shipping'], 'required'],
            [['shipping'], 'string', 'max' => 100],
            [['price_shipping'], 'string', 'max' => 20],
            [['shipping'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_shipping' => 'Id Shipping',
            'shipping' => 'Shipping',
            'price_shipping' => 'Price Shipping',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transaction::className(), ['shipping' => 'shipping']);
    }
}
