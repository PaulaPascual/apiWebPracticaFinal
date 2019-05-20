<?php
namespace Project\Users;
use DateTime;
use Firebase\JWT\JWT;
use Project\Utils\ProjectDao;

class UsersDao
{
    private $dbConnection;

    public function __construct(ProjectDao $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM USERS";
        return $this->dbConnection->fetchAll($sql);
    }

    public function getById($id)
    {
        $sql =  "SELECT * FROM USERS WHERE id = ?";
        return $this->dbConnection->fetch($sql, array($id));
    }

    public function generateToken($userid)
    {
        $now = new DateTime();
        $future = new DateTime("now +1 year");

        $payload = [
            "iat" => $now->getTimeStamp(),
            "exp" => $future->getTimeStamp(),
            "jti" => base64_encode(random_bytes(16)),
            'iss' => "localhost:80",  // Issuer
            "id" => $userid,
        ];

        $secret = 'mysecret';
        $token = JWT::encode($payload, $secret, "HS256");

        return $token;
    }

    public function loginUser($body)
    {
        $password = $body['password'];
        //voy a decirle directamente que el id sea 1, pq solo voy a tener ese usuario
        $sql = "SELECT * FROM USERS WHERE id = ?";
        $user = $this->dbConnection->fetch($sql, array(1));
        if (password_verify($password, $user->password)){
        //if ($user->password === $password) {
            $user->token = $this->generateToken($user->id);
            return $user;
        } else {
            return false;
        }
    }
}
