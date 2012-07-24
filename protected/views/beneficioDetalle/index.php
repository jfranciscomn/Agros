<?php
$this->pageCaption='Beneficio Detalle';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar beneficio detalle';
$this->breadcrumbs=array(
	'Beneficio Detalle',
);

$this->menu=array(
	array('label'=>'Crear BeneficioDetalle', 'url'=>array('create')),
	array('label'=>'Administrar BeneficioDetalle', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
