<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'calibre-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'nombre'); ?>">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>150)); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'descripcion'); ?>">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>250)); ?>
			<?php echo $form->error($model,'descripcion'); ?>
		</div>
	</div>

		<div class="<?php echo $form->fieldClass($model, 'producto_did'); ?>">
			<?php  echo $form->labelEx($model,'producto '); ?>
			<div class="input">
				<?php echo $form->dropDownList($model,'producto_did',CHtml::listData(Producto::model()->findAll('calibre=1'), 'id', 'nombre'),array(
			        'empty'=>'Seleccione un Producto', 
			        'ajax' => array(
			                   'type'=>'POST',
			                   'url'=>CController::createUrl('variedad/dynamicList'),
			                   'update'=>'#Calibre_variedad_did',
			                   'data'=>array('producto'=>'js:this.value'),
			                ),
			   )); ?>			
				<?php echo $form->error($model,'producto_did'); ?>
			</div>
		</div>


		<div class="<?php echo $form->fieldClass($model, 'variedad_did'); ?>">
			<?php echo $form->labelEx($model,'variedad_did'); ?>
			<div class="input">

				<?php echo $form->dropDownList($model,'variedad_did',CHtml::listData(array(), 'id', 'nombre'),array('empty' => 'Seleccione una variedad', 'disabled'=>false)); ?>			
				<?php echo $form->error($model,'variedad_did'); ?>
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
