<form action="index.php?action=changephone" method="post" name="newphone">
    <fieldset>
        <legend>Изменение телефона</legend>
        <p>
            <label>Фамилия, имя и отчество:<br>
              <input type="text" name="fio" size="50" maxlength="50" 
                     value="<?=$this->view->phone->getFio()?>">
            </label>
        </p>
        <p>
            <label>Телефон:<br>  
                <input type="text" name="phone" id="phone" size="25" 
                       maxlength="30" value="<?=$this->view->phone->getPhone()?>">
            </label>
        </p>
        <p>
            <label>Комментарий:<br>  
                <input type="text" name="comment" size="50" maxlength="50"
                       value="<?=$this->view->phone->getComment()?>">
            </label>
        </p>
    </fieldset>
    <p>
        <input type="submit" name="cbtnYes" value="ИЗМЕНИТЬ" />
        &nbsp;&nbsp;
        <input type="submit" name="cbtnNo" value="ОТМЕНА" />
    </p>
</form>
<script type="text/javascript">
jQuery(function($){
   $("#phone").mask("+7 (999) 999-99-99");
});
</script>
<?php 
if (!empty($this->view->error)) {
    echo "<div>{$this->view->error}</div>";
} 
?>
