<?php
session_start();
if(!$_SESSION['admin']){
  header('location:../admin/login.html');
}
require "../cabecalho/aside.php";

?>

 <!-- Right side column. Contains the navbar and content of the page -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            PRODUTOS CADASTRADOS
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> TELA INICIAL</a></li>
            <li><a href="#">PRODUTO</a></li>
            <li class="active">PRODUTOS CADASTRADOS</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <a href="pdf_produtos.php"><button class="btn btn-primary"  target="blank">GERAR ARQUIVO PDF</button></a>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  
               
              <div class="box">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>PRODUTO</th>
                        <th>CATEGORIA</th>
                        <th>DESCRIÇÃO</th>
                        <th>CONSUMO</th>
                        <th>AÇÃO</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    <?php
                    require "../config.php";
                    
                    $sql = "select * from produto";
                    $declaracaoSql = $conexao->prepare($sql);
                    $declaracaoSql->execute();
                    $produtos = $declaracaoSql->fetchAll();

                  
                    foreach($produtos as $prod){
                        echo "<tr><td>$prod[id_produto] </td>";
                        echo "<td>$prod[nome] </td>";
                        echo "<td>$prod[categoria] </td>";
                        echo "<td>$prod[descricao] </td>";
                        echo "<td>$prod[consumo] </td>";
    
                    ?>
   

                        <td><a href="editar.php?id=<?php echo $prod['id_produto']?>" class="btn btn-app">
                          <i class="fa fa-edit"></i>EDITAR</a>
                          <a href="deletar.php?id= <?php echo $prod['id_produto']?>" class="btn btn-app">
                          <i class="fa fa-times"></i>APAGAR</a>
                      </td>
                      </tr>
                       <?php }?>
                      
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php
require "../cabecalho/footer.php";
?>