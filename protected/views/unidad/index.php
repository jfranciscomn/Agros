<?php
$this->pageCaption='Unidad';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar unidad';
$this->breadcrumbs=array(
	'Unidad',
);

$this->menu=array(
	array('label'=>'Crear Unidad', 'url'=>array('create')),
	array('label'=>'Administrar Unidad', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
