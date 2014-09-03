<!DOCTYPE html>
<html>
    <head>
        <title>Телефонный справочник</title>
        <meta charset="utf-8" />
        <link href="./css/defaultlayout.css" rel="stylesheet">
    </head>
    <body>
        <div id="container">
        <header>
          <h2>Приветствие</h2>
        </header>
        <nav>
            <menu>
                <ul>
                    <li><a href="?action=index">Главная</a></li>
                    <li><a href="?action=phones">Телефоны</a></li>
                    <li><a href="?action=login">Войти</a></li>
                </ul>
            </menu>
        </nav>
        <article>
            <?php $this->view() ?> 
        </article>
        <footer>Контакты и прочее...</footer>
        </div>
    </body>
</html>