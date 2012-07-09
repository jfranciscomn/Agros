<?php
$this->pageCaption='Actualizar Variedad '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Variedad'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Variedad', 'url'=>array('index')),
	array('label'=>'Crear Variedad', 'url'=>array('create')),
	array('label'=>'Ver Variedad', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Variedad', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>