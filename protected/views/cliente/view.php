<?php
$this->pageCaption='Ver Cliente #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Cliente'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Cliente', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),
	array('label'=>'Actualizar Cliente', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Cliente', 'url'=>array('admin')),
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
		'apellidos',
		'fechaNacimiento_f',
		'rfc',
		'razonSocial',
		'codigopostal',
		'calle',
		'colonia',
		'telefono',
		'celular',
		'email',
		array(	'name'=>'estado_did',
		        'value'=>$model->estado->nombre,),
		array(	'name'=>'municipio_aid',
		        'value'=>$model->municipio->nombre,),
		array(	'name'=>'estatus_did',
		        'value'=>$model->estatus->nombre,),
	),
)); ?>
