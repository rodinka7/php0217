'use strict';

var regForm = document.forms.regForm;

function showError(el) {
    el.style.visibility = 'visible';
    setTimeout(function(){
        el.style.visibility = 'hidden';
    }, 3000);
    regForm.reset();
};

regForm.addEventListener('submit', function(e) {
    e.preventDefault();
    var target = e.target,
        alertEmpty = document.querySelector('.js-alertEmpty'),
        alertRegular = document.querySelector('.js-alertRegular'),
        regular = /^[0-9a-zA-Z]+$/,
        regPass = /^[0-9a-zA-Z]{6,20}$/,
        promise,
        data;

    if (!target.inputEmail3.value || !target.inputPassword3.value) {
       showError(alertEmpty);
       return;
    } else if (!regular.test(target.inputEmail3.value)) {
        showError(alertRegular);
        return;
    }

    data = new FormData(regForm);

    promise = new Promise(function(resolve, reject) {
        var xhr = new XMLHttpRequest();

        xhr.open('POST', 'php/auth.php');
        xhr.send(data);

        xhr.addEventListener('readystatechange', function(){
            if (this.readyState != 4) {
                return;
            }
            resolve(this.response);
        });
    });

    promise.then(function(response){
        var div = document.createElement('div'),
            container = document.querySelector('.container');
        
        div.className = 'alert alert-info';
        div.innerHTML = response;

        container.appendChild(div);

        showError(div);
        
        regForm.reset();

    });
});