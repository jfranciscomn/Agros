<?php
$this->pageCaption='Crear SalidaDirecta';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo salidadirecta';
$this->breadcrumbs=array(
	'Salida Directa'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Salida Directa', 'url'=>array('index')),
	array('label'=>'Administrar Salida Directa', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>