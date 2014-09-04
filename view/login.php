<form action="index.php?action=login" method="POST" name="login">
    <fieldset>
        <legend>Авторизация</legend>
        <p>
            <label>Логин:
                <input type="text" name="name" size="15" maxlength="15">
            </label>
        </p>
        <p>
            <label>Пароль:  
                <input type="password" name="password" size="25" maxlength="30">
            </label>
        </p>
    </fieldset>
    <p>
        <input type="submit" />
    </p>
</form>
<div>
    <?php
    if (!empty($this->view->error)) {
        echo "<div>{$this->view->error}</div>";
    } 
    ?>
</div>