<?php
$this->pageCaption='Ver Precio #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Precio'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Precio', 'url'=>array('index')),
	array('label'=>'Crear Precio', 'url'=>array('create')),
	array('label'=>'Actualizar Precio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Precio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Precio', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		'valor',
		array(	'name'=>'servicio_did',
		        'value'=>$model->servicio->nombre,),
		array(	'name'=>'estatus_did',
		        'value'=>$model->estatus->nombre,),
		array(	'name'=>'temporada_did',
		        'value'=>$model->temporada->nombre,),
	),
)); ?>
