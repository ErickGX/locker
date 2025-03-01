<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../public/assets/css/all.css">

  <!-- CDN DataTables -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="../../public/assets/plugins/bootstrap-4.5.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../public/assets/plugins/fontawesome-free-6.2.0-web/css/all.min.css">
  <link rel="stylesheet" href="../../public/assets/css/modal-aluno.css">
  <title>LockEtec</title>
</head>

<body>
  <div class="flex-dashboard">
    <!--Começo do menu principa da esquerda -->
    <?php include "sidebarmenu.php" ?>
    <!--Final do  menu  principa da esquerda -->


    <!-- Main = Conteudo principal da pagina -->
    <main>

      <!-- inicio do Escopo da pagina -->
      <?php include "headerdash.php" ?>
      <!-- final-->
      <div class="main-content">
        <div class="container">

          <div class="row">

            <div class="btn-modais">

              <button type="button" class="btn-cadastrar" data-toggle="modal" data-target="#cadastrar">Cadastrar</button>

            </div>

            <!-- <button type="button" class="btn-excluir" data-toggle="modal" data-target="#excluir" data-whatever="@mdo">Excluir</button>

            <button type="button" class="btn-atualizar" data-toggle="modal" data-target="#atualizar" data-whatever="@mdo">Atualizar</button>

            <button type="button" class="btn-pesquisar" data-toggle="modal" data-target="#pesquisar" data-whatever="@mdo">Pesquisar</button> -->

          </div>
        </div>

        <!-- Começo Modal-Cadastrar -->

        <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="Label-cadastrar">Cadastrar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Salvar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form action='/dash-cad-aluno' method='POST'>

                  <div class="form-group">
                    <label for="recebe-nome" class="col-form-label">Nome:</label>
                    <input type="text" name="nome" class="form-control" id="recebe-nome" required>
                  </div>

                  <div class="form-group">
                    <label for="recebe-sobrenome" class="col-form-label">Sobrenome:</label>
                    <input type="text" name="sobrenome" class="form-control" id="recebe-sobrenome" required>
                  </div>

                  <div class="form-group">
                    <label for="recebe-email" class="col-form-label">Email:</label>
                    <input type="email" name="email" class="form-control" id="recebe-email" required>
                  </div>

                  <div class="form-group">
                    <label for="recebe-rm" class="col-form-label">RM:</label>
                    <input type="number" name="rm" class="form-control" id="recebe-rm" required>
                  </div>

                  <div class="form-group">
                    <label for="cadastro-cpf" class="col-form-label">CPF:</label>
                    <input type="number" name="cpf" class="form-control" id="cadastro-cpf" required>
                  </div>

                  <div class="form-group">
                    <label for="recebe-contato" class="col-form-label">Contato:</label>
                    <input type="number" name="telefone" class="form-control" id="recebe-contato" required>
                  </div>

                  <div class="form-group">
                    <label for="recebe-senha" class="col-form-label">Senha:</label>
                    <input type="text" name="senha" class="form-control" id="recebe-senha" required>
                  </div>



              </div>
              <div class="modal-footer">
                <button type="submit" name="cadastrar" class="btn btn-success">Cadastrar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Final Modal-Cadastrar -->

        <!-- Começo Modal-excluir 

        <div class="modal fade" id="excluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="Label-Excluir">Excluir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Salvar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>

                  <div class="form-group">
                    <label for="excluir-email" class="col-form-label">Email:</label>
                    <input type="text" class="form-control" id="excluir-email">
                  </div>

                  <div class="form-group">
                    <label for="excluir-cpf" class="col-form-label">CPF:</label>
                    <input type="number" class="form-control" id="excluir-cpf">
                  </div>

                </form>
              </div>
              <div class="modal-footer">
                <button type="submit" name="excluir" class="btn btn-success">Excluir</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>

              </div>
            </div>
          </div>
        </div>

        Final Modal-excluir 


        Começo Modal Atualizar 

        <div class="modal fade" id="atualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="Label-atualizar">Atualizar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Salvar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <form>

                    <div class="form-group">
                      <label for="recebe-nome" class="col-form-label">Nome:</label>
                      <input type="text" class="form-control" id="recebe-name">
                    </div>

                    <div class="form-group">
                      <label for="recebe-sobrenome" class="col-form-label">Sobrenome:</label>
                      <input type="text" class="form-control" id="recebe-sobrenome">
                    </div>

                    <div class="form-group">
                      <label for="recebe-email" class="col-form-label">Email:</label>
                      <input type="text" class="form-control" id="recebe-email">
                    </div>

                    <div class="form-group">
                      <label for="recebe-rm" class="col-form-label">RM:</label>
                      <input type="text" class="form-control" id="recebe-rm">
                    </div>

                    <div class="form-group">
                      <label for="cadastro-cpf" class="col-form-label">CPF:</label>
                      <input type="number" class="form-control" id="cadastro-cpf">
                    </div>

                    <div class="form-group">
                      <label for="recebe-contato" class="col-form-label">Contato:</label>
                      <input type="number" class="form-control" id="recebe-contato">
                    </div>

                    <div class="form-group">
                      <label for="recebe-senha" class="col-form-label">Senha:</label>
                      <input type="number" class="form-control" id="recebe-senha">
                    </div>

                  </form>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Salvar</button>
                <button type="button" class="btn btn-danger">Fechar</button>
              </div>
            </div>
          </div>
        </div>

       Final Modal Atualizar 

       Começo Modal-Pesquisar 

        <div class="modal fade" id="pesquisar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="Label-pesquisar">Pesquisar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Salvar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>

                  <div class="form-group">
                    <label for="recebe-email" class="col-form-label">Email:</label>
                    <input type="text" class="form-control" id="recebe-email">
                  </div>

                  <div class="form-group">
                    <label for="recebe-rm" class="col-form-label">RM:</label>
                    <input type="text" class="form-control" id="recebe-rm">
                  </div>

                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Salvar</button>
                <button type="button" class="btn btn-danger">Fechar</button>
              </div>
            </div>
          </div>
        </div>

      Final Modal-Pesquisar -->
        <section class="tabela">
          <div class="col-md-9 .col-md-push-3"></div>
          <div class="card" style="width: 100%; margin-top: 2rem; border-radius: 1rem;">
            <div class="card-header" style="display:flex; justify-content: center; color: black; ">
              <h4>Alunos Cadastrados</h4>
            </div>

            <table class="table" id="myTable">

              <thead class="thead-dark">
                <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">Sobrenome</th>
                  <th scope="col">RM</th>
                  <th scope="col">CPF</th>
                  <th scope="col">E-MAIL</th>
                  <th scope="col">Contato</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Excluir</th>

                </tr>
              </thead>

              <tbody>

                <?php foreach ($counterStudent as $countS) { ?>

                  <?php echo "<tr>" ?>

                  <td> <?php echo $countS->getNome(); ?> </td>
                  <td> <?php echo $countS->getSobrenome(); ?> </td>
                  <td> <?php echo $countS->getRm(); ?> </td>
                  <td> <?php echo $countS->getCpf(); ?> </td>
                  <td> <?php echo $countS->getEmail(); ?> </td>
                  <td> <?php echo $countS->getTelefone(); ?> </td>
                  <td>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#TabelaAtualizar<?php echo $countS->getId(); ?>">Alterar</button>
                  </td>
                  <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ExcluirTabela<?php echo $countS->getId(); ?>">Excluir</button>
                  </td>

                  <!-- Começo Modal Atualizar aluno Pela Tabela-->

                  <div class="modal fade" id="TabelaAtualizar<?php echo $countS->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="Label-atualizar">Atualizar</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Salvar">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                          <form action="/adm/dashboard/alterar-aluno" method="POST">

                            <input type='hidden' name='id' value="<?php echo $countS->getId(); ?>">

                            <div class="form-group">
                              <label for="recebe-nome" class="col-form-label">Nome:</label>
                              <input type="text" name="nome" class="form-control" id="recebe-nome" value="<?php echo $countS->getNome(); ?>">
                            </div>

                            <div class="form-group">
                              <label for="recebe-sobrenome" class="col-form-label">Sobrenome:</label>
                              <input type="text" name="sobrenome" class="form-control" id="recebe-sobrenome" value="<?php echo $countS->getSobrenome(); ?>">
                            </div>

                            <div class="form-group">
                              <label for="recebe-email" class="col-form-label">Email:</label>
                              <input type="email" name="email" class="form-control" id="recebe-email" value="<?php echo $countS->getEmail(); ?> ">
                            </div>

                            <div class="form-group">
                              <label for="recebe-rm" class="col-form-label">RM:</label>
                              <input type="number" name="rm" class="form-control" id="recebe-rm" value="<?php echo $countS->getRm(); ?>">
                            </div>

                            <div class="form-group">
                              <label for="cadastro-cpf" class="col-form-label">CPF:</label>
                              <input type="text" name="cpf" class="form-control" id="cadastro-cpf" value="<?php echo $countS->getCpf(); ?> ">
                            </div>

                            <div class="form-group">
                              <label for="recebe-contato" class="col-form-label">Contato:</label>
                              <input type="text" name="telefone" class="form-control" id="recebe-contato" value="<?php echo $countS->getTelefone(); ?> ">
                            </div>

                            <div class="form-group">
                              <label for="recebe-senha" class="col-form-label">Senha:</label>
                              <input type="text" name="senha" class="form-control" id="recebe-senha" value="<?php echo $countS->getSenha(); ?> ">
                            </div>

                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success" name="alterar">Salvar</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <!-- Final Modal Alterar aluno Pela Tabela -->

                  <!-- Começo modal-apagar aluno Pela Tabela-->

                  <div class="modal fade" id="ExcluirTabela<?php echo $countS->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="Label-Excluir">Excluir</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Salvar">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form>

                            <div class="form-group">
                              <h2>Confirmar exclusão do Aluno do Sistema?</h2>
                            </div>

                          </form>
                        </div>
                        <div class="modal-footer">

                          <form action='/adm/dashboard/excluir-aluno' method='POST'>
                            <input type='hidden' name='id' value='<?php echo $countS->getId(); ?>'>
                            <button type="submit" class="btn btn-success" name="excluir">Confirmar</button>
                          </form>

                          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Final modal-apagar aluno Pela Tabela -->


                <?php "</tr>";
                }  ?>






              </tbody>





            </table>
        </section>

      </div>



    </main>
  </div>





  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <script src="../../public/assets/plugins/fontawesome-free-6.2.0-web/js/all.min.js"></script>

  <!-- cdn dataTables -->
  <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <!-- JS do DataTables -->
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>

</body>

</html>