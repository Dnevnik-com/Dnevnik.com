<?php
// Примерные данные пользователя
$person = [
    'fullName' => 'Шаваев Дамир Хизырович',
    'gender' => 'Мужской',
    'age' => '13 лет',
    'birthDate' => '1 мая 2012 г.',
    'email' => '-',
    'homePhone' => '-',
    'mobilePhone' => '-',
    'workPhone' => '-',
    'class' => '7а',
    'position' => 'Ученик',
    'createdAt' => 'Сегодня',
    'arrivalDate' => '1 сентября 2025 г.',
    'profile' => 'Дамир Шаваев',
    'login' => 'damirshavaev',
    'registeredAt' => '12 сентября 2025',
    'lastVisit' => '12 сентября 2025 в 21:13'
];

// Сообщение после сброса пароля
$resetMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset_password'])) {
    // Здесь должен быть ваш реальный функционал сброса пароля
    $resetMessage = 'Пароль успешно сброшен! Новый временный пароль отправлен на email пользователя.';
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Профиль: <?php echo htmlspecialchars($person['fullName']); ?></title>
    <style>
        body { margin:0; background:#fafafd; font-family:Verdana,Arial,sans-serif; }
        .container { max-width:900px; background:#fff; margin:36px auto; border-radius:10px; box-shadow:0 2px 14px #e8e6ee; padding:36px 46px; }
        h2 { color:#a770a2; margin-bottom:0; font-size:2rem;}
        .subtitle { color:#888; font-size:1rem; margin-left:8px;}
        .tabs { margin:18px 0 28px 0; padding-bottom:4px; border-bottom:1px solid #e4dbf3;}
        .tabs button { background: #f7f0fa; border: none; padding: 9px 20px; margin-right: 4px; border-radius: 6px 6px 0 0; color: #a770a2; font-weight: bold; cursor: pointer; font-size:1rem;}
        .tabs button.active { background: #fff; color: #5a2e69; border-bottom: 3px solid #a770a2;}
        .card { background:#f7f6fb; border-radius:7px; padding:22px 18px 10px 18px; margin-bottom:22px; box-shadow:0 .5px 2px #eee;}
        h3 { margin-top:0; font-size:1.13rem; color:#7d6692;}
        table { width:100%; border-collapse:collapse; margin-top:10px;}
        th, td { text-align:left; padding:6px 10px;}
        th { width:185px; color:#888; font-weight:normal;}
        .reset-password { border:1.6px solid #d9c6e3; background:#fcf8ff;}
        .reset-password button { background:#a770a2; color:#fff; border:none; padding:12px 26px; border-radius:6px; font-weight:600; font-size:1.02rem; cursor:pointer; margin-top:16px;}
        .msg { background:#e8ffe8; color:#228b22; padding:13px 18px; border-radius:7px; margin-bottom:16px; font-size:1.03rem; border:1px solid #bdf2bd;}
        @media(max-width:700px){.container{padding:15px;}}
    </style>
</head>
<body>
<div class="container">
    <div style="margin-bottom:8px;">
        <span style="font-size:0.84rem;color:#868;font-weight:500;">ГБОУ ДАТ "СОЛНЕЧНЫЙ ГОРОД" &gt; Ученики</span>
    </div>
    <h2><?php echo htmlspecialchars($person['fullName']); ?> <span class="subtitle">Ученик</span></h2>
    <div class="tabs">
        <button class="active">Обзор</button>
        <button>Личные данные</button>
        <button>Достижения</button>
        <button>Миграция</button>
        <button>Приказы</button>
        <button>Логин и пароль</button>
        <button>Родственники</button>
    </div>

    <div class="card">
        <h3>Личные данные</h3>
        <table>
            <tr><th>ФИО</th><td><?php echo $person['fullName']; ?></td></tr>
            <tr><th>Пол</th><td><?php echo $person['gender']; ?></td></tr>
            <tr><th>Возраст</th><td><?php echo $person['age']; ?></td></tr>
            <tr><th>Дата рождения</th><td><?php echo $person['birthDate']; ?></td></tr>
            <tr><th>Email</th><td><?php echo $person['email']; ?></td></tr>
            <tr><th>Дом. телефон</th><td><?php echo $person['homePhone']; ?></td></tr>
            <tr><th>Моб. телефон</th><td><?php echo $person['mobilePhone']; ?></td></tr>
            <tr><th>Раб. телефон</th><td><?php echo $person['workPhone']; ?></td></tr>
        </table>
    </div>

    <div class="card">
        <h3>В школе</h3>
        <table>
            <tr><th>Класс</th><td><?php echo $person['class']; ?></td></tr>
            <tr><th>Должность</th><td><?php echo $person['position']; ?></td></tr>
            <tr><th>Создан</th><td><?php echo $person['createdAt']; ?></td></tr>
            <tr><th>Дата прибытия в школу</th><td><?php echo $person['arrivalDate']; ?></td></tr>
        </table>
    </div>

    <div class="card">
        <h3>На сайте</h3>
        <table>
            <tr><th>Профиль</th><td><?php echo $person['profile']; ?></td></tr>
            <tr><th>Логин</th><td><?php echo $person['login']; ?></td></tr>
            <tr><th>Зарегистрирован</th><td><?php echo $person['registeredAt']; ?></td></tr>
            <tr><th>Последний визит</th><td><?php echo $person['lastVisit']; ?></td></tr>
        </table>
    </div>

    <div class="reset-password card">
        <h3>Сброс пароля</h3>
        <?php if ($resetMessage): ?>
            <div class="msg"><?php echo $resetMessage; ?></div>
        <?php endif; ?>
        <form method="post">
            <button type="submit" name="reset_password">Сбросить пароль</button>
        </form>
        <p style="margin-top:10px;color:#998;">Для первого входа в Дневник.ру необходимы логин и временный пароль.<br>
            Предоставьте пользователю указанные данные или вышлите приглашение на его электронную почту.</p>
    </div>
</div>
</body>
</html>
