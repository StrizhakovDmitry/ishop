<?php

class TestController extends Controller
{
    public $layout = 'public';
    public $itemsOnStringNumber = 0;
    const ITEMS_ON_STRING_MAIN_PAGE = 4;
    public $openTeg = false;

    public function actionIndex()
    {
        if (Yii::app()->getRequest()->getParam('category'))//меняет критерии в соответствии с GET параметром 'category', если он есть
            $condition = 'category_id=' . Yii::app()->getRequest()->getParam('category');
        //$condition = 'category_id=5';


        exit;
        $dataProvider = new CActiveDataProvider('IshopItem', array('criteria' => array('condition' => $condition,), 'pagination' => array('pageSize' => 16),));

        $this->render('index', array('dataProvider' => $dataProvider,));
    }

    public function getCategoriesMenu()
    {
        $i = '';
        $i .= '<ul class="nav nav-tabs nav-stacked">';
        $categoriesList = IshopCategory::model()->findAll();
        foreach ($categoriesList as $key => $value) {
            $i .= '<li><a href="';
            $i .= Yii::app()->request->baseUrl;
            $i .= '/';
            $i .= Yii::app()->controller->id;
            $i .= '/';
            $i .= $this->action->id;
            $i .= '/category/';
            $i .= $value->id;
            $i .= '">';
            $i .= $value->transcript;
            $i .= '</a></li>';
        }
        $i .= '</ul>';
        return $i;
    }

}

?>