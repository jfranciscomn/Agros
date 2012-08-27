<?php
$this->pageCaption='Autenticación ';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription="";
$this->breadcrumbs=array(
	'Autenticación ',
);
?>

<p>Por favor llene los siguientes campos con su usuario y contraseña:</p>

<div class="form">
<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<?php $this->widget('BAlert',array(
		'content'=>'<p>Los campos marcados con un <span class="required">*</span> son requeridos.</p>',
	)); ?>

	<div class="<?php echo $form->fieldClass($model, 'username'); ?>">
		<?php echo $form->labelEx($model,'username'); ?>
		<div class="controls">
			<?php echo $form->textField($model,'username'); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'password'); ?>">
		<?php echo $form->labelEx($model,'password'); ?>
		<div class="controls">
			<?php echo $form->passwordField($model,'password'); ?>
			<?php echo $form->error($model,'password'); ?>
			
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'rememberMe'); ?>">
		<div class="controls">
			<?php echo $form->checkBox($model,'rememberMe'); ?>
			<?php echo $form->error($model,'rememberMe'); ?>
		</div>
	</div>

	<div class="form-actions">
		<?php echo BHtml::submitButton('Login'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
