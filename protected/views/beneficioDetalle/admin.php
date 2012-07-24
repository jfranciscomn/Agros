<?php
$this->pageCaption='Administrar Beneficio Detalle';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administrar beneficio detalle';
$this->breadcrumbs=array(
	'Beneficio Detalle'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Beneficio Detalle', 'url'=>array('index')),
	array('label'=>'Crear BeneficioDetalle', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('beneficio-detalle-grid', {
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
	'id'=>'beneficio-detalle-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		'cantidad',
		'saldo',
		array(	'name'=>'clasificacion_aid',
		        'value'=>'$data->clasificacion->nombre',
			    'filter'=>CHtml::listData(Clasificacion::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'calibre_aid',
		        'value'=>'$data->calibre->nombre',
			    'filter'=>CHtml::listData(Calibre::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'unidad_did',
		        'value'=>'$data->unidad->nombre',
			    'filter'=>CHtml::listData(Unidad::model()->findAll(), 'id', 'nombre'),),
		/*
		array(	'name'=>'beneficio_aid',
		        'value'=>'$data->beneficio->nombre',
			    'filter'=>CHtml::listData(Beneficio::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
