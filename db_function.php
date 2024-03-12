<?PHP
class DB {
    private $pdo;

    public function __construct(){
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=Chuck', 'root', '');
            echo 'Connection successful';
        } catch(PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}