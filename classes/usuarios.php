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


    //  public function cadastrarOS( $idos, $Autocalve, $AutocalveNS, $Modelo, $AnoFabrica, $Npt, $obs,$novo_nome,$TOS,$mes,$anos)
    // public function cadastrarOS( $idos, $Autocalve, $AutocalveNS, $Modelo, $AnoFabrica, $Npt, $obs,$TOS,$mes,$anos)
    public function cadastrarOS( $ANO, $AnoFabrica,$id_OsCliente,$MES,$Modelo,$obs,$Status,$tipo,$fk_id_peca)
    {
      global $pdo;
          global $msgErro;
      
        //caso nao tenha
        $sql = $pdo->prepare("INSERT INTO os (ANO, AnoFabrica, id_OsCliente, MES, Modelo, obs, Status, tipo, fk_id_peca) VALUES (:ANO,:AnoFabrica,:id_OsCliente,:MES,:Modelo,:obs,:Status,:tipo,:fk_id_peca)");

        $sql->bindValue(":ANO", $ANO);
        $sql->bindValue(":AnoFabrica", $AnoFabrica);
        $sql->bindValue(":id_OsCliente", $id_OsCliente);
        $sql->bindValue(":MES", $MES);
        $sql->bindValue(":Modelo", $Modelo);
        $sql->bindValue(":obs", $obs);
        $sql->bindValue(":Status", $Status);
        $sql->bindValue(":tipo", $tipo);
        $sql->bindValue(":fk_id_peca", $fk_id_peca);

        $sql->execute();
        return true;
      

    }

    //  public function updateOS( $id_OsCliente, $idc, $idos, $Autocalve, $AutocalveNS, $Modelo, $AnoFabrica, $Npt, $obs)
    // {
    //   global $pdo;
    //       global $msgErro;
      
    //     //caso nao tenha
    //     $sql = $pdo->prepare("UPDATE os SET id_OsCliente='$idos', AutoCN='$Autocalve', AutoCS='$AutocalveNS', Modelo='$Modelo', AnoFabrica='$AnoFabrica', NPART='$Npt', Obs='$obs' WHERE idOS = '$idc'");

    //     $sql->execute();
    //     return true;
    // }
    public function updateOS($idOS, $NPART, $Modelo, $Status)
    {
      global $pdo;
          global $msgErro;
      
        //caso nao 
     $sql = $pdo->prepare("UPDATE os SET  idOS='$idOS', NPART='$NPART', Modelo='$Modelo', Status='$Status' where idOS = '$idOS'");

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
    
// public function upPC($id,$Nome, $NumeroS, $Tamanho, $Cor, $Marca,$Tipo)
//     {
//       global $pdo;
//           global $msgErro;
      
//         //caso nao 
//      $sql = $pdo->prepare("UPDATE peca SET  Nome='$Nome', NumeroS='$NumeroS', Tamanho='$Tamanho', Cor='$Cor', Marca='$Marca',
//      Tipo='$Tipo' where id_peca = '$id'");

//         $sql->execute();
//         return true;
      

//     }
    public function upPC($id,$id_peca, $Numero_serie, $numero_patrimonio, $modelo, $fabricante,$tensao,$autoclave)
    {
      global $pdo;
          global $msgErro;
      
        //caso nao 
     $sql = $pdo->prepare("UPDATE pecac SET  id_peca='$id_peca', Numero_serie='$Numero_serie', numero_patrimonio='$numero_patrimonio', modelo='$modelo', fabricante='$fabricante', tensao='$tensao',
     autoclave='$autoclave' where id_peca = '$id'");

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
    

public function CadastrarPC( $Nome, $Numero_serie, $modelo, $fabricante, $potencia, $tensao, $Ano, $fk_setor)
    {
      global $pdo;
          global $msgErro;
      
        //caso nao tenha
$sql = $pdo->prepare("INSERT INTO pecac (Nome, Numero_serie, modelo, fabricante, potencia, tensao, Ano, fk_setor) VALUES (:Nome, :Numero_serie, :modelo, :fabricante, :potencia, :tensao, :Ano, :fk_setor)");

        $sql->bindValue(":Nome", $Nome);
        $sql->bindValue(":Numero_serie", $Numero_serie);
        $sql->bindValue(":modelo", $modelo);
        $sql->bindValue(":fabricante", $fabricante);
        $sql->bindValue(":potencia", $potencia);
        $sql->bindValue(":tensao",$tensao);
        $sql->bindValue(":Ano",$Ano);
        $sql->bindValue(":fk_setor",$fk_setor);
    

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
