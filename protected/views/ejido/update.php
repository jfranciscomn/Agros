<?php
$this->pageCaption='Actualizar Ejido '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Ejido'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Ejido', 'url'=>array('index')),
	array('label'=>'Crear Ejido', 'url'=>array('create')),
	array('label'=>'Ver Ejido', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Ejido', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>