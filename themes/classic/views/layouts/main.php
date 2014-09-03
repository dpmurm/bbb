<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Title      : Featuring
Version    : 1.0
Released   : 20090625
Description: A two-column fixed-width template suitable for small websites.

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo $this->pageTitle; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="ru" />
    <meta name="robots" content="all" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/default.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="wrapper">
    <div id="header">
        <div id="logo">
            <h1><a href="#">YiiBlog</a></h1>
            <h2><a href="http://www.freecsstemplates.org/">By www.DbHelp.ru</a></h2>
        </div>
        <!-- end div#logo -->
        <div id="menu">
            <ul>
                <li><a href="<?=Yii::app()->createUrl("post/index/");?>">Главная</a></li>
                <?php if (Yii::app()->user->isGuest): ?>
                    <li><a href="<?=Yii::app()->createUrl("user/registration/");?>">Регистрация</a></li>
                    <li><a href="<?=Yii::app()->createUrl("user/login/");?>">Вход</a></li>
                <?php else: ?>
                <li><a href="<?=Yii::app()->createUrl("user/logout/");?>">Выход (<?=Yii::app()->user->name?>)</a>
                    <?php endif; ?>
            </ul>
        </div>
        <!-- end div#menu -->
    </div>
    <!-- end div#header -->
    <div id="page">
        <div id="page-bgtop">
            <div id="content">
                <?php echo $content; ?>
            </div>
            <!-- end div#content -->
            <div id="sidebar">
                <ul>
                    <li>
                        <h2>Правый блок меню</h2>
                        <ul>
                            <li><a href="#">ссылка</a></li>
                            <li><a href="#">ссылка</a></li>
                            <li><a href="#">ссылка</a></li>
                            <li><a href="#">ссылка</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- end div#sidebar -->
            <div style="clear: both; height: 1px"></div>
        </div>
    </div>
    <!-- end div#page -->
    <div id="footer">
        <p id="legal">Designed by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>
    </div>
    <!-- end div#footer -->
</div>
<!-- end div#wrapper -->
</body>
</html>