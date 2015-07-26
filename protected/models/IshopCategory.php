<?php

/**
 * This is the model class for table "{{category}}".
 *
 * The followings are the available columns in table '{{category}}':
 * @property integer $id
 * @property string $transcript
 */
class IshopCategory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	private static $_categoriesList = array();
	public function getCategories()//Возращает список категорий товаров
	{
		$criteria=new CDbCriteria;
		//$criteria->select='transcript';
		$categoriesList = (IshopCategory::model()->findAll($criteria));
		foreach ($categoriesList as $category){
			self::$_categoriesList[$category->id] = $category->transcript;
		}
		//echo '<pre>';
		//print_r(self::$_categoriesList);
		return(self::$_categoriesList);
	} 
	public function tableName()
	{
		return '{{category}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('image', 'file', 'types'=>'jpg, gif, png'),
			array('transcript', 'required'),
			array('transcript', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, transcript', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'IshopIntems' => array(self::HAS_MANY, 'IshopItem', 'category_id'),
        );
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'transcript' => 'Transcript',
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
		$criteria->compare('transcript',$this->transcript,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IshopCategory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
