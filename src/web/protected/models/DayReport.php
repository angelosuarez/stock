<?php

/**
 * This is the model class for table "day_report".
 *
 * The followings are the available columns in table 'day_report':
 * @property integer $id
 * @property string $date
 * @property integer $id_users
 * @property double $cash
 * @property double $cash_point
 * @property double $cash_voucher
 * @property double $total_cash
 * @property double $system_cash
 * @property double $system_cash_point
 * @property double $system_cash_voucher
 * @property double $system_total_cash
 * @property string $note
 *
 * The followings are the available model relations:
 * @property Users $idUsers
 */
class DayReport extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'day_report';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_users', 'numerical', 'integerOnly'=>true),
			array('cash, cash_point, cash_voucher, total_cash, system_cash, system_cash_point, system_cash_voucher, system_total_cash', 'numerical'),
			array('note', 'length', 'max'=>256),
			array('date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date, id_users, cash, cash_point, cash_voucher, total_cash, system_cash, system_cash_point, system_cash_voucher, system_total_cash, note', 'safe', 'on'=>'search'),
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
			'idUsers' => array(self::BELONGS_TO, 'Users', 'id_users'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date' => 'Date',
			'id_users' => 'Id Users',
			'cash' => 'Efectivo. Bs',
			'cash_point' => 'Punto. Bs',
			'cash_voucher' => 'Vales/Notas de Cred. Bs',
			'total_cash' => 'Total producido',
			'system_cash' => 'System Cash',
			'system_cash_point' => 'System Cash Point',
			'system_cash_voucher' => 'System Cash Voucher',
			'system_total_cash' => 'System Total Cash',
			'note' => 'Observaciones del día',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('id_users',$this->id_users);
		$criteria->compare('cash',$this->cash);
		$criteria->compare('cash_point',$this->cash_point);
		$criteria->compare('cash_voucher',$this->cash_voucher);
		$criteria->compare('total_cash',$this->total_cash);
		$criteria->compare('system_cash',$this->system_cash);
		$criteria->compare('system_cash_point',$this->system_cash_point);
		$criteria->compare('system_cash_voucher',$this->system_cash_voucher);
		$criteria->compare('system_total_cash',$this->system_total_cash);
		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DayReport the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
