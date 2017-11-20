<?php
require_once "includes/Session.php";
Session::getInstance();
require_once "includes/init.php";

if (!Session::getInstance()->read('connected')) {
    header('Location: /login.php');
}
if (!empty($_POST)) {
    if (!empty($_POST['tweet'])) {
        $bdd->query('INSERT INTO tweets(id_user, value, published_at) VALUES (:id, :value, CURRENT_TIME )',
            [
                ':id' => Session::getInstance()->doubleRead('connected', 'id'),
                ':value' => htmlspecialchars($_POST['tweet']),
            ]);
    } else {
        Session::getInstance()->setFlash('error', 'Votre tweet est vide !');
    }
}

include_once "includes/header.php";
?>
<div class="ui grid container">
    <div class="eight wide centered column">
        <div class="row"></div>
        <h1>Tweeter</h1>
        <form action="" method="post">
            <div class="ui form">
                <div class="field">
                    <label>Tweet</label>
                    <textarea name="tweet" rows="4" maxlength="280"></textarea>
                </div>
                <button class="ui button" type="submit"><i class="send icon"></i>Tweeter</button>
            </div>
        </form>
        <div class="row"></div>
    </div>
</div>

<?php include_once "includes/footer.php"; ?>
