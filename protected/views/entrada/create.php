<?php
$this->pageCaption='Crear Entrada';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo entrada';
$this->breadcrumbs=array(
	'Entrada'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Entrada', 'url'=>array('index')),
	array('label'=>'Administrar Entrada', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>