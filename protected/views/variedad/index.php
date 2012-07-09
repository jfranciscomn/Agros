<?php
$this->pageCaption='Variedad';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar variedad';
$this->breadcrumbs=array(
	'Variedad',
);

$this->menu=array(
	array('label'=>'Crear Variedad', 'url'=>array('create')),
	array('label'=>'Administrar Variedad', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
