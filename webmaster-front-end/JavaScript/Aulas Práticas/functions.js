window.onload = function () {
	var semaforo = ['verde', 'vermelho', 'amarelo'];
	
	var opcaoAtivaDoSemaforo = semaforo[0];
	
	switch(opcaoAtivaDoSemaforo) {
		case 'verde':
			alert('Pode passar à vontade!');
		break;
		case 'vermelho':
			alert('Pare!');
		break;case 'amarelo':
			alert('Tenha cautela!');
		break;
		default:
			alert('O semáforo está quebrado!');
	}
}