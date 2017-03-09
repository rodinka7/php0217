/**
 * Created by arku on 07.03.2017.
 */
var regForm = document.forms.regForm;

function showError(el) {
    el.style.visibility = 'visible';
    setTimeout(function(){
        el.style.visibility = 'hidden';
    }, 3000);
};

regForm.addEventListener('submit', function(e) {
    e.preventDefault();
    var target = e.target,
        alertEmpty = document.querySelector('.js-alertEmpty'),
        alertPass = document.querySelector('.js-alertPass'),
        alertRegular = document.querySelector('.js-alertRegular'),
        alertRegPass = document.querySelector('.js-alertRegPass'),
        regular = /^[0-9a-zA-Z]+$/,
        regPass = /^[0-9a-zA-Z]{6,20}$/,
        promise,
        data;

    if (!target.inputEmail3.value || !target.inputPassword3.value || !target.inputPassword4.value) {
       showError(alertEmpty);
    } else if (!regular.test(target.inputEmail3.value)) {
        showError(alertRegular);
    } else if (!regPass.test(target.inputPassword3.value)) {
        showError(alertRegPass);
    } else if (target.inputPassword3.value != target.inputPassword4.value) {
        showError(alertPass);
    }

    data = {
        login: target.inputEmail3.value,
        password: target.inputPassword3.value 
    };

    promise = new Promise(function(resolve, reject) {
        var xhr = new XMLHttpRequest();

        xhr.open('POST', './main.php');
        xhr.send(data);

        xhr.addEventListener('', function(){
            resolve(response);
        });
    });

    promise.then(function(response){
        console.log(response);
        alert('Данные успешно отправлены на сервер!');

    })

    regForm.reset();
});

var selector = "div.starter-template>h1";

var zagolovok = $(selector);
var zagovol_data = zagolovok.html();
zagolovok.html('ahaha');

console.log(zagovol_data);

$('#returnback').on('click', function(){
    // zagolovok.html(zagovol_data)

    $.ajax({
        url: '/data.php',
        method: 'post',
        data: {
            superdata: zagovol_data //$_POST['superdata']
        }
    }).done(function (data) {
        var json = JSON.parse(data);  //JSON.stringify()
        var str = json.name + ' - ' + json.occupation + json.superdata;
        zagolovok.html(str)
    });
});

