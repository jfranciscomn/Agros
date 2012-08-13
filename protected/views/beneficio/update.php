<?php
$this->pageCaption='Actualizar Beneficio '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Beneficio'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Beneficio', 'url'=>array('index')),
	array('label'=>'Crear Beneficio', 'url'=>array('create')),
	array('label'=>'Ver Beneficio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Beneficio', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form',  array('model'=>$model,'detalle'=>$detalle,'entrada'=>$entrada)); ?>
