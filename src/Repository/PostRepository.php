<?php

namespace silverorange\DevTest\Repository;

use silverorange\DevTest\Model\Post;

class PostRepository extends Repository
{
    public function getOneById(string $id): Post
    {
        $stmt = $this->db->prepare("
            SELECT BIN_TO_UUID(id) id, title, body, created_at, modified_at, BIN_TO_UUID(author) author
            FROM Posts
            WHERE id=UUID_TO_BIN(:id)
        ");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $postData = $stmt->fetch();

        return new Post($postData);
    }

    public function getAll(): array
    {
        $posts = [];
        $stmt = $this->db->query("
            SELECT BIN_TO_UUID(id) id, title, body, created_at, modified_at, BIN_TO_UUID(author) author
            FROM Posts
            ORDER BY created_at DESC
        ");
        $postsData = $stmt->fetchAll();

        foreach($postsData as $key => $post) {
            $posts[] = new Post($post);
        }

        return $posts;
    }
}
