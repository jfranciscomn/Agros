<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'cliente-form',
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

	<div class="<?php echo $form->fieldClass($model, 'apellidos'); ?>">
		<?php echo $form->labelEx($model,'apellidos'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'apellidos',array('size'=>60,'maxlength'=>145)); ?>
			<?php echo $form->error($model,'apellidos'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'fechaNacimiento_f'); ?>">
		<?php echo $form->labelEx($model,'fechaNacimiento_f'); ?>
		<div class="input">
			
			<?php
					if ($model->fechaNacimiento_f!='') 
						$model->fechaNacimiento_f=date('d-m-Y',strtotime($model->fechaNacimiento_f));
					$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					                                       'model'=>$model,
					                                       'attribute'=>'fechaNacimiento_f',
					                                       'value'=>$model->fechaNacimiento_f,
					                                       'language' => 'es',
					                                       'htmlOptions' => array('readonly'=>"readonly"),
					                                       'options'=>array(
					                                               'autoSize'=>true,
					                                               'defaultDate'=>$model->fechaNacimiento_f,
					                                               'dateFormat'=>'yy-mm-dd',
					                                               'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
					                                               'buttonImageOnly'=>true,
					                                               'buttonText'=>'Fecha',
					                                               'selectOtherMonths'=>true,
					                                               'showAnim'=>'slide',
					                                               'showButtonPanel'=>true,
					                                               'showOn'=>'button',
					                                               'showOtherMonths'=>true,
					                                               'changeMonth' => 'true',
					                                               'changeYear' => 'true',
					                                               'minDate'=>"-70Y", //fecha minima
					                                               'maxDate'=> "+10Y", //fecha maxima
					                                       ),)); ?>			<?php echo $form->error($model,'fechaNacimiento_f'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'rfc'); ?>">
		<?php echo $form->labelEx($model,'rfc'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'rfc',array('size'=>13,'maxlength'=>13)); ?>
			<?php echo $form->error($model,'rfc'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'razonSocial'); ?>">
		<?php echo $form->labelEx($model,'razonSocial'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'razonSocial',array('size'=>60,'maxlength'=>145)); ?>
			<?php echo $form->error($model,'razonSocial'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'codigopostal'); ?>">
		<?php echo $form->labelEx($model,'codigopostal'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'codigopostal',array('size'=>10,'maxlength'=>10)); ?>
			<?php echo $form->error($model,'codigopostal'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'calle'); ?>">
		<?php echo $form->labelEx($model,'calle'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'calle',array('size'=>60,'maxlength'=>145)); ?>
			<?php echo $form->error($model,'calle'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'colonia'); ?>">
		<?php echo $form->labelEx($model,'colonia'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'colonia',array('size'=>60,'maxlength'=>145)); ?>
			<?php echo $form->error($model,'colonia'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'telefono'); ?>">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'telefono',array('size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'telefono'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'celular'); ?>">
		<?php echo $form->labelEx($model,'celular'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'celular',array('size'=>60,'maxlength'=>145)); ?>
			<?php echo $form->error($model,'celular'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'email'); ?>">
		<?php echo $form->labelEx($model,'email'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'estado_did'); ?>">
		<?php echo $form->labelEx($model,'estado_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'estado_did',CHtml::listData(Estado::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),array(
		        'empty'=>'Seleccione un Estado', 
		        'ajax' => array(
		                   'type'=>'POST',
		                   'url'=>CController::createUrl('municipio/dynamicList'),
		                   'update'=>'#Cliente_municipio_aid',
		                   'data'=>array('estado'=>'js:this.value'),
		                ),
		        'style'=>'width:30%',
		   )); ?>			
			<?php echo $form->error($model,'estado_did'); ?>
		</div>
	</div>
	
	<div class="<?php echo $form->fieldClass($model, 'municipio_aid'); ?>">
		<?php echo $form->labelEx($model,'municipio_aid'); ?>
		<div class="input">

			<?php echo $form->dropDownList($model,'municipio_aid',CHtml::listData(array(), 'id', 'nombre'),array('empty' => 'Seleccione un Municipio', 'style'=>'width:30%', 'disabled'=>false)); ?>			
			<?php echo $form->error($model,'municipio_aid'); ?>
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
