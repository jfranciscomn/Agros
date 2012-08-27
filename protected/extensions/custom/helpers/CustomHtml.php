<?php

/**
 * CustomHtml is a small wrapper on top of Yii's own CHtml helper.
 * It allows easy integration of
 * Simple Modal	simplemodal.plasm.it
 *
 * @author francisco Mendoza <jfranciscomn@gmail.com>
 * @version 0.1
 * @package custom widgets
 * @since 0.1
 */

class CustomHtml extends CHtml {
	const ID_PREFIX='cjf';
	public $extpath='/extensions/custom/assets/js/';
	
	protected static $tableJsClass= array(
		'CCustomSimpleModal'=>array( 'production'=>'simple-modal.js',
								'debug'=>'simple-modal.js'),
	);
	protected static function scriptFileName($widget) {
		$fileName ='';
		$files = self::$tableJsClass[get_class($widget)];
		if(!empty($files))
			$fileName=(defined('YII_DEBUG') && YII_DEBUG) ?
						$files['production'] : $files['debug'];

		return $fileName
	}
	
	
	public static function registerJs($widget) {
		$fileName= self::scriptFileName($widget);
		if(!empty($fileName))
		{
			$cs = Yii::app()->clientScript;
			$cs->registerCoreScript('jquery');
			$cs->registerScriptFile(Yii::app()->theme->baseUrl.
								'/js/'.
								$fileName($widget),
								CClientScript::POS_END);
		}
	}
	
}	
?>

