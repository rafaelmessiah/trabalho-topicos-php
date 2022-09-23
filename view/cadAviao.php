<br><br>
<!-- O action envia por POST o forma para o controlador -->
<form action="./controler/aviaoController.php" method="post">
    <label>Modelo:</label>
    <input type="text" name="modelo" ><br>
    <label>Quantidade de turbinas:</label>
    <input type="text" name="qdte_turbinas" ><br>
    <label>Capacidade de passageiros:</label>
    <input type="text" name="capac_passageiros"><br>
    <label>Capacidade de carga:</label>
    <input type="text" name="capc_carga"><br>
    <label>Comercial:</label>
    <input type="text" name="comercial"><br>
    <input type="submit" value="Salvar"><br>
</form>