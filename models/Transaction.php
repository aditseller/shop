<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property integer $id_transaction
 * @property integer $id_product
 * @property string $product_name
 * @property integer $qty
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
 *
 * @property Products $idProduct
 * @property Products $productName
 * @property Users $customer0
 * @property Shipping $shipping0
 * @property Payment $payment0
 * @property Users $province0
 * @property Users $city0
 * @property Users $district0
 * @property Users $postalCode
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_product', 'product_name', 'qty', 'customer', 'total_price', 'shipping', 'payment', 'province', 'city', 'district', 'address', 'postal_code', 'created_at'], 'required'],
            [['id_product', 'qty', 'total_price', 'postal_code'], 'integer'],
            [['address'], 'string'],
            [['created_at'], 'safe'],
            [['product_name', 'customer', 'shipping', 'payment', 'province', 'city', 'district'], 'string', 'max' => 100],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['id_product' => 'id_product']],
            [['product_name'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_name' => 'product_name']],
            [['customer'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['customer' => 'fullname']],
            [['shipping'], 'exist', 'skipOnError' => true, 'targetClass' => Shipping::className(), 'targetAttribute' => ['shipping' => 'shipping']],
            [['payment'], 'exist', 'skipOnError' => true, 'targetClass' => Payment::className(), 'targetAttribute' => ['payment' => 'payment']],
            [['province'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['province' => 'province']],
            [['city'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['city' => 'city']],
            [['district'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['district' => 'district']],
            [['postal_code'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['postal_code' => 'postalcode']],
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
            'qty' => 'Qty',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduct()
    {
        return $this->hasOne(Products::className(), ['id_product' => 'id_product']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductName()
    {
        return $this->hasOne(Products::className(), ['product_name' => 'product_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer0()
    {
        return $this->hasOne(Users::className(), ['fullname' => 'customer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShipping0()
    {
        return $this->hasOne(Shipping::className(), ['shipping' => 'shipping']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayment0()
    {
        return $this->hasOne(Payment::className(), ['payment' => 'payment']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvince0()
    {
        return $this->hasOne(Users::className(), ['province' => 'province']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity0()
    {
        return $this->hasOne(Users::className(), ['city' => 'city']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict0()
    {
        return $this->hasOne(Users::className(), ['district' => 'district']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostalCode()
    {
        return $this->hasOne(Users::className(), ['postalcode' => 'postal_code']);
    }
}
