<?php

/**
 * This is the model class for table "model_bike".
 *
 * The followings are the available columns in table 'model_bike':
 * @property integer $id
 * @property string $name
 * @property integer $id_brand_bike
 *
 * The followings are the available model relations:
 * @property BrandBike $idBrandBike
 * @property BikeDescription[] $bikeDescriptions
 */
class ModelBike extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'model_bike';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_brand_bike', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, id_brand_bike', 'safe', 'on'=>'search'),
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
			'bikeDescriptions' => array(self::HAS_MANY, 'BikeDescription', 'id_model_bike'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Modelo',
			'id_brand_bike' => 'Id Brand Bike',
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
		$criteria->compare('id_brand_bike',$this->id_brand_bike);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ModelBike the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public static function getRelationBrand($idBrand)
	{
            if($idBrand!=NULL)
                
		return self::model()->findAll("id_brand_bike =:idBrandBike order by name ASC",array(":idBrandBike"=>$idBrand));
            else
		return CHtml::listData(self::model()->findAll(array('order' => 'name')), 'id', 'name');
	}
        public static function getModelBrand($modelName, $brandId)
	{
                return self::model()->findAll("id_brand_bike =:idBrandBike AND name=:modelName",array(":idBrandBike"=>$brandId, ":modelName"=>$modelName));
	}
        public static function getList()
	{
		return CHtml::listData(self::model()->findAll(array('order' => 'name')), 'id', 'name');
	}
        public static function getData($id)
	{
		return self::model()->find('id=:id', array(':id'=>$id));
	}

}
