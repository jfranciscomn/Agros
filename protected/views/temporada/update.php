<?php
$this->pageCaption='Actualizar Temporada '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Temporada'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Temporada', 'url'=>array('index')),
	array('label'=>'Crear Temporada', 'url'=>array('create')),
	array('label'=>'Ver Temporada', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Temporada', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>