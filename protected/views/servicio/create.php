<?php
$this->pageCaption='Crear Servicio';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo servicio';
$this->breadcrumbs=array(
	'Servicio'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Servicio', 'url'=>array('index')),
	array('label'=>'Administrar Servicio', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>