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
		<?php echo $form->label($model,'nombre'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>150)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'variedad'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'variedad'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'clasificacion'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'clasificacion'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'calibre'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'calibre'); ?>
		</div>
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
