<?php

class AluguelDAO {
    
    public function create(Aluguel $aluguel) {

        //echo '<pre>' , var_dump($aluguel) , '</pre>';

        try {

            $sql = 'INSERT INTO aluguel (data, situacao, id_aluno, id_armario, id_plano)
            VALUES (:data, :situacao, :id_aluno, :id_armario, :id_plano)';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':data', $aluguel->getData(), PDO::PARAM_STR);
            $stmt->bindValue(':situacao', $aluguel->getSituacao(), PDO::PARAM_STR);
            $stmt->bindValue(':id_aluno', $aluguel->getIdAluno(), PDO::PARAM_INT);
            $stmt->bindValue(':id_armario', $aluguel->getIdArmario(), PDO::PARAM_INT);
            $stmt->bindValue(':id_plano', $aluguel->getIdPlano(), PDO::PARAM_INT);
            
            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao inserir aluguel.<br>' . $e . '<br>';

        }

    }

    public function read($id) {

        try {

            $sql = 'SELECT *
            FROM aluguel
            WHERE id = :id';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':id', $id);

            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {

                $aluguel = new Aluguel();
    
                $aluguel->setId($data['id']);
                $aluguel->setData($data['data']);
                $aluguel->setSituacao($data['situacao']);
                $aluguel->setIdAluno($data['id_aluno']);
                $aluguel->setIdArmario($data['id_armario']);
                $aluguel->setIdPlano($data['id_plano']);
    
                return $aluguel;
    
            }
    
            return $data;

        } catch (Exception $e) {

            echo 'Erro ao selecionar aluguel.<br>' . $e . '<br>';

        }

    }
/* 
    public function readByForeignKey($idAluno, $idArmario, $idPlano) {

        try {

            $sql = 'SELECT *
            FROM aluguel
            WHERE (id_aluno = :id_aluno
            OR id_armario = :id_armario
            OR id_plano = :id_plano)
            AND (situacao = "inativo")';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':id_aluno', $idAluno);
            $stmt->bindValue(':id_armario', $idArmario);
            $stmt->bindValue(':id_plano', $idPlano);
            
            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {

            $aluguel = new Aluguel();

            $aluguel->setId($data['id']);
            $aluguel->setData($data['data']);
            $aluguel->setSituacao($data['situacao']);
            $aluguel->setIdAluno($data['id_aluno']);
            $aluguel->setIdArmario($data['id_armario']);
            $aluguel->setIdPlano($data['id_plano']);

            return $aluguel;

            }

            return $data;

        } catch (Exception $e) {

            echo 'Erro ao selecionar aluguel.<br>' . $e . '<br>';

        }

    } */

    public function readAll() {

        try {
            $sql = 'SELECT *
            FROM aluguel';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $list = array();

            foreach ($data as $row) {

                $list[] = $this->list($row);

            }

            return $list;

        } catch (Exception $e) {

            echo 'Erro ao selecionar alugueis.<br>' . $e . '<br>';

        }

    }

    public function readAllFromAluno($idAluno) {

        try {
            $sql = 'SELECT *
            FROM aluguel
            WHERE id_aluno = :id_aluno';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':id_aluno', $idAluno);

            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $list = array();

            foreach ($data as $row) {

                $list[] = $this->list($row);

            }

            return $list;

        } catch (Exception $e) {

            echo 'Erro ao selecionar aluguel de aluno.<br>' . $e . '<br>';

        }

    }

    private function list($row) {

        $aluguel = new Aluguel();

        $aluguel->setId($row['id']);
        $aluguel->setData($row['data']);
        $aluguel->setSituacao($row['situacao']);
        $aluguel->setIdAluno($row['id_aluno']);
        $aluguel->setIdArmario($row['id_armario']);
        $aluguel->setIdPlano($row['id_plano']);

        return $aluguel;

    }

    public function update(Aluguel $aluguel) {

        try {

            $sql = 'UPDATE aluguel
            SET data = :data, situacao = :situacao, id_aluno = :id_aluno, id_armario = :id_armario, id_plano = :id_plano
            WHERE id = :id';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':data', $aluguel->getData(), PDO::PARAM_STR);
            $stmt->bindValue(':situacao', $aluguel->getSituacao(), PDO::PARAM_STR);
            $stmt->bindValue(':id_aluno', $aluguel->getIdAluno(), PDO::PARAM_INT);
            $stmt->bindValue(':id_armario', $aluguel->getIdArmario(), PDO::PARAM_INT);
            $stmt->bindValue(':id_plano', $aluguel->getIdPlano(), PDO::PARAM_INT);
            $stmt->bindValue(':id', $aluguel->getId(), PDO::PARAM_INT);

            echo '<pre>' , var_dump($stmt) , '</pre>';

            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao tentar atualizar aluguel.<br>' . $e . '<br>';

        }
    }


    

