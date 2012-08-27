<?php
$this->pageCaption='Crear Clasificacion';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo clasificacion';
$this->breadcrumbs=array(
	'Clasificacion'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Clasificacion', 'url'=>array('index')),
	array('label'=>'Administrar Clasificacion', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>