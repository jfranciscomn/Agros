<?php
$this->pageCaption='Actualizar BeneficioDetalle '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Beneficio Detalle'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Beneficio Detalle', 'url'=>array('index')),
	array('label'=>'Crear BeneficioDetalle', 'url'=>array('create')),
	array('label'=>'Ver BeneficioDetalle', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Beneficio Detalle', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>