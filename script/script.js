let form = document.querySelector('#form'); // Выбираем форму

form.addEventListener('submit', function (evt) { // При нажатии на кнопку выполняется :
    evt.preventDefault(); // Отменяется перезагрузка страницы

    let formData = { // Создается объект со свойствами login и password
        login: document.querySelector('input[name="login"]').value,
        password: document.querySelector('input[name="password"]').value,
    };
    // Создаем экземпляр класса XMLHttpRequest
    const request = new XMLHttpRequest();

// Указываем путь до файла на сервере, который будет обрабатывать наш запрос

    const url = "logic/send.php";

    // Составляем строку с данными

    const params = "login=" + encodeURIComponent(formData.login) + "&password=" + encodeURIComponent(formData.password);

    /* Указываем что соединение	у нас будет POST, говорим что путь к файлу в переменной url, и что запрос у нас
асинхронный*/

    request.open("POST", url);

    //В заголовке говорим что тип передаваемых данных закодирован.

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Выводит в консоль результат обработки на сервере
    request.addEventListener("readystatechange", () => {
        if (request.readyState === 4 && request.status === 200) {
            console.log(request.responseText);
        }
    });

    //	Вот здесь мы и передаем строку с данными, которую формировали выше. И собственно выполняем запрос.
    request.send(params);
    }
    );

