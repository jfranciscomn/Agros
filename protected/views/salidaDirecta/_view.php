	<tr>
		
		<td>
			<?php echo CHtml::link(CHtml::encode($data->codigoSalida), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fecha_f); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->entrada->codigo); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->cantidad); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->temporada->nombre); ?>
		</td>
		<?php /*
		<td>
			<?php echo CHtml::encode($data->unidad->nombre); ?>
		</td>
		*/ ?>
	</tr>