    public function delete(Aluguel $aluguel) {

        try {

            $sql = 'DELETE FROM aluguel
            WHERE id = :id';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':id', $aluguel->getId());

            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao tentar excluir aluguel.<br>' . $e . '<br>';

        }

    }

     public function count() {

        try {

            $sql = 'SELECT COUNT(id) AS total FROM aluguel';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data["total"];

        } catch (Exception $e) {

            echo 'Erro ao tentar contar aluguel.<br>' . $e . '<br>';

        }

    } 




    public function countRent(){

        try {



            $sql = 'SELECT aluno.nome AS AlunoNome, aluno.rm as AlunoRm, armario.secao as ArmarioSecao,
            armario.numero as ArmarioNum, armario.situacao AS ArmarioSituacao, armario.id as ArmarioID, 
            aluguel.situacao as AluguelSituacao, aluguel.id AS AluguelID, plano.plano as Plano, plano.valor AS PlanoValor
            FROM aluguel
            INNER JOIN plano ON aluguel.id_plano = plano.id
            INNER JOIN aluno ON aluguel.id_aluno = aluno.id 
            INNER JOIN armario on aluguel.id_armario = armario.id WHERE aluguel.situacao = "reservado";';

            // $sql = 'SELECT aluno.nome AS AlunoNome, aluno.rm as AlunoRm, armario.secao as ArmarioSecao,
            // armario.numero as ArmarioNum, armario.situacao AS ArmarioSituacao, armario.id as ArmarioID, 
            // aluguel.situacao as AluguelSituacao, aluguel.id AS AluguelID 
            // FROM aluguel
            // INNER JOIN aluno ON aluguel.id_aluno = aluno.id 
            // INNER JOIN armario on aluguel.id_armario = armario.id WHERE aluguel.situacao = "reservado"';

            // $sql = 'SELECT aluno.nome, aluno.rm, armario.secao, armario.numero, aluguel.situacao 
            // FROM aluguel INNER JOIN aluno ON aluguel.id_aluno = aluno.id 
            // INNER JOIN armario on aluguel.id_armario = armario.id';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($data as $row) {

                $list[] = $this->tableListGeral($row);

            }
            if(!isset($list)){
                //echo "nao há nada";
            }else{
            return $list;
            }

        } catch (Exception $e) {

            echo 'Erro ao tentar contar aluguel.<br>' . $e . '<br>';

        }
    }

    private function tableListGeral($row) {

        $aluno = new Aluno();
        $aluno->setNome($row['AlunoNome']);
        $aluno->setRm($row['AlunoRm']);
        

        $armario = new Armario();
        $armario->setId($row['ArmarioID']);
        $armario->setSecao($row['ArmarioSecao']);
        $armario->setNumero($row['ArmarioNum']);
        $armario->setSituacao($row['ArmarioSituacao']);

        $aluguel = new Aluguel();
        $aluguel->setSituacao($row['AluguelSituacao']);
        $aluguel->setId($row['AluguelID']);

        $plano = new Plano();
        $plano->setPlano($row['Plano']);
        $plano->setValor($row['PlanoValor']);

        return  array($aluno, $armario, $aluguel, $plano);

    }
    
  

    public function countAll(){

        try {



            $sql = 'SELECT aluno.nome AS AlunoNome, aluno.rm as AlunoRm, telefone_aluno.telefone as Contato, armario.secao as ArmarioSecao
            , aluguel.data as DataAluguel,  aluno.email as AlunoEmail , aluno.sobrenome as AlunoSobre,
            armario.numero as ArmarioNum, armario.situacao AS ArmarioSituacao, armario.id as ArmarioID, 
              aluguel.situacao as AluguelSituacao, aluguel.id AS AluguelID, plano.plano as Plano, plano.valor AS PlanoValor 
              FROM aluguel
              INNER JOIN telefone_aluno on aluguel.id_aluno = telefone_aluno.id_aluno
              INNER JOIN plano ON aluguel.id_plano = plano.id
              INNER JOIN aluno ON aluguel.id_aluno = aluno.id 
              INNER JOIN armario on aluguel.id_armario = armario.id;';

            // $sql = 'SELECT aluno.nome AS AlunoNome, aluno.rm as AlunoRm, armario.secao as ArmarioSecao,
            // armario.numero as ArmarioNum, armario.situacao AS ArmarioSituacao, armario.id as ArmarioID, 
            // aluguel.situacao as AluguelSituacao, aluguel.id AS AluguelID 
            // FROM aluguel
            // INNER JOIN aluno ON aluguel.id_aluno = aluno.id 
            // INNER JOIN armario on aluguel.id_armario = armario.id WHERE aluguel.situacao = "reservado"';

            // $sql = 'SELECT aluno.nome, aluno.rm, armario.secao, armario.numero, aluguel.situacao 
            // FROM aluguel INNER JOIN aluno ON aluguel.id_aluno = aluno.id 
            // INNER JOIN armario on aluguel.id_armario = armario.id';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($data as $row) {

                $list[] = $this->tableListAlugueis($row);

            }


            return $list;

        } catch (Exception $e) {

            echo 'Erro ao tentar contar aluguel.<br>' . $e . '<br>';

        }
    }

      
    private function tableListAlugueis($row) {

        $aluno = new Aluno();
        $aluno->setEmail($row['AlunoEmail']);
        $aluno->setTelefone($row['Contato']);
        $aluno->setNome($row['AlunoNome']);
        $aluno->setRm($row['AlunoRm']);
        $aluno->setSobrenome($row['AlunoSobre']);

        $armario = new Armario();
        $armario->setId($row['ArmarioID']);
        $armario->setSecao($row['ArmarioSecao']);
        $armario->setNumero($row['ArmarioNum']);
        $armario->setSituacao($row['ArmarioSituacao']);

        $aluguel = new Aluguel();
        $aluguel->setData($row['DataAluguel']);
        $aluguel->setSituacao($row['AluguelSituacao']);
        $aluguel->setId($row['AluguelID']);

        $plano = new Plano();
        $plano->setPlano($row['Plano']);
        $plano->setValor($row['PlanoValor']);

        return  array($aluno, $armario, $aluguel, $plano);

    }  



    


    public function Attupdate(Aluguel $aluguel) {

        try {

            $sql = 'UPDATE aluguel SET situacao = :situacao
            WHERE id = :id';
            
            $sql1 = 'UPDATE armario SET situacao = "alugado" 
            WHERE id = :idarmario';
               

            

            $stmt = Connection::getConnection()->prepare($sql);
            $stmt1 = Connection::getConnection()->prepare($sql1);

            
            $stmt->bindValue(':situacao', $aluguel->getSituacao(), PDO::PARAM_STR);            
            $stmt->bindValue(':id', $aluguel->getId(), PDO::PARAM_INT);
            $stmt1->bindValue(':idarmario', $aluguel->getIdArmario(), PDO::PARAM_INT);

          
            $stmt->execute();
            $stmt1->execute();

            return;

        } catch (Exception $e) {

            echo 'Erro ao tentar atualizar aluguel.<br>' . $e . '<br>';

        }
    }

    public function negarAluguel(Aluguel $aluguel) {

        try {

            $sql = 'UPDATE aluguel SET situacao = :situacao
            WHERE id = :id';
            
            $sql1 = 'UPDATE armario SET situacao = "disponível" 
            WHERE id = :idarmario';
               

            

            $stmt = Connection::getConnection()->prepare($sql);
            $stmt1 = Connection::getConnection()->prepare($sql1);

            
            $stmt->bindValue(':situacao', $aluguel->getSituacao(), PDO::PARAM_STR);            
            $stmt->bindValue(':id', $aluguel->getId(), PDO::PARAM_INT);
            $stmt1->bindValue(':idarmario', $aluguel->getIdArmario(), PDO::PARAM_INT);

          
            $stmt->execute();
            $stmt1->execute();

            return;

        } catch (Exception $e) {

            echo 'Erro ao tentar negar aluguel.<br>' . $e . '<br>';

        }
    }

    public function countActive(){

        try {

            $sql = 'SELECT Count(id) FROM  aluguel WHERE situacao = "ativo"';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data["Count(id)"];
          

        } catch (Exception $e) {

            echo 'Erro ao tentar contar os alugueis ativos.<br>' . $e . '<br>';

        }
    }

    public function aluguelPendente(){

        try {

            $sql = 'SELECT Count(id) FROM  aluguel WHERE situacao = "reservado"';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data["Count(id)"];
          

        } catch (Exception $e) {

            echo 'Erro ao tentar contar os alugueis ativos.<br>' . $e . '<br>';

        }
    }
    




        }

     
        


?>