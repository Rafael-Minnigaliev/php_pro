<section>
    <form class="reg" action="index.php?c=user&act=Reg" method="post">
        <label>Ваше имя: <input class="reg__input" type="text" name="name" required></label><br>
        <label>Логин: <input class="reg__input" type="text" name="login" required></label><br>
        <label>Пароль: <input class="reg__input" type="password" name="pass" required></label><br>
        <label>Tелефон: <input class="reg__input" type="tel" name="tel" required></label><br>
        <p>Адрес доставки:</p>
        <p>(город, улица, дом, подъезд, квартира, этаж)</p>
        <textarea class="reg__input" name="address" cols="42" rows="4" required></textarea><br>
        <input type="submit" value="Зарегистрироваться">
    </form>
</section>
<?php
if($_GET['status'] == "loginExists"):?>
    <h2 style="color: red">Такой логин уже существует, придумайте другой!</h2>
<?php
endif;
