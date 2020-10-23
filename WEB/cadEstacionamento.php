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

<!-- 
	Acho legal você dividir o cadastro em 2 partes, aí você faz da forma que achar que fica mais legal no design.

	Fica legal tentar fazer algo que tipo, você ter um lugar pra selecionar o seu endereço no maps, não sei como fazer mas depois dou uma pesquisada. Se não der pra fazer isso, daria pra colocar só o CEP e ele preencher o resto.
-->

<body>

    <div class="login-page">
        <div class="main-content form">
            <div class="left box">
                <form class="login-form" action="cadEstacionamentoModel.php" method="POST">
                    <label class="orion" for="" style="color: black;">Dados do Estacionamento:</label>
                    <input type="text" name="nome_fantasia" placeholder="Nome Fantasia">
                    <input type="text" name="razao_social" placeholder="Razão Social">
                    <input type="text" name="cnpj" placeholder="CNPJ" id="cnpj" class="cnpj">
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
            </div>
            <div class="right box">
                <label class="orion" for="" style="color: black;">Administrador:</label>
                <!-- Legal colocar um aviso mencionando que irá poder cadastrar mais usuários depois -->
                <input type="text" name="nome" placeholder="Nome">
                <input type="email" name="email" placeholder="E-mail">
                <input type="text" name="cargo" placeholder="Cargo">
                <input type="text" name="usuario" placeholder="Usuário">
                <input type="password" name="senha" placeholder="Senha">
                <input type="text" name="telefoneUsuario" placeholder="Telefone" id="telefoneUsuario">

                <button type="submit">Cadastrar</button>

                <p class="message">Ja está registrado? <a href="loginEstacionamento.php">Entrar</a></p>
                <p class="message"><a href="index.html">Voltar ao ínicio</a></p>
            </div>
            </form>
        </div>
    </div>
</body>
</html>