// CARGAR INPUT A PARTIR DE UN SELECt
$(document).ready(function () {
	//$('#lista1').val(1);
	recargarLista();
	$('#lista1').change(function () {
		recargarLista();
	});
})

function recargarLista() {
	$.ajax({
		type: "POST",
		url: "../controlador/datos.php",
		data: "pais=" + $('#lista1').val(),
		success: function (r) {
			$('#codtelefono_pais').html(r);
		}
	});
}



// CARGAR INPUT A PARTIR DE UN SELECt
$(document).ready(function () {
	//$('#lista1').val(1);
	recargarLista_legal();
	$('#pais_legal').change(function () {
		recargarLista_legal();
	});
})

function recargarLista_legal() {
	$.ajax({
		type: "POST",
		url: "../controlador/pais.php",
		data: "pais_legal=" + $('#pais_legal').val(),
		success: function (r) {
			$('#codtelefono_legal').html(r);
		}
	});
}



// FUNCIONES VALIDAR EMAIL -->
function valideKeyEmail(evt) {
	// el código es la representación ASCII decimal de la tecla presionada.
	var code = (evt.which) ? evt.which : evt.keyCode;
	if ((code == 46) || (code == 64) || (code == 95) || (code == 45)) { // backspace.
		return true;
	} else if ((code >= 48 && code <= 57) || (code >= 97 && code <= 122) || (code >= 65 && code <= 90)) { // is a number.
		return true;
	} else { // other keys.
		return false;
	}
}



//ESCONDER Y MOSTRAR UN FORMULARIO 
function mostrarform(id) {
	if (id == "1") {
		$("#representante_legal").show();
		$("#posee_apoderado").show();
		//$("#titulo_apoderado_ecuador").hide();
		//$("#apoderado").show();
		$("#persona_juridica_nacional_extranjera").hide();
		$("#persona_juridica_extranjera").hide();
		$("#persona_natural").show();
	}
	if (id == "2") {
		$("#representante_legal").show();
		$("#posee_apoderado").show();
		//$("#titulo_apoderado").hide();
		//$("#titulo_apoderado_ecuador").show();
		//$("#apoderado").show();
		$("#persona_juridica_nacional_extranjera").hide();
		$("#persona_juridica_extranjera").hide();
		$("#persona_natural").show();
	}
	if (id == "3") {
		$("#representante_legal").show();
		$("#posee_apoderado").show();
		//$("#titulo_apoderado").show();
		//$("#titulo_apoderado_ecuador").hide();
		//$("#apoderado").show();
		$("#persona_juridica_nacional_extranjera").show();
		$("#persona_juridica_extranjera").hide();
		$("#persona_natural").hide();
	}
	if (id == "4") {
		$("#representante_legal").show();
		$("#posee_apoderado").show();
		//$("#titulo_apoderado").hide();
		//$("#titulo_apoderado_ecuador").show();
		//$("#apoderado").show();
		$("#persona_juridica_nacional_extranjera").show();
		$("#persona_juridica_extranjera").hide();
		$("#persona_natural").hide();
	}
	if (id == "5") {
		$("#representante_legal").show();
		$("#posee_apoderado").show();
		//$("#titulo_apoderado").hide();
		//$("#titulo_apoderado_ecuador").show();
		//$("#apoderado").show();
		$("#persona_juridica_nacional_extranjera").hide();
		$("#persona_juridica_extranjera").show();
		$("#persona_natural").hide();
	}
}



// MUESTRA LOS DATOS DE APODERADO
function postulante(id) {

	if (id == "SI") {
		$("#posee_apoderado").hide();
		$("#titulo_apoderado").show();
		$("#apoderado").show();
		//document.getElementById("opcion_apoderadoSi").checked = false;
		document.getElementById("nombre_apoderado").setAttribute("required", "");
		document.getElementById("vigencia_apoderado").setAttribute("required", "");
		document.getElementById("direccion_apoderado").setAttribute("required", "");
		document.getElementById("ciudad_apoderado").setAttribute("required", "");
		document.getElementById("telefono_apoderado").setAttribute("required", "");
		document.getElementById("correo_apoderado").setAttribute("required", "");
	}
	if (id == "NO") {
		$("#posee_apoderado").show();
		$("#titulo_apoderado").hide();
		$("#apoderado").hide();
		document.getElementById("nombre_apoderado").removeAttribute("required", "");
		document.getElementById("vigencia_apoderado").removeAttribute("required", "");
		document.getElementById("direccion_apoderado").removeAttribute("required", "");
		document.getElementById("ciudad_apoderado").removeAttribute("required", "");
		document.getElementById("telefono_apoderado").removeAttribute("required", "");
		document.getElementById("correo_apoderado").removeAttribute("required", "");

		document.getElementById("nombre_apoderado").value = "";
		document.getElementById("vigencia_apoderado").value = "";
		document.getElementById("direccion_apoderado").value = "";
		document.getElementById("ciudad_apoderado").value = "";
		document.getElementById("telefono_apoderado").value = "";
		document.getElementById("correo_apoderado").value = "";
	}
}



//UTILIZAR PARA EL CAMPO FECHA
function fecha(event, el) { //Validar nombre
	//Obteniendo posicion del cursor 
	var val = el.value; //Valor de la caja de texto
	var pos = val.slice(0, el.selectionStart).length;
	var out = ''; //Salida
	var filtro = '1234567890';
	var v = 0; //Contador de caracteres validos
	//Filtar solo los numeros
	for (var i = 0; i < val.length; i++) {
		if (filtro.indexOf(val.charAt(i)) != -1) {
			v++;
			out += val.charAt(i);

			//Agregando un / cada 4 caracteres
			if ((v == 2) || (v == 4) || (v == 9))
				out += '/';
		}
	}
	//Reemplazando el valor
	el.value = out;
	//En caso de modificar un numero reposicionar el cursor
	if (event.keyCode == 8) { //Tecla borrar precionada
		el.selectionStart = pos;
		el.selectionEnd = pos;
	}
}



