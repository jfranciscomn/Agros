<?php
$this->pageCaption='Cliente';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar cliente';
$this->breadcrumbs=array(
	'Cliente',
);

$this->menu=array(
	array('label'=>'Crear Cliente', 'url'=>array('create')),
	array('label'=>'Administrar Cliente', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
