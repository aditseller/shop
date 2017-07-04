<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unpaid".
 *
 * @property integer $id_transaction
 * @property integer $id_product
 * @property string $product_name
 * @property string $customer
 * @property integer $total_price
 * @property string $shipping
 * @property string $payment
 * @property string $province
 * @property string $city
 * @property string $district
 * @property string $address
 * @property integer $postal_code
 * @property string $created_at
 */
class Unpaid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unpaid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_product', 'product_name', 'customer', 'total_price', 'shipping', 'payment', 'province', 'city', 'district', 'address', 'postal_code', 'created_at'], 'required'],
            [['id_product', 'total_price', 'postal_code'], 'integer'],
            [['address'], 'string'],
            [['created_at'], 'safe'],
            [['product_name', 'customer', 'shipping', 'payment', 'province', 'city', 'district'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_transaction' => 'Id Transaction',
            'id_product' => 'Id Product',
            'product_name' => 'Product Name',
            'customer' => 'Customer',
            'total_price' => 'Total Price',
            'shipping' => 'Shipping',
            'payment' => 'Payment',
            'province' => 'Province',
            'city' => 'City',
            'district' => 'District',
            'address' => 'Address',
            'postal_code' => 'Postal Code',
            'created_at' => 'Created At',
        ];
    }
}
