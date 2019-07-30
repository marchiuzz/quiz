<?php

declare(strict_types = 1);

namespace Quiz;

use PDO;
use PDOException;

class Database
{
    /**
     * @var PDO
     */
    private $connection;

    /**
     * @var string
     */
    private $host = 'localhost';
    /**
     * @var int
     */
    private $port = 3306;
    /**
     * @var string
     */
    private $dbName = 'quiz';
    /**
     * @var string
     */
    private $user = 'root';
    /**
     * @var string
     */
    private $password = '';

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->connection = $this->makeConnection();
    }

    /**
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->connection;
    }

    /**
     * @return PDO
     */
    private function makeConnection(): PDO
    {
        $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->dbName;charset=utf8";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            return new PDO(
                $dsn,
                $this->user,
                $this->password,
                $options
            );
        } catch (PDOException $exception) {
            throw new PDOException($exception->getMessage(), $exception->getCode());
        }
    }
}