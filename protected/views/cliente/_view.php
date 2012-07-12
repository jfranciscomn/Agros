	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->apellidos); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fechaNacimiento_f); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->rfc); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->razonSocial); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->codigopostal); ?>
		</td>
		<?php /*
		<td>
			<?php echo CHtml::encode($data->calle); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->colonia); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->telefono); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->celular); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->email); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estado->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->municipio->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
		*/ ?>
	</tr>