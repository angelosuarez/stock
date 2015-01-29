<?php

/**
 * This is the model class for table "supplier".
 *
 * The followings are the available columns in table 'supplier':
 * @property integer $id
 * @property string $name
 * @property string $addres
 * @property string $rif
 * @property string $phone
 * @property string $email
 * @property string $vendor_name
 * @property string $vendor_last_name
 * @property string $vendor_phone
 * @property string $vendor_email
 * @property string $contrat_date
 *
 * The followings are the available model relations:
 * @property Product[] $products
 */
class Supplier extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'supplier';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, addres, email', 'length', 'max'=>50),
			array('phone', 'length', 'max'=>15),
			array('rif, vendor_name, vendor_last_name, vendor_phone, vendor_email, contrat_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, addres, rif, phone, email, vendor_name, vendor_last_name, vendor_phone, vendor_email, contrat_date', 'safe', 'on'=>'search'),
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
			'products' => array(self::HAS_MANY, 'Product', 'id_supplier'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Razon Social',
			'addres' => 'Dirección',
			'rif' => 'Rif',
			'phone' => 'Telefono',
			'email' => 'Email',
			'vendor_name' => 'Nombre. Vendedor',
			'vendor_last_name' => 'Apellido. Vendedor',
			'vendor_phone' => 'Tlf. Vendedor',
			'vendor_email' => 'Email. Vendedor',
			'contrat_date' => 'Fecha Contrato',
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
		$criteria->compare('addres',$this->addres,true);
		$criteria->compare('rif',$this->rif,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('vendor_name',$this->vendor_name,true);
		$criteria->compare('vendor_last_name',$this->vendor_last_name,true);
		$criteria->compare('vendor_phone',$this->vendor_phone,true);
		$criteria->compare('vendor_email',$this->vendor_email,true);
		$criteria->compare('contrat_date',$this->contrat_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Supplier the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public static function getList()
	{
		return CHtml::listData(self::model()->findAll(array('order' => 'name')), 'id', 'name');
	}
}
