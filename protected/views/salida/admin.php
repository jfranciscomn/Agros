<?php
$this->pageCaption='Administrar Salida';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administrar salida';
$this->breadcrumbs=array(
	'Salida'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Salida', 'url'=>array('index')),
	array('label'=>'Crear Salida', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('salida-grid', {
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
	'id'=>'salida-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		'codigoSalida',
		'fecha_f',
		array(	'name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'temporada_did',
		        'value'=>'$data->temporada->nombre',
			    'filter'=>CHtml::listData(Temporada::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'cliente_aid',
		        'value'=>'$data->cliente->nombre',
			    'filter'=>CHtml::listData(Cliente::model()->findAll(), 'id', 'nombre'),),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
