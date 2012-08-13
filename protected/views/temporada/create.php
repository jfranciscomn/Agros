<?php
$this->pageCaption='Crear Temporada';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo temporada';
$this->breadcrumbs=array(
	'Temporada'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Temporada', 'url'=>array('index')),
	array('label'=>'Administrar Temporada', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>