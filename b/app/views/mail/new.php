<div class="mail">
    <form action="postMail" method="POST">
        <table border="1" width="40%" align="center">
            <tr>
                <td>
                    Кому:
                </td>
                <td>
                    <input type="text" name="receiver" required>
                </td>
            </tr>
            <tr>
                <td>
                    Тема:
                </td>
                <td>
                    <input type="text" name="title">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Сообщение:
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea rows="10" cols="103" name="text"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Отправить">
                </td>
            </tr>
        </table>
    </form>
</div>