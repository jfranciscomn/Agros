<?php
$this->pageCaption='Servicio';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar servicio';
$this->breadcrumbs=array(
	'Servicio',
);

$this->menu=array(
	array('label'=>'Crear Servicio', 'url'=>array('create')),
	array('label'=>'Administrar Servicio', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
