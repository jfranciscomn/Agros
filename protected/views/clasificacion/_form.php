<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'clasificacion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'nombre'); ?>">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>145)); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'descripcion'); ?>">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>245)); ?>
			<?php echo $form->error($model,'descripcion'); ?>
		</div>
	</div>
	<div class="<?php echo $form->fieldClass($model, 'producto'); ?>">
		<?php  echo $form->labelEx($model,'producto '); ?>
		<div class="input">
			<?php echo $form->dropDownList($model,'producto',CHtml::listData(Producto::model()->findAll(), 'id', 'nombre'),array(
		        'empty'=>'Seleccione un Producto', 
		        'ajax' => array(
		                   'type'=>'POST',
		                   'url'=>CController::createUrl('variedad/dynamicList'),
		                   'update'=>'#Clasificacion_variedad_aid',
		                   'data'=>array('producto'=>'js:this.value'),
		                ),
		        'style'=>'width:30%',
		   )); ?>			
			<?php echo $form->error($model,'producto'); ?>
		</div>
	</div>

	
	<div class="<?php echo $form->fieldClass($model, 'variedad_aid'); ?>">
		<?php echo $form->labelEx($model,'variedad_aid'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'variedad_aid',CHtml::listData(array(), 'id', 'nombre'),array('empty' => 'Seleccione una variedad', 'style'=>'width:30%', 'disabled'=>false)); ?>			
			<?php echo $form->error($model,'variedad_aid'); ?>
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
