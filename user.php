<?php
require_once "includes/Session.php";
Session::getInstance();
require_once "includes/init.php";

if (!Session::getInstance()->read('connected') && empty($_GET['name'])) {
    header('Location: /login.php');
}

if (Session::getInstance()->read('connected') && empty($_GET['name'])) {
    $tweet_user = $bdd->query('SELECT name, value, published_at FROM users u RIGHT JOIN tweets t ON u.id = t.id_user WHERE u.id = :id ORDER BY published_at DESC',
        [
            ':id' => Session::getInstance()->doubleRead('connected', 'id'),
        ])->fetchAll();
} else {
    $tweet_user = $bdd->query('SELECT name, value, published_at FROM users u RIGHT JOIN tweets t ON u.id = t.id_user WHERE u.name = :name ORDER BY published_at DESC',
        [
            ':name' => $_GET['name'],
        ])->fetchAll();
}

include_once "includes/header.php";

?>

<div class="ui grid centered">
    <div class="ten wide column">
        <?php if (!empty($_GET['name'])): ?>
            <h1>Tweets de <?php echo $_GET['name']; ?></h1>
        <?php else: ?>
            <h1>Mes Tweets !</h1>
        <?php endif; ?>
        <div class="ui divided items">
            <?php foreach ($tweet_user as $key => $value) : ?>
                <div class="item">
                    <div class="content">
                        <div class="header"><?php echo $value['name']; ?></div>
                        <div class="meta">
                            <span class="date"><?php echo $value['published_at']; ?></span>
                        </div>
                        <div class="description">
                            <p>
                                <?php echo $value['value']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="row"></div>
</div>

<?php include_once "includes/footer.php"; ?>
