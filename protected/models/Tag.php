<?php

/**
 * This is the model class for table "Tag".
 *
 * The followings are the available columns in table 'Tag':
 * @property string $id
 * @property string $name
 * @property string $class_1
 * @property string $class_2
 * @property integer $show_name
 * @property integer $weight
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property ZhuboTag[] $zhuboTags
 */
class Tag extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tag the static model class
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
		return 'Tag';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status,weight', 'numerical', 'integerOnly'=>true),
			array('name, show_name', 'length', 'max'=>64),
			array('class_1, class_2', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, class_1, class_2, weight, show_name, status', 'safe', 'on'=>'search'),
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
			'zhuboTags' => array(self::HAS_MANY, 'ZhuboTag', 'tag_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Tag',
			'class_1' => '一级分类',
			'class_2' => '二级分类',
			'show_name' => '显示名称',
			'status' => '有效',
			'weight' => '权重',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('class_1',$this->class_1,true);
		$criteria->compare('class_2',$this->class_2,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('show_name',$this->show_name);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
					'pageSize'=>200,
			),
		));
	}
}