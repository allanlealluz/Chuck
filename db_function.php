<?PHP
class DB {
    private $pdo;

    public function __construct(){
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=Chuck', 'root', '');
            echo 'Connection successful'. $this->pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS);
        } catch(PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
    public function register(string $name, string $email, string $password): bool {
        $stmt = $this->pdo->prepare("SELECT email, name, password FROM users WHERE name = :name OR email = :email");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return false;
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $passwordHash, PDO::PARAM_STR);

        return $stmt->execute();
    }
    public function login(string $email, string $password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user && password_verify($password, $user['password'])) {
            return true;
        }
    
        return false;
    }
}