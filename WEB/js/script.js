function myFunction() {
    var x = document.getElementById("navzao");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}


$(function() {
    //mascaras
    $('input#cnpj').mask('00.000.000/0000-00');
    $('input.cep').mask('00000-0000');
    $('input#telefoneEstacionamento').mask('(00) 00000-0000');
    $('input#telefoneUsuario').mask('(00) 00000-0000');
    $('input#numero').mask('0000');
});