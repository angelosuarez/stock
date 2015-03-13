<?php

/**
 * This is the model class for table "product_invoice".
 *
 * The followings are the available columns in table 'product_invoice':
 * @property integer $id
 * @property integer $id_customer
 * @property string $start_date
 * @property integer $id_product
 * @property string $quantity
 * @property integer $id_invoice
 * @property string $end_date
 *
 * The followings are the available model relations:
 * @property BikeCustomer $idCustomer
 * @property Invoice $idInvoice
 * @property Product $idProduct
 */
class ProductInvoice extends CActiveRecord
{
        public $model_product;
        public $stock_quantity;
        public $model;
        public $brand;
        public $total_price;
        public $start_date;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_invoice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id, id_customer, id_product, id_invoice', 'numerical', 'integerOnly'=>true),
			array('start_date, quantity, end_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_customer, start_date, id_product, quantity, id_invoice, end_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idCustomer' => array(self::BELONGS_TO, 'Customer', 'id_customer'),
			'idInvoice' => array(self::BELONGS_TO, 'Invoice', 'id_invoice'),
			'idProduct' => array(self::BELONGS_TO, 'Product', 'id_product'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_customer' => 'Id Customer',
			'start_date' => 'Start Date',
			'id_product' => 'Id Product',
			'quantity' => 'Cantidad',
			'id_invoice' => 'Id Invoice',
			'end_date' => 'End Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_customer',$this->id_customer);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('id_product',$this->id_product);
		$criteria->compare('quantity',$this->quantity,true);
		$criteria->compare('id_invoice',$this->id_invoice);
		$criteria->compare('end_date',$this->end_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductInvoice the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function checkOpenAccount($customer)
        {
            return self::model()->findAll("id_customer=:customer AND id_invoice IS NULL AND end_date IS NULL",array(":customer"=>$customer));
        }
        public function checkExist($productId, $custId)
        {
            return self::model()->find("id_customer=:custId AND id_product=:idProduct AND id_invoice IS NULL AND end_date IS NULL",array(":idProduct"=>$productId,":custId"=>$custId));
        }
        public function checkAOpenAccount($bikeCustId)
        {
            return self::model()->find("id_customer=:bikeCustId AND id_invoice IS NULL AND end_date IS NULL",array(":bikeCustId"=>$bikeCustId));
        }
}
