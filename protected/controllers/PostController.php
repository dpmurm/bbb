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

             $cs=Yii::app()->clientScript;
             $cs->registerCoreScript('jquery');

             if (!empty($_GET['url'])) {
                 // На всякий случай удаляю пробелы и устанавливаю
                 // максимальную длину для url в 100 символов.
                 $url = substr(trim($_GET['url']), 0, 100);

                 // Только англ. буквы и цифры в url
                 if(preg_match("/^[a-zA-Z0-9\-\_]+$/", $url)) {
                     $post = Posts::model()->find("url = :url", array(':url' => $url));

                     // Тема есть в базе
                     if (!empty($post)) {

                         // Для того чтобы сгенерировать форму добавления комментария
                         $comm_form = new Comments();

                         // Если был отправлен новый комментарий...
                         if (!empty($_POST['Comments']))
                         {
                             $comm_form->attributes = $_POST['Comments'];
                             $comm_form->id_post       = (int)$post->id;
                             $comm_form->created    = date('Y-m-d H:i:s');

                             if (!Yii::app()->user->isGuest) {
                                 // Если не гость - заполняем запись действиельным
                                 // айдишником владельца комментария и ником
                                 $comm_form->id_user = Yii::app()->user->id;
                                 $comm_form->login     = Yii::app()->user->name;
                             } else {
                                 // Если гость...
                                 $comm_form->id_user = 0;
                             }

                             // Валидация специально идет после присваивания значению login
                             // того что ввёл гость через форму. Я это сделал для того чтобы
                             // введенные данные были проверены через rules
                             if ($comm_form->validate('add')) {
                                 // ну теперь можем делать save..
                                 $comm_form->save();
                             } else {
                                 // ошибка при добавлении комментария.
                                 // не прошла валидация..
                             }
                         }

                         // Создаем критерию отбора данных
                         $com_criteria              = new CDbCriteria;
                         // Нам нужны все записи где id_post = текущему посту
                         $com_criteria->condition = 'id_post = :id';
                         // Вместо :id посдтавляем реальное значение
                         $com_criteria->params     = array(':id' => $post->id);
                         // Сортируем данные. Что бы новые отзывы - были вверху
                         $com_criteria->order     = 'created ASC';
                         // Передаем критерию в findAll
                         $comments = $comm_form->findAll($com_criteria);

                         $this->render('view', array(
                             'post'         => $post,
                             // результат передаем в отображение.
                             'comments'    => $comments,
                             'comm_form' => $comm_form,
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