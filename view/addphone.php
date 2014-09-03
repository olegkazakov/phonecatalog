<form action="index.php?action=addphone" method="post" name="newphone">
    <fieldset>
        <legend>Добавление телефона</legend>
        <p>
          <label>Фамилия, имя и отчество:<br>
                <input type="text" name="fio" size="50" maxlength="50">
            </label>
        </p>
        <p>
          <label>Телефон:<br>  
                <input type="text" name="phone" size="25" maxlength="30">
            </label>
        </p>
        <p>
          <label>Комментарий:<br>  
                <input type="text" name="comment" size="50" maxlength="50">
            </label>
        </p>
    </fieldset>
    <p>
        <input type="submit" value="Добавить"/>
    </p>
</form>
<?php 
if (!empty($this->view->error)) {
    echo "<div>{$this->view->error}</div>";
} 
?>
