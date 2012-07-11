<?php
$this->pageCaption='Crear Salida';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo salida';
$this->breadcrumbs=array(
	'Salida'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Salida', 'url'=>array('index')),
	array('label'=>'Administrar Salida', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>