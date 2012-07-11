<?php
$this->pageCaption='Crear Precio';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo precio';
$this->breadcrumbs=array(
	'Precio'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Precio', 'url'=>array('index')),
	array('label'=>'Administrar Precio', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>