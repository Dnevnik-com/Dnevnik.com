<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление школами</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        header {
            background-color: #0078d7;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
        }

        .form-container {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-container input, .form-container button {
            padding: 10px;
            margin: 5px 0;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-container button {
            background-color: #0078d7;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #005bb5;
        }

        .table-container {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #f1f1f1;
        }

        .delete-button, .edit-button {
            background-color: #ff4d4d;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .edit-button {
            background-color: #0078d7;
        }

        .delete-button:hover {
            background-color: #e60000;
        }

        .edit-button:hover {
            background-color: #005bb5;
        }

        .message {
            display: none;
            margin-top: 20px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Управление школами</h1>
    </header>

    <div class="content">
        <!-- Форма для добавления и редактирования заявок -->
        <div class="form-container">
            <h3 id="form-title">Добавить заявку</h3>
            <input type="text" id="schoolName" placeholder="Название школы" required>
            <input type="text" id="location" placeholder="Населённый пункт" required>
            <input type="text" id="type" placeholder="Тип ОО" required>
            <input type="datetime-local" id="createdAt" placeholder="Дата создания" required>
            <button onclick="saveSchool()">Сохранить</button>
        </div>

        <!-- Таблица со школами -->
        <div class="table-container">
            <table id="schoolsTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Населённый пункт</th>
                        <th>Тип ОО</th>
                        <th>Создана</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Данные будут загружены из localStorage -->
                </tbody>
            </table>
        </div>

        <div id="message" class="message">
            Письмо по удалению Организации отправлено
        </div>
    </div>

    <script>
        let schoolId = 60773; // Начальный ID для новых школ
        let editIndex = null; // Индекс редактируемой строки

        // Инициализация данных
        const initialData = [
            {
                id: 60770,
                name: 'Бизнес-школа "Founderschool"',
                location: 'Кокшетау (Акмолинская область, Казахстан)',
                type: 'Дополнительное образование детей',
                createdAt: '2022-08-24T09:32'
            },
            {
                id: 60771,
                name: 'ZIYATKER TURAN',
                location: 'Карасуйский район (Шымкент, Казахстан)',
                type: 'Общеобразовательная организация',
                createdAt: '2022-08-17T04:06'
            },
            {
                id: 60772,
                name: 'ТОО "Нұр Бала - 2021"',
                location: 'Аул Когершин (Келесский район, Туркестанская область)',
                type: 'Общеобразовательная организация',
                createdAt: '2022-08-15T04:07'
            }
        ];

        // Загрузка данных из localStorage
        function loadSchools() {
            const storedData = localStorage.getItem('schools');
            return storedData ? JSON.parse(storedData) : initialData;
        }

        // Сохранение данных в localStorage
        function saveSchools(data) {
            localStorage.setItem('schools', JSON.stringify(data));
        }

        // Отображение данных в таблице
        function renderTable() {
            const schools = loadSchools();
            const tableBody = document.getElementById('schoolsTable').getElementsByTagName('tbody')[0];
            tableBody.innerHTML = ''; // Очистка таблицы

            schools.forEach((school, index) => {
                const row = tableBody.insertRow();
                row.innerHTML = `
                    <td>${school.id}</td>
                    <td>${school.name}</td>
                    <td>${school.location}</td>
                    <td>${school.type}</td>
                    <td>${new Date(school.createdAt).toLocaleString()}</td>
                    <td>
                        <button class="edit-button" onclick="editSchool(${index})">Редактировать</button>
                        <button class="delete-button" onclick="deleteSchool(${index})">Удалить</button>
                    </td>
                `;
            });
        }

        // Сохранение новой или редактируемой школы
        function saveSchool() {
            const name = document.getElementById('schoolName').value;
            const location = document.getElementById('location').value;
            const type = document.getElementById('type').value;
            const createdAt = document.getElementById('createdAt').value;

            if (name && location && type && createdAt) {
                const schools = loadSchools();

                if (editIndex !== null) {
                    // Редактирование существующей школы
                    schools[editIndex] = { ...schools[editIndex], name, location, type, createdAt };
                    editIndex = null;
                    document.getElementById('form-title').textContent = 'Добавить заявку';
                } else {
                    // Добавление новой школы
                    schools.push({ id: schoolId++, name, location, type, createdAt });
                }

                saveSchools(schools);
                renderTable();
                clearForm();
            } else {
                alert('Пожалуйста, заполните все поля.');
            }
        }

        // Редактирование школы
        function editSchool(index) {
            const schools = loadSchools();
            const school = schools[index];

            document.getElementById('schoolName').value = school.name;
            document.getElementById('location').value = school.location;
            document.getElementById('type').value = school.type;
            document.getElementById('createdAt').value = school.createdAt;
            document.getElementById('form-title').textContent = 'Редактировать заявку';

            editIndex = index;
        }

        // Удаление школы
        function deleteSchool(index) {
            const schools = loadSchools();
            schools.splice(index, 1); // Удаление элемента из массива
            saveSchools(schools); // Сохранение изменений
            renderTable(); // Перерисовка таблицы
            showMessage(); // Показ сообщения
        }

        // Очистка формы
        function clearForm() {
            document.getElementById('schoolName').value = '';
            document.getElementById('location').value = '';
            document.getElementById('type').value = '';
            document.getElementById('createdAt').value = '';
        }

        // Показ сообщения
        function showMessage() {
            const message = document.getElementById('message');
            message.style.display = 'block';
            setTimeout(() => {
                message.style.display = 'none';
            }, 3000); // Скрыть сообщение через 3 секунды
        }

        // Инициализация страницы
        document.addEventListener('DOMContentLoaded', () => {
            renderTable();
        });
    </script>
</body>
</html>
