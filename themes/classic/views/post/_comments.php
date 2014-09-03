<tr>
    <td>
        <table border="1" width="100%">
            <tr><td><?php echo $comment->login; ?></td></tr>
            <tr><td><?php echo nl2br(htmlentities($comment->text, null, 'UTF-8')); ?></td></tr>
        </table>
    </td>
</tr>