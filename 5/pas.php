<?php

 
$text = $_POST['password']; 
 

if (!preg_match("/.{10,}/", $text)) echo 'Длина должна быть не менее 10 символов <br />';  

if (!preg_match("/\*.*\*/", $text)) echo 'Не менее 2 специальных символов * <br />';

if (!preg_match("/_.*_/", $text)) echo 'Не менее 2 специальных символов _ <br />';

if (!preg_match("/#.*#/", $text)) echo 'Не менее 2 специальных символов # <br />';

if (!preg_match("/\$.*\$/", $text)) echo 'Не менее 2 специальных символов $ <br />';

if (!preg_match("/%.*%/", $text))  echo 'Не менее 2 специальных символов % <br />';

if (!preg_match("/[a-z].*[a-z]/", $text)) echo 'Не менее 2 строчных латинских символов <br />';

if (!preg_match("/[A-Z].*[A-Z]/", $text)) echo 'Не менее 2 прописных латинских букв <br />';

if (!preg_match("/\d.*\d/", $text))  echo 'Не менее 2 цифр <br />';

if (preg_match("/\d\d\d/", $text))  echo 'Пароль не должен содержать более 3 цифр подряд <br />';