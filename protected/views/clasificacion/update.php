<?php
$this->pageCaption='Actualizar Clasificacion '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Clasificacion'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Clasificacion', 'url'=>array('index')),
	array('label'=>'Crear Clasificacion', 'url'=>array('create')),
	array('label'=>'Ver Clasificacion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Clasificacion', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>