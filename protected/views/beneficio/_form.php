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
								      'displayAttr'=>'codigo',  // attribute or pseudo-attribute to display
								      'options'=>array(
									'minLength'=>1, 
									'select'=>"$('#prueba').val('asdfas');
											
											$('#productorlbl').html(ui.item.productor);
											$('#productolbl').html(ui.item.producto);
											$('#variedadlbl').html(ui.item.variedad);
											$('#saldolbl').html(ui.item.saldo);
											jQuery.ajax(
											{
											'type':'POST',
											'url':'".Yii::app()->createUrl('variedad/dynamicClacal')."',
											'data':{'entrada':this.value},
											'cache':false,
											'success':function(html){
													jQuery(\".clacal\").html(html);
													//alert(html);
													jQuery(\"#temporal\").val(html);
													//alert(html);
													//alert(jQuery(\"#temporal\"));
													//alert(jQuery(\"#temporal\").val());
													}
											});return false;",
								      ),
								 )); ?>
								<?php echo $form->error($model,'entrada_aid'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class='row-fluid '>
			<div class="span3">
				<h5 > Productor </h5>
				<div id='productorlbl'>  </div>
			</div>
			<div class="span3">
				<h5 > Producto </h5>
				<div id='productolbl'>  </div>
			</div>
			<div class="span3">
				<h5 > variedad </h5>
				<div id='variedadlbl'>  </div>
			</div>
			<div class="span3">
				<h5 > Cantidad </h5>
				<div id='saldolbl'>  </div>
			</div>
		</div>
	</div>
	


<script type="text/javascript">
$.format = function(source, params) {
	//source= "";
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
	source = source.replace(new RegExp('<option value=\"\"></option>','g'),$("#temporal").val());
	return source;
};

jQuery(document).ready(function(){
	hideEmptyHeaders();
	$("#adddetalle").click(function(){

		var template = jQuery.format(jQuery.trim($(this).siblings(".template").val()));

		var place = $(this).parents(".templateFrame:first").children(".templateTarget");
		
		var i = place.find(".rowIndex").length>0 ? parseInt(place.find(".rowIndex:last").val())+1 : 0;
		

		alert(template(i));
		$(template(i)).appendTo(place);
		
		place.siblings('.templateHead').show()
		
		//$("#row["+i+"]").find("clacal").html($("#temporal").val());
		//alert($("#row["+i+"]").find(".clacal:last"));
		//alert($("#row["+i+"]").find(".clacal:last").html());
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
        <h3> Detalles </h3>
        <div class="well">
            <table class="templateFrame grid" cellspacing="0" width='100%'>
                <thead class="templateHead">
                    <tr>
                        <td>
				<div class='row-fluid '>
					<div class="span4">
						<h4><?php echo $detalle->getAttributeLabel('cantidad'); ?> </h4>
					</div>
					<div class="span4">
						<h4><?php echo $detalle->getAttributeLabel('clasificacion_aid'); ?> </h4>
					</div>
					<div class="span4">
						<h4><?php echo $detalle->getAttributeLabel('unidad_did'); ?> </h4>
					</div>
					
                        </td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan='2'  style='text-align:right;'>
                            <div id='adddetalle' class="btn btn-primary" >Agregar </div>
                            	<input id='temporal' type='hidden'/>
				<textarea class="template" rows="0" cols="0" he style="width:0;height:0;visibility:hidden">
					<tr id='row[{0}]' class='templateContent'>
						<td>
							<div class='row-fluid '>
								<div class="span4">
									<div class="input">
										<?php echo $form->textField($detalle,'cantidad'); ?>
										<?php echo $form->error($detalle,'cantidad'); ?>
									</div>
								</div>
								<div class="span4">
									<div class="input">
										<?php echo$form->dropDownList($detalle,'clasificacion_aid',CHtml::listData(array(), 'id', 'nombre'),array('class'=>'clacal','empty'=>'')); ?>
										<?php echo $form->error($detalle,'clasificacion_aid'); ?>
									</div>
								</div>
								<div class="span4">
									<div class="input">
										<?php echo $form->dropDownList($detalle,'unidad_did',CHtml::listData(Unidad::model()->findAll(), 'id', 'nombre')); ?>			
										<?php echo $form->error($detalle,'unidad_did'); ?>
									</div>
								</div>
							</div>
						</td>
						<td align="right">
							
							<div class='remove' ><i class="icon-remove" /></div>
							<input type='hidden' class='rowIndex' value='{0}'></input>
						</td>
					</tr>
				</textarea>
                        </td>
                    </tr>
                </tfoot>
                <tbody class="templateTarget">
                <tr></tr>
                </tbody>
            </table>
        </div><!--panel-->
    </div><!--complex-->




	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
