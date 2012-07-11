<?php
$this->pageCaption='Actualizar Entrada '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Entrada'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Entrada', 'url'=>array('index')),
	array('label'=>'Crear Entrada', 'url'=>array('create')),
	array('label'=>'Ver Entrada', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Entrada', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>