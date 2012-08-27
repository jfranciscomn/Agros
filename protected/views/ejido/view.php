<?php
$this->pageCaption='Ver Ejido #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Ejido'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Ejido', 'url'=>array('index')),
	array('label'=>'Crear Ejido', 'url'=>array('create')),
	array('label'=>'Actualizar Ejido', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Ejido', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Ejido', 'url'=>array('admin')),
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
		array(	'name'=>'municipio_did',
		        'value'=>$model->municipio->nombre,),
		array(	'name'=>'estatus_did',
		        'value'=>$model->estatus->nombre,),
	),
)); ?>
