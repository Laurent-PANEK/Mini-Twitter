<?php
require_once "includes/Session.php";
Session::getInstance();
require_once "includes/init.php";

if (!empty($_POST)) {
    if (!empty($_POST['name']) && !empty($_POST['password'])) {
        $email = $bdd->query('SELECT password from users WHERE name = :name', [':name' => htmlspecialchars($_POST['name'])])->fetch();
        if (!empty($email)) {
            if (password_verify(htmlspecialchars($_POST['password']), $email['password'])) {
                
                $user = $bdd->query('SELECT * from users WHERE name = :name AND password = :password',
                    [
                        ':name' => htmlspecialchars($_POST['name']),
                        ':password' => $email['password'],
                    ])->fetch();
                
                if (!empty($user)) {
                    Session::getInstance()->write('connected', $user);
                    header("Location: /index.php");
                } else {
                    Session::getInstance()->setFlash('error', 'Identifiants Incorrect !');
                }
            }
        } else {
            Session::getInstance()->setFlash('error', 'Identifiants Incorrect !');
        }
    } else {
        Session::getInstance()->setFlash('error', 'Formulaire incomplet ou vide !');
    }
}

include_once "includes/header.php";
?>
    <div class="ui grid container">
        <div class="eight wide centered column">
            <div class="row"></div>
            <h1>Se connecter</h1>
            <form action="" method="post">
                <div class="ui form">
                    <div class="required field">
                        <label>Nom</label>
                        <input type="text" name="name" placeholder="Votre nom d'utilisateur">
                    </div>
                    <div class="required field">
                        <label>Mot de Passe</label>
                        <input type="password" name="password" placeholder="Votre mot de passe">
                    </div>
                    <button class="ui button" type="submit"><i class="send icon"></i>Se Connecter</button>
                </div>
            </form>
            <div class="row"></div>
        </div>
    </div>
<?php include_once "includes/footer.php"; ?>