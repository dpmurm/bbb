<table border="0" width="100%" cellpadding="10" cellspacing="10">
     <?php
     if (!empty($posts))
         foreach ($posts as $key => $val) {
             $this->renderPartial('_list',array(
                 'post'=>$val,
             )); 
         }
     ?>
 </table>
 
 <?php $this->widget('CLinkPager',array(
             'pages'=>$pages, 
             'maxButtonCount' => 5, // максимальное вол-ко кнопок <- 1..2..3..4..5 ->
             'header' => '<b>'.Yii::t('main', 'Перейти к странице:').'</b><br><br>', // заголовок над листалкой
     )); ?>