//PARA PONER LOS NUMEROS FIJO O MOVILES
function telefono(event, el) { //Validar nombre
	//Obteniendo posicion del cursor 
	var val = el.value; //Valor de la caja de texto
	var pos = val.slice(0, el.selectionStart).length;
	var out = ''; //Salida
	var filtro = '1234567890';
	var v = 0; //Contador de caracteres validos
	//Filtar solo los numeros
	for (var i = 0; i < val.length; i++) {
		if (filtro.indexOf(val.charAt(i)) != -1) {
			v++;
			out += val.charAt(i);

			//Agregando un / cada 4 caracteres
			if ((v == 3) || (v == 6) || (v == 12))
				out += '-';
		}
	}
	//Reemplazando el valor
	el.value = out;
	//En caso de modificar un numero reposicionar el cursor
	if (event.keyCode == 8) { //Tecla borrar precionada
		el.selectionStart = pos;
		el.selectionEnd = pos;
	}
}



// SOLO NUMEROS --->
function numeros(e) {
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = "1234567890";
	especiales = [8, 37, 39, 46];

	tecla_especial = false
	for (var i in especiales) {
		if (key == especiales[i]) {
			tecla_especial = true;
			break;
		}
	}

	if (letras.indexOf(tecla) == -1 && !tecla_especial)
		return false;
}



// FUNCIONES VALIDAR NUMEROS, LETRAS Y EL GUION -->
function validaciudad(evt) {
	// el código es la representación ASCII decimal de la tecla presionada.
	var code = (evt.which) ? evt.which : evt.keyCode;
	if ((code == 45 || code == 32) || (code == 209 || code == 241)) { // punto
		return true;
	} else if ((code >= 48 && code <= 57) || (code >= 97 && code <= 122) || (code >= 65 && code <= 90)) { // is a number.
		return true;
	} else { // other keys.
		return false;
	}
}



// FUNCIONES VALIDAR NUMEROS Y PUNTOS -->
function validaCantidad(evt) {
	// el código es la representación ASCII decimal de la tecla presionada.
	var code = (evt.which) ? evt.which : evt.keyCode;
	if (code == 46 || code == 44) { // punto
		return true;
	} else if (code >= 48 && code <= 57) { // is a number.
		return true;
	} else { // other keys.
		return false;
	}
}



// ESCONDER CHECHED --->
function mostrar(dato) {
	if (dato == "DISTRIBUIDOR") {
		document.getElementById("distribuidor_opciones").style.display = "block";
	}
	if (dato == "FABRICANTE") {
		document.getElementById("distribuidor_opciones").style.display = "none";
		document.getElementById("distribuidor_postulante1").checked = false;
		document.getElementById("distribuidor_postulante2").checked = false;
	}

}



/* VER CALENDARIO --->
			$(function() {
				$("#campofecha").datepicker({
					numberOfMonths: 2,
					showButtonPanel: true
				});
			});*/
// VALIDAR SOLO NUMEROS --->
function numeros(e) {
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = " 0123456789";
	especiales = [8, 37, 39, 46];
	tecla_especial = false
	for (var i in especiales) {
		if (key == especiales[i]) {
			tecla_especial = true;
			break;
		}
	}
	if (letras.indexOf(tecla) == -1 && !tecla_especial)
		return false;
}



// VALIDAR SOLO LETRAS--->
function soloLetras(e) {
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
	especiales = "8-37-39-46";
	tecla_especial = false
	for (var i in especiales) {
		if (key == especiales[i]) {
			tecla_especial = true;
			break;
		}
	}
	if (letras.indexOf(tecla) == -1 && !tecla_especial) {
		return false;
	}
}



// FUNCIONES VALIDAR SoLO LETRAS -->
function validaletras(evt) {
	// el código es la representación ASCII decimal de la tecla presionada.
	var code = (evt.which) ? evt.which : evt.keyCode;
	if (code == 32) { // backspace.
		return true;
	} else if ((code >= 97 && code <= 122) || (code >= 65 && code <= 90)) { // 
		return true;
	} else { // other keys.
		return false;
	}
}



// FUNCIONES VALIDAR SLO NUMEROS, LETRAS Y EL PUNTO y el / -->
function valideKey(evt) {
	// el código es la representación ASCII decimal de la tecla presionada.
	var code = (evt.which) ? evt.which : evt.keyCode;
	if ((code == 46) || (code == 47)) {
		return true;
	} else if ((code >= 48 && code <= 57) || (code >= 97 && code <= 122) || (code >= 65 && code <= 90)) { // is a number.
		return true;
	} else { // other keys.
		return false;
	}
}



// FUNCIONES VALIDAR SLO NUMEROS, LETRAS Y EL PUNTO y el / -->
function valideExtension(evt) {
	// el código es la representación ASCII decimal de la tecla presionada.
	var code = (evt.which) ? evt.which : evt.keyCode;
	if (code == 47) {
		return true;
	} else if ((code >= 48 && code <= 57) || (code >= 97 && code <= 122) || (code >= 65 && code <= 90)) { // is a number.
		return true;
	} else { // other keys.
		return false;
	}
}



// FUNCIONES VALIDAR SLO NUMEROS, LETRAS Y EL PUNTO -->
function valideSiglas(evt) {
	// el código es la representación ASCII decimal de la tecla presionada.
	var code = (evt.which) ? evt.which : evt.keyCode;
	if ((code == 46) || (code == 47)) {
		return true;
	} else if ((code >= 48 && code <= 57) || (code >= 97 && code <= 122) || (code >= 65 && code <= 90)) { // is a number.
		return true;
	} else { // other keys.
		return false;
	}
}



