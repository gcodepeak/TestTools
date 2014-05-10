<?php

/**
 * This is the model class for table "Guanzhu".
 *
 * The followings are the available columns in table 'Guanzhu':
 * @property string $id
 * @property string $user_id
 * @property string $zhubo_id
 * @property string $add_time
 * @property string $del_time
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Zhubo $zhubo
 * @property User $user
 */
class Guanzhu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Guanzhu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Guanzhu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'numerical', 'integerOnly'=>true),
			array('user_id, zhubo_id', 'length', 'max'=>10),
			array('add_time, del_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, zhubo_id, add_time, del_time, status', 'safe', 'on'=>'search'),
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
			'zhubo' => array(self::BELONGS_TO, 'Zhubo', 'zhubo_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'zhubo_id' => 'Zhubo',
			'add_time' => 'Add Time',
			'del_time' => 'Del Time',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('zhubo_id',$this->zhubo_id,true);
		$criteria->compare('add_time',$this->add_time,true);
		$criteria->compare('del_time',$this->del_time,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}