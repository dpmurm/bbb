<table border="0" width="100%">

    <?php if (!empty($post)) : ?>
        <tr><td><h1><?=$post->name;?></h1></td></tr>
        <tr><td><?=$post->created;?></td></tr>
        <tr><td><?=$post->text;?></td></tr>
        <tr>
            <td>
                <h3>Комментарии</h3>
                <table border="0" width="100%" cellpadding="10" cellspacing="10">
                    <?php
                    if (!empty($comments))
                        foreach ($comments as $key => $val) {
                            $this->renderPartial('_comments',array(
                                'comment'=>$val,
                            ));
                        }
                    ?>
                </table>

                <div align="center">
                    <?php echo $this->renderPartial('_commentsForm', array('form' => $comm_form));?>
                </div>

            </td>
        </tr>
    <?php endif; ?>

</table>