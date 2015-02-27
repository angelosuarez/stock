<?php

/**
 * This is the model class for table "bike_customer".
 *
 * The followings are the available columns in table 'bike_customer':
 * @property integer $id
 * @property integer $id_customer
 * @property integer $id_bike_description
 * @property string $start_date
 * @property string $end_date
 * @property string $status
 *
 * The followings are the available model relations:
 * @property Invoice[] $invoices
 * @property ProductInvoice[] $productInvoices
 * @property BikeDescription $idBikeDescription
 * @property Customer $idCustomer
 * @property ServiceInvoice[] $serviceInvoices
 */
class BikeCustomer extends CActiveRecord
{
        public $brand;
        public $model;
        public $colour;
        public $plate;
        public $year_bike;
        public $controller;
        public $id_product;
        public $model_product;
        public $stock_quanity;
        public $quantity;
        public $id_invoice;
        public $id_service;
        public $stock;
        public $total_price;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bike_customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_customer, id_bike_description', 'numerical', 'integerOnly'=>true),
			array('start_date, end_date, status', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_customer, id_bike_description, start_date, end_date, status', 'safe', 'on'=>'search'),
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
			'invoices' => array(self::HAS_MANY, 'Invoice', 'id_bike_customer'),
			'productInvoices' => array(self::HAS_MANY, 'ProductInvoice', 'id_bike_customer'),
			'idBikeDescription' => array(self::BELONGS_TO, 'BikeDescription', 'id_bike_description'),
			'idCustomer' => array(self::BELONGS_TO, 'Customer', 'id_customer'),
			'serviceInvoices' => array(self::HAS_MANY, 'ServiceInvoice', 'id_bike_customer'),
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
			'id_bike_description' => 'Id Bike Description',
                        'id_service' => 'Descripción',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'status' => 'Status',
			'quantity' => 'Cantidad',
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
		$criteria->compare('id_bike_description',$this->id_bike_description);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BikeCustomer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function bikeByCustomer($customerId)
	{
            $sql="SELECT 
                         bc.id, 
                         bc.id_bike_description, 
                         bb.name AS brand,--bd.id_brand_bike, 
                         mb.name AS model,--bd.id_model_bike, 
                         col.name AS colour,--bd.id_colour, 
                         bd.plate, 
                         bd.year_bike,
                         'bikeDescription'AS controller
                  FROM customer c, bike_customer bc, bike_description bd, brand_bike bb, model_bike mb, colour col
                  WHERE c.id=bc.id_customer 
                    AND bc.id_bike_description=bd.id 
                    AND bd.id_brand_bike=bb.id 
                    AND bd.id_model_bike=mb.id 
                    AND bd.id_colour=col.id 
                    AND bc.end_date IS NULL 
                    AND c.id={$customerId}";
                return self::model()->findAllBySql($sql);
        }
        public static function openAccounts()
	{
            $sql="SELECT tt.*
                  FROM
                      (SELECT t.id_bike_customer AS id, t.id_customer, t.id_bike_description,  sum(t.total_price)AS total_price
                       FROM
                          (
                           SELECT pi.*, bc.id_bike_description, bc.id_customer, (p.total_price * pi.quantity)AS total_price,  'product' AS type 
                           FROM bike_customer bc, product_invoice pi, product p
                           WHERE 
                                 bc.end_date IS NULL
                             AND pi.id_bike_customer=bc.id
                             AND pi.end_date IS NULL
                             AND pi.id_invoice IS NULL
                             AND p.id=pi.id_product
                          UNION
                            SELECT si.*, bc.id_bike_description, bc.id_customer, (s.total_price * si.quantity)AS total_price, 'service' AS type
                            FROM bike_customer bc, service_invoice si, service s
                            WHERE 
                                  bc.end_date IS NULL
                              AND si.id_bike_customer=bc.id
                              AND si.end_date IS NULL
                              AND si.id_invoice IS NULL
                              AND s.id=si.id_service
                           )t
                        GROUP BY  t.id_bike_customer, t.id_bike_description, t.id_customer
                        )tt, bike_customer tbc
                  WHERE tbc.id=tt.id ";
                return self::model()->findAllBySql($sql);
        }

        public static function checkRelation($id)
        {
		return self::model()->find('id=:id AND end_date IS NULL', array(':id'=>$id));
	} 

}
