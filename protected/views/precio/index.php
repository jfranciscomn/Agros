<?php
$this->pageCaption='Precio';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar precio';
$this->breadcrumbs=array(
	'Precio',
);

$this->menu=array(
	array('label'=>'Crear Precio', 'url'=>array('create')),
	array('label'=>'Administrar Precio', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
