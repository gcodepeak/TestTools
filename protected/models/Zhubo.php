<?php

/**
 * This is the model class for table "zhubo".
 *
 * The followings are the available columns in table 'zhubo':
 * @property string $id
 * @property string $local_id
 * @property string $url
 * @property string $name
 * @property string $head_img
 * @property integer $site_id
 * @property integer $level
 * @property integer $wealth_level
 * @property integer $time_level
 * @property integer $sex
 * @property string $region
 * @property string $familys
 * @property string $constellation
 * @property integer $age
 * @property string $hots
 * @property string $fans
 * @property string $tags
 * @property string $news_num
 * @property string $news_photo_num
 * @property integer $is_live
 * @property string $last_live_time
 * @property string $photos
 */
class Zhubo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Zhubo the static model class
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
		return 'zhubo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('site_id, level, wealth_level, time_level, sex, age, is_live', 'numerical', 'integerOnly'=>true),
			array('local_id, hots, fans, news_num, news_photo_num', 'length', 'max'=>10),
			array('url, name', 'length', 'max'=>64),
			array('head_img, familys, tags', 'length', 'max'=>128),
			array('region', 'length', 'max'=>32),
			array('constellation', 'length', 'max'=>16),
			array('last_live_time, photos', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, local_id, url, name, head_img, site_id, level, wealth_level, time_level, sex, region, familys, constellation, age, hots, fans, tags, news_num, news_photo_num, is_live, last_live_time, photos', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'local_id' => 'Local',
			'url' => 'Url',
			'name' => 'Name',
			'head_img' => 'Head Img',
			'site_id' => 'Site',
			'level' => 'Level',
			'wealth_level' => 'Wealth Level',
			'time_level' => 'Time Level',
			'sex' => 'Sex',
			'region' => 'Region',
			'familys' => 'Familys',
			'constellation' => 'Constellation',
			'age' => 'Age',
			'hots' => 'Hots',
			'fans' => 'Fans',
			'tags' => 'Tags',
			'news_num' => 'News Num',
			'news_photo_num' => 'News Photo Num',
			'is_live' => 'Is Live',
			'last_live_time' => 'Last Live Time',
			'photos' => 'Photos',
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
		$criteria->compare('local_id',$this->local_id,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('head_img',$this->head_img,true);
		$criteria->compare('site_id',$this->site_id);
		$criteria->compare('level',$this->level);
		$criteria->compare('wealth_level',$this->wealth_level);
		$criteria->compare('time_level',$this->time_level);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('familys',$this->familys,true);
		$criteria->compare('constellation',$this->constellation,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('hots',$this->hots,true);
		$criteria->compare('fans',$this->fans,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('news_num',$this->news_num,true);
		$criteria->compare('news_photo_num',$this->news_photo_num,true);
		$criteria->compare('is_live',$this->is_live);
		$criteria->compare('last_live_time',$this->last_live_time,true);
		$criteria->compare('photos',$this->photos,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}