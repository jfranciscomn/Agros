<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'id'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'id'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'cantidad'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'cantidad'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'saldo'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'saldo'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'clasificacion_aid'); ?>
		<div class="input">
			
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
					      'model'=>$model, 
					      'attribute'=>'clasificacion_aid', 
					      'sourceUrl'=>Yii::app()->createUrl('clasificacion/autocompletesearch'), 
					      'showFKField'=>false,
					      'relName'=>'clasificacion', // the relation name defined above
					      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display

					      'options'=>array(
					          'minLength'=>1, 
					      ),
					 )); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'calibre_aid'); ?>
		<div class="input">
			
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
					      'model'=>$model, 
					      'attribute'=>'calibre_aid', 
					      'sourceUrl'=>Yii::app()->createUrl('calibre/autocompletesearch'), 
					      'showFKField'=>false,
					      'relName'=>'calibre', // the relation name defined above
					      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display

					      'options'=>array(
					          'minLength'=>1, 
					      ),
					 )); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'unidad_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,unidad_did,CHtml::listData(Unidad::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'beneficio_aid'); ?>
		<div class="input">
			
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
					      'model'=>$model, 
					      'attribute'=>'beneficio_aid', 
					      'sourceUrl'=>Yii::app()->createUrl('beneficio/autocompletesearch'), 
					      'showFKField'=>false,
					      'relName'=>'beneficio', // the relation name defined above
					      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display

					      'options'=>array(
					          'minLength'=>1, 
					      ),
					 )); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'estatus_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,estatus_did,CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
