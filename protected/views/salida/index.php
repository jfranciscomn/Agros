<?php
$this->pageCaption='Salida';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar salida';
$this->breadcrumbs=array(
	'Salida',
);

$this->menu=array(
	array('label'=>'Crear Salida', 'url'=>array('create')),
	array('label'=>'Administrar Salida', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
