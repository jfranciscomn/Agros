<?php
$this->pageCaption='Salida Directa';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar salida directa';
$this->breadcrumbs=array(
	'Salida Directa',
);

$this->menu=array(
	array('label'=>'Crear SalidaDirecta', 'url'=>array('create')),
	array('label'=>'Administrar SalidaDirecta', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
