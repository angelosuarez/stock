<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property integer $id
 * @property string $name
 * @property string $last_name
 * @property string $addres
 * @property string $id_doc
 * @property string $phone_local
 * @property string $phone_movil
 * @property string $email
 * @property string $status
 *
 * The followings are the available model relations:
 * @property BikeCustomer[] $bikeCustomers
 */
class Customer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, last_name, email', 'length', 'max'=>50),
			array('addres', 'length', 'max'=>100),
			array('phone_local', 'length', 'max'=>15),
			array('id_doc, phone_movil, status', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, last_name, addres, id_doc, phone_local, phone_movil, email, status', 'safe', 'on'=>'search'),
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
			'bikeCustomers' => array(self::HAS_MANY, 'BikeCustomer', 'id_customer'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Nombre',
			'last_name' => 'Apellido',
			'addres' => 'Dirección',
			'id_doc' => 'Cédula de Identidad',
			'phone_local' => 'Tlf. Local',
			'phone_movil' => 'Tlf. Movil',
			'email' => 'Correo Electónico',
			'status' => 'Estatus',
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
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('addres',$this->addres,true);
		$criteria->compare('id_doc',$this->id_doc);
		$criteria->compare('phone_local',$this->phone_local,true);
		$criteria->compare('phone_movil',$this->phone_movil,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Customer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function getCustomerExist($docId){           
            return self::model()->find("id_doc=:docId", array(':docId'=>$docId));
        }
}
