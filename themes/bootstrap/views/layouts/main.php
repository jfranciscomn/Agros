<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/application.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le fav and touch icons -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-114x114.png">
</head>

<body>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?php echo $this->createAbsoluteUrl('//'); ?>"><?php echo CHtml::encode(Yii::app()->name); ?></a>
				<?php 
				$items = array();
				if(!Yii::app()->user->isGuest)
				{
					$items[]=array('label'=>'Entradas',
				      'url'=>'#',
				      'itemOptions'=>array('class'=>'dropdown','id'=>'opcion',),
				      'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>'dropdown'),
				      'submenuOptions'=>array('class'=>'dropdown-menu'),
					  'items'=> array(
										array('label'=>'Entradas', 'url'=>array('/entrada/index'),),
										array('label'=>'Beneficios', 'url'=>array('/beneficio/index'), 'itemOptions'=>array()),
									
										),
				
					);
					$items[]=array('label'=>'Clientes', 'url'=>array('/cliente/index'),);
					$items[]=array('label'=>'Salidas',
				      'url'=>'#',
				      'itemOptions'=>array('class'=>'dropdown','id'=>'opcion',),
				      'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>'dropdown'),
				      'submenuOptions'=>array('class'=>'dropdown-menu'),
					  'items'=> array(
										array('label'=>'Salidas', 'url'=>array('/salida/index'),),
										array('label'=>'Salidas Directas', 'url'=>array('/salidaDirecta/index'), 'itemOptions'=>array()),
									
										),
				
					);
					$items[]=array('label'=>'Productos',
				      'url'=>'#',
				      'itemOptions'=>array('class'=>'dropdown','id'=>'opcion',),
				      'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>'dropdown'),
				      'submenuOptions'=>array('class'=>'dropdown-menu'),
					  'items'=> array(
										array('label'=>'Productos', 'url'=>array('/producto/index'),),
										array('label'=>'Variedades', 'url'=>array('/variedad/index'), 'itemOptions'=>array()),
										array('label'=>'Calibres', 'url'=>array('/calibre/index'), 'itemOptions'=>array()),
										array('label'=>'Clasificaciones', 'url'=>array('/clasificacion/index'), 'itemOptions'=>array()),
										array('label'=>'Unidades', 'url'=>array('/unidad/index'), 'itemOptions'=>array()),
										),
				
					);
					$items[]=array('label'=>'Ubicaciones',
				      'url'=>'#',
				      'itemOptions'=>array('class'=>'dropdown','id'=>'opcion',),
				      'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>'dropdown'),
				      'submenuOptions'=>array('class'=>'dropdown-menu'),
					  'items'=> array(array('label'=>'Estados', 'url'=>array('/estado/index'),),
										array('label'=>'Municipios', 'url'=>array('/municipio/index'), 'itemOptions'=>array()),
										array('label'=>'Ejidos', 'url'=>array('/ejido/index'), 'itemOptions'=>array()),
										),
					);
					
					$items[]=array('label'=>'Administracion',
				      'url'=>'#',
				      'itemOptions'=>array('class'=>'dropdown','id'=>'opcion',),
				      'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>'dropdown'),
				      'submenuOptions'=>array('class'=>'dropdown-menu'),
					  'items'=> array(array('label'=>'Temporadas', 'url'=>array('/temporada/index'),),
										array('label'=>'Servicios', 'url'=>array('/servicio/index'), 'itemOptions'=>array()),
										array('label'=>'Configuracion', 'url'=>array('/configuracion/index'), 'itemOptions'=>array()),
										array('label'=>'Servicios', 'url'=>array('/servicio/index'), 'itemOptions'=>array()),
										array('label'=>'Precios', 'url'=>array('/precio/index'), 'itemOptions'=>array()),
										),
					);
					
					$items[]=array('label'=>'Usuarios',
				      'url'=>'#',
				      'itemOptions'=>array('class'=>'dropdown','id'=>'opcion',),
				      'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>'dropdown'),
				      'submenuOptions'=>array('class'=>'dropdown-menu'),
					  'items'=> array(array('label'=>'Usuarios', 'url'=>array('/usuario/index'),),
										array('label'=>'Tipos de Usuarios', 'url'=>array('/tipoUsuario/index'), 'itemOptions'=>array()),
										),
					);
				}
				$items[]=array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest);
				
				
				
				
				
				$this->widget('ext.custom.widgets.BMenu',array(
					'items'=>$items,
					'htmlOptions'=>array('class'=>'nav nav-pills'),
					'activateParents'=>true,
					'activeCssClass'=>'',
				)); ?>
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>Yii::app()->user->name, 'url'=>array('site/profile'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest, 'htmlOptions'=>array('class'=>'btn'))
					),
					'htmlOptions'=>array(
						'class'=>'nav pull-right',
					),
				)); ?>
			</div>
		</div>
	</div>
	
	<div class="container">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('BBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'separator'=>' / ',
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	</div>
	
	<?php echo $content; ?>
	
	<footer class="footer">
		<div class="container">
			<p>Copyright &copy; <?php echo date('Y'); ?> by Agros.<br/>
			All Rights Reserved.<br/>
			<?php echo Yii::powered(); ?></p>
		</div>
	</footer>
	
</body>
</html>