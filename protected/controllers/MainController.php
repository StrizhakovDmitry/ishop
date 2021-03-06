<?php

class MainController extends Controller
{
    public $itemsOnStringNumber = 0;
    const ITEMS_ON_STRING_MAIN_PAGE = 4;
    public $openTeg = false;
    public $layout = 'public';

    public function actionIndex()
    {
        if (Yii::app()->getRequest()->getParam('category'))//меняет критерии в соответствии с GET параметром 'category', если он есть
            $condition = 'category_id=' . Yii::app()->getRequest()->getParam('category');
        else
            $condition = NULL;
        //$condition = 'category_id=5';
        //$a = Yii::app() -> getRequest()-> getParam('category');
        //var_dump($condition);

        //exit;
        $dataProvider = new CActiveDataProvider('IshopItem', array('criteria' => array('condition' => $condition,), 'pagination' => array('pageSize' => 16),));
        $this->render('index', array('dataProvider' => $dataProvider,));
        //$this->render('index');
    }

    public function actionBasket()
    {
        $this->render('basket');
    }

    public function actionContacts()
    {
        $this->render('contacts');
    }

    public function actionView($id)
    {
        $model = $this->loadModel($id);
        $cookie = new CHttpCookie('itemNumber', $id);
        $cookie->expire = time() + 120 * 24 * 60 * 60;
        Yii::app()->request->cookies[''] = $cookie;
        $this->render('view', array('model' => $this->loadModel($id),));
    }

    public function actionCreateOrder()
    {//создает заказ
        if (isset($_POST['purchase'])) {

            $model = new IshopPurchases;
            $model->attributes = $_POST['purchase'];
            $model->parametrs = Yii::app()->request->cookies['purchases']->value;
            $PArray = CJSON::decode($model->parametrs);
            $totalPrice = 0;
            foreach ($PArray as $id => $quantity) {
                $totalPrice += (IshopItem::model()->findByPk($id)->price * $quantity);
            }
            $model->totalPrice = $totalPrice;
            $model->createtime = time();
            $model->uniqueKey = md5($model->parametrs . Yii::app()->request->cookies['PHPSESSID']->value);
            if (!IshopPurchases::model()->find('uniqueKey=:uniqueKey', array(':uniqueKey' => $model->uniqueKey))) {
                if ($model->save()) {
                    $this->render('createorder', array('model' => $model,));
                }
            } else {
                $model = IshopPurchases::model()->find('uniqueKey=:uniqueKey', array(':uniqueKey' => $model->uniqueKey));
                $this->render('createorder', array('model' => $model,));
            }
        }
    }

    public function getOrderTableBodyHTML($model)
    {
        $HTML = '';
        $PArray = CJSON::decode($model->parametrs);
        $i = 0;
        foreach ($PArray as $id => $quantity) {
            $i++;
            $HTML .= '<tr>';
            $HTML .= '<td>' . $i . '</td>';
            $HTML .= '<td>' . $id . '</td>';
            $HTML .= '<td>' . IshopItem::model()->findByPk($id)->title . '</td>';
            $HTML .= '<td>' . $quantity . '</td>';
            $HTML .= '<td>' . IshopItem::model()->findByPk($id)->price . '</td>';
            $HTML .= '</tr>';
        }
        return $HTML;

    }

    public function getImagesHTML($id)
    {/////////////////////
        //$this = new IshopItem();
        $model = $this->loadModel($id);


        $imageHTML = '';
        $advertImages = $model->advertImages;
        $i = 0;
        $imageHTML .= '<div class="row"><div class="span6">';
        foreach ($advertImages as $key) {
            $folder = $model->images;
            $_i = '<div class="span1">';
            $_i .= '<a class="example-image-link miniature img-rounded" href="';
            $_i .= '/ishop/upload/';
            $_i .= $folder . '/' . $advertImages[$i]->image;
            $_i .= '" data-lightbox="example-set" data-title=""><img class="example-image img-rounded" src="';
            $_i .= '/ishop/upload/';
            $_i .= $folder;
            $_i .= '/';
            $_i .= 'small_';
            $_i .= $advertImages[$i]->image;
            $_i .= '" alt=""/></a>';
            $_i .= '</div>';
            $imageHTML .= $_i;
            $i++;
        };
        $imageHTML .= '</div></div>';
        return $imageHTML;
    }

