var peso = parseFloat(document.getElementById("numl").value);
var altura = parseFloat(document.getElementById("numl2").value);

var resultado = peso / altura * altura;

document.getElementById("resultado").innerText = "Resultado:  " + resultado;