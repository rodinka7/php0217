'use strict';

orderBtn.addEventListener('click', function(e){
	e.preventDefault();
	
	var wrapper = document.createElement('div');
	wrapper.className = 'wrapperContainer';
	
	document.body.appendChild(wrapper);

	formContainer.style.visibility = 'visible';
});

btnClose.addEventListener('click', function(e){
	e.preventDefault();

	var wrapper = document.querySelector('.wrapperContainer');
	document.body.removeChild(wrapper);

	formContainer.style.visibility = 'hidden';
});

btnSubmit.addEventListener('click', function(e){
	e.preventDefault();
	var data,
		form = document.querySelector('#form'),
		p;

	message.innerHTML = 'Отправка сообщения ... ';
	data = new FormData(form);

	p = new Promise(function(resolve){
		var xhr = new XMLHttpRequest();

		xhr.open('POST', '/orders/show');

		xhr.send(data);

		xhr.onreadystatechange = function() {
		  if (this.readyState != 4) return;

		  if (this.status != 200) {
		    alert( 'ошибка: ' + (this.status ? this.statusText : 'запрос не удался') );
		    return;
		  } else {
		  	resolve(xhr.response);
		  }
		}
	});

	p.then(function(res) {
		if (res) {
			message.innerHTML = res;
		}
	})

})