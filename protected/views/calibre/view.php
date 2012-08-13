<?php
$this->pageCaption='Ver Calibre #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Calibre'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Calibre', 'url'=>array('index')),
	array('label'=>'Crear Calibre', 'url'=>array('create')),
	array('label'=>'Actualizar Calibre', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Calibre', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Calibre', 'url'=>array('admin')),
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
