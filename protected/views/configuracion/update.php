<?php
$this->pageCaption='Actualizar Configuracion '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Configuracion'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Configuracion', 'url'=>array('index')),
	array('label'=>'Crear Configuracion', 'url'=>array('create')),
	array('label'=>'Ver Configuracion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Configuracion', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>