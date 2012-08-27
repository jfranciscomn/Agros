<?php
$this->pageCaption='Administrar Cliente';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administrar cliente';
$this->breadcrumbs=array(
	'Cliente'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Cliente', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cliente-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cliente-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		'nombre',
		'apellidos',
		'fechaNacimiento_f',
		'rfc',
		'razonSocial',
		/*
		'codigopostal',
		'calle',
		'colonia',
		'telefono',
		'celular',
		'email',
		array(	'name'=>'estado_did',
		        'value'=>'$data->estado->nombre',
			    'filter'=>CHtml::listData(Estado::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'municipio_aid',
		        'value'=>'$data->municipio->nombre',
			    'filter'=>CHtml::listData(Municipio::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
