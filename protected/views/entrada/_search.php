
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
		<?php echo $form->label($model,'codigo'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'codigo'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'fecha_f'); ?>
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
														   ),)); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'cosecha'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'cosecha',array('size'=>60,'maxlength'=>145)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'camion'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'camion',array('size'=>60,'maxlength'=>145)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'marca'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'marca',array('size'=>60,'maxlength'=>145)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'modelo'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'modelo',array('size'=>60,'maxlength'=>145)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'placas'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'placas',array('size'=>60,'maxlength'=>145)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'conductor'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'conductor',array('size'=>60,'maxlength'=>145)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'pesoBruto'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'pesoBruto'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'taraCamion'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'taraCamion'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'pesoNeto'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'pesoNeto'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'impuresas'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'impuresas'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'pesoNetoAnalizado'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'pesoNetoAnalizado'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'saldo'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'saldo'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'cliente_aid'); ?>
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
					 )); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'producto_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'producto_did',CHtml::listData(Producto::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'variedad_aid'); ?>
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
					 )); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'unidad_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'unidad_did',CHtml::listData(Unidad::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'estado_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'estado_did',CHtml::listData(Estado::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'municipio_aid'); ?>
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
					 )); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'ejido_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'ejido_did',CHtml::listData(Ejido::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'estatus_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'estatus_did',CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'temporada_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'temporada_did',CHtml::listData(Temporada::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
