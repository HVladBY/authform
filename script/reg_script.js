function redirect() {
    window.location.href = "../authform/index.html";
}
let form = document.querySelector('#registration_form'); // Выбираем форму
form.addEventListener('submit', (e) => {
    e.preventDefault();

    let regData = { // Создается объект со свойствами name, login и password и email
        name: document.querySelector('input[name="reg_name"]').value,
        login: document.querySelector('input[name="reg_login"]').value,
        password: document.querySelector('input[name="reg_password"]').value,
        email: document.querySelector('input[name="reg_email"]').value,
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
        }).then(response => response.json()).then((res) => {
            console.log(res);
            let message = document.querySelector(".message");
            message.innerText = res;
            if (res === 'Поздравляю! Вы успешно зарегистрировались') {
                setTimeout(redirect, 2000);
            }
        });

})