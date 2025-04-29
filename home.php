<!DOCTYPE html>
<html lang="ru" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>AreaWeb - авторизация и регистрация</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="assets/app.css">
</head>
<body>

<div class="card home">
    <img
        class="avatar"
        src="https://i.pinimg.com/736x/c4/4e/4b/c44e4b8cf478b81558fbbeec36554d24.jpg"
        alt="{{ name }}"
    >
    <h1>Привет, {{ name }}!</h1>
    <a href="/login-and-register-new-layout/index.php" role="button">Выйти из аккаунта</a>
</div>

<script src="assets/app.js"></script>
</body>
</html>