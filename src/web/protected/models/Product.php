<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id
 * @property string $name
 * @property string $brand
 * @property string $model
 * @property string $serial
 * @property string $cost
 * @property string $price
 * @property string $quantity
 * @property string $tax
 * @property string $total_price
 * @property string $register_date
 * @property integer $id_supplier
 *
 * The followings are the available model relations:
 * @property Supplier $idSupplier
 * @property ProductInvoice[] $productInvoices
 */
class Product extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_supplier', 'numerical', 'integerOnly'=>true),
			array('name, brand, model', 'length', 'max'=>50),
			array('serial, cost, price, quantity, tax, total_price, register_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, brand, model, serial, cost, price, quantity, tax, total_price, register_date, id_supplier', 'safe', 'on'=>'search'),
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
			'idSupplier' => array(self::BELONGS_TO, 'Supplier', 'id_supplier'),
			'productInvoices' => array(self::HAS_MANY, 'ProductInvoice', 'id_product'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Descripción',
			'brand' => 'Marca',
			'model' => 'Modelo',
			'serial' => 'Serial',
			'cost' => 'Costo de Compra',
			'price' => 'Precio Base',
			'quantity' => 'Cantidad',
			'tax' => 'Impuesto (%)',
			'total_price' => 'Precio Total',
			'register_date' => 'Register Date',
			'id_supplier' => 'Proveedor',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('brand',$this->brand,true);
		$criteria->compare('model',$this->model,true);
		$criteria->compare('serial',$this->serial,true);
		$criteria->compare('cost',$this->cost,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('quantity',$this->quantity,true);
		$criteria->compare('tax',$this->tax,true);
		$criteria->compare('total_price',$this->total_price,true);
		$criteria->compare('register_date',$this->register_date,true);
		$criteria->compare('id_supplier',$this->id_supplier);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public static function getName($id){           
            return self::model()->find("id=:id", array(':id'=>$id))->name;
        }
        public static function getDataCustomer($idDoc){           
            return self::model()->find("id_doc=:id_doc", array(':id_doc'=>$idDoc));
        }
        public static function checkExist($modelForm)
        {
            $customer= self::model()->find("name=:name and last_name=:lastName and id_doc=:idDoc", array("name"=>$modelForm["name"], "lastName"=>$modelForm["last_name"], "idDoc"=>$modelForm["id_doc"]));
            if($customer==NULL)
                return self::model()->find("id_doc=".$modelForm["id_doc"]); 
            else
                return $customer;
        }
        public static function getList()
	{
		return CHtml::listData(self::model()->findAll(array('order' => 'name')), 'id', 'name', 'brand');
	}
        public static function getData($id)
        {           
            return self::model()->find("id=:id", array(':id'=>$id));
        }
}
