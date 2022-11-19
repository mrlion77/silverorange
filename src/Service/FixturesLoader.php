<?php

namespace silverorange\DevTest\Service;

class FixturesLoader
{
    protected \PDO $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function loadPostFixtures(array $jsonData): void
    {
        foreach($jsonData as $post) {
            $created_at = $this->getProperDate($post->created_at);
            $modified_at = $this->getProperDate($post->modified_at);

            $stmt = $this->db->prepare("
                INSERT INTO Posts (id, title, body, created_at, modified_at, author)
                VALUES (UUID_TO_BIN(:id), :title, :body, :created_at, :modified_at, UUID_TO_BIN(:author))
            ");

            $stmt->bindParam(':id', $post->id);
            $stmt->bindParam(':title', $post->title);
            $stmt->bindParam(':body', $post->body);
            $stmt->bindParam(':created_at', $created_at);
            $stmt->bindParam(':modified_at', $modified_at);
            $stmt->bindParam(':author', $post->author);
            $stmt->execute();
        }
    }

    private function getProperDate(string $date)
    {
        return str_replace('T', ' ', substr($date, 0, 19));
    }
}
