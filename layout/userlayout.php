<!DOCTYPE html>
<html>
    <head>
        <title>Телефонный справочник</title>
        <meta charset="utf-8" />
        <link href="./css/defaultlayout.css" rel="stylesheet">
        <script src="./js/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="./js/jquery.maskedinput.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="container">
            <div id="main">
                <header>
                    <h2>Телефонный справочник</h2>
                    <menu>
                        <ul type="none">
                            <li><a href="?action=index">Главная</a></li>
                            <li><a href="?action=showUser">Юзер</a></li>
                            <li><a href="?action=phones">Телефоны</a></li>
                            <li><a href="?action=addphone">Добавить телефон</a>
                            </li>
                            <li><a href="?action=logout">Выйти</a></li>
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