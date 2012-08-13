<?php
$this->pageCaption='Calibre';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar calibre';
$this->breadcrumbs=array(
	'Calibre',
);

$this->menu=array(
	array('label'=>'Crear Calibre', 'url'=>array('create')),
	array('label'=>'Administrar Calibre', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
