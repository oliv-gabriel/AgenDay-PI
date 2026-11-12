const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

// Alternar entre Sou Cliente e Sou Estabelecimento
const btnCliente = document.getElementById('btn-cliente');
const btnEmpresa = document.getElementById('btn-empresa');
const inputTipoUsuario = document.getElementById('tipo_usuario');
const labelNome = document.getElementById('label_nome');
const labelContato = document.getElementById('label_contato');

function setTipoUsuario(tipo) {
	if (tipo === 'empresa') {
		btnEmpresa.classList.add('active');
		btnCliente.classList.remove('active');
		inputTipoUsuario.value = 'empresa';
		if (labelNome) labelNome.textContent = 'Nome do estabelecimento';
		if (labelContato) labelContato.textContent = 'Telefone comercial / WhatsApp';
	} else {
		btnCliente.classList.add('active');
		btnEmpresa.classList.remove('active');
		inputTipoUsuario.value = 'cliente';
		if (labelNome) labelNome.textContent = 'Seu nome completo';
		if (labelContato) labelContato.textContent = 'Telefone / WhatsApp';
	}
}

if (btnCliente && btnEmpresa && inputTipoUsuario) {
	btnCliente.addEventListener('click', () => setTipoUsuario('cliente'));
	btnEmpresa.addEventListener('click', () => setTipoUsuario('empresa'));

	if (inputTipoUsuario.value === 'empresa') {
		setTipoUsuario('empresa');
	} else {
		setTipoUsuario('cliente');
	}
}
