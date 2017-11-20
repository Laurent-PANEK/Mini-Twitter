<?php
require_once "includes/Session.php";
Session::getInstance();
require_once "includes/init.php";

$all_tweets = $bdd->query('SELECT name, value, published_at FROM users u RIGHT JOIN tweets t ON u.id = t.id_user ORDER BY published_at DESC')->fetchAll();

include_once "includes/header.php";

?>
<div class="ui grid centered">
    <div class="ten wide column">

        <h1>Tous les Tweets !</h1>

        <div class="ui divided link items">
            <?php foreach ($all_tweets as $key => $value) : ?>
                <a href="/user.php?name=<?php echo $value['name']; ?>" class="item">
                    <div class="content">
                        <div class="header"><?php echo $value['name']; ?></div>
                        <div class="meta">
                            <span class="date"><?php echo $value['published_at']; ?></span>
                        </div>
                        <div class="description">
                            <p><?php echo $value['value']; ?></p>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="row"></div>
</div>
<?php include_once "includes/footer.php"; ?>
