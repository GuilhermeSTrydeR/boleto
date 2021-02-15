<?php
    session_start();
    
    if(!isset($_SESSION["logado"]))
    {
        header("Location: /");
    }

?>  
<center id="lista-boleto" style="margin: 20px; background-color: white;">
  <table class="table table-striped table-bordered table-condensed table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Data Vencimento</th>
        <th scope="col">Valor</th>
        <th scope="col">Situação</th>
        <th scope="col">Boleto</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Guilherme Pereira de Mello Silva</td>
        <td>31/01/2021</td>
        <td>R$ 1258,75</td>
        <td>Em dia</td>
        <td>
        <a href="?pagina=boleto">
          <img src="../resources/images/boleto2.png" onclick="" width="40" height="40" class="d-inline-block align-top" alt="sair">
        </td>
      </tr>
      <tr>
        <td>Ozzy ousbourne</td>
        <td>16/6/1996</td>
        <td>R$ 589,20</td>
        <td>Atrasado</td>
        <td>
        <a href="?pagina=boleto">
          <img src="../resources/images/boleto2.png" onclick="" width="40" height="40" class="d-inline-block align-top" alt="sair">
        </td>
      </tr>
      <tr>
        <td>Pedro Ferreira Augusto pereira de Mello Silva</td>
        <td>10/5/1994</td>
        <td>R$ 2599,58</td>
        <td>Tensa</td>
        <td>
        <a href="?pagina=boleto">
          <img src="../resources/images/boleto2.png" onclick="" width="40" height="40" class="d-inline-block align-top" alt="sair">
        </td>
        </a>
      </tr>
    </tbody>
  </table>
</center>