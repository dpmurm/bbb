<h1>Регистрация</h1>

<!-- Открываем форму !-->
<?php echo CHtml::form(); ?>
<!-- То самое место где будут выводиться ошибки
    если они будут при валидации !-->
<?php echo CHtml::errorSummary($form); ?><br>

<table id="form2" border="0" width="400" cellpadding="10" cellspacing="10">
    <tr>
        <!-- Выводим поле для логина !-->
        <td width="150"><?php echo CHtml::activeLabel($form, 'login'); ?></td>
        <td><?php echo CHtml::activeTextField($form, 'login') ?></td>
    </tr>
    <tr>
        <!-- Выводим поле для пароля !-->
        <td><?php echo CHtml::activeLabel($form, 'passwd'); ?></td>
        <td><?php echo CHtml::activePasswordField($form, 'passwd') ?></td>
    </tr>
    <tr>
        <!-- Выводим поле для пароля повторно!-->
        <td><?php echo CHtml::activeLabel($form, 'passwd2'); ?></td>
        <td><?php echo CHtml::activePasswordField($form, 'passwd2') ?></td>
    </tr>
    <tr>
        <!-- Выводим капчу !-->
        <td><?php $this->widget('CCaptcha', array('buttonLabel' => '<br>[новый код]')); ?></td>
        <td><?php echo CHtml::activeTextField($form,'verifyCode'); ?></td>
    </tr>
    <tr>
        <td></td>
        <!-- Кнопка "регистрация" !-->
        <td><?php echo CHtml::submitButton('Регистрация', array('id' => "submit")); ?></td>
    </tr>
</table>

<!-- Закрываем форму !-->
<?php echo CHtml::endForm(); ?>