<?php if ($this->i == 0)
    echo '<div class="row mainItemsString">';
$this->openTeg = true;
?>
<a href="<?php echo Yii::app()->request->baseUrl . '/main/view/id/' . $data->id; ?>">
    <div class="span2">

        <div class="mainItemsTitle">
            <?php echo $data->title; ?>
        </div>
        <img
            src="<?php echo Yii::app()->request->baseUrl . '/upload/' . $data->images . '/small_' . $data->mainimage; ?>">

        <div class="mainItemsPrice">
            <?php echo $data->price; ?> Руб.
        </div>


    </div>
</a>
<?php
$this->i++;
if ($this->i == 4) {
    $this->openTeg = false;
    echo '</div>';
    $this->i = 0;
}


?>
	
	
	
