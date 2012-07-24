	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->cantidad); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->saldo); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->clasificacion->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->calibre->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->unidad->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->beneficio->nombre); ?>
		</td>
		<?php /*
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
		*/ ?>
	</tr>