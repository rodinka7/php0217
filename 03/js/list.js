'use strict';
window.addEventListener('load', function() {
	var promise = new Promise(function(resolve, reject) {
        var xhr = new XMLHttpRequest();

        xhr.open('POST', 'php/list.php');
        xhr.send();

        xhr.addEventListener('readystatechange', function(){
            if (this.readyState != 4) {
                return;
            }
            resolve(this.response);
        });
    });

    promise.then(function(response){
    	console.log('Пришел ответ с сервера');
    	var formInfo = document.forms.formInfo;

		function showError(el) {
		    el.style.visibility = 'visible';
		    setTimeout(function(){
		        el.style.visibility = 'hidden';
		    }, 3000);
		    formInfo.reset();
		};

		formInfo.addEventListener('submit', function(e) {
		    e.preventDefault();
		    var target = e.target,
		        alertEmpty = document.querySelector('.js-alertEmpty'),
		        promise,
		        data;

		    if (!target.login.value || !target.name.value || !target.date.value || !target.desc.value || !target.file.value) {
		       showError(alertEmpty);
		       return;
		    }

		    data = new FormData(formInfo);

		    promise = new Promise(function(resolve, reject) {
		        var xhr = new XMLHttpRequest();

		        xhr.open('POST', 'php/list.php');
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
    });
});
