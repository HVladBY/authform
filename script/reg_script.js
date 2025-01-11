let form = document.querySelector('#registration_form'); // Выбираем форму

/*form.addEventListener('submit', function (evt) { // При нажатии на кнопку выполняется :
    evt.preventDefault(); // Отменяется перезагрузка страницы

    let regData = { // Создается объект со свойствами name, login и password
        name: document.querySelector('input[name="reg_name"]').value,
        login: document.querySelector('input[name="reg_login"]').value,
        password: document.querySelector('input[name="reg_password"]').value,
    };
    // Создаем экземпляр класса XMLHttpRequest
    const request = new XMLHttpRequest();

// Указываем путь до файла на сервере, который будет обрабатывать наш запрос

    const url = "logic/register.php";

    // Составляем строку с данными

    const params = "login=" + encodeURIComponent(regData.login) + "&password=" + encodeURIComponent(regData.password) + "&name=" + encodeURIComponent(regData.name);

    /!* Указываем что соединение	у нас будет POST, говорим что путь к файлу в переменной url, и что запрос у нас
асинхронный*!/

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
});*/
form.addEventListener('submit', (e) => {
    e.preventDefault();

    let regData = { // Создается объект со свойствами name, login и password
        name: document.querySelector('input[name="reg_name"]').value,
        login: document.querySelector('input[name="reg_login"]').value,
        password: document.querySelector('input[name="reg_password"]').value,
    };
    const url = "logic/register.php";
    fetch(url,
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8',
                'Access-Control-Allow-Headers': 'Content-Type',
                'Access-Control-Allow-Origin': '*',
                'Access-Control-Request-Method': 'POST'
            },
            body: JSON.stringify(regData)
        }).then(response => response.json()).then(res => console.log(res));

})