const formulario = document.getElementById('postulante_principal');
const inputs = document.querySelectorAll('#postulante_principal input');
const selectors = document.querySelectorAll('#postulante_principal select');



const expresiones = {
	siglas_postulante: /^[a-zA-Z0-9(/.)]{3,20}$/,
	razonsoc_postulante: /^[1-5]$/,
	lista1: /^[a-zA-Z-()-,-áéíóúÁÉÍÓÚàèìòùÀÈÌÒÙ\u00f1\u00d1\ ]{4,43}$/,
	//distribuidor_postulante: /^[a-zA-Z]{2,13}$/,
	actividad_postulante: /^[a-zA-Z]{1,13}$/,
	provincia_postulante: /^[a-zA-Z\ ]{3,25}$/,
	ciudad_postulante: /^[a-zA-Z\u00f1\u00d1\ ]{4,25}$/,
	direcPrinOrig_postulante: /^[a-zA-Z0-9-ZñÑáéíóúÁÉÍÓÚ\u00f1\u00d1\ -]{6,155}$/,
	direcSecOrig_postulante: /^[a-zA-Z0-9-ZñÑáéíóúÁÉÍÓÚ\u00f1\u00d1\ -]{6,155}$/,
	direcNumOrig_postulante: /^[a-zA-Z0-9-ZñÑáéíóúÁÉÍÓÚ\u00f1\u00d1\ -]{2,115}$/,
	direcPisoOrig_postulante: /^[a-zA-Z0-9-ZñÑáéíóúÁÉÍÓÚ\u00f1\u00d1\ -./]{4,144}$/,
	direcPrinEcu_postulante: /^[a-zA-Z0-9-ZñÑáéíóúÁÉÍÓÚ\u00f1\u00d1\ -]{6,155}$/,
	direcSecEcu_postulante: /^[a-zA-Z0-9-ZñÑáéíóúÁÉÍÓÚ\u00f1\u00d1\ -]{6,155}$/,
	direcNumEcu_postulante: /^[a-zA-Z0-9-ZñÑáéíóúÁÉÍÓÚ\u00f1\u00d1\ -]{2,115}$/,
	direcPisoEcu_postulante: /^[a-zA-Z0-9-ZñÑáéíóúÁÉÍÓÚ\u00f1\u00d1\ -./]{4,144}$/,
	teleforig_postulante: /^[0-9_-]{7,15}$/,
	extorig_postulante: /^[a-zA-Z_/\d]{3,15}$/,
	telefecu_postulante: /^[0-9_-]{7,14}$/,
	extecu_postulante: /^[a-zA-Z_/\d]{3,15}$/,
	paginaweb_postulante: /^http[s]?:\/\/[\w]+([\.]+[\w]+)+$/,
	nombre_legal: /^[a-zA-Z-áéíóúÁÉÍÓÚàèìòùÀÈÌÒÙ\u00f1\u00d1\ ]{5,143}$/,
	vigencia_legal: /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/,
	pais_legal: /^[a-zA-Z-áéíóúÁÉÍÓÚàèìòùÀÈÌÒÙ\u00f1\u00d1\ ]{4,43}$/,
	direccion_legal: /^[a-zA-Z0-9-ZñÑáéíóúÁÉÍÓÚ\ -]{6,155}$/,
	ciudad_legal: /^[a-zA-Z\u00f1\u00d1\ ]{4,125}$/,
	telefono_legal: /^[0-9_-]{7,14}$/,
	correo_legal: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	nombre_apoderado: /^[a-zA-Z\u00f1\u00d1\ ]{5,143}$/,
	vigencia_apoderado: /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/,
	direccion_apoderado: /^[a-zA-Z0-9-ZñÑáéíóúÁÉÍÓÚ\u00f1\u00d1\ -]{6,155}$/,
	ciudad_apoderado: /^[a-zA-Z\u00f1\u00d1 ]{4,25}$/,
	telefono_apoderado: /^[0-9_-]{7,14}$/,
	correo_apoderado: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	capital_privado: /^[0-9_._,]{4,15}$/,
	capital_estatal: /^[0-9_._,]{4,15}$/,
	capital_mixto: /^[0-9_._,]{4,15}$/,
	estado_decurrente: /^[0-9]{4,4}$/,
	estado_balance: /^[a-zA-Z\u00f1\u00d1 ]{4,25}$/,
	//cedula_postulante: /^[a-zA-Z0-9]{0,13}$/ // Letras y numeros.
	//password_postulante: /^[a-zA-Z0-9_.+-]{8,16}$/, // 4 a 12 digitos.
	//correo_postulante: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	//validarcelular: /^\+?\d{2}(\s\d{3}){2}\s\d{4}$/,
}



const campos = {
	siglas_postulante: false,
	razonsoc_postulante: false,
	lista1: false,
	//distribuidor_postulante:false,
	actividad_postulante: false,
	provincia_postulante: false,
	ciudad_postulante: false,
	direcPrinOrig_postulante: false,
	direcSecOrig_postulante: false,
	direcNumOrig_postulante: false,
	direcPisoOrig_postulante: false,
	direcPrinEcu_postulante: false,
	direcSecEcu_postulante: false,
	direcNumEcu_postulante: false,
	direcPisoEcu_postulante: false,
	teleforig_postulante: false,
	extorig_postulante: false,
	telefecu_postulante: false,
	extecu_postulante: false,
	paginaweb_postulante: false,
	nombre_legal: false,
	vigencia_legal: false,
	pais_legal: false,
	direccion_legal: false,
	ciudad_legal: false,
	telefono_legal: false,
	correo_legal: false,
	nombre_apoderado: false,
	vigencia_apoderado: false,
	direccion_apoderado: false,
	ciudad_apoderado: false,
	telefono_apoderado: false,
	correo_apoderado: false,
	capital_privado: false,
	capital_estatal: false,
	capital_mixto: false,
	estado_decurrente: false,
	estado_balance: false
}



