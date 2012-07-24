<?php
$this->pageCaption='Ver BeneficioDetalle #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Beneficio Detalle'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Beneficio Detalle', 'url'=>array('index')),
	array('label'=>'Crear BeneficioDetalle', 'url'=>array('create')),
	array('label'=>'Actualizar BeneficioDetalle', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar BeneficioDetalle', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Beneficio Detalle', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		'cantidad',
		'saldo',
		array(	'name'=>'clasificacion_aid',
		        'value'=>$model->clasificacion->nombre,),
		array(	'name'=>'calibre_aid',
		        'value'=>$model->calibre->nombre,),
		array(	'name'=>'unidad_did',
		        'value'=>$model->unidad->nombre,),
		array(	'name'=>'beneficio_aid',
		        'value'=>$model->beneficio->nombre,),
		array(	'name'=>'estatus_did',
		        'value'=>$model->estatus->nombre,),
	),
)); ?>
