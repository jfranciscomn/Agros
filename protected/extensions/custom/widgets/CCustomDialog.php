<?php

Yii::import('zii.widgets.jui.CJuiDialog');

class CCustomDialog extends CJuiDialog
{
	public function init()
	{
		parent::init();

		$id=$this->getId();
		if (isset($this->htmlOptions['id']))
			$id = $this->htmlOptions['id'];
		else
			$this->htmlOptions['id']=$id;

		$options=empty($this->options) ? '' : CJavaScript::encode($this->options);
		Yii::app()->getClientScript()->registerScript(__CLASS__.'#'.$id,"jQuery('#{$id}').dialog($options);");
		echo CHtml::openTag($this->tagName,$this->htmlOptions)."\n";
	}
}
?>
