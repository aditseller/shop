<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id_product
 * @property string $product_name
 * @property string $category
 * @property string $product_condition
 * @property integer $weight
 * @property string $weight_unit
 * @property integer $stock
 * @property integer $price
 * @property string $description
 * @property string $created_at
 * @property string $created_by
 * @property string $sku
 * @property integer $discount
 *
 * @property Categories $category0
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_name', 'category', 'product_condition', 'weight', 'weight_unit', 'stock', 'price', 'description', 'created_at', 'created_by'], 'required'],
            [['product_condition', 'weight_unit', 'description'], 'string'],
            [['weight', 'stock', 'price', 'discount'], 'integer'],
            [['created_at'], 'safe'],
            [['product_name', 'category', 'created_by'], 'string', 'max' => 100],
            [['sku'], 'string', 'max' => 50],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category' => 'category']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_product' => 'Id Product',
            'product_name' => 'Product Name',
            'category' => 'Category',
            'product_condition' => 'Product Condition',
            'weight' => 'Weight',
            'weight_unit' => 'Weight Unit',
            'stock' => 'Stock',
            'price' => 'Price',
            'description' => 'Description',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'sku' => 'Sku',
            'discount' => 'Discount',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(Categories::className(), ['category' => 'category']);
    }
}
