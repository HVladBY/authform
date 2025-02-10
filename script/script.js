function doorOpen() {
    const image = document.querySelector('.image');
    image.src = "img/door_open.jpg";
}
function redirect() {
    window.location.href = "../authform/site.html";
}
let form = document.querySelector('#form'); // Выбираем форму  
form.addEventListener('submit', (e) => { // При нажатии на кнопку
    e.preventDefault(); // Отменяется действие по умолчанию(перезагрузка страницы)

    let userData = { // Создается объект со свойствами login и password
        login: document.querySelector('input[name="login"]').value,
        password: document.querySelector('input[name="password"]').value,
    };
    const url = "logic/send.php";
    fetch(url, // Посылается запрос
        {
            method: 'POST',
            headers: { // Заголовки
                'Content-Type': 'application/json;charset=utf-8',
                'Access-Control-Allow-Headers': 'Content-Type',
                'Access-Control-Allow-Origin': '*',
                'Access-Control-Request-Method': 'POST'
            },
            body: JSON.stringify(userData) // Тело запроса
        }).then(response => response.json()).then((text) => { // Действия, в случае изменения состояния (получение ответа)
         console.log(text);
        let message = document.querySelector(".message");
        message.innerText = text; // Выводим текст
         if (text === "Здравствуйте! Вы успешно вошли в систему") {
             doorOpen();
             setTimeout(redirect, 2000);
         }
    });
})

