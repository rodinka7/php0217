'use strict';
var form = document.forms.form;

btn.addEventListener('click', function(e){
	e.preventDefault();
	if (!form.name.value || !form.art.value 
		|| !form.producer.value || !form.count.value
		|| !form.price.value || !form.category.value) {
		alert('Заполните все поля!');
	} else {
		var data = {
			"name": form.name.value,
			"art": form.art.value,
			"producer": form.producer.value,
			"count": form.count.value,
			"price": form.price.value,
			"category": form.category.value
		}

		var p = new Promise(function(resolve, reject) {
			var xhr = new XMLHttpRequest(),
				body = JSON.stringify(data);
			
			xhr.open('POST', 'rest.php');

			xhr.send(body);

			xhr.onreadystatechange = function() { 
			  if (xhr.readyState != 4) return;

			  if (xhr.status != 200) {
			    alert(xhr.status + ': ' + xhr.statusText);
			  } else {
			    resolve(xhr.response);
			  }
			}
		});

		p.then(function(res) {
			var result = res;
			
			alert(result);
			form.reset();
		})
	} 
})

btnReceive.addEventListener('click', function(e){
	e.preventDefault();

	var p = new Promise(function(resolve, reject) {
		var xhr = new XMLHttpRequest();
		
		xhr.open('GET', 'rest.php');
		xhr.send();

		xhr.onreadystatechange = function() { 
		  if (xhr.readyState != 4) return;

		  if (xhr.status != 200) {
		    alert(xhr.status + ': ' + xhr.statusText);
		  } else {
		    resolve(xhr.response);
		  }
		}
	});

	p.then(function(res) {
		var result = JSON.parse(res),
			table = document.createElement('table');

		table.className = 'table';

		for (var item of result) {
			var tr = document.createElement('tr');

			tr.innerHTML = `<td>${item['name']}</td><td>${item['art']}</td></tr>
			<td>${item['producer']}</td><td>${item['count']} шт.</td><td>${item['price']} долл.</td>
			<td>${item['category']}</td>`;

			table.appendChild(tr);
		}

		body.appendChild(table);
	})
})