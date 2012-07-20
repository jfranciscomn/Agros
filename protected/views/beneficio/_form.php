<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'beneficio-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<h3>Boleta de Beneficio</h3>
	<div class='well'>
		<div class='row-fluid '>
			<div class="span6">
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
			</div>
			<div class="span6">
				<div class="<?php echo $form->fieldClass($model, 'entrada_aid'); ?>">
					<?php echo $form->labelEx($model,'entrada_aid'); ?>
					<div class="input">
			
						<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
								      'model'=>$model, 
								      'attribute'=>'entrada_aid', 
								      'sourceUrl'=>Yii::app()->createUrl('entrada/autocompletesearch'), 
								      'showFKField'=>false,
								      'relName'=>'entrada', // the relation name defined above
								      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display

								      'options'=>array(
									  'minLength'=>1, 
								      ),
								 )); ?>			<?php echo $form->error($model,'entrada_aid'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	


<script type="text/javascript">
$.format = function(source, params) {
	if ( arguments.length == 1 ) 
		return function() {
			var args = $.makeArray(arguments);
			args.unshift(source);
			return $.format.apply( this, args );
		};
	if ( arguments.length > 2 && params.constructor != Array  ) {
		params = $.makeArray(arguments).slice(1);
	}
	if ( params.constructor != Array ) {
		params = [ params ];
	}
	$.each(params, function(i, n) {
		source = source.replace(new RegExp("\\{" + i + "\\}", "g"), n);
	});
	return source;
};
jQuery(document).ready(function(){
	hideEmptyHeaders();
	$(".add").click(function(){
		var template = jQuery.format(jQuery.trim($(this).siblings(".template").val()));
		var place = $(this).parents(".templateFrame:first").children(".templateTarget");
		var i = place.find(".rowIndex").length>0 ? place.find(".rowIndex").max()+1 : 0;
		$(template(i)).appendTo(place);
		place.siblings('.templateHead').show()
		// start specific commands

		// end specific commands
	});

	$(".remove").live("click", function() {
		$(this).parents(".templateContent:first").remove();
		hideEmptyHeaders();
	});
});

function hideEmptyHeaders(){
	$('.templateTarget').filter(function(){return $.trim($(this).text())===''}).siblings('.templateHead').hide();
}
</script>


<div class="complex">
        
        <div class="panel">
            <table class="templateFrame grid" cellspacing="0">
                <thead class="templateHead">
                    <tr>
                        <td>
                          asdfsdf
                        </td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="4">
                            <div class="add">'New</div>
                            <div style='display:none'>
                            <textarea class="template" rows="0" cols="0">
                                <tr class="templateContent">
                                    <td>
                                       dfasdfasdf
                                    </td>
                                    <td>
                                        <div class="remove"><?php echo Yii::t('ui','Remove');?></div>
                                        <input type="hidden" class="rowIndex" value="{0}" />
                                    </td>
                                </tr>
                            </textarea>
                            </div>
                        </td>
                    </tr>
                </tfoot>
                <tbody class="templateTarget">
                <tr></tr>
                </tbody>
            </table>
        </div><!--panel-->
    </div><!--complex-->


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