const validarformulario = (e) => {
	switch (e.target.name) {
		case "siglas_postulante":
			validarcampo(expresiones.siglas_postulante, e.target, 'siglas_postulante');
			break;
			//case "distribuidor_postulante":
			//	validarcampo(expresiones.distribuidor_postulante, e.target, 'distribuidor_postulante');
			//	break;
		case "provincia_postulante":
			validarcampo(expresiones.provincia_postulante, e.target, 'provincia_postulante');
			break;
		case "ciudad_postulante":
			validarcampo(expresiones.ciudad_postulante, e.target, 'ciudad_postulante');
			break;
		case "direcPrinOrig_postulante":
			validarcampo(expresiones.direcPrinOrig_postulante, e.target, 'direcPrinOrig_postulante');
			break;
		case "direcSecOrig_postulante":
			validarcampo(expresiones.direcSecOrig_postulante, e.target, 'direcSecOrig_postulante');
			break;
		case "direcNumOrig_postulante":
			validarcampo(expresiones.direcNumOrig_postulante, e.target, 'direcNumOrig_postulante');
			break;
		case "direcPisoOrig_postulante":
			validarcampo(expresiones.direcPisoOrig_postulante, e.target, 'direcPisoOrig_postulante');
			break;
		case "direcPrinEcu_postulante":
			validarcampo(expresiones.direcPrinEcu_postulante, e.target, 'direcPrinEcu_postulante');
			break;
		case "direcSecEcu_postulante":
			validarcampo(expresiones.direcSecEcu_postulante, e.target, 'direcSecEcu_postulante');
			break;
		case "direcNumEcu_postulante":
			validarcampo(expresiones.direcNumEcu_postulante, e.target, 'direcNumEcu_postulante');
			break;
		case "direcPisoEcu_postulante":
			validarcampo(expresiones.direcPisoEcu_postulante, e.target, 'direcPisoEcu_postulante');
			break;
		case "teleforig_postulante":
			validarcampo(expresiones.teleforig_postulante, e.target, 'teleforig_postulante');
			break;
		case "extorig_postulante":
			validarcampo(expresiones.extorig_postulante, e.target, 'extorig_postulante');
			break;
		case "telefecu_postulante":
			validarcampo(expresiones.telefecu_postulante, e.target, 'telefecu_postulante');
			break;
		case "extecu_postulante":
			validarcampo(expresiones.extecu_postulante, e.target, 'extecu_postulante');
			break;
		case "paginaweb_postulante":
			validarcampo(expresiones.paginaweb_postulante, e.target, 'paginaweb_postulante');
			break;
		case "nombre_legal":
			validarcampo(expresiones.nombre_legal, e.target, 'nombre_legal');
			break;
		case "vigencia_legal":
			validarcampo(expresiones.vigencia_legal, e.target, 'vigencia_legal');
			break;
		case "direccion_legal":
			validarcampo(expresiones.direccion_legal, e.target, 'direccion_legal');
			break;
		case "ciudad_legal":
			validarcampo(expresiones.ciudad_legal, e.target, 'ciudad_legal');
			break;
		case "telefono_legal":
			validarcampo(expresiones.telefono_legal, e.target, 'telefono_legal');
			break;
		case "correo_legal":
			validarcampo(expresiones.correo_legal, e.target, 'correo_legal');
			break;
		case "nombre_apoderado":
			validarcampo(expresiones.nombre_apoderado, e.target, 'nombre_apoderado');
			break;
		case "vigencia_apoderado":
			validarcampo(expresiones.vigencia_apoderado, e.target, 'vigencia_apoderado');
			break;
		case "direccion_apoderado":
			validarcampo(expresiones.direccion_apoderado, e.target, 'direccion_apoderado');
			break;
		case "ciudad_apoderado":
			validarcampo(expresiones.ciudad_apoderado, e.target, 'ciudad_apoderado');
			break;
		case "telefono_apoderado":
			validarcampo(expresiones.telefono_apoderado, e.target, 'telefono_apoderado');
			break;
		case "correo_apoderado":
			validarcampo(expresiones.correo_apoderado, e.target, 'correo_apoderado');
			break;
		case "capital_privado":
			validarcampo(expresiones.capital_privado, e.target, 'capital_privado');
			break;
		case "capital_estatal":
			validarcampo(expresiones.capital_estatal, e.target, 'capital_estatal');
			break;
		case "capital_mixto":
			validarcampo(expresiones.capital_mixto, e.target, 'capital_mixto');
			break;
		case "estado_decurrente":
			validarcampo(expresiones.estado_decurrente, e.target, 'estado_decurrente');
			break;
	}
}



