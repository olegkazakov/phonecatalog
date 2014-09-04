<!DOCTYPE html>
<html>
    <head>
        <title>Телефонный справочник</title>
        <meta charset="utf-8" />
        <link href="./css/defaultlayout.css" rel="stylesheet">
    </head>
    <body>
        <div id="container">
            <div id="main">
                <header>
                    <h2>Телефонный справочник</h2>
                    <menu>
                        <ul type="none">
                            <li><a href="?action=index">Главная</a></li>
                            <li><a href="?action=phones">Телефоны</a></li>
                            <li><a href="?action=login">Войти</a></li>
                        </ul>
                    </menu>
                </header>
                <div id="all">
                    <article>
                        <?php $this->view() ?> 
                    </article>
                </div>
            </div>
            <footer>
                <div id="copyright">&copy; OKMystic, 2014</div>
            </footer>
      </div>
    </body>
</html>