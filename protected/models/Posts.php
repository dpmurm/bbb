<?php
    // Стандартный шаблон для любой модели.
     class Posts extends CActiveRecord
     {        
         public static function model($className=__CLASS__)
         {
             return parent::model($className);
         }
         public function tableName()
         {
             return 'post';   // название нашей таблицы в базе данных
         }
     }