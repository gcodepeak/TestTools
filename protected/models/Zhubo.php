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
			'showSite' => array(self::BELONGS_TO, 'ShowSite', 'site_id'),
			'zhuboTags' => array(self::HAS_MANY, 'ZhuboTag', 'zhubo_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '本站ID',
			'local_id' => '原始ID',
			'url' => '直播房间',
			'name' => '昵称',
			'head_img' => '头像',
			'site_id' => '秀场',
			'level' => '等级',
			'wealth_level' => '财富等级',
			'time_level' => '时间等级',
			'sex' => '性别',
			'region' => '地区',
			'familys' => '家族',
			'constellation' => '星座',
			'age' => '年龄',
			'hots' => '关注数',
			'fans' => '粉丝数',
			'tags' => '标签',
			'news_num' => '动态数',
			'news_photo_num' => '照片数',
			'is_live' => '正直播',
			'last_live_time' => '上次直播时间',
			'photos' => '照片链接',
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
				'showSite',
		);

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
			'pagination'=>array(
					'pageSize'=>50,
			),
		));
	}
	
	/**
	 * 供待标注使用的函数
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function toTagSearch()
	{
		$criteria=new CDbCriteria;
		//$criteria->with=array(
		//		'showSite',
		//);
		
		// 获取已经标记过的主播的id集合
		$taged_zhubos = ZhuboTag::model()->findAll(array(
			'select' => 'zhubo_id',
			'distinct' => true,
		));
		
		$taged_zhubo_arr = array();
		foreach($taged_zhubos as $item){
			array_push($taged_zhubo_arr,$item['zhubo_id']);
		}
		
		$criteria->addNotInCondition('id', $taged_zhubo_arr);
		
		$criteria->compare('id',$this->id,true);
		$criteria->compare('local_id',$this->local_id,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('site_id',$this->site_id);
		$criteria->compare('is_live',$this->is_live);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('last_live_time',$this->last_live_time,true);
	
		$criteria->order = 'fans desc';
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
					'pageSize'=>20,
			),
		));
	}
	
	/**
	 * 供待标注使用的函数
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function tagedSearch()
	{
		$criteria=new CDbCriteria;
		//$criteria->with=array(
		//		'showSite',
		//);
	
		// 获取已经标记过的主播的id集合
		$taged_zhubos = ZhuboTag::model()->findAll(array(
				'select' => 'zhubo_id',
				'distinct' => true,
		));
	
		$taged_zhubo_arr = array();
		foreach($taged_zhubos as $item){
			array_push($taged_zhubo_arr,$item['zhubo_id']);
		}
	
		$criteria->addInCondition('id', $taged_zhubo_arr);
	
		$criteria->compare('id',$this->id,true);
		$criteria->compare('local_id',$this->local_id,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('site_id',$this->site_id);
		$criteria->compare('is_live',$this->is_live);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('last_live_time',$this->last_live_time,true);
	
		//$criteria->order = 'fans';
		
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>array(
					'pageSize'=>50,
				),
		));
	}
	
	/**
	 * 请求精挑细选主播
	 * @param integer $tag_id ： 标签的ID
	 * @return CActiveDataProvider
	 */
	public function jingtiaoxixuan($tag)
	{
		$criteria=new CDbCriteria;
		$criteria->condition = 'tag=:tag';
		
		$criteria->params = array(
			':tag' => $tag,
		);
		
		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
	
	/**
	 * 请求最佳新人主播
	 * @param integer $time ： 时间
	 * @return CActiveDataProvider
	 */
	public function zuijiaxinren($time)
	{
		$criteria=new CDbCriteria;
		$criteria->condition = 'time=:time';
	
		$criteria->params = array(
				':time' => $time,
		);
	
		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
		));
	}
}