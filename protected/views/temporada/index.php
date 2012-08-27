<?php
$this->pageCaption='Temporada';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar temporada';
$this->breadcrumbs=array(
	'Temporada',
);

$this->menu=array(
	array('label'=>'Crear Temporada', 'url'=>array('create')),
	array('label'=>'Administrar Temporada', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
