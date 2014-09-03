<?php
if (!empty($posts))
    foreach ($posts as $key => $val) {
        $this->renderPartial('_list',array(
            'post'=>$val,
        ));
    }
?>

<?php $this->widget('CLinkPager',array(
    'pages'=>$pages,
    'maxButtonCount' => 5,
    'header' => '<b>Перейти к странице:</b><br><br>',
)); ?>