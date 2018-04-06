<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?php echo $commentPage = Html::a(
    $newComment->loadPageTitle(),
    $newComment->getAbsolutePageUrl(),
    array('target'=>'_blank')
) ; ?>

<?=Yii::t('app','Respected')?> <?php echo $userName; ?>!<br>
<?=Yii::t('app', 'You received this email because you subscribed to notifications of new comments on the page')?>
<?= Html::a( $newComment->loadPageTitle(),$newComment->getAbsoluteUrl(), $options = ['target'=>'_blank'] )?>

<p>
    <?=Yii::t('app', 'User')?> <strong><?php echo $newComment->getAuthor(); ?></strong> <?=Yii::t('app', 'left a comment')?>:
</p>
<p>
    <i><?php echo $newComment->content; ?></i>
</p>
<?=Yii::t('app', 'Date of comment')?>: <?php echo date('d.m.Y | H:i:s', $newComment->getLastModified()); ?><br>
<?= Html::a(Yii::t('app', 'Go to answer page'),$newComment->getAbsoluteUrl(), $options = ['target'=>'_blank'] )?>
<hr/>

<p>
    <small>
    <?=Yii::t('app', 'You can always unsubscribe from the sending of comments from the page')?> <?php echo $commentPage; ?>, <?=Yii::t('app', 'by following this')?>
        <?= Html::a(Yii::t('app','link'),Url::toRoute(['/comments/handler/unsubscribe', 'hash' => $hash, 'url' => $newComment->url]), $options = ['target'=>'_blank'] )?>.<br>
    <?=Yii::t('app', 'If you want to unsubscribe from sending all comments, please go to this')?>
        <?= Html::a(Yii::t('app','link'),Url::toRoute(['/comments/handler/unsubscribe', 'hash' => $hash]), $options = ['target'=>'_blank'] )?>
    </small>
</p>