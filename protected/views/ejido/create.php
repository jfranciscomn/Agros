<?php
$this->pageCaption='Crear Ejido';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo ejido';
$this->breadcrumbs=array(
	'Ejido'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Ejido', 'url'=>array('index')),
	array('label'=>'Administrar Ejido', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>