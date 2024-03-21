<?php

declare(strict_types=1);

namespace Blog;

use InvalidArgumentException;
use PDO;
use PDOException;

class Database
{
    private PDO $connection;

    public function __construct(string $dsn, string $username = null, string $password = null)
    {
        try {
            $this->connection = new PDO($dsn, $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        } 
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }

}

// $dsn = $config['dsn'];
// $username = $config['username'];
// $password = $config['password'];