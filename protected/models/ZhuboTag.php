<?php

/**
 * This is the model class for table "ZhuboTag".
 *
 * The followings are the available columns in table 'ZhuboTag':
 * @property string $id
 * @property string $tag_id
 * @property string $zhubo_id
 * @property string $user_id
 * @property string $tag_time
 *
 * The followings are the available model relations:
 * @property Tag $tag
 * @property Zhubo $zhubo
 * @property User $user
 */
class ZhuboTag extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ZhuboTag the static model class
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
		return 'ZhuboTag';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tag_id, zhubo_id, user_id', 'length', 'max'=>10),
			array('tag_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tag_id, zhubo_id, user_id, tag_time', 'safe', 'on'=>'search'),
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
			'tag' => array(self::BELONGS_TO, 'Tag', 'tag_id'),
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
			'tag_id' => 'Tag',
			'zhubo_id' => 'Zhubo',
			'user_id' => 'User',
			'tag_time' => 'Tag Time',
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
		$criteria->with=array(
				'tag',
				'zhubo',
				'user',
		);

		$criteria->compare('id',$this->id,true);
		$criteria->compare('tag_id',$this->tag_id,true);
		$criteria->compare('zhubo_id',$this->zhubo_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('tag_time',$this->tag_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}