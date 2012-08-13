<?php
$this->pageCaption='Administrar Entrada';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administrar entrada';
$this->breadcrumbs=array(
	'Entrada'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Entrada', 'url'=>array('index')),
	array('label'=>'Crear Entrada', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('entrada-grid', {
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
	'id'=>'entrada-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(

		'codigo',
		'fecha_f',
		array(	'name'=>'cliente_aid',
		        'value'=>'$data->cliente->nombre',
			    'filter'=>CHtml::listData(Cliente::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'producto_did',
		        'value'=>'$data->producto->nombre',
			    'filter'=>CHtml::listData(Producto::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'variedad_aid',
		        'value'=>'$data->variedad->nombre',
			    'filter'=>CHtml::listData(Variedad::model()->findAll(), 'id', 'nombre'),),
		'pesoNeto',
		'saldo',
		
		/*'cosecha',
		'camion',
		'marca',
		'modelo',
		'placas',
		'conductor',
		'pesoBruto',
		'taraCamion',
		'pesoNeto',
		'impuresas',
		'pesoNetoAnalizado',
		'saldo',
		array(	'name'=>'cliente_aid',
		        'value'=>'$data->cliente->nombre',
			    'filter'=>CHtml::listData(Cliente::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'producto_did',
		        'value'=>'$data->producto->nombre',
			    'filter'=>CHtml::listData(Producto::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'variedad_aid',
		        'value'=>'$data->variedad->nombre',
			    'filter'=>CHtml::listData(Variedad::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'unidad_did',
		        'value'=>'$data->unidad->nombre',
			    'filter'=>CHtml::listData(Unidad::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'estado_did',
		        'value'=>'$data->estado->nombre',
			    'filter'=>CHtml::listData(Estado::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'municipio_aid',
		        'value'=>'$data->municipio->nombre',
			    'filter'=>CHtml::listData(Municipio::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'ejido_did',
		        'value'=>'$data->ejido->nombre',
			    'filter'=>CHtml::listData(Ejido::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'temporada_did',
		        'value'=>'$data->temporada->nombre',
			    'filter'=>CHtml::listData(Temporada::model()->findAll(), 'id', 'nombre'),),
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
