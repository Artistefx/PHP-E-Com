<?php
session_start();

include "config/commandes.php";

if(isset($_SESSION['clientSession']))
{
    if(!empty($_SESSION['clientSession']))
    {
        header("Location: clients/index.php");
    }
}

if(isset($_POST['envoyer']))
{
    if(!empty($_POST['email']) AND !empty($_POST['motdepasse']))
    {
        $login = htmlspecialchars(strip_tags($_POST['email'])) ;
        $motdepasse = htmlspecialchars(strip_tags($_POST['motdepasse']));

        $user = getUsers($login, $motdepasse);

        if($user){
            $_SESSION['clientSession'] = $user;
            header('Location: clients/index.php');
        }else{
            header('Location: create.php');
        }
    }
    

}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <!--========= BOXICONS =========-->
         <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
         <!--======== UNICONS=======-->
         <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
          <!--========= BOOTSRAP =========-->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
         <!-- ===== CSS ===== -->
         <link rel="stylesheet" href="Assets/Css/Cuidate.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,900&display=swap');
.login{
    margin-top: 5rem;
}
.registration-form{
	padding: 50px 0;
}

.registration-form form{
    background-color:rgb(204, 158, 121) ;
    max-width: 600px;
    margin: auto;
    padding: 50px 70px;
    border-radius: 30px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
}
.form-group{
    margin-bottom: 20px;
}
.form-icon{
    font-size: 40px;
    color: white;
    text-align: center;
    line-height: 100px;
    margin-bottom: 20px;
}

.item{
	border-radius: 20px;
    margin-bottom: 25px;
    padding: 10px 20px;
}
.panier_icon{
    position: relative;
        }
        .myspan {
    position: absolute;
    top: -26px;
    right: -12px;
    background-color: #fff;
    height: 20px;
    width: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-size: 7px;
    color: #000;
}
.create-account{
    border-radius: 30px;
    padding: 10px 20px;
    font-size: 10px;
    font-weight: bold;
    background-color: #683b23;
    border: none;
    color: #fff;
    margin-top: 20px;
}
.create-account:hover{
    color: #fff;
}
.link_page{
    color: #fff;
    text-decoration: none;
    margin-left: 10px;
    margin-top: 20px;
}

.link_page:hover{
    text-decoration: underline;
    color: #fff;
}
.navbar a{
    text-decoration: none;
}
.links a{
    text-decoration: none;
}
.share a{
    text-decoration: none;
}
@media (max-width: 576px) {
    .registration-form form{
        padding: 50px 20px;
    }

}
        </style>

        <title>Login</title>
    </head>
    <body>
    <?php
include('includes/header.php');
?>
        <section class="login">
            <div class="registration-form">
            <form method="post">
                    <div class="form-icon">
                        <h3>Ouvrir Une Session</h3>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control item" id="email" name="email" placeholder="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control item" id="password" name="motdepasse" placeholder="password">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="envoyer" value="Connexion" class="btn btn-block create-account">
                    </div>
                    <div class="form-group">
                        <a href="create.php" class="link_page">Creer un Compte</a>
                    </div>
                </form>
            </div>
        </section>
        <?php
include('includes/footer.php');
?>
        
    </body>
</html>
