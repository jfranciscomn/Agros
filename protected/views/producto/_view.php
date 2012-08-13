	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->variedad==1? 'Si':'No'); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->clasificacion==1? 'Si':'No'); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->calibre==1? 'Si':'No'); ?>
		
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
	</tr>