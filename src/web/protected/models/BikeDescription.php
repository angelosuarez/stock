<?php

/**
 * This is the model class for table "bike_description".
 *
 * The followings are the available columns in table 'bike_description':
 * @property integer $id
 * @property integer $id_brand_bike
 * @property integer $id_model_bike
 * @property integer $id_colour
 * @property string $plate
 * @property string $year_bike
 *
 * The followings are the available model relations:
 * @property BrandBike $idBrandBike
 * @property Colour $idColour
 * @property ModelBike $idModelBike
 * @property BikeCustomer[] $bikeCustomers
 */
class BikeDescription extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bike_description';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_brand_bike, id_model_bike, id_colour', 'numerical', 'integerOnly'=>true),
			array('plate', 'length', 'max'=>8),
			array('year_bike', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_brand_bike, id_model_bike, id_colour, plate, year_bike', 'safe', 'on'=>'search'),
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
			'idBrandBike' => array(self::BELONGS_TO, 'BrandBike', 'id_brand_bike'),
			'idColour' => array(self::BELONGS_TO, 'Colour', 'id_colour'),
			'idModelBike' => array(self::BELONGS_TO, 'ModelBike', 'id_model_bike'),
			'bikeCustomers' => array(self::HAS_MANY, 'BikeCustomer', 'id_bike_description'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_brand_bike' => 'Marca',
			'id_model_bike' => 'Modelo',
			'id_colour' => 'Color',
			'plate' => 'Placa',
			'year_bike' => 'Año',
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
		$criteria->compare('id_brand_bike',$this->id_brand_bike);
		$criteria->compare('id_model_bike',$this->id_model_bike);
		$criteria->compare('id_colour',$this->id_colour);
		$criteria->compare('plate',$this->plate,true);
		$criteria->compare('year_bike',$this->year_bike,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BikeDescription the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function checkExistByPlate($plate)
        {
            return self::model()->find("plate =:plate",array(":plate"=>$plate));
        }
        public static function getData($id){           
            return self::model()->find("id=:id", array(':id'=>$id));
        }
}
