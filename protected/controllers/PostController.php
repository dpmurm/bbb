<?php
     class PostController extends CController
     {           
         public function actionIndex()
         {
             $this->pageTitle = "Мой блог :: Главная страница";
            
            // создаем простой критерий поиска в котором
            // просто сортируем по колонке created 
            $criteria=new CDbCriteria;
            $criteria->order = 'created DESC';
            /*
            // Обращаемся к моделе Posts (которую мы создадим немного позже)
            // И передаем нашу критерию, чтобы все сообщения которые
            // мы получим - были отсортированы по дате создания.
            $all_posts = Posts::model()->findAll($criteria);
            
            // Передаем переменную $all_post со всеми постами в отображение index
            // в самом отображении переменная будет доступна по имени $posts
            $this->render('index', array(
                'posts' => $all_posts, 
				
			*/	
				// Создаем обьект класса CPagination в который
             // передаем кол-во наших постов
             $pages=new CPagination(Posts::model()->count($criteria));
             // Сколько сообщений выводить на страницу?
             $pages->pageSize=1;
             $pages->applyLimit($criteria);
             
             $all_posts = Posts::model()->findAll($criteria);
             
             $this->render('index', array(
                 'posts' => $all_posts, 
                 // теперь нам надо в отображение послать еще
                 // и переменную $pages
                 'pages' => $pages,
            ));
        }

         public function actionView ()
         {
             $this->pageTitle = "";

             if (!empty($_GET['url'])) {
                 // На всякий случай удаляю пробелы и устанавливаю
                 // максимальную длину для url в 100 символов.
                 $url = substr(trim($_GET['url']), 0, 100);

                 // Только англ. буквы и цифры в url
                 if(preg_match("/^[a-zA-Z0-9\-\_]+$/", $url)) {
                     $post = Posts::model()->find("url = :url", array(
                         ':url' => $url,
                     ));
                     if (!empty($post)) {
                         // Тема есть в базе
                         $this->render('view', array(
                             'post' => $post,
                         ));
                     } else {
                         // Такой темы в базе нет. 404?
                         Yii::app()->runController('post/error404');
                     }
                 } else {
                     Yii::app()->runController('post/error403');
                 }
             } else {
                 // $_GET['url'] пустое. Выводим главную страницу
                 Yii::app()->runController('post/index');
             }
         }

         public function actionError404 ()
         {
             $this->render('404');
         }
    }