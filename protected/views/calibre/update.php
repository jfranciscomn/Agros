<?php
$this->pageCaption='Actualizar Calibre '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Calibre'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Calibre', 'url'=>array('index')),
	array('label'=>'Crear Calibre', 'url'=>array('create')),
	array('label'=>'Ver Calibre', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Calibre', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>