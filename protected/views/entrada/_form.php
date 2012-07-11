<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'entrada-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'codigo'); ?>">
		<?php echo $form->labelEx($model,'codigo'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'codigo'); ?>
			<?php echo $form->error($model,'codigo'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'fecha_f'); ?>">
		<?php echo $form->labelEx($model,'fecha_f'); ?>
		<div class="input">
			
			<?php
					if ($model->fecha_f!='') 
						$model->fecha_f=date('d-m-Y',strtotime($model->fecha_f));
					$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					                                       'model'=>$model,
					                                       'attribute'=>'fecha_f',
					                                       'value'=>$model->fecha_f,
					                                       'language' => 'es',
					                                       'htmlOptions' => array('readonly'=>"readonly"),
					                                       'options'=>array(
					                                               'autoSize'=>true,
					                                               'defaultDate'=>$model->fecha_f,
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
					                                       ),)); ?>			<?php echo $form->error($model,'fecha_f'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'cosecha'); ?>">
		<?php echo $form->labelEx($model,'cosecha'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'cosecha',array('size'=>60,'maxlength'=>145)); ?>
			<?php echo $form->error($model,'cosecha'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'camion'); ?>">
		<?php echo $form->labelEx($model,'camion'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'camion',array('size'=>60,'maxlength'=>145)); ?>
			<?php echo $form->error($model,'camion'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'marca'); ?>">
		<?php echo $form->labelEx($model,'marca'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'marca',array('size'=>60,'maxlength'=>145)); ?>
			<?php echo $form->error($model,'marca'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'modelo'); ?>">
		<?php echo $form->labelEx($model,'modelo'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'modelo',array('size'=>60,'maxlength'=>145)); ?>
			<?php echo $form->error($model,'modelo'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'placas'); ?>">
		<?php echo $form->labelEx($model,'placas'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'placas',array('size'=>60,'maxlength'=>145)); ?>
			<?php echo $form->error($model,'placas'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'conductor'); ?>">
		<?php echo $form->labelEx($model,'conductor'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'conductor',array('size'=>60,'maxlength'=>145)); ?>
			<?php echo $form->error($model,'conductor'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'pesoBruto'); ?>">
		<?php echo $form->labelEx($model,'pesoBruto'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'pesoBruto'); ?>
			<?php echo $form->error($model,'pesoBruto'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'taraCamion'); ?>">
		<?php echo $form->labelEx($model,'taraCamion'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'taraCamion'); ?>
			<?php echo $form->error($model,'taraCamion'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'pesoNeto'); ?>">
		<?php echo $form->labelEx($model,'pesoNeto'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'pesoNeto'); ?>
			<?php echo $form->error($model,'pesoNeto'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'impuresas'); ?>">
		<?php echo $form->labelEx($model,'impuresas'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'impuresas'); ?>
			<?php echo $form->error($model,'impuresas'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'pesoNetoAnalizado'); ?>">
		<?php echo $form->labelEx($model,'pesoNetoAnalizado'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'pesoNetoAnalizado'); ?>
			<?php echo $form->error($model,'pesoNetoAnalizado'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'saldo'); ?>">
		<?php echo $form->labelEx($model,'saldo'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'saldo'); ?>
			<?php echo $form->error($model,'saldo'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'cliente_aid'); ?>">
		<?php echo $form->labelEx($model,'cliente_aid'); ?>
		<div class="input">
			
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
					      'model'=>$model, 
					      'attribute'=>'cliente_aid', 
					      'sourceUrl'=>Yii::app()->createUrl('cliente/autocompletesearch'), 
					      'showFKField'=>false,
					      'relName'=>'cliente', // the relation name defined above
					      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display

					      'options'=>array(
					          'minLength'=>1, 
					      ),
					 )); ?>			<?php echo $form->error($model,'cliente_aid'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'producto_did'); ?>">
		<?php echo $form->labelEx($model,'producto_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'producto_did',CHtml::listData(Producto::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'producto_did'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'variedad_aid'); ?>">
		<?php echo $form->labelEx($model,'variedad_aid'); ?>
		<div class="input">
			
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
					      'model'=>$model, 
					      'attribute'=>'variedad_aid', 
					      'sourceUrl'=>Yii::app()->createUrl('variedad/autocompletesearch'), 
					      'showFKField'=>false,
					      'relName'=>'variedad', // the relation name defined above
					      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display

					      'options'=>array(
					          'minLength'=>1, 
					      ),
					 )); ?>			<?php echo $form->error($model,'variedad_aid'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'unidad_did'); ?>">
		<?php echo $form->labelEx($model,'unidad_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'unidad_did',CHtml::listData(Unidad::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'unidad_did'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'estado_did'); ?>">
		<?php echo $form->labelEx($model,'estado_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'estado_did',CHtml::listData(Estado::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'estado_did'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'municipio_aid'); ?>">
		<?php echo $form->labelEx($model,'municipio_aid'); ?>
		<div class="input">
			
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
					      'model'=>$model, 
					      'attribute'=>'municipio_aid', 
					      'sourceUrl'=>Yii::app()->createUrl('municipio/autocompletesearch'), 
					      'showFKField'=>false,
					      'relName'=>'municipio', // the relation name defined above
					      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display

					      'options'=>array(
					          'minLength'=>1, 
					      ),
					 )); ?>			<?php echo $form->error($model,'municipio_aid'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'ejido_did'); ?>">
		<?php echo $form->labelEx($model,'ejido_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'ejido_did',CHtml::listData(Ejido::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'ejido_did'); ?>
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