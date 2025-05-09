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
            CADASTROS DE PRODUTOS
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> TELA INICIAL</a></li>
            <li><a href="#">CADASTRO</a></li>
            <li class="active">CADASTRO DE PRODUTOS</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
              

                <!-- form start -->
                <form role="form" method="POST" action="gravar_dados.php">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nome">NOME DO PRODUTO</label>
                      <input type="text" name="produto" class="form-control" placeholder="nome do produto"><br>

                      <label>CATEGORIA</label>
                        <select name="categoria" class="form-control">
                        <?php
                        require "../config.php";
                        $sql = "select * from categoria";

                        $declaracaoSql = $conexao->prepare($sql);
                        $declaracaoSql->execute();
                        $produtos = $declaracaoSql->fetchAll();
      
                        foreach($produtos as $categoria){
                           echo "<option>$categoria[nome_categoria]</option>";
                       }
                     ?>
                      </select><br>

                      <label>DESCRIÇÃO</label>
                      <textarea class="form-control" name="descricao">
                      </textarea><br><br>


                     <label>Consumo</label>
                      <div class="radio">
                       <label>
                         <input type="radio" value="sim" name="consumo">  SIM <br>
                         <input type="radio" value="nao" name="consumo" checked>  NÃO
                       </label>
                      </div>
                    </div> 
                  </div><!-- /.form group -->
                  

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">CADASTRAR</button>
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
     <?php
      require "../cabecalho/footer.php";
      ?>
      