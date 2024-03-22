<?php

declare(strict_types=1);

namespace Blog;

class LatestPosts
{
    private Database $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function get(int $limit): ?array
    {
        $statement = $this->database->getConnection()->prepare(
            'SELECT * FROM post ORDER BY published_date ASC LIMIT '.$limit
        );

        $statement->execute();

        return $statement->fetchAll();
    }
}