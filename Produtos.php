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


?>




<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Produtos - Full Stack Eletro</title>
        
        <!-- link para css -->
        <link href="./Css/estilo.css" rel="stylesheet"> 
        
        <!-- link para o JS -->
        <script src="JS/funcoes.js"></script>

    </head>
    <body>
   
                            <!-- ANTIGO MENU DE ÂNCORAS -->
<!-- Menu com require -->
<?php
                require("menu.html")
?>
<!-- Menu com require -->

<div class="prod">
    <header class="cat" ><h2>Produtos</h2>
    </header>
</div>
   
<div class="categoria"> 
    <!--Categorias-->
    <section >    
       
            <ul>
                <li class="item" onclick="todos()" onmouseover="menuCategorias('1')" onmouseout="mouseOut('1')" >Todos(12)</li>
                <li class="item" onclick="exibirCat('geladeira')"onmouseover="menuCategorias('2')" onmouseout="mouseOut('2')">Geladeiras(3)</li>
                <li class="item" onclick="exibirCat('fogao')" onmouseover="menuCategorias('3')" onmouseout="mouseOut('3')">Fogões(2)</li>
                <li class="item" onclick="exibirCat('microondas')" onmouseover="menuCategorias('4')" onmouseout="mouseOut('4')">Microondas(3)</li>
                <li class="item" onclick="exibirCat('lavaroupas')" onmouseover="menuCategorias('5')" onmouseout="mouseOut('5')">Lava-Roupas(2)</li>
                <li class="item" onclick="exibirCat('lavaloucas')" onmouseover="menuCategorias('6')" onmouseout="mouseOut('6')">Lava-Louças(2)</li>
            </ul>
            
    </section>  
    <!--Categorias-->
    
</div>

<br><br><br>
<br><br><br>


 <section class="listaprodutos">    <!--Produtos-->

    
             <?php

                        $sql= "select * from produtos";
                        $result = $conn->query($sql);

                if($result->num_rows>0){


                    while($row=$result->fetch_assoc()){
                                
            ?>

<!--Célula configurada de produto individual-->                                         

<div class="produto"  id="<?php echo $row["categoria"]; ?>" style="display: inline-block;"   > 
            <img src="<?php echo $row["imagem"]; ?>" style=" height: 200px; width:200px  "  onclick="destaque(this)">
            <br>
            <p class="descrição"><?php echo $row["descricao"]; ?></p>
            <hr>
            <p class="descrição"><strike>R$<?php echo $row["preco"]; ?></strike></p>
            <p class="preço">R$<?php echo $row["preco_venda"]; ?></p><hr>
        </div>

<!--Célula configurada de produto individual--> 

            <?php
                            }
                        }
                        else{
                            echo"Nenhum produto cadastrado";
                        }

             ?>


        
        

        
   
    
</section> <!--Produtos-->

<br><br><br><br>
<br><br><br><br>
<br><br><br><br>

<script>
    console.log(document.getElementsByTagName("div"))  
</script>



<footer id="rodape"> <!--Rodapé-->
        
    <h4 id="FPagamento">Nossas Formas De Pagamento</h4>
    <img src="./Imagens/Pagamento.png" alt="Formas De Pagamento" width="33%" height="20%">
    <p>&copy: Recodepro</p>
</footer>       <!--Rodapé-->
    </body>
</html>