<?php

$servidor="localhost";
$usuario="root";
$senha="";
$banco="fullstackeletro";

$conn= mysqli_connect($servidor,$usuario,$senha,$banco);

if(!$conn){
    die("A conexão falhou: ".mysqli_connect_error());
}
//  CONEXÃO AO BD fullstackeletro 

if(isset($_POST['nome']) && isset($_POST['msg'])){

    $nome = $_POST['nome'];
    $msg= $_POST['msg'];
    
    $sql= "insert into comentarios (nome,msg) values('$nome','$msg')";
    $result=$conn->query($sql);
}






?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Contato</title>
        <link href="Css/estilo.css" rel="stylesheet">



    </head>
    <body>
                                            <!-- ANTIGO MENU DE ÂNCORAS -->
<!-- Menu com require -->
<?php
                require("menu.html")
?>
<!-- Menu com require -->    

                    <h2 class="contato" style="margin-left: 25%;">Contato</h2>
                    <br><br><br><br><br>        
<section>
    
    <div class="contato" text-align: center;>
        
        <img src="Imagens/email.jpg" style="Width:70px; height:50px; padding:5px" >
       <p>Fullsatcleletro@gmail.com</p>
    </div>
         
    <div class="contato">
            <img src="./Imagens/whatsapp.jpg" style="Width:50px; height:50px; padding:5px">
            <p>(11)9696-8585</p> 
     </div>   
</section>




<br><br>
<div class="contato" style="width: 40%; margin-left: 28%;">

    <form action="" method="post">
            <label for="nome">Seu Nome</label><br>
        <input type="text" style="width: 400px;" placeholder="Deixe seu Nome!!" id="nome" name="nome"><br>
            <label for="coment">Insira o Comentário</label><br>
        <textarea style="width: 400px;" placeholder="Deixe seu comentario!!" id="coment" name="msg"></textarea><br>

        <input type="submit" name="submit" value="Enviar" style="cursor: pointer;">
    </form> 

</div>
<br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br>
            
            
            <?php
                        $sql= "select * from comentarios";
                        $result = $conn->query($sql);

                if($result->num_rows>0){


                    while($row=$result->fetch_assoc()){
                        echo "<hr>";
                        echo "Nome: " .  $row['nome'] ."<br / >";
                        echo "Mensagem: ". $row['msg'] ."<br / >"; 
                        echo "Data:" . $row['data'] . "<br / >";
                        echo "<hr>";
                            }
                        }
                        else{
                            echo"Nenhum Comentário";
                        }
            ?>




           
<footer id="rodape"> <!--Rodapé-->
        
    <h4 id="FPagamento">Nossas Formas De Pagamento</h4>
    <img src="./Imagens/Pagamento.png" alt="Formas De Pagamento" width="33%" height="20%">
    <p>&copy: Recodepro</p>
</footer>       <!--Rodapé-->

    </body>
</html>