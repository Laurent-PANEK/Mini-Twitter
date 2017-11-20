<?php

require_once "includes/Session.php";
Session::getInstance();
require_once "includes/init.php";

if (!empty($_POST)) {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_c'])) {
        
        if ($_POST['password'] == $_POST['password_c']) {
            
            $mail_exist = $bdd->query('SELECT email FROM users WHERE  email = :email', [':email' => htmlspecialchars($_POST['email'])])->fetch();
            
            if (empty($mail_exist)) {
                
                $bdd->query('INSERT INTO users(name, password, email) VALUES (:name,:password,:email)',
                    [
                        ':name' => htmlspecialchars($_POST['name']),
                        ':email' => htmlspecialchars($_POST['email']),
                        ':password' => password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT),
                    ]);
                header('Location: /login.php');
            } else {
                Session::getInstance()->setFlash('error', 'Cet email est déjà utilisé !');
            }
        } else {
                Session::getInstance()->setFlash('error', 'Mot de passe invalide');
        }
        
    } else {
        Session::getInstance()->setFlash('error', 'Formulaire incomplet !');
    }
}

include_once "includes/header.php";
?>
<div class="ui grid container">
    <div class="eight wide centered column">
        <div class="row">

        </div>
        <h1>S'enregistrer</h1>
        <form action="" method="post">
            <div class="ui form">
                <div class="required field">
                    <label>Nom</label>
                    <input type="text" name="name" placeholder="Votre nom d'utilisateur">
                </div>
                <div class="required field">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Votre email">
                </div>
                <div class="required field">
                    <label>Mot de Passe</label>
                    <input type="password" name="password" placeholder="Votre mot de passe">
                </div>
                <div class="required field">
                    <label>Confirmation du Mot de Passe</label>
                    <input type="password" name="password_c" placeholder="Confirmation du mot de passe">
                </div>
                <button class="ui button" type="submit"><i class="send icon"></i>S'enregistrer</button>
            </div>
        </form>
    </div>
    <div class="row">

    </div>
</div>

<?php include_once "includes/footer.php"; ?>
