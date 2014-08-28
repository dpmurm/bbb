
<table border="1" width="100%">

    <?php if (!empty($post)) : ?>
<tr>
    <td><h1><?=$post->name;?></h1>
        <tr>
            <td><?=$post->created;?>
<tr>
    <td><?=$post->text;?>
        <?php endif; ?>

        </table>