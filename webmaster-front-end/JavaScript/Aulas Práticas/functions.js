window.onload = function () {
	var tabuada = 1;
	
	while(tabuada <= 10) {
		
		calculaTabuada(tabuada);
		
		tabuada++;
		
	}
}

function calculaTabuada(numero) {
	
	for (var i = 0; i <= 10; i++) {
		
		document.write(numero + ' x ' + i + ' = ' + (numero * i) + '<br>');
		
	}
	
	document.write('========================<br>');
	
}