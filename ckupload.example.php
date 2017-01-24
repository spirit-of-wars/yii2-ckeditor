<?php

function actionCkupload()
{
    $uploadDir = 'frontend/web/img/news/';

    $callback = $_GET['CKEditorFuncNum'];
    $file_name = time() . '_' . $_FILES['upload']['name'];
    $file_name_tmp = $_FILES['upload']['tmp_name'];
    $file_new_name = Yii::getAlias('@app'.'/../'.$uploadDir);
    $full_path = $file_new_name.$file_name;
    $http_path = Yii::$app->params['domain'].'img/news/'.$file_name;
    $error = '';
    if( move_uploaded_file($file_name_tmp, $full_path) ) {
    } else {
        $error = 'Some error occured please try again later';
        $http_path = '';
    }
    return "<script type=\"text/javascript\">window.parent.CKEDITOR.tools.callFunction(".$callback.",  \"".$http_path."\", \"".$error."\" );</script>";
}