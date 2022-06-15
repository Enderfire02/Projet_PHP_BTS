<?php 

class Bd{

    private $dsn = 'mysql:host=localhost';
    private $user = 'root';
    private $password = '';
    private $dbName = 'projet_php';
    private $dbh;

    public function __construct(){
        try{
            $this->dbh = new PDO($this->dsn, $this->user, $this->password);
        } catch(PDOException $e) {
            echo "error :" .$e->getMessage();
        }
    }

    public function BDqueryAssos($sql, $assos){
        $statement = $this->dbh->prepare($sql);
        $statement->execute($assos);
        $retour = $statement->fetchAll(PDO::FETCH_ASSOC);
        $nmb = $statement->rowCount();
        return array($retour, $nmb); 
        
    }

    public function BDquery($sql){
        $statement = $this->dbh->prepare($sql);
        $statement->execute();
        $retour = $statement->fetchAll(PDO::FETCH_ASSOC);
        $nmb = $statement->rowCount();
        return array($retour, $nmb);
    }
}

?>