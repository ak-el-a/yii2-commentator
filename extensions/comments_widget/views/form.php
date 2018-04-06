<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;

?>

<?php $form = ActiveForm::begin([
    'action'                =>$model->isNewRecord ? ['/comments/handler/create'] : ['/comments/handler/update'],
    'id'                    =>$model->isNewRecord ? 'comment-form' : 'comment-form-'. $model->id,
    'enableAjaxValidation'  =>true, //TODO enableAjaxValidation отправляет 2 запроса
    'enableClientValidation'=>true,
    'validateOnChange'      =>false,
    'validateOnBlur'        =>true,
    'validateOnSubmit'      =>true
]); ?>

<div class="row text-center">
    <?php if ( !$user = \Yii::$app->getModule('comments')->loadUser() ) : ?>

        <div data-role="input-container" class="form-group col-md-6">


                <?= $form->field($model, 'author')->textInput(['class'=>'form-control', 'placeholder' => Yii::t('app', 'Enter your name')]) ?>

<!--            --><?php //echo $form->error($model, 'author', array('class' => 'text-danger')); ?>
        </div>

        <div data-role="input-container" class="form-group col-md-6">


                <?= $form->field($model, 'email')->textInput(['class'=>'form-control', 'placeholder' => Yii::t('app', 'Enter your email')]) ?>

<!--            --><?php //echo $form->error($model, 'email', array('class' => 'text-danger')); ?>
        </div>

   <?php else : ?>
        <?php $model->setScenario('authorized'); ?>
        <div class="col-md-12">
            <span class="username">
                <i class="fa fa-user"></i> <?php echo $user->{\Yii::$app->getModule('comments')->usernameField}; ?>
            </span>
        </div>
    <?php endif; ?>

    <div data-role="input-container" class="form-group col-md-12">


            <?= $form->field($model, 'content')->textArea(['class'=>'form-control', 'placeholder' => Yii::t('app', 'Write comment'), 'rows' => '3']) ?>

<!--        --><?php //echo $form->error($model, 'content', array('class' => 'text-danger')); ?>
    </div>

    <div class="form-group col-md-12">
        <div class="btn-group">
            <button  data-role="reply" data-is-new="<?php echo $model->isNewRecord ? 'true' : 'false' ?>" class="btn btn-primary"><i class="fa fa-reply"></i> <?=Yii::t('app', 'Submit comment')?></button>
            <?php if ( !empty($cancelButton) ) : ?>
                <button data-role="cancel" class="btn btn-danger"><i class="fa fa-times"></i> <?=Yii::t('app', 'Cancel')?></button>
            <?php endif; ?>
        </div>
        <!--<label class="checkbox-inline">
	        <?php $model->notify = $model->isNewRecord ? 1 : $model->notify ?>
            <?= $form->field($model, 'notify')->checkbox()?>
        </label>-->
    </div>
</div>

<?php if ( !$model->isNewRecord ) : ?>
    <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>
<?php endif; ?>

<?php if ( !empty($parent_id) ) : ?>
    <?= $form->field($model, 'parent_id')->hiddenInput(['value' => $parent_id])->label(false) ?>
<?php endif; ?>

<?= $form->field($model, 'url')->hiddenInput(['value' => $url])->label(false) ?>

<?php ActiveForm::end(); ?>
