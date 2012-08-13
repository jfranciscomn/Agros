<?php
$this->pageCaption='Configuracion';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar configuracion';
$this->breadcrumbs=array(
	'Configuracion',
);

$this->menu=array(
	array('label'=>'Crear Configuracion', 'url'=>array('create')),
	array('label'=>'Administrar Configuracion', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
