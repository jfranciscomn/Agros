<?php
$this->pageCaption='Ejido';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar ejido';
$this->breadcrumbs=array(
	'Ejido',
);

$this->menu=array(
	array('label'=>'Crear Ejido', 'url'=>array('create')),
	array('label'=>'Administrar Ejido', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
