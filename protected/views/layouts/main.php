<html>
<head>
    <title><?php echo $this->pageTitle; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="ru" />
    <meta name="robots" content="all" />
</head>
<body>

<?php $this->widget('zii.widgets.CMenu',array(

    'items'=>array(

        array('label'=>'Главная', 'url'=>array('/post/index')),

        array('label'=>'Вход', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),

        array('label'=>'Регистрация', 'url'=>array('/user/registration'), 'visible'=>Yii::app()->user->isGuest),

        array('label'=>'Выход ('.Yii::app()->user->name.')', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest)

    ),

)); ?>

<?php echo $content; ?>
</html>