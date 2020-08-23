<?php
class Reperti{
 
    private $conn;
    private $table_name = "reperti";
 
    // proprietà oggetto
    public $id;
    public $descrizione;
    public $datazione;
    public $luogo_rit;
    public $data_rit;
    public $ut;
    //public $img;
    public $data_ins;

    // costruttore per la connessione con l'oggetto database
    public function __construct($db){
        $this->conn = $db;
    }

    function create()
    {
     
        // query di inserimento nuovi reperti
        $query = "INSERT INTO " . $this->table_name . " SET descrizione=:descrizione, datazione=:datazione, luogo_rit=:luogo_rit, data_rit=:data_rit, data_ins=:data_ins, utente=:ut";
     
        // preparazione query
        $stmt = $this->conn->prepare($query);
     
        // controllo sui caratteri da inserire nella query
        $this->descrizione=htmlspecialchars(strip_tags($this->descrizione));
        $this->datazione=htmlspecialchars(strip_tags($this->datazione));
        $this->luogo_rit=htmlspecialchars(strip_tags($this->luogo_rit));
        $this->data_rit=htmlspecialchars(strip_tags($this->data_rit));
        $this->data_ins=htmlspecialchars(strip_tags($this->data_ins));
        $this->ut=htmlspecialchars(strip_tags($this->ut));


        // inserimento variabili nella query
        $stmt->bindParam(":descrizione", $this->descrizione);
        $stmt->bindParam(":datazione", $this->datazione);
        $stmt->bindParam(":luogo_rit", $this->luogo_rit);
        $stmt->bindParam(":data_rit", $this->data_rit);
        $stmt->bindParam(":data_ins", $this->data_ins);
        $stmt->bindParam(":ut", $this->ut);
        
        // esecuzione
        if($stmt->execute())
        {
            return true;
        }
        return false; 
    }

    function read()
    { 
        //query di selezione per tutti i prodotti
        $query = "SELECT id, descrizione FROM ". $this->table_name ;
        // preparazione query
        $stmt = $this->conn->prepare($query);
        //esecuzione
        $stmt->execute();
        return $stmt;
    }

    function update()
    {
        //query di aggiornamento per il reperto selezionato
        $query = "UPDATE ". $this->table_name ." SET descrizione=?, datazione=?, luogo_rit=?, data_rit=? WHERE id = ?";

        // preparazione query
        $stmt = $this->conn->prepare($query);
     
        // controllo sui caratteri da inserire nella query
        $this->descrizione=htmlspecialchars(strip_tags($this->descrizione));
        $this->datazione=htmlspecialchars(strip_tags($this->datazione));
        $this->luogo_rit=htmlspecialchars(strip_tags($this->luogo_rit));
        $this->data_rit=htmlspecialchars(strip_tags($this->data_rit));
        //$this->img=htmlspecialchars(strip_tags($this->img));
        $this->id=htmlspecialchars(strip_tags($this->id));

        // inserimento variabili nella query
        $stmt->bindParam(1, $this->descrizione);
        $stmt->bindParam(2, $this->datazione);
        $stmt->bindParam(3, $this->luogo_rit);
        $stmt->bindParam(4, $this->data_rit);
        //$stmt->bindParam(5, $this->img);
        $stmt->bindParam(5, $this->id);

        // esecuzione
        if($stmt->execute())
        {
            return true;
        }
        return false;
    }

    
    function delete()
    {
        //query di cancellazione reperto
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
     
        // controllo sui caratteri da inserire nella query
        $this->id=htmlspecialchars(strip_tags($this->id));
        // inserimento variabili nella query
        $stmt->bindParam(1, $this->id);
        
        //esecuzione
        if($stmt->execute())
        {
            return true;
        }
        return false;
    }

    function search()
    {
        //query per la lettura di tutti i parametri di un singoloo reperto
        $query = "SELECT * FROM ". $this->table_name ." WHERE id = ?";
     
        //preparazione query
        $stmt = $this->conn->prepare($query);
     
        // controllo sui caratteri da inserire nella query
        $this->id=htmlspecialchars(strip_tags($this->id));
        // inserimento variabili nella query
        $stmt->bindParam(1, $this->id);
     
        //esecuzione
        $stmt->execute();
     
        //ricezione parametri da restuire
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //inserimento parametri nella risposta
        $this->id = $row['id'];
        $this->descrizione = $row['descrizione'];
        $this->datazione = $row['datazione'];
        $this->luogo_rit = $row['luogo_rit'];
        $this->data_rit = $row['data_rit'];
        //$this->img = $row['img'];
    }

}


?>