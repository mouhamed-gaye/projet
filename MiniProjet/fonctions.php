<?php

function getData($file="users"){
    $data=file_get_contents($file.".json");
    $data=json_decode($data,true);
    return $data;
}
function verif_login($login){
    $users=getData();
    foreach ($users as $key => $user){
        if ($user['login']==$login) {
            return true;
        }
    }
    return false;
}

function comp_password($password,$password1){
    if($password==$password1){
        return true; 
    }
    return false;
}
function getUser($login,$password,$users){
    foreach ($users as $key => $user) {
        if($user['login']===$login && $user['password']===$password){
            return $user;
        }
    }
    return null;
}

function connexion($login,$password){
    $users=getData();
    foreach ($users as $key => $user) {
        if ($user['login']===$login && $user['password']===$password) {
            $_SESSION['user']=$user;
            $_SESSION['statut']="login";
            if($user['role']==="admin"){
                return "accueil";
            }else{
                return "jeux";
            }
        }
    }
    return "error";
}
function deconnexion(){
    unset($_SESSION['user']);
    unset($_SESSION['statut']);
    session_destroy();
}
function is_connect(){
   if(!isset($_SESSION['statut'])){
    header("location:index.php");
   }
}
?>