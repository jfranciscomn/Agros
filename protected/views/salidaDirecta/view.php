<?php
$this->pageCaption='Ver SalidaDirecta #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Salida Directa'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Salida Directa', 'url'=>array('index')),
	array('label'=>'Crear SalidaDirecta', 'url'=>array('create')),
	array('label'=>'Actualizar SalidaDirecta', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar SalidaDirecta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Salida Directa', 'url'=>array('admin')),
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
		array(	'name'=>'entrada_aid',
		        'value'=>$model->entrada->nombre,),
		'cantidad',
		array(	'name'=>'estatus_did',
		        'value'=>$model->estatus->nombre,),
		array(	'name'=>'temporada_did',
		        'value'=>$model->temporada->nombre,),
	),
)); ?>
