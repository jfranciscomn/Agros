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
									'select'=>"											$('#productorlbl').html(ui.item.productor);
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
													jQuery(\"#temporal\").val(html);
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
				<div id='productorlbl'> 
					<?php 
						if(!empty($entrada->cliente)) 
							echo $entrada->cliente->nombre; 
					?> 
				</div>
			</div>
			<div class="span3">
				<h5 > Producto </h5>
				<div id='productolbl'>  
					<?php 
						if(!empty($entrada->producto)) 
							echo $entrada->producto->nombre; 
					?> 
				</div>
			</div>
			<div class="span3">
				<h5 > variedad </h5>
				<div id='variedadlbl'> 
					<?php 
						if(!empty($entrada->variedad)) 
							echo $entrada->variedad->nombre; 
					?>  
				</div>
			</div>
			<div class="span3">
				<h5 > Cantidad </h5>
				<div id='saldolbl'> 
					<?php 
						if(!empty($entrada->saldo)) 
							echo $entrada->saldo; 
					?>
				</div>
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
	

	$.ajax({
		url: <?php echo "'".Yii::app()->createUrl('variedad/dynamicClacal') . "'" ?>,
		data: {'entrada':$('#entrada_aid_lookup').val()},
		success: function(data) { 
				//alert(data);
				$('#temporal').val(data);
				//alert($('#temporal').val());
			},
		type: "POST",
		async: false
	});
				
	source = source.replace(new RegExp('<option value=\"\"></option>','g'),$("#temporal").val());
	//alert($("#temporal").val());
	return source;
};

jQuery(document).ready(function(){
	hideEmptyHeaders();
	$("#adddetalle").click(function(){

		var template = jQuery.format(jQuery.trim($(this).siblings(".template").val()));

		var place = $(this).parents(".templateFrame:first").children(".templateTarget");
		
		var i = place.find(".rowIndex").length>0 ? parseInt(place.find(".rowIndex:last").val())+1 : 0;
		

		
		$(template(i)).appendTo(place);
		
		place.siblings('.templateHead').show()
		
	});

	$(".remove").live("click", function() {
		$(this).parents(".templateContent:first").remove();
		hideEmptyHeaders();
	});
	$()
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
						<h4><?php echo $detalle[count($detalle)-1]->getAttributeLabel('cantidad'); ?> </h4>
					</div>
					<div class="span4">
						<h4><?php echo $detalle[count($detalle)-1]->getAttributeLabel('clasificacion_aid'); ?> </h4>
					</div>
					<div class="span4">
						<h4><?php echo $detalle[count($detalle)-1]->getAttributeLabel('unidad_did'); ?> </h4>
					</div>
					
                        </td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan='2'  style='text-align:right;'>
                            <div id='adddetalle' class="btn btn-primary" >Agregar </div>
                            	<input id='temporal' type='hidden' />
				<textarea class="template" rows="0" cols="0" he style="width:0;height:0;visibility:hidden">
					<tr id='row[{0}]' class='templateContent'>
						<td>
							<div class='row-fluid '>
								<div class="span4">
									<div class="input">
										<?php echo $form->hiddenField($detalle[count($detalle)-1],'id',array('name'=>'BeneficioDetalle[{0}][id]')); ?>
										<?php echo $form->textField($detalle[count($detalle)-1],'cantidad',array('name'=>'BeneficioDetalle[{0}][cantidad]')); ?>
										<?php echo $form->error($detalle[count($detalle)-1],'cantidad'); ?>
									</div>
								</div>
								<div class="span4">
									<div class="input">
										<?php echo$form->dropDownList($detalle[count($detalle)-1],'clasificacion_aid',
														CHtml::listData(array(), 'id', 'nombre'),
														array(	'class'=>'clacal',
															'empty'=>'', 
															'name'=>'BeneficioDetalle[{0}][clasificacion_aid]')); ?>
										<?php echo $form->error($detalle[count($detalle)-1],'clasificacion_aid'); ?>
									</div>
								</div>
								<div class="span4">
									<div class="input">
										<?php echo $form->dropDownList(	$detalle[count($detalle)-1],'unidad_did',
														CHtml::listData(Unidad::model()->findAll(), 'id', 'nombre'),
														array('name'=>'BeneficioDetalle[{0}][unidad_did]')); ?>			
										<?php echo $form->error($detalle[count($detalle)-1],'unidad_did'); ?>
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
               	<?php 
               		for($i=0;$i<count($detalle)-1;$i++)
               		{
               			echo "<tr id='row[$i]' class='templateContent'>";
               		?>
		       		<td>
					<div class='row-fluid '>
						<div class="span4">
							<div class="input">
								<?php echo $form->hiddenField($detalle[$i],'id',array('name'=>"BeneficioDetalle[$i][id]",)); ?>
								<?php echo $form->textField($detalle[$i],'cantidad',array('name'=>"BeneficioDetalle[$i][cantidad]")); ?>
								<?php echo $form->error($detalle[$i],'cantidad'); ?>
							</div>
						</div>
					<div class="span4">
						<div class="input">
						
							<?php if($model->entrada->producto->calibre ){ ?>
							
								<?php echo$form->dropDownList($detalle[$i],'calibre_aid',
											CHtml::listData(Calibre::model()->findAll(array('condition'=>'variedad_did='.$model->entrada->variedad->id)), 'id', 'nombre'),
											array(	'class'=>'clacal',
												'empty'=>'Seleccione un calibre', 
												'name'=>"BeneficioDetalle[$i][clasificacion_aid]")); ?>
								<?php echo $form->error($detalle[$i],'calibre_aid'); ?>
							<?php } else { ?>
								<?php echo$form->dropDownList($detalle[$i],'clasificacion_aid',
											CHtml::listData(Clasificacion::model()->findAll(array('condition'=>'variedad_did='.$model->entrada->variedad->id)), 'id', 'nombre'),
											array(	'class'=>'clacal',
												'empty'=>'Seleccione una clasificacion', 
												'name'=>"BeneficioDetalle[$i][clasificacion_aid]")); ?>
								<?php echo $form->error($detalle[$i],'clasificacion_aid'); ?>
							<?php } ?>
							
						</div>
					</div>
					<div class="span4">
						<div class="input">
							<?php echo $form->dropDownList(	$detalle[$i],'unidad_did',
											CHtml::listData(Unidad::model()->findAll(), 'id', 'nombre'),
											array('name'=>"BeneficioDetalle[$i][unidad_did]")); ?>			
							<?php echo $form->error($detalle[$i],'unidad_did'); ?>
						</div>
					</div>
				</td>
				<td align="right">						
					<div class='remove'> <i class="icon-remove"> </i> </div>
					<input type='hidden' class='rowIndex' value=<?php echo "'".$i."'";?>></input>
				</td>
						
					<?php
               			echo '</tr>';
               		}
               	?>
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
