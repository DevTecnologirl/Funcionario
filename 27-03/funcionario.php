<html>
<!-- formulario -->
<form method=POST>
<fieldset>
<legend> FORMULÁRIO DE CADASTRO DE FUNCIONÁRIO </legend>
Codigo: <input type=number name=codigo><br>
Nome: <input type=text name=nome><br>
Idade: <input type=number name=idade><br>
Cargo: <select name=”select”>
	<option value=”diretor”>Diretor</option>
	<option value=”gerente”>Gerente</option>
	<option value=”adm”>Administrador</option>
</select>
<br>
Contrato:
<input type=”radio” id = “efetivo” name=”cargo” value =”efetivo”> Efetivo
<input type=”radio” id = “temp” name= “cargo” value=”temp”> Temporario
//BOTOES
<input type=submit name=botao value=”Salvar Funcionario”>
<a href=limpardados.php><input type=button value=”Limpar Dados”></a>
<a href=listagem.php><input type=button value=”Listagem”></a>
</fieldset>
</form>
</html>


<?php
//Conectar com o MySQL
if(isset($_POST["botao"]))
{ $conexao=mysql_connect ("localhost:3306","root", "root");

// Selecionar o banco de dados
mysql_select_db("cadastro",$conexao);

// Inicializar variáveis
$codigo = $_POST["codigo"];
$nome = $_POST["nome"];
$idade = $_POST["idade"];
$cargo = $_POST["cargo"];
$contrato = $_POST["contrato"];

// Inserir os dados do formulário na tabela
mysql_query("insert into Funcionarios values('$codigo','$nome','$cargo','$idade','$contrato')",$conexao);


// Ainda no comando while para exibir os dados, antes de fechar com as chaves,Teste se o funcionário é maior de idade para inserir o dado na tabela.
while($_GET = mysql_fetch_array($consulta))
{
echo "<br> -Código:".$_GET['codigo'];
echo " - Nome:".$_GET['nome'];
echo " -Cargo:".$_GET['cargo'];
echo " -Contrato:".$_GET['contrato'];
echo "Idade:".$_GET['idade'];

if($_POST['idade']>=18)
{ 
$consulta = mysql_query("select * from Funcionarios",$conexao);
echo "<br> Funcionário será salvo no banco. <br>”;
}
else echo "<br><b>Cadastro somente para maiores de idade.</b>";
}
mysql_close($conexao);
}
?>
