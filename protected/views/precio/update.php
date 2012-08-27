<?php
$this->pageCaption='Actualizar Precio '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Precio'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Precio', 'url'=>array('index')),
	array('label'=>'Crear Precio', 'url'=>array('create')),
	array('label'=>'Ver Precio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Precio', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>