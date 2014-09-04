<div>
    <table>
        <caption>Справочник телефонных номеров</caption>
        <thead>
            <tr>
                <td>№</td>
                <td>Ф.И.О.</td>
                <td>Номер телефона</td>
                <td>Комментарий</td>
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
                    . "</tr>";
                    $num++;
                }
            ?>
        </tbody>
    </table>
</div>
<?php
if (!empty($this->view->error)) {
    echo "<div>{$this->view->error}</div>";
} 
?>