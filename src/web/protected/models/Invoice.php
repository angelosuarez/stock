<?php

/**
 * This is the model class for table "invoice".
 *
 * The followings are the available columns in table 'invoice':
 * @property integer $id
 * @property integer $id_bike_customer
 * @property string $now_date
 * @property string $invoice_number
 *
 * The followings are the available model relations:
 * @property ServiceInvoice[] $serviceInvoices
 * @property BikeCustomer $idBikeCustomer
 * @property ProductInvoice[] $productInvoices
 */
class Invoice extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'invoice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_bike_customer', 'numerical', 'integerOnly'=>true),
			array('invoice_number', 'length', 'max'=>50),
			array('now_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_bike_customer, now_date, invoice_number', 'safe', 'on'=>'search'),
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
			'serviceInvoices' => array(self::HAS_MANY, 'ServiceInvoice', 'id_invoice'),
			'idBikeCustomer' => array(self::BELONGS_TO, 'BikeCustomer', 'id_bike_customer'),
			'productInvoices' => array(self::HAS_MANY, 'ProductInvoice', 'id_invoice'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_bike_customer' => 'Id Bike Customer',
			'now_date' => 'Now Date',
			'invoice_number' => 'Invoice Number',
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
		$criteria->compare('id_bike_customer',$this->id_bike_customer);
		$criteria->compare('now_date',$this->now_date,true);
		$criteria->compare('invoice_number',$this->invoice_number,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Invoice the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
