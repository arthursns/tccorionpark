<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/icon" href="img/logo.ico" />
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/cad.css?ts=<?=time()?>"/>
    <link rel="stylesheet" href="css/style.css?ts=<?=time()?>"/>
    <script src="js/JQuery.js" type="text/javascript" ></script>
    <script src="js/mask.js" type="text/javascript" ></script>
    <script src="js/script.js" type="text/javascript" ></script>
</head>
<script language="javascript" type="text/javascript">
function validar() {
var nome = form1.nome_fantasia.value;
var nome1 = form1.razao_social.value;
var nome2 = form1.cnpj.value;
var nome3 = form1.telefoneEstacionamento.value; 
var nome4 = form1.rua.value; 
var nome5 = form1.cidade.value; 
var nome6 = form1.bairro.value; 
var nome7 = form1.numero.value; 
var nome8 = form1.nome.value; 
var nome9 = form1.email.value; 
var nome10 = form1.usuario.value; 
var nome11 = form1.cargo.value; 
var nome12 = form1.senha.value; 
var nome13 = form1.telefoneUsuario.value; 
if (nome == "" ) {
    alert('Preencha o campo com o Nome Fantasia do Estacionamento!');
form1.nome_fantasia.focus();
return false;
}
else if (nome1 == "" ) {
    alert('Preencha o campo com a Razao Social do Estacionamento!');
form1.razao_social.focus();
return false;
}

else if (nome2 == "" ) {
    alert('Preencha o campo com o CNPJ do Estacionamento!');
form1.cnpj.focus();
return false;
}

else if (nome3 == "" ) {
    alert('Preencha o campo com o Telefone do Estacionamento!');
form1.telefoneEstacionamento.focus();
return false;
}
else if (nome4 == "" ) {
    alert('Preencha o campo com a Rua do Estacionamento!');
form1.rua.focus();
return false;
}
else if (nome5 == "" ) {
    alert('Preencha o campo com o Cidade do Estacionamento!');
form1.cidade.focus();
return false;
}
else if (nome6 == "" ) {
    alert('Preencha o campo com o Bairro do Estacionamento!');
form1.bairro.focus();
return false;
}
else if (nome7 == "" ) {
    alert('Preencha o campo com o Numero do Usuario!');
form1.numero.focus();
return false;
}
else if (nome8 == "" ) {
    alert('Preencha o campo com o Nome do Usuario!');
form1.nome.focus();
return false;
}
else if (nome9 == "" ) {
    alert('Preencha o campo com o Email do Usuario!');
form1.email.focus();
return false;
}
else if (nome10 == "" ) {
    alert('Preencha o campo com o Nome/Apelido do Usuário!');
form1.usuario.focus();
return false;
}
else if (nome11 == "" ) {
    alert('Preencha o campo com o Cargo do Usuario!');
form1.cargo.focus();
return false;
}
else if (nome12 == "" ) {
    alert('Preencha o campo com o Senha do Usuario!');
form1.senha.focus();
return false;
}
else if (nome13 == "" ) {
    alert('Preencha o campo com o telefone do Usuario!');
form1.telefoneUsuario.focus();
return false;
}

}
</script>

<!-- 
	Acho legal você dividir o cadastro em 2 partes, aí você faz da forma que achar que fica mais legal no design.

	Fica legal tentar fazer algo que tipo, você ter um lugar pra selecionar o seu endereço no maps, não sei como fazer mas depois dou uma pesquisada. Se não der pra fazer isso, daria pra colocar só o CEP e ele preencher o resto.
-->

<body>

    <div class="login-page">
        <div class="main-content form">
                <form class="login-form" action="cadEstacionamentoModel.php" method="POST" name="form1">
                    <label class="orion" for="" style="color: black;">Dados do Estacionamento:</label>
                    <input type="text" name="nome_fantasia" placeholder="Nome Fantasia">
                    <input type="text" name="razao_social" placeholder="Razão Social">
                    <input type="text" name="" placeholder="CNPJ" id="cnpj" class="cnpj">
                    <input type="text" name="telefoneEstacionamento" placeholder="Telefone" id="telefoneEstacionamento">

                    <label class="orion" for="" style="color: black;">Endereço:</label>
                    <input type="text" name="rua" placeholder="Rua">
                    <input type="text" name="cidade" placeholder="Cidade">
                    <input type="text" name="bairro" placeholder="Bairro">
                    <select id="estado" name="estado">
						<option value="AC">Acre</option>
						<option value="AL">Alagoas</option>
						<option value="AP">Amapá</option>
						<option value="AM">Amazonas</option>
						<option value="BA">Bahia</option>
						<option value="CE">Ceará</option>
						<option value="DF">Distrito Federal</option>
						<option value="ES">Espírito Santo</option>
						<option value="GO">Goiás</option>
						<option value="MA">Maranhão</option>
						<option value="MT">Mato Grosso</option>
						<option value="MS">Mato Grosso do Sul</option>
						<option value="MG">Minas Gerais</option>
						<option value="PA">Pará</option>
						<option value="PB">Paraíba</option>
						<option value="PR">Paraná</option>
						<option value="PE">Pernambuco</option>
						<option value="PI">Piauí</option>
						<option value="RJ">Rio de Janeiro</option>
						<option value="RN">Rio Grande do Norte</option>
						<option value="RS">Rio Grande do Sul</option>
						<option value="RO">Rondônia</option>
						<option value="RR">Roraima</option>
						<option value="SC">Santa Catarina</option>
						<option value="SP">São Paulo</option>
						<option value="SE">Sergipe</option>
						<option value="TO">Tocantins</option>
					</select>
                    <input type="text" name="numero" placeholder="Número" id="numero">
                    <input type="text" name="complemento" placeholder="Complemento">
                <label class="orion" for="" style="color: black;">Administrador:</label>
                <!-- Legal colocar um aviso mencionando que irá poder cadastrar mais usuários depois -->
                <input type="text" name="nome" placeholder="Nome">
                <input type="email" name="email" placeholder="E-mail">
                <input type="text" name="cargo" placeholder="Cargo">
                <input type="text" name="usuario" placeholder="Usuário">
                <input type="password" name="senha" placeholder="Senha">
                <input type="text" name="telefoneUsuario" placeholder="Telefone" id="telefoneUsuario">

                <button type="submit" onclick="return validar()">Cadastrar</button>

                <p class="message">Ja está registrado? <a href="loginEstacionamento.php">Entrar</a></p>
                <p class="message"><a href="index.php">Voltar ao ínicio</a></p>
            </div>
            </form>
        </div>
    </div>
</body>
</html>