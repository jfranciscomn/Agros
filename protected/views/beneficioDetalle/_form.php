<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'beneficio-detalle-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'cantidad'); ?>">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'cantidad'); ?>
			<?php echo $form->error($model,'cantidad'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'saldo'); ?>">
		<?php echo $form->labelEx($model,'saldo'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'saldo'); ?>
			<?php echo $form->error($model,'saldo'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'clasificacion_aid'); ?>">
		<?php echo $form->labelEx($model,'clasificacion_aid'); ?>
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
					 )); ?>			<?php echo $form->error($model,'clasificacion_aid'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'calibre_aid'); ?>">
		<?php echo $form->labelEx($model,'calibre_aid'); ?>
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
					 )); ?>			<?php echo $form->error($model,'calibre_aid'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'unidad_did'); ?>">
		<?php echo $form->labelEx($model,'unidad_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'unidad_did',CHtml::listData(Unidad::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'unidad_did'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'beneficio_aid'); ?>">
		<?php echo $form->labelEx($model,'beneficio_aid'); ?>
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
					 )); ?>			<?php echo $form->error($model,'beneficio_aid'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'estatus_did'); ?>">
		<?php echo $form->labelEx($model,'estatus_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'estatus_did',CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'estatus_did'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
