<?php

session_start();


if(isset($_GET['i'])){
    // if doctor session expires
    if($_GET['i']=='21'){
        session_unset($_SESSION['report_passport']);
        $_SESSION['report_passport'] = false;
        header('location:doctor_side.php');
    }
    // if doctor logs out from fit card
    if($_GET['i']=='22'){
        session_unset($_SESSION['report_passport']);
        $_SESSION['report_passport'] = false;
        header('location:doctor_side.php');
    }   
    // if owner session expire
    else if($_GET['i']=='11'){
        session_unset($_SESSION['fit_pat_own']);
        $_SESSION['fit_pat_own'] = false;
        header('location:session_destry.php');
    }
    // if owner logs out 
    else if($_GET['i']=='12'){
        session_unset($_SESSION['fit_pat_own']);
        $_SESSION['fit_pat_own'] = false;
        header('location:card_owner_login.php');
    }
    //if doctor logs out
    else if($_GET['i']=='33'){
        session_unset($_SESSION['doc_mail']);
        $_SESSION['doc_mail'] = false;
        header('location:doc_login.php');
    }
   

}
?>