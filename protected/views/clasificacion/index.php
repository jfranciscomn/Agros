<?php
$this->pageCaption='Clasificacion';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar clasificacion';
$this->breadcrumbs=array(
	'Clasificacion',
);

$this->menu=array(
	array('label'=>'Crear Clasificacion', 'url'=>array('create')),
	array('label'=>'Administrar Clasificacion', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
