<h1 id="respond">

    <?php echo CHtml::form(); ?>
    <?php echo CHtml::errorSummary($form); ?>

    <?php echo CHtml::activeTextArea($form, 'text', array('cols' => 50, 'rows' => 8)) ?>
    <table border=0 id="captcha">
        <tr>
            <td valign="top"><?php $this->widget('CCaptcha', array('buttonLabel' => '')); ?>
            <td valign="top">
                <table border=0>
                    <tr>
                        <td valign="top"><?php echo CHtml::activeLabel($form, 'verifyCode'); ?></td>
                        <td valign="top"><?php echo CHtml::activeTextField($form,'verifyCode'); ?></td>
                    </tr>
                    <tr id="login">
                        <td valign="top"><?php echo CHtml::activeLabel($form, 'login'); ?></td>
                        <td valign="top"><?php echo CHtml::activeTextField($form, 'login') ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <p><?php echo CHtml::submitButton("Ок, отправить!", array('id' => "submit")); ?></p>

<?php echo CHtml::endForm($form); ?>

<!--
    <script>
        $(document).ready(function() {
            $("#captcha").hide();
            $("#guestlogin").hide();

            $("#Comments_text").click(function(){
                <?php //if (Yii::app()->user->isGuest): ?>
                $("#guestlogin").show();
                <?php //endif; ?>
                $("#captcha").show();
            });
        });
    </script>
-->