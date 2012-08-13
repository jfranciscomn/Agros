<?php
$this->pageCaption='Entrada';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar entrada';
$this->breadcrumbs=array(
	'Entrada',
);

$this->menu=array(
	array('label'=>'Crear Entrada', 'url'=>array('create')),
	array('label'=>'Administrar Entrada', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
