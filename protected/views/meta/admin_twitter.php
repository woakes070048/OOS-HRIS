<?php
/**
 * OmmuMeta (ommu-meta)
 * @var $this MetaController
 * @var $model OmmuMeta
 * @var $form CActiveForm
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2012 Ommu Platform (ommu.co)
 * @link https://github.com/oMMu/Ommu-Core
 * @contact (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'Ommu Metas'=>array('manage'),
		$model->id=>array('view','id'=>$model->id),
		'Update',
	);

	$cs = Yii::app()->getClientScript();
$js=<<<EOP
	$('select#OmmuMeta_twitter_card').live('change', function() {
		var id = $(this).val();
		$('div.filter').slideUp();
		if(id == '3') {
			$('div.filter#photo').slideDown();
		} else if(id == '4') {
			$('div.filter#application').slideDown();
		}
	});
EOP;
	$cs->registerScript('type', $js, CClientScript::POS_END);
?>

<div class="form" name="post-on">

	<?php $form=$this->beginWidget('application.components.system.OActiveForm', array(
		'id'=>'ommu-meta-form',
		'enableAjaxValidation'=>true,
		//'htmlOptions' => array('enctype' => 'multipart/form-data')
	)); ?>

	<?php //begin.Messages ?>
	<div id="ajax-message">
		<?php echo $form->errorSummary($model); ?>
	</div>
	<?php //begin.Messages ?>

	<fieldset>
	
		<div class="clearfix">
			<?php echo $form->labelEx($model,'twitter_on'); ?>
			<div class="desc">
				<?php echo $form->radioButtonList($model,'twitter_on', array(
					1 => Yii::t('phrase', 'Enabled'),
					0 => Yii::t('phrase', 'Disabled'),
				)); ?>
				<?php echo $form->error($model,'twitter_on'); ?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'twitter_card'); ?>
			<div class="desc">
				<?php echo $form->dropDownList($model,'twitter_card', array(
					1 => Yii::t('phrase', 'Summary'),
					2 => Yii::t('phrase', 'Summary Large Image'),
					3 => Yii::t('phrase', 'Photo'),
					4 => Yii::t('phrase', 'Application'),
				)); ?>
				<?php echo $form->error($model,'twitter_card'); ?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'twitter_site'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'twitter_site',array('maxlength'=>32,'class'=>'span-5')); ?>
				<?php echo $form->error($model,'twitter_site'); ?>
				<span class="small-px silent"><?php echo Yii::t('phrase', 'Your official site in twitter (.i.e. "@CareerCenterCodes, @OmmuPlatform")');?></span>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'twitter_creator'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'twitter_creator',array('maxlength'=>32,'class'=>'span-5')); ?>
				<?php echo $form->error($model,'twitter_creator'); ?>
				<span class="small-px silent"><?php echo Yii::t('phrase', 'Creator your site in twitter (.i.e. "@PutraSudaryanto, @Mba_Em")');?></span>
			</div>
		</div>

		<div id="photo" class="filter <?php echo $model->twitter_card != 3 ? 'hide' : '';?>">
			<div class="clearfix">
				<?php echo $form->labelEx($model,'twitter_photo_width'); ?>
				<div class="desc">
					<?php echo $form->textField($model,'twitter_photo_width',array('maxlength'=>3,'class'=>'span-3')); ?>
					<?php echo $form->error($model,'twitter_photo_width'); ?>
					<span class="small-px silent"><?php echo Yii::t('phrase', 'Providing width in px helps us more accurately preserve the aspect ratio of the image when resizing');?></span>
				</div>
			</div>

			<div class="clearfix">
				<?php echo $form->labelEx($model,'twitter_photo_height'); ?>
				<div class="desc">
					<?php echo $form->textField($model,'twitter_photo_height',array('maxlength'=>3,'class'=>'span-3')); ?>
					<?php echo $form->error($model,'twitter_photo_height'); ?>
					<span class="small-px silent"><?php echo Yii::t('phrase', 'Providing height in px helps us more accurately preserve the aspect ratio of the image when resizing');?></span>
				</div>
			</div>
		</div>

		<div id="application" class="filter <?php echo $model->twitter_card != 4 ? 'hide' : '';?>">
			<div class="clearfix">
				<?php echo $form->labelEx($model,'twitter_iphone_id'); ?>
				<div class="desc">
					<?php echo $form->textField($model,'twitter_iphone_id',array('maxlength'=>32,'class'=>'span-4')); ?>
					<?php echo $form->error($model,'twitter_iphone_id'); ?>
					<span class="small-px silent"><?php echo Yii::t('phrase', 'String value, and should be the numeric representation of your app ID in the App Store (.i.e. "307234931")');?></span>
				</div>
			</div>

			<div class="clearfix">
				<?php echo $form->labelEx($model,'twitter_iphone_url'); ?>
				<div class="desc">
					<?php echo $form->textField($model,'twitter_iphone_url',array('maxlength'=>256,'class'=>'span-7')); ?>
					<?php echo $form->error($model,'twitter_iphone_url'); ?>
					<span class="small-px silent"><?php echo Yii::t('phrase', 'Your app\'s custom URL scheme (you must include "://" after your scheme name)');?></span>
				</div>
			</div>

			<div class="clearfix">
				<?php echo $form->labelEx($model,'twitter_ipad_name'); ?>
				<div class="desc">
					<?php echo $form->textField($model,'twitter_ipad_name',array('maxlength'=>32,'class'=>'span-4')); ?>
					<?php echo $form->error($model,'twitter_ipad_name'); ?>
					<span class="small-px silent"><?php echo Yii::t('phrase', 'String value, should be the numeric representation of your app ID in the App Store (.i.e. "307234931")');?></span>
				</div>
			</div>

			<div class="clearfix">
				<?php echo $form->labelEx($model,'twitter_ipad_url'); ?>
				<div class="desc">
					<?php echo $form->textField($model,'twitter_ipad_url',array('maxlength'=>256,'class'=>'span-7')); ?>
					<?php echo $form->error($model,'twitter_ipad_url'); ?>
					<span class="small-px silent"><?php echo Yii::t('phrase', 'Your app\'s custom URL scheme (you must include "://" after your scheme name)');?></span>
				</div>
			</div>

			<div class="clearfix">
				<?php echo $form->labelEx($model,'twitter_googleplay_id'); ?>
				<div class="desc">
					<?php echo $form->textField($model,'twitter_googleplay_id',array('maxlength'=>32,'class'=>'span-4')); ?>
					<?php echo $form->error($model,'twitter_googleplay_id'); ?>
					<span class="small-px silent"><?php echo Yii::t('phrase', 'String value, and should be the numeric representation of your app ID in Google Play (.i.e. "co.ommu.nirwasita")');?></span>
				</div>
			</div>

			<div class="clearfix">
				<?php echo $form->labelEx($model,'twitter_googleplay_url'); ?>
				<div class="desc">
					<?php echo $form->textField($model,'twitter_googleplay_url',array('maxlength'=>256,'class'=>'span-7')); ?>
					<?php echo $form->error($model,'twitter_googleplay_url'); ?>
					<span class="small-px silent"><?php echo Yii::t('phrase', 'Your app\'s custom URL scheme (.i.e. "http://play.google.com/store/apps/details?id=co.ommu.nirwasita")');?></span>
				</div>
			</div>
		</div>

		<div class="submit clearfix">
			<label>&nbsp;</label>
			<div class="desc">
				<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('phrase', 'Create') : Yii::t('phrase', 'Save'), array('onclick' => 'setEnableSave()')); ?>
			</div>
		</div>

	</fieldset>
	<?php $this->endWidget(); ?>

</div>
