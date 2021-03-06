
<b>pojaluysta sdelayte sleduyushee: </b>

1) git clone ...
2) composer update
3) sozdat env file i nastroit detali baza danni
4) php artisan migrate
5) sozdat images papku na public papku
6) php artisan db:seed
7) php artisan serve

<h1>Тестовое задание для PHP разработчика</h1>
<h3>Описание</h3>
Необходимо написать небольшой сайт - статейник. Макет не принципиален. Можно взять bootstrap или любой другой фреймворк. Так же можно использовать любые JS фреймворки. Главное, чтобы на страницах присутствовали все компоненты.

Среднее время выполнения: 4 часа.

Можно не реализовывать хранение изображений. Для заглушек можно юзать сервис https://placeholder.com/ или подобный (чтобы не заморачиваться с нарезкой). Либо сделать 2 изображения (миниатюра и обычное) и переиспользовать их.

Всю логику реализуем встроенным функционалом Laravel.

Результат необходимо загрузить в публичный репозиторий GitHub.


<h3>Стек</h3>

PHP 7.2+
Laravel 7+

<h3>Разделы сайта</h3>

Главная страница
Каталог статей

<h3>Страницы сайта</h3>

Главная страница Url: /
Каталог статей Url: /articles
Страница статьи Url: /articles/{slug}

<h3>API методы</h3>

При реализации API методов учтите, что онлайн блога заранее не известен. Ваша реализация должна позволять избежать блокировок БД в случае огромного количества входящих запросов (допустим 1 млн входящих запрос на инкрементацию счетчика просмотров). Это требования необходимо вам для организации правильного хранения лайков и просмотров. Ответ: application/json

<h3>Инкрементирование счетчика лайка</h3>

Ответ: новое значение счетчика

<h3>Инкрементирование счетчика просмотров</h3>
Ответ: новое значение счетчика


<h3>Создание комментария</h3>

Вводные данные: Подразумеваем, что данный механизм очень медленный (100500 операций). Для тестов можно использовать sleep(10). Необходимо реализовать исполнение в фоновом режиме с возможностью повторного выполнения в случае ошибки исполнения (Exception).

Поля:

subject. Varchar(255).
body. LongText

Ответы:

ValidationException. Если не заполнено одно из полей.
Success. Любой, главное чтобы с 200 кодом.


<h3>Компоненты</h3>

Навигационное меню:

Меню должно генерироваться. В меню должен быть помечен текущий раздел сайта.

Последние статьи:

6 добавленных статей. LIFO.


<h3>Пейджинация</h3>
Стандартная пейджинация Laravel (https://laravel.com/docs/7.x/pagination#introduction)

Миниатюра статьи:
Блок состоит из следующих элементов:

миниатюра обложки статьи:

заголовок статьи

<h3>краткое описание статьи:</h3>

Тег статьи:
Ссылка. Состоит из url и label.

Счетчик лайков статьи:
Элемент является кнопкой, на которой в качестве label написано число. При клике на кнопку отправляется AJAX запрос, инкрементирующий счетчик. В ответе на запрос возвращается новое значение, которое необходимо отобразить в label.

Счетчик просмотров статьи:
Текстовый элемент, отображающие текущий счетчик просмотров. Через 5 секунд после открытия статьи отправляется запрос, инкрементирующий счетчик. В ответе на запрос возвращается новое значение, которое необходимо отобразить в элементе.

Форма комментария:
Форма, состоящая из 2х полей:

Тема сообщения:

Текст сообщения
При нажатии на кнопку "Отправить" отправляется AJAX запрос. При успешной обработке форма заменяется на плашку "Ваше сообщение успешно отправлено".

Описание страниц:

Главная страница
Компоненты:

Навигационное меню. Активный пункт "Главная страница".
Последние статьи
Каталог статей
Компоненты:

Навигационное меню. Активный пункт "Каталог статей".
Листинг статей. LIFO. 10 миниатюр статей на страницу
Пейджинация
Статья
Компоненты:

Навигационное меню. Активный пункт "Каталог статей".
Обложка статьи
Текст статьи
Теги статьи
Счетчик лайков статьи
Счетчик просмотров статьи
Форма коментария

<h3>Развертывание</h3>
Развертывание должно производиться через стандартные механизмы:

git clone ...
php artisan migrate
php artisan db:seed
php artisan serve
То есть никакие импорты SQL файлов \ загрузка zip архивов - не приемлемы.

<h3>Тестирование<h3>
ArticleSeed. Должен сгенерировать 20 статей с рандомной датой и рандомным текстом. Используем Faker.
ArticleTagSeed. Должен сгенерировать некоторое количество тегов, чтобы хотя бы 1 был в каждой статье.



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
