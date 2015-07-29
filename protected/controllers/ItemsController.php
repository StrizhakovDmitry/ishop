<?php

class ItemsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

	public $layout='//layouts/column2';
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','index','view'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

	 
	
	public function actionCreate()
	{
		$model=new IshopItem;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['IshopItem']))
		{
			
			$model->attributes=$_POST['IshopItem'];
			$model->mainimage=CUploadedFile::getInstance($model,'mainimage');
			$model->images=uniqid();
			if($model->save()){
				$path=Yii::getPathOfAlias('webroot').'/upload/'.$model->images;
				
				mkdir($path,0755);

				$pathMainImage=$path.'/'.$model->mainimage->getName();
				$smallPathMainImage=$path.'/small_'.$model->mainimage->getName();
				$model->mainimage->saveAs($pathMainImage);
				if(strlen($_FILES['images']['name'][0])!=0){
				$ii= count ($_FILES['images']['tmp_name']);
				for($i=0;$i<$ii;$i++){
					$type=strrchr($_FILES['images']['name'][$i], '.');
					$filename=uniqid().$type;
					$fullpath=$path.'/'.$filename;
					move_uploaded_file($_FILES['images']['tmp_name'][$i],$fullpath);
					$smallFullpath=$path.'/small_'.$filename;
					Yii::app()->ih //делаем набор миниатюрок
   					 ->load($fullpath)
   					 ->adaptiveThumb(160, 120)
   					 ->save($smallFullpath);
					 Yii::app()->ih //делаем миниатюру главного изображения
   					 ->load($pathMainImage)
   					 ->adaptiveThumb(170, 120)
   					 ->save($smallPathMainImage);

					$imagesModel = new IshopAdvertImage();
					$imagesModel->advert_id=$model->id;
					$imagesModel->image=$filename;

					$imagesModel->save();
				}
				}
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));

	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['IshopItem']))
		{
			$oldImage=$model->mainimage;
			$imageFolder=$model->images;
			$model->attributes=$_POST['IshopItem'];
			$model->mainimage=CUploadedFile::getInstance($model,'mainimage');
			$path=Yii::getPathOfAlias('webroot').'/upload/'.$imageFolder;
			
			$model->images=$imageFolder;
			
			if ($model->mainimage)
				{
					if($model->save()){
					$pathMainImage=$path.'/'.$model->mainimage->getName();
					$smallPathMainImage=$path.'/small_'.$model->mainimage->getName();
					$model->mainimage->saveAs($pathMainImage);
					 Yii::app()->ih //делаем миниатюру главного изображения
   					 ->load($pathMainImage)
   					 ->adaptiveThumb(170, 120)
   					 ->save($smallPathMainImage);
						
						$this->redirect(array('view','id'=>$model->id));
					}			
				}else{
					$model->mainimage=$oldImage;
					if($model->save()){	
						$this->redirect(array('view','id'=>$model->id));
					}
				}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model=$this->loadModel($id);
		//echo $model->images;
		$folderFromDelete = Yii::getPathOfAlias('webroot').'/upload/'.$model->images.'/';
		$model->removeDirectory($folderFromDelete);

		$this->loadModel($id)->delete();

		//$model=$this->loadModel($id);
		//$folderForDelete = $this->loadModel()
		//$this->loadModel($id)->removeDirectory(loadModel($id)->images);
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('IshopItem');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		//$a = new ReflectionParameter($this->menu);
		//echo $a->getClass();
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new IshopItem('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['IshopItem']))
			$model->attributes=$_GET['IshopItem'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return IshopItem the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=IshopItem::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param IshopItem $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ishop-item-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
