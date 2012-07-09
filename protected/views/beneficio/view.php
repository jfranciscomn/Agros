<?php
$this->pageCaption='Ver Beneficio #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Beneficio'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Beneficio', 'url'=>array('index')),
	array('label'=>'Crear Beneficio', 'url'=>array('create')),
	array('label'=>'Actualizar Beneficio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Beneficio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Beneficio', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		'fecha_f',
		array(	'name'=>'entrada_aid',
		        'value'=>$model->entrada->nombre,),
		array(	'name'=>'estatus_did',
		        'value'=>$model->estatus->nombre,),
		array(	'name'=>'temporada_did',
		        'value'=>$model->temporada->nombre,),
	),
)); ?>
