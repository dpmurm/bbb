<div class="post">
    <h2 class="title"><a href="<?php echo $this->createUrl('post/view/', array('url' => $post->url));?>"><?php echo $post->name;?></a></h2>
    <p class="byline"><?php echo $post->created;?></p>
    <div class="entry">
        <p><?php echo mb_substr($post->text, 0, 150), "...";?></p>
    </div>
    <div class="meta">
        <p class="links"><a href="<?php echo $this->createUrl('post/view/', array('url' => $post->url)) ;?>">Подробнее</a></p>
    </div>
</div>