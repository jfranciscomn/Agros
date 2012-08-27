<?php
$this->pageCaption='Actualizar Salida '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Salida'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Salida', 'url'=>array('index')),
	array('label'=>'Crear Salida', 'url'=>array('create')),
	array('label'=>'Ver Salida', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Salida', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>