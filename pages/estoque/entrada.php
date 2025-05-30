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
            ENTRADA
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> TELA INICIAL</a></li>
            <li><a href="#">CADASTRO</a></li>
            <li class="active">ENTRADA</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
               <form role="form" method="POST" action="">
                  <div class="form-group">
                  <div class="box-body">
                     <label for="nome"> BUSCAS DE PRODUTOS </label>
                     <input type="text" class="form-control" name="filtro_nome" placeholder="por nome"><br>
                     <button type="submit" class="btn btn-primary">BUSCAR </button>
                  </div>
                 </div>
               </form>
 
                <!-- form start -->
                <form role="form" method="POST" action="salvar_entrada.php">
                <div class="box-body">
                    <div class="form-group">
                      <label for="nome">PRODUTO</label>
                      <select name="produto" class="form-control">

                        <?php
                        $filtro_nome = $_POST['filtro_nome'];
                        require "../config.php";
                        $sql = "SELECT * FROM produto WHERE nome LIKE '%$filtro_nome%'";

                        $declaracaoSql = $conexao->prepare($sql);
                        $declaracaoSql->execute();
                        $produtos = $declaracaoSql->fetchAll();
      
                        foreach($produtos as $prod){
                           echo "<option>$prod[nome]</option>";
                           $descricao = $prod['descricao'];
                       }
                     ?>

                      </select><br>
                      
                     <!-- <label>Descrição</label>
                      <textarea class="form-control" name="descricao" ><?php echo $descricao;?>
                      </textarea><br><br>-->


                       <label for="saida">QUANDO DEU ENTRADA</label><br>
                       <input type="number" name="quantidade" class="col-xs-3"><br><br><br>

                       <label for="data">DATA</label><br>
                       <input type="date" name="data" class="form-control"><br>

                       <label for="hora_saida">HORAS</label><br>
                       <input type="time" name="hora" class="form-control" value="<?php echo date('H:i:s');?>"><br>

                       <label>Descrição</label>
                      <textarea class="form-control" name="descricao"  maxlength="110">
                      </textarea><br><br>

                    </div>
                  </div><!-- /.form group -->
                  

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">ADICIONAR</button>
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
      