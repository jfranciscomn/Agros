<?php
$this->pageCaption='Actualizar SalidaDirecta '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Salida Directa'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Salida Directa', 'url'=>array('index')),
	array('label'=>'Crear SalidaDirecta', 'url'=>array('create')),
	array('label'=>'Ver SalidaDirecta', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Salida Directa', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>