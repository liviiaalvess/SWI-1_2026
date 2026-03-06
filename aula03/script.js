function processarValidacao() {
    const valorInput = document.getElementById('cpfInput').value;
    const ehValido = validarCPF(valorInput);

    if (ehValido) {
        alert("O CPF " + valorInput + "é válido");
        
    } else {
        alert("O CPF " + valorInput + "é inválido");    }
}

function soma(){
    const ValorInput = document.getElementById('ValorInput').value;
    const ValorName = document.getElementById('ValorName').value;
    alert("Olá " + ValorName + "Seu email é" +ValorEmail +" Seu CPF é "+ ValorInput + "Seu endereço é"+ ValorText)
}
function teste(){
    alert ("Teste concluido");
}