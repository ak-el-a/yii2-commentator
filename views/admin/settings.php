<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="comments admin-comments">
    <h1><i class="fa fa-cogs"></i> <?=Yii::t('app','Settings of module "Comments"')?></h1>

    <?php if ( \Yii::$app->session->hasFlash('settings_saved') ) : ?>
        <div class="alert alert-success" data-role="alert">
            <i class="fa fa-check-circle-o"></i> <?php echo \Yii::$app->session->getFlash('settings_saved'); ?>
        </div>
    <?php endif; ?>

    <?php $form = ActiveForm::begin(); ?>

    <p class="note"><?=Yii::t('app','Fields, marked')?> <span class="required">*</span> <?=Yii::t('app','are required')?></p>

<!--    --><?php //echo $form->errorSummary($model, null, null, array('class'=>'alert alert-danger')); ?>
    <?= $form->errorSummary($model); ?>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'date_format')->textInput() ?>
<!--                --><?php //echo $form->labelEx($model,'date_format'); ?>
<!--                --><?php //echo $form->textField($model,'date_format',array('class'=>'form-control')); ?>
<!--                --><?php //echo $form->error($model,'date_format',array('class'=>'text-danger')); ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'margin')->textInput() ?>
<!--                --><?php //echo $form->labelEx($model,'margin'); ?>
<!--                --><?php //echo $form->textField($model,'margin',array('class'=>'form-control')); ?>
<!--                --><?php //echo $form->error($model,'margin',array('class'=>'text-danger')); ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'levels')->textInput() ?>
<!--                --><?php //echo $form->labelEx($model,'levels'); ?>
<!--                --><?php //echo $form->textField($model,'levels',array('class'=>'form-control')); ?>
<!--                --><?php //echo $form->error($model,'levels',array('class'=>'text-danger')); ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'edit_time')->textInput() ?>
<!--                --><?php //echo $form->labelEx($model,'edit_time'); ?>
<!--                --><?php //echo $form->textField($model,'edit_time',array('class'=>'form-control')); ?>
<!--                --><?php //echo $form->error($model,'edit_time',array('class'=>'text-danger')); ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'max_length_author')->textInput() ?>
<!--                --><?php //echo $form->labelEx($model,'max_length_author'); ?>
<!--                --><?php //echo $form->textField($model,'max_length_author',array('class'=>'form-control')); ?>
<!--                --><?php //echo $form->error($model,'max_length_author',array('class'=>'text-danger')); ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'max_length_content')->textInput() ?>
<!--                --><?php //echo $form->labelEx($model,'max_length_content'); ?>
<!--                --><?php //echo $form->textField($model,'max_length_content',array('class'=>'form-control')); ?>
<!--                --><?php //echo $form->error($model,'max_length_content',array('class'=>'text-danger')); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'likes_control')->dropDownList( $model->booleanArray());?>
<!--                --><?php //echo $form->labelEx($model,'likes_control'); ?>
<!--                --><?php //echo $form->dropDownList($model, 'likes_control', $model->booleanArray(), array('class'=>'form-control')); ?>
<!--                --><?php //echo $form->error($model,'likes_control',array('class'=>'text-danger')); ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'manage_page_size')->textInput() ?>
<!--                --><?php //echo $form->labelEx($model,'manage_page_size'); ?>
<!--                --><?php //echo $form->textField($model,'manage_page_size',array('class'=>'form-control')); ?>
<!--                --><?php //echo $form->error($model,'manage_page_size',array('class'=>'text-danger')); ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'premoderate')->dropDownList($model->booleanArray());?>
<!--                --><?php //echo $form->labelEx($model,'premoderate'); ?>
<!--                --><?php //echo $form->dropDownList($model, 'premoderate', $model->booleanArray(), array('class'=>'form-control')); ?>
<!--                --><?php //echo $form->error($model,'premoderate',array('class'=>'text-danger')); ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'notify_admin')->dropDownList($model->booleanArray());?>
<!--                --><?php //echo $form->labelEx($model,'notify_admin'); ?>
<!--                --><?php //echo $form->dropDownList($model, 'notify_admin', $model->booleanArray(), array('class'=>'form-control')); ?>
<!--                --><?php //echo $form->error($model,'notify_admin',array('class'=>'text-danger')); ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'fromEmail')->textInput() ?>
<!--                --><?php //echo $form->labelEx($model,'fromEmail'); ?>
<!--                --><?php //echo $form->textField($model,'fromEmail',array('class'=>'form-control')); ?>
<!--                --><?php //echo $form->error($model,'fromEmail',array('class'=>'text-danger')); ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'adminEmail')->textInput() ?>
<!--                --><?php //echo $form->labelEx($model,'adminEmail'); ?>
<!--                --><?php //echo $form->textField($model,'adminEmail',array('class'=>'form-control')); ?>
<!--                --><?php //echo $form->error($model,'adminEmail',array('class'=>'text-danger')); ?>
            </div>
        </div>

        <div class="col-md-12">
            <p>
                   <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>

                   <?= Html::a("<i class='fa fa-list'></i> ".Yii::t('app','Manager of comments'), 'index', $options = [] )?>
            </p>
        </div>

    </div>

    <?php ActiveForm::end(); ?>
</div>