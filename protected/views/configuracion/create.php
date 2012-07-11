<?php
$this->pageCaption='Crear Configuracion';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo configuracion';
$this->breadcrumbs=array(
	'Configuracion'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Configuracion', 'url'=>array('index')),
	array('label'=>'Administrar Configuracion', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>