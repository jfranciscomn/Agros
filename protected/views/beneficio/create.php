<?php
$this->pageCaption='Crear Beneficio';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo beneficio';
$this->breadcrumbs=array(
	'Beneficio'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Beneficio', 'url'=>array('index')),
	array('label'=>'Administrar Beneficio', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'detalle'=>$detalle,'entrada'=>$entrada)); ?>