const validarselect = (e) => {
	switch (e.target.name) {
		case "razonsoc_postulante":
			if (expresiones.razonsoc_postulante.test(e.target.value)) {
				document.getElementById('grupo__razonsoc_postulante').classList.remove('formulario__grupo-incorrecto');
				document.getElementById('grupo__razonsoc_postulante').classList.add('formulario__grupo-correcto');
				document.querySelector('#grupo__razonsoc_postulante i').classList.remove('fa-times-circle');
				document.querySelector('#grupo__razonsoc_postulante i').classList.add('fa-check-circle');
				document.querySelector('#grupo__razonsoc_postulante .formulario__input-error').classList.remove('formulario__input-error-activo');
			} else {
				document.getElementById('grupo__razonsoc_postulante').classList.add('formulario__grupo-incorrecto');
				document.getElementById('grupo__razonsoc_postulante').classList.remove('formulario__grupo-correcto');
				document.querySelector('#grupo__razonsoc_postulante i').classList.remove('fa-check-circle');
				document.querySelector('#grupo__razonsoc_postulante i').classList.add('fa-times-circle');
				document.querySelector('#grupo__razonsoc_postulante .formulario__input-error').classList.add('formulario__input-error-activo');
			}
			break;
		case "actividad_postulante":
			if (expresiones.actividad_postulante.test(e.target.value)) {
				document.getElementById('grupo__actividad_postulante').classList.remove('formulario__grupo-incorrecto');
				document.getElementById('grupo__actividad_postulante').classList.add('formulario__grupo-correcto');
				document.querySelector('#grupo__actividad_postulante i').classList.remove('fa-times-circle');
				document.querySelector('#grupo__actividad_postulante i').classList.add('fa-check-circle');
				document.querySelector('#grupo__actividad_postulante .formulario__input-error').classList.remove('formulario__input-error-activo');
			} else {
				document.getElementById('grupo__actividad_postulante').classList.add('formulario__grupo-incorrecto');
				document.getElementById('grupo__actividad_postulante').classList.remove('formulario__grupo-correcto');
				document.querySelector('#grupo__actividad_postulante i').classList.remove('fa-check-circle');
				document.querySelector('#grupo__actividad_postulante i').classList.add('fa-times-circle');
				document.querySelector('#grupo__actividad_postulante .formulario__input-error').classList.add('formulario__input-error-activo');
			}
			break;
		case "lista1":
			if (expresiones.lista1.test(e.target.value)) {
				document.getElementById('grupo__lista1').classList.remove('formulario__grupo-incorrecto');
				document.getElementById('grupo__lista1').classList.add('formulario__grupo-correcto');
				document.querySelector(`#grupo__lista1 i`).classList.remove('fa-times-circle');
				document.querySelector(`#grupo__lista1 i`).classList.add('fa-check-circle');
				document.querySelector(`#grupo__lista1 .formulario__input-error`).classList.remove('formulario__input-error-activo');
			} else {
				document.getElementById('grupo__lista1').classList.add('formulario__grupo-incorrecto');
				document.getElementById('grupo__lista1').classList.remove('formulario__grupo-correcto');
				document.querySelector(`#grupo__lista1 i`).classList.remove('fa-check-circle');
				document.querySelector(`#grupo__lista1 i`).classList.add('fa-times-circle');
				document.querySelector(`#grupo__lista1 .formulario__input-error`).classList.add('formulario__input-error-activo');
			}
			break;
		case "pais_legal":
			if (expresiones.pais_legal.test(e.target.value)) {
				document.getElementById('grupo__pais_legal').classList.remove('formulario__grupo-incorrecto');
				document.getElementById('grupo__pais_legal').classList.add('formulario__grupo-correcto');
				document.querySelector('#grupo__pais_legal i').classList.remove('fa-times-circle');
				document.querySelector('#grupo__pais_legal i').classList.add('fa-check-circle');
				document.querySelector('#grupo__pais_legal .formulario__input-error').classList.remove('formulario__input-error-activo');
			} else {
				document.getElementById('grupo__pais_legal').classList.add('formulario__grupo-incorrecto');
				document.getElementById('grupo__pais_legal').classList.remove('formulario__grupo-correcto');
				document.querySelector('#grupo__pais_legal i').classList.remove('fa-check-circle');
				document.querySelector('#grupo__pais_legal i').classList.add('fa-times-circle');
				document.querySelector('#grupo__pais_legal .formulario__input-error').classList.add('formulario__input-error-activo');
			}
			break;
		case "estado_balance":
			if (expresiones.estado_balance.test(e.target.value)) {
				document.getElementById('grupo__estado_balance').classList.remove('formulario__grupo-incorrecto');
				document.getElementById('grupo__estado_balance').classList.add('formulario__grupo-correcto');
				document.querySelector('#grupo__estado_balance i').classList.remove('fa-times-circle');
				document.querySelector('#grupo__estado_balance i').classList.add('fa-check-circle');
				document.querySelector('#grupo__estado_balance .formulario__input-error').classList.remove('formulario__input-error-activo');
			} else {
				document.getElementById('grupo__estado_balance').classList.add('formulario__grupo-incorrecto');
				document.getElementById('grupo__estado_balance').classList.remove('formulario__grupo-correcto');
				document.querySelector('#grupo__estado_balance i').classList.remove('fa-check-circle');
				document.querySelector('#grupo__estado_balance i').classList.add('fa-times-circle');
				document.querySelector('#grupo__estado_balance .formulario__input-error').classList.add('formulario__input-error-activo');
			}
			break;
	}
}



