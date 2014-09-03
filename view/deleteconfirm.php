<form action="index.php?action=deletephone" method="POST" name="deletephone">
    <fieldset>
        <legend>Подтверждение удаления</legend>
        <p>
            <label>Вы действительно желаете удалить телефонный номер?</label>
        </p>
        <p>
            <input type="submit" name="btnYes" value="ДА" />
            &nbsp;&nbsp;
            <input type="submit" name="btnNo" value="НЕТ" />
        </p>
    </fieldset>
</form>
<?php
if (!empty($this->view->error)) {
    echo "<div>{$this->view->error}</div>";
} 
?>
