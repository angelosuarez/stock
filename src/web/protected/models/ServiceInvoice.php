<?php

/**
 * This is the model class for table "service_invoice".
 *
 * The followings are the available columns in table 'service_invoice':
 * @property integer $id
 * @property integer $id_bike_customer
 * @property string $start_date
 * @property integer $id_service
 * @property string $quantity
 * @property integer $id_invoice
 * @property string $end_date
 *
 * The followings are the available model relations:
 * @property BikeCustomer $idBikeCustomer
 * @property Invoice $idInvoice
 * @property Service $idService
 */
class ServiceInvoice extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'service_invoice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_bike_customer, id_service, id_invoice', 'numerical', 'integerOnly'=>true),
			array('start_date, quantity, end_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_bike_customer, start_date, id_service, quantity, id_invoice, end_date', 'safe', 'on'=>'search'),
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
			'idBikeCustomer' => array(self::BELONGS_TO, 'BikeCustomer', 'id_bike_customer'),
			'idInvoice' => array(self::BELONGS_TO, 'Invoice', 'id_invoice'),
			'idService' => array(self::BELONGS_TO, 'Service', 'id_service'),
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
			'start_date' => 'Start Date',
			'id_service' => 'Descripción',
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
		$criteria->compare('id_bike_customer',$this->id_bike_customer);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('id_service',$this->id_service);
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
	 * @return ServiceInvoice the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function checkOpenAccount($bikeCustomer)
        {
            return self::model()->findAll("id_bike_customer=:bikeCustomer AND id_invoice IS NULL AND end_date IS NULL",array(":bikeCustomer"=>$bikeCustomer));
        }
        public function checkAOpenAccount($bikeCustId)
        {
            return self::model()->find("id_bike_customer=:bikeCustId AND id_invoice IS NULL AND end_date IS NULL",array(":bikeCustId"=>$bikeCustId));
        }
        public function checkExist($serviceId, $bikeCustId)
        {
            return self::model()->find("id_bike_customer=:bikeCustId AND id_service=:idService AND id_invoice IS NULL AND end_date IS NULL",array(":idService"=>$serviceId,":bikeCustId"=>$bikeCustId));
        }
}
