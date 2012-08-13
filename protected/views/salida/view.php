<?php
$this->pageCaption='Ver Salida #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Salida'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Salida', 'url'=>array('index')),
	array('label'=>'Crear Salida', 'url'=>array('create')),
	array('label'=>'Actualizar Salida', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Salida', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Salida', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		'codigoSalida',
		'fecha_f',
		array(	'name'=>'estatus_did',
		        'value'=>$model->estatus->nombre,),
		array(	'name'=>'temporada_did',
		        'value'=>$model->temporada->nombre,),
		array(	'name'=>'cliente_aid',
		        'value'=>$model->cliente->nombre,),
	),
)); ?>
