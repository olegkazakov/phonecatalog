<div>
    <table>
        <caption>Справочник телефонных номеров</caption>
        <thead>
            <tr>
                <td>№</td>
                <td>Ф.И.О.</td>
                <td>Номер телефона</td>
                <td>Комментарий</td>
                <td>Опции</td>
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
                    . "<td><a href='?action=changeconfirm&id={$phone->getId()}'>"
                    . "<img src='./img/edit.png' width='24' height='24' "
                            . "alt='Изменить'></a> "
                    . "<a href='?action=deleteconfirm&id={$phone->getId()}'>"
                    . "<img src='./img/delete.png' width='24' height='24' "
                            . "alt='Удалить'></a></td>"
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