<?php
$this->pageCaption='Beneficio';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar beneficio';
$this->breadcrumbs=array(
	'Beneficio',
);

$this->menu=array(
	array('label'=>'Crear Beneficio', 'url'=>array('create')),
	array('label'=>'Administrar Beneficio', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
