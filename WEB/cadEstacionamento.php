<!DOCTYPE html>
<html>
<head>
	<title>Cadastro Estacionamento</title>
</head>
</html>
<!-- 
	Acho legal você dividir o cadastro em 2 partes, aí você faz da forma que achar que fica mais legal no design.

	Fica legal tentar fazer algo que tipo, você ter um lugar pra selecionar o seu endereço no maps, não sei como fazer mas depois dou uma pesquisada. Se não der pra fazer isso, daria pra colocar só o CEP e ele preencher o resto.
-->
<body>
	Dados do estacionamento:
	<br>
	<input type="text" name="nome_fantasia" placeholder="Nome Fantasia">
	<br>
	<input type="text" name="razao_social" placeholder="Razão Social">
	<br>
	<input type="text" name="cnpj" placeholder="CNPJ">
	<br>
	<input type="text" name="telefoneEstacionamento" placeholder="Telefone">
	<br>
	<br>
	Endereço:
	<br>
	<input type="text" name="rua" placeholder="Rua">
	<br>
	<input type="text" name="cidade" placeholder="Cidade">
	<br>
	<input type="text" name="bairro" placeholder="Bairro">
	<br>
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
	<br>
	<input type="number" name="numero" placeholder="Número">
	<br>
	<input type="text" name="Complemento">
	<br>
	<br>
	Administrador:
	<!-- Legal colocar um aviso mencionando que irá poder cadastrar mais usuários depois -->
	<br>
	<input type="text" name="nome" placeholder="Nome">
	<br>
	<input type="email" name="email" placeholder="E-mail">
	<br>
	<input type="text" name="usuario" placeholder="Usuário">
	<br>
	<input type="password" name="senha" placeholder="Senha">
	<br>
	<input type="text" name="telefoneUser" placeholder="Telefone">

</body>
</html>