    public function getPurchasesTable()
    {
        if (!$cookie = Yii::app()->request->cookies['purchases']->value) {
            echo '<h3>Ваша корзина пуста<h2>';
        } else {
            $PArray = CJSON::decode($cookie);
            $HTML = '';
            $HTML .= '<table class="table table-striped basketTable">';
            $HTML .= '<thead>';
            $HTML .= '<tr><th>Номер</th><th>Артикул</th><th>Название</th><th>Цена</th><th>Количество</th><th></th>';
            $HTML .= '</thead>';
            $HTML .= '<tbody>';
            $num = 0;
            $totalPrice = 0;
            foreach ($PArray as $id => $quantity) {
                $num++;
                //$totalPrice=$model->price;
                $model = IshopItem::model()->findByPk($id);
                $HTML .= '<tr>';
                $HTML .= '<td>' . $num . '</td>' . '<td>' . $model->id . '</td><td>' . $model->title . '</td><td>' . $model->price . '</td><td>' . $quantity . '</td><td><img class="delelteIntemBasket" src="' . Yii::app()->request->baseUrl . '/images/cancel_128x128.png"></td>';
                $tmpPrice = $model->price * $quantity;
                $totalPrice += $tmpPrice;
                $HTML .= '</tr>';
            }
            $HTML .= '</tbody>';
            $HTML .= '</table>';
            $HTML .= '<h3 id="TotalPrice">Сумма: ' . $totalPrice . ' руб. </h3>';
            return $HTML;
        }
        //return $PArray;
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

    public function getItemsBlock()
    {
        if ($a = Yii::app()->getRequest()->getParam('category')) {
            //$b = IshopCategory::model()->findByPk($a);
            //$a = Yii::app()->getRequest()->getParam('category');
            $b = IshopCategory::model()->findByPk($a);
            $c = $b->IshopIntems;
        } else {
            $c = IshopItem::model()->findAll();
        }

        $openTag = FALSE;
        define('COL', 3);
        //количество колонок
        $i = 0;
        $HTML = '<div class="container">';

        foreach ($c as $key => $item) {
            if ($i == 0) {
                $HTML .= '<div class="row">';
                $openTag = TRUE;
            }
            $HTML .= '<a href="';
            $HTML .= Yii::app()->request->baseUrl . '/main/view/id/' . $item->id . '">';
            $HTML .= '<div class="span2">';
            $HTML .= '<br>';
            $HTML .= '<div style="height:20px;text-align:center">';
            $HTML .= $item->title;
            $HTML .= '</div>';
            $HTML .= '<div class="miniatureMainImage">';
            $HTML .= '<img src="';
            $HTML .= Yii::app()->request->baseUrl . '/upload/' . $item->images . '/small_';
            $HTML .= $item->mainimage;
            $HTML .= '">';
            $HTML .= '</div>';
            $HTML .= '<div style="text-align:center">';
            $HTML .= $item->price;
            $HTML .= ' руб.</div>';
            $HTML .= '</div>';
            $HTML .= '</a>';
            if ($i == COL) {
                $HTML .= '</div>';
                $openTag = FALSE;
            }
            $i++;
            if ($i > COL)
                $i = 0;
        }
        if ($openTag)
            $HTML .= '</div>';

        $HTML .= '</div>';

        return $HTML;
    }

    // Uncomment the following methods and override them if needed
    /*
     public function filters()
     {
     // return the filter configuration for this controller, e.g.:
     return array(
     'inlineFilterName',
     array(
     'class'=>'path.to.FilterClass',
     'propertyName'=>'propertyValue',
     ),
     );
     }

     public function actions()
     {
     // return external action classes, e.g.:
     return array(
     'action1'=>'path.to.ActionClass',
     'action2'=>array(
     'class'=>'path.to.AnotherActionClass',
     'propertyName'=>'propertyValue',
     ),
     );
     }
     */
    public function loadModel($id)
    {
        $model = IshopItem::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

}
