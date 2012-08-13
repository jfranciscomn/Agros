<?php
$this->pageCaption='Crear BeneficioDetalle';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo beneficiodetalle';
$this->breadcrumbs=array(
	'Beneficio Detalle'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Beneficio Detalle', 'url'=>array('index')),
	array('label'=>'Administrar Beneficio Detalle', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>