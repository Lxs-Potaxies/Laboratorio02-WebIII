<?php
class Database {
    // Declare private properties
    private $host = db_Servidor;
    private $name = db_Basedato;
    private $user = db_Usuario;
    private $pass = db_Contra;

    private $coman;
    private $conex;
    private $error;

    // Create default constructor
    public function __construct() {
        // Connection string
        $auxConex = 'mysql:host=' . $this->host . ';dbname=' . $this->name;

        // Connection options
        $opciones = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        // Try to create a connection or retrieve error
        try {
            $this->conex = new PDO($auxConex, $this->user, $this->pass, $opciones);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            // Consider logging the error instead of echoing it
            throw new Exception('Database Connection Error: ' . $this->error);
        }
    }

    // Create SQL instruction
    public function query($auxSql) {
        $this->coman = $this->conex->prepare($auxSql);
    }

    // Bind parameters
    public function bind($parameter, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->coman->bindValue($parameter, $value, $type);
    }

    // Execute SQL instruction
    public function execute() {
        return $this->coman->execute();
    }

    // Retrieves a dataset
    public function resultSet() {
        $this->execute();
        return $this->coman->fetchAll(PDO::FETCH_OBJ);
    }

    // Retrieves a single data row
    public function singleRow() {
        $this->execute();
        return $this->coman->fetch(PDO::FETCH_OBJ);
    }

    // Recoups the number of rows retrieved with SQL sentence
    public function rowCount() {
        return $this->coman->rowCount();
    }

    // Optional: Method to close the connection
    public function close() {
        $this->conex = null; // Close the connection
    }
}
?>
