<?php

function validatpass($pass)
{
    if(!empty($pass )) {
       
        if (strlen($pass) < 8) {
            return false ;
        }
        elseif(!preg_match("#[0-9]+#",$pass)) {
           return false ;
        }
        elseif(!preg_match("#[A-Z]+#",$pass)){
            return false ;        }
        elseif(!preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/",$pass)) {
            $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        } else {
           return true ;
        }
    } else return false ;

}
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
 }

$userN = $_POST['email'];
$passW = $_POST['password'];
$success = false;

if( validateEmail($userN) )
{
    if( validatpass($passW) )
{

    try {
        $file_handle = fopen("login.txt", "rb");
        if (! $file_handle) {
            throw new Exception("Could not open the file!");
        }
    
    
        while (!feof($file_handle) ) {
            $line_of_text = fgets($file_handle);
            $parts = explode('|', $line_of_text);
            if (($parts[0] ==  $_POST['email'] ) || ($parts[1] == $_POST['password'])) {
                $success = true;
            }
        }
        if ($success) {
            echo "<br> Authentification réussie <br>";
        } else {
            echo "<br> Login inexistant <br>";
        } 
        fclose($file_handle);
        
    }
    catch (Exception $e) {
        echo "Error (File: ".$e->getFile().", line ".
              $e->getLine()."): ".$e->getMessage();
    }
    
} else echo"<br> Mot de passe invalide <br>";
}else echo"<br>  email invalide <br>";




?>