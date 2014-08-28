<tr><td>
        <table border="1" width="100%">
            <tr>
                <td><h2>
                        <?php echo CHtml::link($post->name,array('post/view/', 'url'=>$post->url)); ?>
                    </h2>
                    <tr><td><?php echo $post->created;?>
            <tr><td><?php echo mb_substr($post->text, 0, 500), "...";?>
        </table>