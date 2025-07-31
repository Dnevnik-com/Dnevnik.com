<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Электронный дневник</title>
    <meta name="viewport" content="width=1200">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap');
        body { margin: 0; background: #f5f7fa; font-family: Arial, sans-serif; }
        header { background: #fff; border-bottom: 1px solid #eaeaea; padding: 0; }
        .header-inner {
            display: flex; align-items: center; max-width: 1200px; margin: 0 auto; height: 88px; justify-content: space-between;
        }
        .logo-block {
            display: flex; flex-direction: column; align-items: flex-start; justify-content: center; margin-right: 40px;
        }
        .logo-modern {
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 2.1rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            color: #2563eb;
            background: linear-gradient(90deg,#2563eb,#3bb0f9,#4fd37e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
            text-shadow: 0 2px 12px #2563eb22;
            display: block;
            line-height: 1.13;
        }
        .logo-sub {
            font-size: 1.06rem;
            color: #666;
            margin: 0;
            margin-top: 2px;
            line-height: 1;
            font-weight: 500;
            letter-spacing: 0.04em;
            font-family: 'Montserrat', Arial, sans-serif;
        }
        nav { display: flex; gap: 28px; align-items: center;}
        .nav-link {
            color: #222;
            text-decoration: none;
            font-size: 1rem;
            white-space: nowrap;
            display: inline-block;
            line-height: 1.1;
            font-family: inherit;
            font-weight: 500;
            padding: 0 3px;
        }
        .nav-link:hover { color: #1976d2; }
        .nav-link[href="#about"] {
            /* О компании всегда в одну строку */
            white-space: nowrap;
        }
        .header-btns { display: flex; gap: 8px; align-items: center; }
        .btn, .btn-outline {
            font-size: 1rem; border-radius: 6px; padding: 7px 18px; border: none; cursor: pointer; font-weight: 500;
            transition: background 0.17s, color 0.17s;
            white-space: nowrap;
            text-decoration: none !important;
            line-height: 1.2;
        }
        .btn { background: #2563eb; color: #fff; border: 1px solid #2563eb;}
        .btn:hover { background: #174bbd;}
        .btn-outline { background: #fff; color: #2563eb; border: 1px solid #2563eb;}
        .btn-outline:hover { background: #f3f7ff;}
        .header-btns a { display: inline-block; text-decoration: none !important; white-space: nowrap; }
        .main { max-width: 1200px; margin: 0 auto; background: #fff; border-radius: 0 0 12px 12px;}
        .hero { padding: 46px 0 18px 0; display: flex; align-items: center; flex-wrap: wrap;}
        .hero-left { flex: 1 1 400px; padding-left: 46px; min-width: 330px;}
        .hero-title { font-size: 2.7rem; font-weight: bold; line-height: 1.1; color: #2d3a5a; margin-bottom: 20px;}
        .hero-title span { color: #2563eb;}
        .hero-desc { font-size: 1.2rem; color: #334155; margin-bottom: 34px;}
        .hero-btns { display: flex; gap: 14px;}
        .hero-right { flex: 1 1 320px; min-width: 310px; display: flex; align-items: center; justify-content: center; transition: transform 0.3s cubic-bezier(.52,1.64,.37,.66);}
        .card-hero { background: #fff; border-radius: 18px; box-shadow: 0 6px 32px #2563eb18; padding: 28px 34px; min-width: 270px; transition: box-shadow 0.18s;}
        .card-row { display: flex; align-items: center; margin-bottom: 18px;}
        .card-row:last-child { margin-bottom: 0;}
        .card-icon { font-size: 1.45rem; margin-right: 12px; }
        .card-title { font-weight: 500; color: #3a52c1;}
        .card-status { margin-left: 12px; background: #e6f6e6; color: #2ea043; border-radius: 8px; font-size: 0.9rem; padding: 2px 9px;}
        /* Увеличение фото-карточки при наведении на "Начать работу" */
        .btn.hero-main:hover ~ .hero-right,
        .hero-btns .btn.hero-main:hover ~ .hero-right {
            /* если ~ не работает, используем JS, см. ниже */
        }
        /* ----------- spacing between blocks ----------- */
        .section { padding: 44px 0 10px 0; text-align: center; }
        .section-title { font-size: 2rem; font-weight: bold; color: #20294a; margin-bottom: 10px;}
        .section-desc { font-size: 1.1rem; color: #444; margin-bottom: 36px;}
        .stats {
            background: #f6fbff;
            padding: 38px 0 32px 0;
            display: flex;
            justify-content: center;
            gap: 100px;
            margin-bottom: 60px;
        }
        .main > .section { margin-top: 60px; }
        .stat { text-align: center; }
        .stat-value { font-size: 2.1rem; font-weight: bold; color: #2563eb;}
        .stat-label { font-size: 1.1rem; color: #222;}
        .features-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 36px 22px;
            max-width: 1000px;
            margin: 0 auto;
        }
        .feature-card {
            background: #f6f8fb;
            border-radius: 12px;
            padding: 30px 28px;
            width: 280px;
            box-shadow: 0 2px 6px #0001;
            transition: transform 0.18s cubic-bezier(.52,1.64,.37,.66), box-shadow 0.18s;
        }
        .feature-icon { font-size: 2.2rem; color: #2563eb; margin-bottom: 10px;}
        .feature-title { font-size: 1.18rem; font-weight: 600; margin-bottom: 7px;}
        .feature-desc { color: #333; font-size: 1rem;}
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 32px #2563eb26;
            background: #f3f7ff;
        }
        .benefits { background: linear-gradient(90deg, #3366ff 0%, #8f6cfa 100%); color: #fff; padding: 54px 0 40px 0; min-height: 330px;}
        .benefits-inner { max-width: 1200px; margin: 0 auto; display: flex; align-items: flex-start; gap: 70px;}
        .benefits-list { flex: 1 1 420px; }
        .benefits-title { font-size: 2rem; font-weight: bold; margin-bottom: 12px;}
        .benefits-desc { font-size: 1.1rem; margin-bottom: 26px;}
        .benefit-item { margin-bottom: 15px; font-size: 1.07rem;}
        .benefit-item .tick { color: #5eea57; font-size: 1.1em; margin-right: 6px;}
        .benefits-rating { flex: 1 1 340px; background: #fff2; border-radius: 16px; padding: 24px 28px;}
        .rating-title { font-weight: bold; font-size: 1.2rem; margin-bottom: 10px;}
        .stars { color: #ffe44d; font-size: 1.3rem; margin-bottom: 6px;}
        .rating-score { font-size: 1.17rem; color: #fff; margin-bottom: 18px;}
        .review { background: #fff3; border-radius: 10px; padding: 14px 15px; color: #fff; margin-bottom: 10px;}
        .review:last-child { margin-bottom: 0;}
        .review-author { font-size: 0.9rem; margin-top: 7px; opacity: 0.9;}
        .footer {
            background: #192035; color: #fff; padding: 40px 0 28px 0; margin-top: 0; font-size: 1rem;
        }
        .footer-inner { max-width: 1200px; margin: 0 auto; display: flex; gap: 70px; }
        .footer-col { flex: 1 1 250px; }
        .footer-logo { display: flex; flex-direction: column; align-items: flex-start; margin-bottom: 14px;}
        .footer-logo-row { display: flex; align-items: center; }
        .footer-title { font-weight: bold; font-size: 1.1rem; }
        .logo-modern.footer { font-size:1.25rem;}
        .footer-links { margin: 0; padding: 0; list-style: none;}
        .footer-links li { margin-bottom: 7px;}
        .footer-link { color: #fff; text-decoration: none; }
        .footer-link:hover { text-decoration: underline;}
        .footer-copy { margin-top: 35px; color: #bbb; font-size: 0.97rem;}
        .footer-bottom { text-align: center; color: #bbb; font-size: 0.95rem; margin-top: 16px;}
        @media (max-width: 1024px) {
            .main, .header-inner, .benefits-inner, .footer-inner { max-width: 98vw; }
            .section { padding-left: 13px; padding-right: 13px; }
            .hero { flex-direction: column; gap: 28px;}
            .hero-left { padding-left: 0;}
            .benefits-inner { flex-direction: column; gap: 34px;}
            .footer-inner { flex-direction: column; gap: 22px; }
            .features-grid { gap: 28px 0; }
        }
    </style>
</head>
<body>
<header>
    <div class="header-inner">
        <div class="logo-block">
            <span class="logo-modern">D<span style="color:#222;">н</span>евник</span>
            <span class="logo-sub">Современная платформа для образования</span>
        </div>
        <nav>
            <a href="#features" class="nav-link">Возможности</a>
            <a href="#benefits" class="nav-link">Преимущества</a>
            <a href="#footer" class="nav-link">Контакты</a>
            <a href="https://shimmering-lollipop-a5290b.netlify.app/" class="nav-link" target="_blank">О компании</a>
        </nav>
        <div class="header-btns">
            <a href="https://dnevnikcom.atlassian.net/servicedesk/customer/portal/1/group/38/create/50" class="btn-outline" target="_blank">Подключить ОО</a>
            <a href="http://dnevnik.com-v2.tilda.ws" class="btn">Войти</a>
            <a href="https://dnevnikcom.atlassian.net/servicedesk/customer/portals" class="btn-outline" target="_blank">Поддержка</a>
        </div>
    </div>
</header>
<main class="main">
    <!-- HERO -->
    <section class="hero">
        <div class="hero-left">
            <div class="hero-title">
                Цифровая трансформация <span>образования</span>
            </div>
            <div class="hero-desc">
                Современная платформа для управления образовательным процессом. Объединяем учителей, учеников и родителей в единой цифровой экосистеме.
            </div>
            <div class="hero-btns">
                <a href="http://dnevnikv2.com.tilda.ws/" class="btn hero-main" id="start-btn">Начать работу&nbsp;→</a>
                <a href="https://dnevnikcom.atlassian.net/servicedesk/customer/portal/1/group/38/create/50" class="btn-outline" target="_blank">Подключить школу</a>
            </div>
        </div>
        <div class="hero-right" id="hero-photo">
            <div class="card-hero">
                <div class="card-row">
                    <span class="card-icon">📚</span>
                    <span class="card-title">Математика</span>
                    <span class="card-status">Отлично</span>
                </div>
                <div class="card-row">
                    <span class="card-icon">📅</span>
                    <span class="card-title">Расписание</span>
                    <span class="card-status" style="background:#f3ecff; color:#8e4aff;">6 уроков сегодня</span>
                </div>
                <div class="card-row">
                    <span class="card-icon">💬</span>
                    <span class="card-title">Сообщения</span>
                    <span class="card-status" style="background:#e6f2ff; color:#2563eb;">3 новых уведомления</span>
                </div>
            </div>
        </div>
    </section>
    <!-- Stats -->
    <div class="stats">
        <div class="stat">
            <div class="stat-value">1000+</div>
            <div class="stat-label">Образовательных организаций</div>
        </div>
        <div class="stat">
            <div class="stat-value">500K+</div>
            <div class="stat-label">Активных пользователей</div>
        </div>
        <div class="stat">
            <div class="stat-value">99.9%</div>
            <div class="stat-label">Время работы системы</div>
        </div>
        <div class="stat">
            <div class="stat-value">24/7</div>
            <div class="stat-label">Техническая поддержка</div>
        </div>
    </div>
    <!-- Возможности платформы -->
    <section class="section" id="features">
        <div class="section-title">Возможности платформы</div>
        <div class="section-desc">Полный набор инструментов для эффективного управления образовательным процессом</div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">📖</div>
                <div class="feature-title">Электронный журнал</div>
                <div class="feature-desc">Ведение оценок, посещаемости и успеваемости учащихся в режиме реального времени</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🗓️</div>
                <div class="feature-title">Расписание уроков</div>
                <div class="feature-desc">Удобное планирование и отслеживание учебного процесса для всех участников</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💬</div>
                <div class="feature-title">Общение</div>
                <div class="feature-desc">Безопасная платформа для общения между учителями, учениками и родителями</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📈</div>
                <div class="feature-title">Аналитика</div>
                <div class="feature-desc">Подробная статистика успеваемости и прогресса каждого ученика</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🛡️</div>
                <div class="feature-title">Безопасность</div>
                <div class="feature-desc">Надежная защита персональных данных и соответствие требованиям ФЗ-152</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🧑‍💼</div>
                <div class="feature-title">Управление</div>
                <div class="feature-desc">Эффективные инструменты администрирования для руководства школы</div>
            </div>
        </div>
    </section>
    <!-- Преимущества -->
    <section class="benefits" id="benefits">
        <div class="benefits-inner">
            <div class="benefits-list">
                <div class="benefits-title">Преимущества использования</div>
                <div class="benefits-desc">Наша платформа помогает образовательным организациям повысить эффективность и качество образовательного процесса.</div>
                <div class="benefit-item"><span class="tick">✔️</span>Экономия времени на ведении документооборота</div>
                <div class="benefit-item"><span class="tick">✔️</span>Повышение качества образовательного процесса</div>
                <div class="benefit-item"><span class="tick">✔️</span>Улучшение взаимодействия с родителями</div>
                <div class="benefit-item"><span class="tick">✔️</span>Автоматизация отчетности</div>
                <div class="benefit-item"><span class="tick">✔️</span>Мобильный доступ 24/7</div>
                <div class="benefit-item"><span class="tick">✔️</span>Интеграция с государственными системами</div>
            </div>
            <div class="benefits-rating">
                <div class="rating-title">Рейтинг платформы</div>
                <div class="stars">★★★★★</div>
                <div class="rating-score">4.9 из 5 на основе 2,847 отзывов</div>
                <div class="review">
                    "Отличная платформа! Значительно упростила работу с документооборотом."<br>
                    <div class="review-author">— Директор МБОУ СОШ №15</div>
                </div>
                <div class="review">
                    "Родители довольны возможностью отслеживать успеваемость в реальном времени."<br>
                    <div class="review-author">— Классный руководитель</div>
                </div>
            </div>
        </div>
    </section>
</main>
<footer class="footer" id="footer">
    <div class="footer-inner">
        <div class="footer-col">
            <div class="footer-logo">
                <div class="footer-logo-row">
                    <span class="logo-modern footer">D<span style="color:#fff;">н</span>евник</span>
                </div>
                <span class="logo-sub" style="color:#cfcfcf; font-size:1rem; margin:2px 0 0 2px;">Современная платформа для образования</span>
            </div>
            <div style="color: #ccc; margin-top:4px;"></div>
            <div style="font-size:1rem; margin-top: 16px;">
                Мы создаем инновационные решения для цифровой трансформации образования, объединяя всех участников образовательного процесса.
            </div>
        </div>
        <div class="footer-col">
            <div class="footer-title">Продукт</div>
            <ul class="footer-links">
                <li><a href="#features" class="footer-link">Возможности</a></li>
                <li><a href="#benefits" class="footer-link">Преимущества</a></li>
                <li><a href="#" class="footer-link">Тарифы</a></li>
                <li><a href="#" class="footer-link">API</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <div class="footer-title">Поддержка</div>
            <ul class="footer-links">
                <li><a href="https://dnevnikcom.atlassian.net/servicedesk/customer/portals" class="footer-link" target="_blank">Центр поддержки</a></li>
                <li><a href="#" class="footer-link">Документация</a></li>
                <li><a href="#" class="footer-link">Обучение</a></li>
                <li><a href="#footer" class="footer-link">Контакты</a></li>
                <li><a href="https://shimmering-lollipop-a5290b.netlify.app/" class="footer-link" target="_blank">О компании</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        Ежедневно с 09:00 до 18:00 (кроме выходных)<br>
        © 2018-2025 ООО «Дневник»<br>
        <a href="#" class="footer-link" style="color:#bbb;">Политика конфиденциальности</a> &nbsp;|&nbsp;
        <a href="#" class="footer-link" style="color:#bbb;">Условия использования</a>
    </div>
</footer>
<script>
    // Кнопка "Начать работу" увеличивает фото справа при наведении
    const startBtn = document.getElementById('start-btn');
    const heroPhoto = document.getElementById('hero-photo');

    if(startBtn && heroPhoto) {
        startBtn.addEventListener('mouseenter', () => {
            heroPhoto.style.transform = 'scale(1.08)';
            heroPhoto.style.transition = 'transform 0.33s cubic-bezier(.52,1.64,.37,.66)';
            heroPhoto.style.zIndex = '10';
        });
        startBtn.addEventListener('mouseleave', () => {
            heroPhoto.style.transform = 'scale(1)';
            heroPhoto.style.transition = 'transform 0.28s cubic-bezier(.52,1.64,.37,.66)';
            heroPhoto.style.zIndex = '';
        });
    }
</script>
</body>
</html>
