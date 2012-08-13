<?php
$this->pageCaption='Crear Calibre';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo calibre';
$this->breadcrumbs=array(
	'Calibre'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Calibre', 'url'=>array('index')),
	array('label'=>'Administrar Calibre', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>