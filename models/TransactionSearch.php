<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transaction;

/**
 * TransactionSearch represents the model behind the search form about `app\models\Transaction`.
 */
class TransactionSearch extends Transaction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_transaction', 'id_product', 'qty', 'total_price', 'postal_code'], 'integer'],
            [['product_name', 'customer', 'shipping', 'payment', 'province', 'city', 'district', 'address', 'created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Transaction::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_transaction' => $this->id_transaction,
            'id_product' => $this->id_product,
            'qty' => $this->qty,
            'total_price' => $this->total_price,
            'postal_code' => $this->postal_code,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like', 'customer', $this->customer])
            ->andFilterWhere(['like', 'shipping', $this->shipping])
            ->andFilterWhere(['like', 'payment', $this->payment])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
