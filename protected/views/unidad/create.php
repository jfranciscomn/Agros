<?php
$this->pageCaption='Crear Unidad';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo unidad';
$this->breadcrumbs=array(
	'Unidad'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Unidad', 'url'=>array('index')),
	array('label'=>'Administrar Unidad', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>