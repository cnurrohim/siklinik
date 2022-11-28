<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array(
					'label'=>'master',
					'items' => array(
						array('label'=>'Kota', 'url'=>array('/kota'), 'visible'=>Yii::app()->user->checkAccess('user')),
						array('label'=>'Dokter', 'url'=>array('/dokter'), 'visible'=>Yii::app()->user->checkAccess('superadmin')),
						array('label'=>'Pasien', 'url'=>array('/pasien'), 'visible'=>Yii::app()->user->checkAccess('user')),
						array('label'=>'Obat', 'url'=>array('/obat'), 'visible'=>Yii::app()->user->checkAccess('superadmin')),
					),
				),
				array(
					'label'=>'pembayaran',
					'items'=>array(
						array('label'=>'Bayar', 'url'=>array('/bayar'), 'visible'=>Yii::app()->user->checkAccess('user')),
					),
				),
				array(
					'label'=>'tindakan',
					'items'=>array(
						array('label'=>'Rekam Medik', 'url'=>array('/rekammedik'), 'visible'=>Yii::app()->user->checkAccess('user')),
						//array('label'=>'Resep', 'url'=>array('/resep'), 'visible'=>Yii::app()->user->checkAccess('user')),
						//array('label'=>'Detil Resep', 'url'=>array('/detilresep'), 'visible'=>Yii::app()->user->checkAccess('user')),
					),
				),
				array(
					'label'=>'users management',
					'items'=>array(
						array('label'=>'Users', 'url'=>array('/users'), 'visible'=>Yii::app()->user->checkAccess('superadmin')),
						array('label'=>'Manage Roles', 'url'=>array('/roles'), 'visible'=>Yii::app()->user->checkAccess('superadmin')),
						array('label'=>'Manage Access', 'url'=>array('/authassignment'), 'visible'=>Yii::app()->user->checkAccess('superadmin')),
						array('label'=>'Access Item', 'url'=>array('/authitem'), 'visible'=>Yii::app()->user->checkAccess('superadmin')),
						array('label'=>'Access Item child', 'url'=>array('/authitemchild'), 'visible'=>Yii::app()->user->checkAccess('superadmin')),
					),
				),
				array(
					'label'=>'laporan',
					'items'=>array(
						array('label'=>'Laporan', 'url'=>array('/laporan'), 'visible'=>Yii::app()->user->checkAccess('superadmin')),
					),
				),

				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
