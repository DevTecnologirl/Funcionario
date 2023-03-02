<html>
<meta charset=UTF-8>
Para fazer a listagem clique abaixo: <hr>
<form method=POST>
Nome: <input type=text name=nome>
Codigo: <input type=text name=codigo>
<input type=submit name=botao value="Listagem de Funcionario">
<a href=funcionario.php><input type=button value="Voltar"></a>
</form>
</html>

<?php
if(isset($_POST["botao"]))
{
$conexao=mysql_connect("localhost:3306","root","root");
mysql_select_db("pesquisa",$conexao);
$codigo = $_POST["codigo"];
$nome = $_post["nome"];
mysql_query ("update Formulario set nome='$nome' where
codigo=$codigo",$conexao);
$consulta = mysql_query("select * from Formulario" ,$conexao);
while($_GET = mysql_fetch_array($consulta))
{
echo "<br> - Código: ".$_GET['codigo'];
echo " - Nome:".$_GET['nome'];
}
mysql_close($conexao);
}
?>