<?php
$this->pageCaption='Ver Clasificacion #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Clasificacion'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Clasificacion', 'url'=>array('index')),
	array('label'=>'Crear Clasificacion', 'url'=>array('create')),
	array('label'=>'Actualizar Clasificacion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Clasificacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Clasificacion', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		'nombre',
		'descripcion',
		array(	'name'=>'producto_did',
		        'value'=>$model->producto->nombre,),
		array(	'name'=>'variedad_did',
		        'value'=>$model->variedad->nombre,),
		array(	'name'=>'estatus_did',
		        'value'=>$model->estatus->nombre,),
	),
)); ?>