const validarcampo = (expresion, input, campo) => {
	if (expresion.test(input.value)) {
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}


selectors.forEach((select) => {
	select.addEventListener('click', validarselect);
	select.addEventListener('keyup', validarselect);
	select.addEventListener('blur', validarselect);

});


inputs.forEach((input) => {
	input.addEventListener('click', validarformulario);
	input.addEventListener('keyup', validarformulario);
	input.addEventListener('blur', validarformulario);
});



///  INPUT TIPO FILE
const create = str => document.createElement(str);
const files = document.querySelectorAll('.fancy-file');
Array.from(files).forEach(
	f => {
		const label = create('label');
		const span_text = create('span');
		const span_name = create('span');
		const span_button = create('span');

		label.htmlFor = f.id;

		span_text.className = 'fancy-file__fancy-file-name';
		span_button.className = 'fancy-file__fancy-file-button';

		span_name.innerHTML = f.dataset.empty || 'Ningun archivo seleccionado';
		span_button.innerHTML = f.dataset.button || 'Buscar';

		label.appendChild(span_text);
		label.appendChild(span_button);
		span_text.appendChild(span_name);
		f.parentNode.appendChild(label);

		span_name.style.width = (span_text.clientWidth - 20) + 'px';

		f.addEventListener('change', e => {
			if (f.files.length == 0) {
				span_name.innerHTML = f.dataset.empty || 'Ningún archivo seleccionado ; ';
			} else if (f.files.length > 1) {
				span_name.innerHTML = f.files.length + ' archivos seleccionados';
			} else {
				span_name.innerHTML = f.files[0].name;
			}
		});
	}
);


// PONER REQUERIDO A LOS ARCHIVOS ADJUNTOS
function validarAdjuntos() {
	var id = document.getElementById("razonsoc_postulante").value;
	if ((id == 1) || (id == 2)) {
		document.getElementById("archivo").setAttribute("required", "");
		document.getElementById("archivo1").setAttribute("required", "");
		document.getElementById("archivo2").setAttribute("required", "");
		document.getElementById("archivo3").setAttribute("required", "");
		document.getElementById("archivo4").setAttribute("required", "");
		document.getElementById("archivo5").setAttribute("required", "");
		document.getElementById("archivo6").setAttribute("required", "");

		document.getElementById("persona_natural1").setAttribute("required", "");
		document.getElementById("persona_natural2").setAttribute("required", "");
		document.getElementById("persona_natural3").setAttribute("required", "");

		document.getElementById("persona_juridica1").removeAttribute("required", "");
		document.getElementById("persona_juridica2").removeAttribute("required", "");
		document.getElementById("persona_juridica3").removeAttribute("required", "");
		document.getElementById("persona_juridica4").removeAttribute("required", "");
		document.getElementById("persona_juridica5").removeAttribute("required", "");
		document.getElementById("persona_juridica6").removeAttribute("required", "");

		document.getElementById("persona_no_domic1").removeAttribute("required", "");
		document.getElementById("persona_no_domic2").removeAttribute("required", "");
		document.getElementById("persona_no_domic3").removeAttribute("required", "");
	} else if ((id == 3) || (id == 4)) {
		document.getElementById("archivo").setAttribute("required", "");
		document.getElementById("archivo1").setAttribute("required", "");
		document.getElementById("archivo2").setAttribute("required", "");
		document.getElementById("archivo3").setAttribute("required", "");
		document.getElementById("archivo4").setAttribute("required", "");
		document.getElementById("archivo5").setAttribute("required", "");
		document.getElementById("archivo6").setAttribute("required", "");

		document.getElementById("persona_juridica1").setAttribute("required", "");
		document.getElementById("persona_juridica2").setAttribute("required", "");
		document.getElementById("persona_juridica3").setAttribute("required", "");
		document.getElementById("persona_juridica4").setAttribute("required", "");
		document.getElementById("persona_juridica5").setAttribute("required", "");
		document.getElementById("persona_juridica6").setAttribute("required", "");

		document.getElementById("persona_natural1").removeAttribute("required", "");
		document.getElementById("persona_natural2").removeAttribute("required", "");
		document.getElementById("persona_natural3").removeAttribute("required", "");

		document.getElementById("persona_no_domic1").removeAttribute("required", "");
		document.getElementById("persona_no_domic2").removeAttribute("required", "");
		document.getElementById("persona_no_domic3").removeAttribute("required", "");
	}
	if (id == 5) {
		document.getElementById("archivo").setAttribute("required", "");
		document.getElementById("archivo1").setAttribute("required", "");
		document.getElementById("archivo2").setAttribute("required", "");
		document.getElementById("archivo3").setAttribute("required", "");
		document.getElementById("archivo4").setAttribute("required", "");
		document.getElementById("archivo5").setAttribute("required", "");
		document.getElementById("archivo6").setAttribute("required", "");

		document.getElementById("persona_no_domic1").setAttribute("required", "");
		document.getElementById("persona_no_domic2").setAttribute("required", "");
		document.getElementById("persona_no_domic3").setAttribute("required", "");

		document.getElementById("persona_juridica1").removeAttribute("required", "");
		document.getElementById("persona_juridica2").removeAttribute("required", "");
		document.getElementById("persona_juridica3").removeAttribute("required", "");
		document.getElementById("persona_juridica4").removeAttribute("required", "");
		document.getElementById("persona_juridica5").removeAttribute("required", "");
		document.getElementById("persona_juridica6").removeAttribute("required", "");

		document.getElementById("persona_natural1").removeAttribute("required", "");
		document.getElementById("persona_natural2").removeAttribute("required", "");
		document.getElementById("persona_natural3").removeAttribute("required", "");
	}
}


// CAMPOS DINAMICOS DEL TELEFONO
$(document).ready(function () {
	var maxField = 3;
	var addButton = $('#add_button');
	var wrapper = $('#field_wrapper');
	var fieldHTML = '<div><br><input type="text" class="formulario__input_tel" id="telefecu_postulante[]" name="telefecu_postulante[]" onkeypress="return numeros(event)"/><a href="javascript:void(0);" class="btn btn-danger" id="remove_button"><i class=""></i></a></div>';
	var x = 1;
	$(addButton).click(function () {
		if (x < maxField) {
			x++;
			$(wrapper).append(fieldHTML);
		}
	});
	$(wrapper).on('click', '#remove_button', function (e) {
		e.preventDefault();
		$(this).parent('div').remove();
		x--;
	});
});



// VALIDAR EL AÑO ACTUAL
const ano = () => {
	const fecha = document.getElementById("estado_decurrente").value;
	let actual = new Date();
	let antes = new Date();
	antes.setMonth(antes.getMonth() - 24); //PARA PODER RESTAR DOS AÑOS A LA FECHA
	if ((fecha > antes.getFullYear()) && (fecha < actual.getFullYear())) { //getFullYear: captura el año de una fecha 
		document.getElementById("guardacalificacion").removeAttribute("disabled", "");
		document.getElementById("estado_balance").removeAttribute("disabled", "");
		document.getElementById("estado_balance").focus();
	} else {
		swal({
			title: "Estados Financieros",
			text: "¡¡ Los estados financieros deben ser del año inmediato anterior. La información NO PODRÁ SER GENERADA!! ",
			icon: "warning",
			dangerMode: true,
		});
		document.getElementById("guardacalificacion").setAttribute("disabled", "");
		document.getElementById("estado_balance").setAttribute("disabled", "");
		document.getElementById("estado_decurrente").value = "";
	}
}



//VALIDAR LA VIGENVIA DE LA FECHA DEL REPRESENTANTE
const vigenciaLegal = () => {
	const vigencia_legal = document.getElementById('vigencia_legal').value;
	var mesLegal = vigencia_legal.substring(3, 5); //El año-mes
	var diaLegal = vigencia_legal.substring(0, 2); //El año-mes
	var anoLegal = vigencia_legal.substring(vigencia_legal.lastIndexOf("/") + 1); //El día

	const Factual = new Date();
	//const Ffutura = new Date();
	//Ffutura.setMonth(Ffutura.getMonth() + 60);
	//var FactualF=(Factual.getDate() + "/" + ((Factual.getMonth() + 1) + "/" + Factual.getFullYear()));

	//PARA SACAR EL MES Y AUMENTARLE 0
	var mesActual = (Factual.getMonth() + 1).toString();
	if (mesActual.length <= 1) {
		mesActual = "0" + mesActual;
	}
	// PARA SACAR EL DIA Y AUMENTAR EL CERO
	var diaActual = Factual.getDate().toString();
	if (diaActual.length <= 1) {
		diaActual = "0" + diaActual;
	}
	//PARA UNIR LA FECHA COMPLETA CON LAS SEPARACIONES
	var anoActual = Factual.getFullYear();


	if (anoLegal >= anoActual) {
		if (mesLegal > mesActual) {
			document.getElementById("nombre_legal").removeAttribute("disabled", "");
			document.getElementById("pais_legal").removeAttribute("disabled", "");
			document.getElementById("direccion_legal").removeAttribute("disabled", "");
			document.getElementById("ciudad_legal").removeAttribute("disabled", "");
			document.getElementById("telefono_legal").removeAttribute("disabled", "");
			document.getElementById("correo_legal").removeAttribute("disabled", "");
			document.getElementById("vigencia_legal").focus();
		} else {
			if (mesLegal === mesActual) {
				if (diaLegal > diaActual) {
					document.getElementById("nombre_legal").removeAttribute("disabled", "");
					document.getElementById("pais_legal").removeAttribute("disabled", "");
					document.getElementById("direccion_legal").removeAttribute("disabled", "");
					document.getElementById("ciudad_legal").removeAttribute("disabled", "");
					document.getElementById("telefono_legal").removeAttribute("disabled", "");
					document.getElementById("correo_legal").removeAttribute("disabled", "");
					document.getElementById("vigencia_legal").focus();
				} else {
					swal({
						title: "Datos de Representante Legal",
						text: "La vigencia del nombramiento esta CADUCADA",
						icon: "warning",
						dangerMode: true,
					});
					document.getElementById("nombre_legal").setAttribute("disabled", "");
					document.getElementById("pais_legal").setAttribute("disabled", "");
					document.getElementById("direccion_legal").setAttribute("disabled", "");
					document.getElementById("ciudad_legal").setAttribute("disabled", "");
					document.getElementById("telefono_legal").setAttribute("disabled", "");
					document.getElementById("correo_legal").setAttribute("disabled", "");
					document.getElementById("vigencia_legal").value = "";
					document.getElementById("vigencia_legal").focus();
				}
			} else {
				swal({
					title: "Datos de Representante ",
					text: "La vigencia del nombramiento esta CADUCADA",
					icon: "warning",
					dangerMode: true,
				});
				document.getElementById("nombre_legal").setAttribute("disabled", "");
				document.getElementById("pais_legal").setAttribute("disabled", "");
				document.getElementById("direccion_legal").setAttribute("disabled", "");
				document.getElementById("ciudad_legal").setAttribute("disabled", "");
				document.getElementById("telefono_legal").setAttribute("disabled", "");
				document.getElementById("correo_legal").setAttribute("disabled", "");
				document.getElementById("vigencia_legal").value = "";
				document.getElementById("vigencia_legal").focus();
			}
		}
	} else {
		swal({
			title: "Datos de Representante Legal",
			text: "La vigencia del nombramiento esta CADUCADA",
			icon: "warning",
			dangerMode: true,
		});
		document.getElementById("nombre_legal").setAttribute("disabled", "");
		document.getElementById("pais_legal").setAttribute("disabled", "");
		document.getElementById("direccion_legal").setAttribute("disabled", "");
		document.getElementById("ciudad_legal").setAttribute("disabled", "");
		document.getElementById("telefono_legal").setAttribute("disabled", "");
		document.getElementById("correo_legal").setAttribute("disabled", "");
		document.getElementById("vigencia_legal").value = "";
		document.getElementById("vigencia_legal").focus();
	}
}



//VALIDAR LA FECHA COMPLETA 
function vigenciaApoderado() {
	const vigencia_apoderado = document.getElementById('vigencia_apoderado').value;
	const Factual = new Date();

	//Ffutura.setMonth(Ffutura.getMonth() + 60);
	var mesLegal = vigencia_apoderado.substring(3, 5); //El año-mes
	var diaLegal = vigencia_apoderado.substring(0, 2); //El año-mes
	var anoLegal = vigencia_apoderado.substring(vigencia_apoderado.lastIndexOf("/") + 1); //El día

	//PARA SACAR EL MES Y AUMENTARLE 0
	var mesActual = (Factual.getMonth() + 1).toString();
	if (mesActual.length <= 1) {
		mesActual = "0" + mesActual;
	}
	// PARA SACAR EL DIA Y AUMENTAR EL CERO
	var diaActual = Factual.getDate().toString();
	if (diaActual.length <= 1) {
		diaActual = "0" + diaActual;
	}

	var anoActual = Factual.getFullYear();
	//PARA UNIR LA FECHA COMPLETA CON LAS SEPARACIONES
	//var FactualF = dia + "/" + mes + "/" + Factual.getFullYear();

	if (anoLegal >= anoActual) {
		if (mesLegal > mesActual) {
			document.getElementById("nombre_apoderado").removeAttribute("disabled", "");
			document.getElementById("direccion_apoderado").removeAttribute("disabled", "");
			document.getElementById("ciudad_apoderado").removeAttribute("disabled", "");
			document.getElementById("telefono_apoderado").removeAttribute("disabled", "");
			document.getElementById("correo_apoderado").removeAttribute("disabled", "");
			document.getElementById("vigencia_apoderado").focus();
		} else {
			if (mesLegal === mesActual) {
				if (diaLegal > diaActual) {
					document.getElementById("nombre_apoderado").removeAttribute("disabled", "");
					document.getElementById("direccion_apoderado").removeAttribute("disabled", "");
					document.getElementById("ciudad_apoderado").removeAttribute("disabled", "");
					document.getElementById("telefono_apoderado").removeAttribute("disabled", "");
					document.getElementById("correo_apoderado").removeAttribute("disabled", "");
					document.getElementById("vigencia_apoderado").focus();
				} else {
					swal({
						title: "Datos del Apoderado",
						text: "La vigencia del nombramiento esta CADUCADA",
						icon: "warning",
						dangerMode: true,
					});
					document.getElementById("nombre_apoderado").setAttribute("disabled", "");
					document.getElementById("direccion_apoderado").setAttribute("disabled", "");
					document.getElementById("ciudad_apoderado").setAttribute("disabled", "");
					document.getElementById("correo_apoderado").setAttribute("disabled", "");
					document.getElementById("vigencia_apoderado").focus();
					document.getElementById("vigencia_apoderado").value = "";
				}
			} else {
				swal({
					title: "Datos del Apoderado",
					text: "La vigencia del nombramiento esta CADUCADA",
					icon: "warning",
					dangerMode: true,
				});
				document.getElementById("nombre_apoderado").setAttribute("disabled", "");
				document.getElementById("direccion_apoderado").setAttribute("disabled", "");
				document.getElementById("ciudad_apoderado").setAttribute("disabled", "");
				document.getElementById("correo_apoderado").setAttribute("disabled", "");
				document.getElementById("vigencia_apoderado").focus();
				document.getElementById("vigencia_apoderado").value = "";
			}
		}
	} else {
		swal({
			title: "Datos del Apoderado",
			text: "La vigencia del nombramiento esta CADUCADA",
			icon: "warning",
			dangerMode: true,
		});
		document.getElementById("nombre_apoderado").setAttribute("disabled", "");
		document.getElementById("direccion_apoderado").setAttribute("disabled", "");
		document.getElementById("ciudad_apoderado").setAttribute("disabled", "");
		document.getElementById("correo_apoderado").setAttribute("disabled", "");
		document.getElementById("vigencia_apoderado").focus();
		document.getElementById("vigencia_apoderado").value = "";
	}
}


/*document.addEventListener("DOMContentLoaded", function() {
	document.getElementById("postulante_principal").addEventListener('submit', validarFormulario); 
  });
function validarFormulario(evento) {
	evento.preventDefault();
	var id = document.getElementById("razonsoc_postulante").value;
	if (id == 1) {
		var razonsoc_postulante = document.getElementById('razonsoc_postulante').value;
		console.log(razonsoc_postulante);
		var usuario_id = document.getElementById('usuario_id').value;
		console.log(usuario_id);
		var siglas_postulante = document.getElementById('siglas_postulante').value;
		console.log(siglas_postulante);
		var cedula_usuario = document.getElementById('cedula_usuario').value;
		console.log(cedula_usuario);
		var nombre_usuario = document.getElementById('nombre_usuario').value;
		var actividad_postulante = document.getElementById('actividad_postulante').value;
		var distribuidor_postulante = document.getElementById('distribuidor_postulante').value;
		var archivo = document.getElementById("archivo").value;
		var archivo1 = document.getElementById("archivo1").value;
		var archivo2 = document.getElementById("archivo2").value;
		var archivo3 = document.getElementById("archivo3").value;
		var archivo4 = document.getElementById("archivo4").value;
		var archivo5 = document.getElementById("archivo5").value;
		var archivo6 = document.getElementById("archivo6").value;
		var persona_natural1 = document.getElementById("persona_natural1").value;
		var persona_natural2 = document.getElementById("persona_natural2").value;
		var persona_natural3 = document.getElementById("persona_natural3").value;
		if ((archivo.length == 0) || (archivo1.length == 0) || (archivo2.length == 0) || (archivo3.length == 0) || (archivo5.length == 0) || (archivo5.length == 0) || (archivo6.length == 0)) {
			swal({
				title: "DOCUMENTOS GENERALES",
				text: "Revise los Documentos Generales cargados al sistema no se encuentran completos",
				icon: "warning",
				dangerMode: true,
			});
			return;
		}
		if ((persona_natural1.length == 0) || (persona_natural2.length == 0) || (persona_natural3.length == 0)) {
			swal({
				title: "DOCUMENTOS ESPECIFICOS",
				text: "Revise los Documentos Específicos cargados al sistema no se encuentran completos",
				icon: "warning",
				dangerMode: true,
			});
			return;
		}
		//this.submit();
		$('#postulante_principal').submit()
	}
}*/