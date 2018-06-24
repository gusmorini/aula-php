<?php declare(strict_types = 1);

namespace Alfa;

class Usuario {
    public static $dbh;
    public static $arquivoLog;
    public $id;
    public $email;
    public $senha;
    public $ultimo_login;

    public function __construct(array $dados, \PDO $dbh){
        self::$dbh = $dbh;
        $this->hydrate($dados);
    }

    public function persistir(){
        $sql = 'INSERT INTO usuario (email,senha,ultimo_login) 
                VALUES (:email,:senha, NOW())';
        $sth = self::$dbh->prepare($sql);
        $sth->bindParam(':email', $this->email, \PDO::PARAM_STR);
        $sth->bindParam(':senha', $this->senha, \PDO::PARAM_STR);
        try{
            $sth->execute();
        }catch(\Exception $e){
            die($e->getMessage());
        }
    }

    public function autenticar(): bool {
        $sql = 'SELECT senha FROM usuario WHERE email = :email';
        $sth = self::$dbh->prepare($sql);
        $sth->bindParam(':email', $this->email, \PDO::PARAM_STR);
        $sth->execute();
        $registro = $sth->fetchObject();
        return password_verify($this->senha, $registro->senha);
    }

    private static function log($evento){
        //barra invertida para declarar classe do próprio sistema ( \ )
        $date = new \DateTime(); 
        $time = $date->format('H:i:s');
        self::$arquivoLog = __DIR__ . '/../../data/log/' . $date->format('Y-m-d') . '.log';
        //modo simples
        file_put_contents(self::$arquivoLog, sprintf('%s  %s' . PHP_EOL , $time, $evento), FILE_APPEND);
    }

    // use tem que estar dentro da classe

    use Traits\Hidratacao;

    public function __destruct(){
        self::log('objeto destruído');
    }

}// classe Usuario