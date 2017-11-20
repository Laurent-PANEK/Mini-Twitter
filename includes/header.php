<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mini-Twitter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.10/semantic.min.css">
    <style>
        .Site {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .Site-content {
            flex: 1;
        }
        .content{
            width: 100%;
        }
        p {
            word-wrap: break-word !important;
        }
    </style>
</head>
<body class="Site">
<header>
    <div class="ui menu grid ">
        <a href="/" class="item">
            <h3>Mini-Twitter</h3>
        </a>
        <div class="right menu">
            <?php if (Session::getInstance()->read('connected')) : ?>
                <div class="ui dropdown item">
                    Profil
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a href=""
                           class="item"><h4><?php echo Session::getInstance()->doubleRead('connected', 'name') ?></h4></a>
                        <div class="divider"></div>
                        <a href="/user.php" class="item">Mes Tweets</a>
                        <div class="divider"></div>
                        <a href="/logout.php" class="item"><i class="sign out icon"></i>Déconnexion</a>
                    </div>
                </div>
                <div class="item">
                    <div class="ui button"><a href="/tweet.php">Tweeter</a></div>
                </div>
            <?php else: ?>
                <a href="/signin.php" class="item">S'inscire</a>
                <a href="/login.php" class="item"><i class="sign in icon"></i>Se Connecter</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="ui grid">
        <div class="eight wide column centered">
            <?php
            if (Session::getInstance()->hasFlashes()) {
                foreach (Session::getInstance()->getFlashes() as $key => $values): ?>
                    <div class="ui <?php echo $key; ?> message">
                        <i class="close icon"></i>
                        <div class="header">
                            <?php echo $key; ?> !
                        </div>
                        <ul class="list">
                            <?php foreach ($values as $value) : ?>
                                <li><?php echo $value; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach;
            } ?>
        </div>
    </div>

</header>

<main class="Site-content">

