<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'salida-directa-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>
	<h3>Boleta de Salida</h3>
	<div class='well'>
		<div class='row-fluid show-grid'>
			<div class='span6'>
				<div class="<?php echo $form->fieldClass($model, 'codigoSalida'); ?>">
					<?php echo $form->labelEx($model,'codigoSalida'); ?>
					<div class="input">
			
						<?php echo $form->textField($model,'codigoSalida',array('size'=>60,'maxlength'=>254)); ?>
						<?php echo $form->error($model,'codigoSalida'); ?>
					</div>
				</div>
			</div>
			<div class='span6'>
				<div class="<?php echo $form->fieldClass($model, 'fecha_f'); ?>">
					<?php echo $form->labelEx($model,'fecha_f'); ?>
					<div class="input">
			
						<?php
								if ($model->fecha_f!='') 
									$model->fecha_f=date('Y-m-d',strtotime($model->fecha_f));
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
			</div>
			
		</div>
	</div>
	
	<h3>Boleta de Entrada</h3>
	<div class='well'>
		<div class='row-fluid show-grid'>
			<div class='span6'>
				<div class="<?php echo $form->fieldClass($model, 'entrada_aid'); ?>">
					<?php echo $form->labelEx($model,'entrada_aid'); ?>
					<div class="input">
			
						<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
								      'model'=>$model, 
								      'attribute'=>'entrada_aid', 
								      'sourceUrl'=>Yii::app()->createUrl('entrada/autocompletesearch'), 
								      'showFKField'=>false,
								      'relName'=>'entrada', // the relation name defined above
								      'displayAttr'=>'codigo',  // attribute or pseudo-attribute to display

								      'options'=>array(
									  'minLength'=>1, 
									  'select'=>"											$('#productorlbl').html(ui.item.productor);
											$('#productolbl').html(ui.item.producto);
											$('#variedadlbl').html(ui.item.variedad);
											$('#saldolbl').html(ui.item.saldo);",
								      ),
								 )); ?>			<?php echo $form->error($model,'entrada_aid'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class='row-fluid '>
			<div class="span3">
				<h5 > Productor </h5>
				<div id='productorlbl'> 
					<?php 
						 
					?> 
				</div>
			</div>
			<div class="span3">
				<h5 > Producto </h5>
				<div id='productolbl'>  
					<?php 
						
					?> 
				</div>
			</div>
			<div class="span3">
				<h5 > variedad </h5>
				<div id='variedadlbl'> 
					<?php 
						
					?>  
				</div>
			</div>
			<div class="span3">
				<h5 > Cantidad </h5>
				<div id='saldolbl'> 
					<?php 
						
					?>
				</div>
			</div>
		</div>
	</div>
	
	<h3>Datos</h3>
	<div class='well'>
		<div class='row-fluid show-grid'>
			<div class='span6'>

				<div class="<?php echo $form->fieldClass($model, 'cantidad'); ?>">
					<?php echo $form->labelEx($model,'cantidad'); ?>
					<div class="input">
			
						<?php echo $form->textField($model,'cantidad'); ?>
						<?php echo $form->error($model,'cantidad'); ?>
					</div>
				</div>
			</div>
			<div class="span6">
				<div class="<?php echo $form->fieldClass($model, 'unidad_did'); ?>">
					<?php echo $form->labelEx($model,'unidad_did'); ?>
					<div class="input">
			
						<?php echo $form->dropDownList($model,'unidad_did',
						CHtml::listData(Unidad::model()->findAll(), 'id', 'nombre'),array('empty'=>'Seleccione una Unidad',)); ?>
						<?php echo $form->error($model,'unidad_did'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
