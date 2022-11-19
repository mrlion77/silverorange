<?php

namespace silverorange\DevTest\Repository;

use silverorange\DevTest\Model\Author;

class AuthorRepository extends Repository
{
    public function getOneById(string $id): Author
    {
        $stmt = $this->db->prepare("
            SELECT BIN_TO_UUID(id) id, full_name, created_at, modified_at
            FROM Authors
            WHERE id=UUID_TO_BIN(:id)
        ");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $authorData = $stmt->fetch();

        return new Author($authorData);
    }
}
