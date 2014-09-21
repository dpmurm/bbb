<h1>Авторизация</h1>

<?php echo CHtml::form(); ?>
<?php echo CHtml::errorSummary($form); ?><br>

<table id="form2" border="0" width="400" cellpadding="10" cellspacing="10">
    <tr>
        <td width="150"><?php echo CHtml::activeLabel($form, 'login'); ?></td>
        <td><?php echo CHtml::activeTextField($form, 'login') ?></td>
    </tr>
    <tr>
        <td><?php echo CHtml::activeLabel($form, 'passwd'); ?></td>
        <td><?php echo CHtml::activePasswordField($form, 'passwd') ?></td>
    <tr>
    <tr>
        <td><?php $this->widget('CCaptcha', array('buttonLabel' => '<br>[новый код]')); ?></td>
        <td><?php echo CHtml::activeTextField($form,'verifyCode'); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo CHtml::submitButton('Войти', array('id' => "submit")); ?></td>
    </tr>
</table>

<?php echo CHtml::endForm(); ?>