<?php
class Utenti{
 
    // database connection and table name
    private $conn;
    private $table_name = "utenti";
 
    // object properties
    public $id;
    public $password;
    public $cognome;
    public $nome;
    public $telefono;
    public $citta;
    public $indirizzo;
    public $mail;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function create()
    {
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET email=:email, password=:password, cognome=:cognome, nome=:nome, telefono=:telefono, citta=:citta, indirizzo=:indirizzo";
     
        // prepare query
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->cognome=htmlspecialchars(strip_tags($this->cognome));
        $this->nome=htmlspecialchars(strip_tags($this->nome));
        $this->telefono=htmlspecialchars(strip_tags($this->telefono));
        $this->citta=htmlspecialchars(strip_tags($this->citta));
        $this->indirizzo=htmlspecialchars(strip_tags($this->indirizzo));
        
        // bind values
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);  
        $stmt->bindParam(":cognome", $this->cognome);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":telefono", $this->telefono);
        $stmt->bindParam(":citta", $this->citta);
        $stmt->bindParam(":indirizzo", $this->indirizzo);

        // execute query
        if($stmt->execute())
        {
            return true;
        }
        return false; 
    }

    function read()
    { 
        // select all raw
        $query = "SELECT * FROM ". $this->table_name ;
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }

    function update()
    {
        // update query
        $query = "UPDATE ". $this->table_name ." SET password=? WHERE email = ?";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->email=htmlspecialchars(strip_tags($this->email));
     
        // bind new values
        $stmt->bindParam(1, $this->password);
        $stmt->bindParam(2, $this->email);
     
        // execute the query
        if($stmt->execute())
        {
            return true;
        }
        return false;
    }

    // delete the product
    function delete()
    {

        $query = "DELETE FROM " . $this->table_name . " WHERE id = '18'";
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
        // bind id of record to delete
        $stmt->bindParam(1, $this->id);
     
        // execute query
        if($stmt->execute())
        {
            return true;
        }
        return false;
    }

    function search($keywords){
 
    // select all query
    $query = "SELECT * FROM ". $this->table_name ." WHERE username LIKE ? ";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $keywords=htmlspecialchars(strip_tags($keywords));
    $keywords = "%{$keywords}%";
 
    // bind
    $stmt->bindParam(1, $keywords);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
    }

    function readOne(){
 
    // query per il controllo dei dati inseriti nel login
    $query = "SELECT email, password FROM " . $this->table_name . " WHERE email= ? AND password= ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind id of product to be updated
    $stmt->bindParam(1, $this->email);
    $stmt->bindParam(2, $this->password);
    // execute query
    $stmt->execute();
 
    /* get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // set values to object properties
    $this->email = $row['email'];
    $this->password = $row['password'];
    */

    $num = $stmt->rowCount();
    $this->num = $num;

    return $stmt;
    }


    function check(){
 
    // query to read single record
    $query="SELECT email FROM " . $this->table_name . " WHERE email = ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind id of product to be updated
    $stmt->bindParam(1, $this->email);
 
    // execute query
    $stmt->execute();
    // get retrieved row
    $num = $stmt->rowCount();

    $this->num = $num;

    return $stmt;
    }



}   
   



?>