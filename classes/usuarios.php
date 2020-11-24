<?php
 Class Usuario {
  private $pdo;  /*criando variavel para usar nas funçoes*/
  public $msgErro = "";
    public function conectar($dbnome, $host, $usuario, $senha)
    {
      global $pdo;
          global $msgErro;
      try
      {
        $pdo = new PDO("mysql:dbname=".$dbnome.";host=".$host,$usuario,$senha);
      } catch (PDOException $e) {
        $msgErro - $e->getMessage(); /*pega a mensagem de erro do php e joga na variavel msegErro e mostra pro usuario.*/
      }
    }
    public function cadastrar($nome,$Endereco,$Cidade,$Uf,$Solicitante)
    {
      global $pdo;
          global $msgErro;
      
        //caso nao tenha
        $sql = $pdo->prepare("INSERT INTO cliente (nome, Endereco, Cidade, Uf, Solicitante) VALUES (:nome, :Endereco, :Cidade, :Uf, :Solicitante)");


     
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":Endereco", $Endereco);
        $sql->bindValue(":Cidade", $Cidade);
        $sql->bindValue(":Uf", $Uf);
        $sql->bindValue(":Solicitante", $Solicitante);
  
       
        $sql->execute();
        return true;
      

    }


     public function cadastrarOS( $idos, $Autocalve, $AutocalveNS, $Modelo, $AnoFabrica, $Npt, $obs,$novo_nome,$TOS,$mes,$anos)
    {
      global $pdo;
          global $msgErro;
      
        //caso nao tenha
        $sql = $pdo->prepare("INSERT INTO os (id_OsCliente, AutoCN, AutoCS, Modelo, AnoFabrica, NPART, Obs,Status,img,ANO,MES,tipo) VALUES (:idos,:Autocalve, :AutocalveNS, :Modelo, :AnoFabrica, :Npt, :obs, 'Em Analise',:nome,:ano,:mes,:tipo)");

        $sql->bindValue(":idos", $idos);
        $sql->bindValue(":Autocalve", $Autocalve);
        $sql->bindValue(":AutocalveNS", $AutocalveNS);
        $sql->bindValue(":Modelo", $Modelo);
        $sql->bindValue(":AnoFabrica", $AnoFabrica);
        $sql->bindValue(":Npt", $Npt);
        $sql->bindValue(":obs", $obs);
         $sql->bindValue(":nome", $novo_nome);
        $sql->bindValue(":ano", $anos);
        $sql->bindValue(":mes", $mes);
        $sql->bindValue(":tipo", $TOS);
        

        $sql->execute();
        return true;
      

    }

     public function updateOS($idc, $idos, $Autocalve, $AutocalveNS, $Modelo, $AnoFabrica, $Npt, $obs)
    {
      global $pdo;
          global $msgErro;
      
        //caso nao tenha
        $sql = $pdo->prepare("UPDATE os SET id_OsCliente='$idos', AutoCN='$Autocalve', AutoCS='$AutocalveNS', Modelo='$Modelo', AnoFabrica='$AnoFabrica', NPART='$Npt', Obs='$obs' WHERE idOS = '$idc'");

        $sql->execute();
        return true;
      

    }


    public function upFU($nome, $Endereco, $Email, $Senha, $Telefone,$id)
    {
      global $pdo;
          global $msgErro;
      
        //caso nao 
        $sql = $pdo->prepare("UPDATE tecnico SET  Nome='$nome', email='$Email', Senha='$Senha', Telefone='$Telefone', Endereco='$Endereco' WHERE id = '$id'");

        $sql->execute();
        return true;
      

    }
    
public function upPC($id,$Nome, $NumeroS, $Tamanho, $Cor, $Marca,$Tipo)
    {
      global $pdo;
          global $msgErro;
      
        //caso nao 
     $sql = $pdo->prepare("UPDATE peca SET  Nome='$Nome', NumeroS='$NumeroS', Tamanho='$Tamanho', Cor='$Cor', Marca='$Marca',
     Tipo='$Tipo' where id_peca = '$id'");

        $sql->execute();
        return true;
      

    }
    
    
   public function updateC( $id,$nome,$Endereco,$Cidade,$Uf,$Solicitante)
    {
      global $pdo;
          global $msgErro;
      
        //caso nao tenha
        $sql = $pdo->prepare("UPDATE cliente SET  Nome='$nome', Endereco='$Endereco', Cidade='$Cidade', Uf='$Uf', Solicitante='$Solicitante' WHERE id_Cliente = '$id'");

        $sql->execute();
        return true;
      
    }

     

public function cadastrarFU( $nome, $Endereco, $Email, $Senha, $Telefone)
    {
      global $pdo;
          global $msgErro;
      
        //caso nao tenha
        $sql = $pdo->prepare("INSERT INTO tecnico (Nome, Endereco, Email, Senha, Telefone) VALUES (:nome,:Endereco, :Email, :Senha, :Telefone)");

        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":Endereco", $Endereco);
        $sql->bindValue(":Email", $Email);
        $sql->bindValue(":Senha", $Senha);
        $sql->bindValue(":Telefone", $Telefone);
    

        $sql->execute();
        return true;
      

    }
    
    
public function CadastrarPC( $Nome, $NumeroS, $Tamanho, $Cor, $Marca,$Tipo)
    {
      global $pdo;
          global $msgErro;
      
        //caso nao tenha
$sql = $pdo->prepare("INSERT INTO peca (Nome, NumeroS, Tamanho, Cor, Marca, Tipo) VALUES 
(:Nome, :NumeroS, :Tamanho, :Cor, :Marca, :Tipo)");

        $sql->bindValue(":Nome", $Nome);
        $sql->bindValue(":NumeroS", $NumeroS);
        $sql->bindValue(":Tamanho", $Tamanho);
        $sql->bindValue(":Cor", $Cor);
        $sql->bindValue(":Marca", $Marca);
        $sql->bindValue(":Tipo",$Tipo);
    

        $sql->execute();
        return true;
      

    }
    

    public function logar($Endereco, $nome)
    {
      global $pdo;
          global $msgErro;
      $sql= $pdo->prepare("SELECT id_Cliente FROM cliente WHERE Endereco=:e AND nome=:n");
      $sql->bindValue(":e", $Endereco);
      $sql->bindValue(":n", $nome);
     
     
      $sql->execute();
      if($sql->rowCount()>0) //verificando houve resposta na consulta
      {
        //entrar no sistema criando uma (sessao)
        $dado = $sql->fetch(); //transforma o retorno da query em array com os nomes das colunas
        session_start();  //iniciando a sessao
        $_SESSION['id_Cliente'] = $dado['id_Cliente']; //armazena o id do usuario na sessao.
        return true;  //logado com sucesso
      }
      else
      {
        return false; //erro ao logar.
      }
    }
}
?>
