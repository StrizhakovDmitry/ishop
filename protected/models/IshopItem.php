<?php

/**
 * This is the model class for table "{{item}}".
 *
 * The followings are the available columns in table '{{item}}':
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $parametrs
 * @property string $description
 * @property string $tags
 * @property integer $price
 * @property string $images
 */
class IshopItem extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $images; 
	public $image;
	
	/** 
	 * mhetods
	 */
	
	
	public   function removeDirectory($dir) {
    if ($objs = glob($dir."/*")) {
       foreach($objs as $obj) {
         is_dir($obj) ? removeDirectory($obj) : unlink($obj);
       }
    }
    rmdir($dir);
	return true;
  	}
	public function getParametrsTableHTML(){
		$Parametrs = explode(';',$this->parametrs);
		$HTML='';
		$HTML.='<table class="table" >';
		foreach ($Parametrs as $key => $value){
			$unit = explode('@',$value);
			$HTML.='<tr>';
			$HTML.='<td>';
			$HTML.=trim($unit[0]);
			$HTML.='</td>';
			$HTML.='<td>';
			$HTML.=trim($unit[1]);
			$HTML.='</td>';
			$HTML.='</tr>';
		}
		$HTML.='</table>';
		return $HTML;
		
		
	}
	public function getMainImageHTML(){
		$mainImageHTML='';	
		$_i='<img width="100%" src="';
		$_i.='/ishop/upload/';
		$_i.=$this->images;
		$_i.='/';
		$_i.=$this->mainimage;
		$_i.='"/>';
		$mainImageHTML=$_i;
		return $mainImageHTML;
	}

	public function getImagesHTML(){
		$imageHTML='';
		$advertImages=$this->advertImages;
		$i=0;
		$imageHTML.='<div class="row"><div class="span6">';
		foreach ($advertImages as $key){
		$folder=$this->images;
		$_i='<div class="span1">';
		$_i.='<a class="example-image-link miniature img-rounded" href="';
		$_i.='/ishop/upload/';
		$_i.=$folder.'/'.$advertImages[$i]->image;
		$_i.='" data-lightbox="example-set" data-title=""><img class="example-image img-rounded" src="';
		$_i.='/ishop/upload/';
		$_i.=$folder;
		$_i.='/';
		$_i.='small_';
		$_i.=$advertImages[$i]->image;
		$_i.='" alt=""/></a>';
		$_i.='</div>';
		$imageHTML.=$_i;
		$i++;
		};
		$imageHTML.='</div></div>';
		return $imageHTML;
	}
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'advertImages' => array(self::HAS_MANY, 'IshopAdvertImage', 'advert_id'),
        );
    }
	public function tableName()
	{
		return '{{item}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, parametrs, description, tags, price, images', 'required'),
			array('category_id, price', 'numerical', 'integerOnly'=>true),
			array('title, parametrs, description, tags, images', 'length', 'max'=>1024),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, category_id, title, parametrs, description, tags, price, images', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'category_id' => 'Катерогия',
			'title' => 'Название',
			'parametrs' => 'Параметры',
			'description' => 'Описание',
			'tags' => 'Теги',
			'price' => 'Цена',
			'mainimage'=>'Главное изображение',
			'images' => 'Дополнительные изображения',
		);
	}
	public function getAttributeLabels($id)
		{
			$tmp=self::attributeLabels();
			return $tmp[$id];
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
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('parametrs',$this->parametrs,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('images',$this->images,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IshopItem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}