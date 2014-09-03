<div>
    <table style="border: 4px double black; background: #fc0; padding: 10px; width:100%;">
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
                foreach ($this->view->phones as $phone) {
                    echo "<tr><td>{$phone->getId()}</td>"
                    . "<td>{$phone->getFio()}</td>"
                    . "<td>{$phone->getPhone()}</td>"
                    . "<td>{$phone->getComment()}</td>"
                    . "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>