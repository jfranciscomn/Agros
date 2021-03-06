<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'precio-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'valor'); ?>">
		<?php echo $form->labelEx($model,'valor'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'valor'); ?>
			<?php echo $form->error($model,'valor'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'servicio_did'); ?>">
		<?php echo $form->labelEx($model,'servicio_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'servicio_did',CHtml::listData(Servicio::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'servicio_did'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'estatus_did'); ?>">
		<?php echo $form->labelEx($model,'estatus_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'estatus_did',CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'estatus_did'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'temporada_did'); ?>">
		<?php echo $form->labelEx($model,'temporada_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'temporada_did',CHtml::listData(Temporada::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'temporada_did'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
