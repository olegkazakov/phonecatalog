<div>
    <table border="4px double black" background="#fc0" padding="10px" sellpadding="2" sellspacing="10" width="100%">
        <caption>Справочник телефонных номеров</caption>
        <thead>
            <tr>
                <td>№</td>
                <td>Ф.И.О.</td>
                <td>Номер телефона</td>
                <td>Комментарий</td>
                <td>Изменить</td>
                <td>Удалить</td>
            </tr>
        </thead>
        <tbody>
            <?php
                $num = 1;
                foreach ($this->view->phones as $phone) {
                    echo "<tr><td>{$num}</td>"
                    . "<td>{$phone->getFio()}</td>"
                    . "<td>{$phone->getPhone()}</td>"
                    . "<td>{$phone->getComment()}</td>"
                    . "<td><a href=''>Изменить</a></td>"
                    . "<td><a href='?action=deleteconfirm&id={$phone->getId()}'>Удалить</a></td>"
                    . "</tr>";
                    $num++;
                }
            ?>
        </tbody>
    </table>
</div>
<div>
  <?php
  if (!empty($this->view->error)) {
      echo "<div>{$this->view->error}</div>";
  } 
  ?>
</div>