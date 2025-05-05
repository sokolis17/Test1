<?php
require_once __DIR__ . "/src/helper.php";
checkGuest();   

?>


<!DOCTYPE html>
<html lang="ru" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>AreaWeb - авторизация и регистрация</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="assets/app.css">
</head>
<body>

<form class="card" action = "src/action/register.php" method="post" enctype="multipart/form-data">
    <h2>Регистрация</h2>

    <label for="name">
        Имя
        <input
            type="text"
            id="name"
            name="name"
            placeholder="Иванов Иван"
            value="<?php echo old('name'); ?>"
            <?php validationErrorAtrr('name'); ?>
        >
        <?php if(hasValidationError('name')):?>
            <small><?php validationErrorMessage('name')?></small>
        <?php endif; ?>
    </label>

    <label for="email">
        E-mail
        <input
            type="text"
            id="email"
            name="email"
            placeholder="ivan@areaweb.su"
            value="<?php echo old('email'); ?>"
            <?php validationErrorAtrr('email'); ?>
        >
        <?php if(hasValidationError('email')):?>
            <small><?php validationErrorMessage('email')?></small>
        <?php endif; ?>
    </label>

    <label for="avatar">Изображение профиля
        <input
            type="file"
            id="avatar"
            name="avatar"
            <?php validationErrorAtrr('avatar'); ?>
        >
        <?php if(hasValidationError('avatar')):?>
            <small><?php validationErrorMessage('avatar')?></small>
        <?php endif; ?>
    </label>

    <div class="grid">
        <label for="password">
            Пароль
            <input
                type="password"
                id="password"
                name="password"
                placeholder="******"
                <?php validationErrorAtrr('password'); ?>
            >
            <?php if(hasValidationError('password')):?>
                <small><?php validationErrorMessage('password')?></small>
            <?php endif; ?>

        </label>

        <label for="password_confirmation">
            Подтверждение
            <input
                type="password" 
                id="password_confirmation"
                name="password_confirmation"
                placeholder="******"
                <?php validationErrorAtrr('password_confirmation'); ?>
            >
            <?php if(hasValidationError('password_confirmation')):?>
                <small><?php validationErrorMessage('password_confirmation')?></small>
            <?php endif; ?>

        </label>
    </div>

    <fieldset>
        <label for="terms">
            <input
                type="checkbox"
                id="terms"
                name="terms"
            >
            Я принимаю все условия пользования
        </label>
    </fieldset>

    <button
        type="submit"
        id="submit"
        disabled
    >Продолжить</button>
</form>



<p>У меня уже есть <a href="/login-and-register-new-layout/index.php">аккаунт</a></p>

<script src="assets/app.js"></script>
</body>
</html>