<?php
$this->pageCaption='Crear Variedad';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo variedad';
$this->breadcrumbs=array(
	'Variedad'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Variedad', 'url'=>array('index')),
	array('label'=>'Administrar Variedad', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>