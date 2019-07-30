<?php

namespace Quiz\Models;

use PDO;
use Quiz\Model;

class Quiz extends Model
{
    protected $table = "t_quizes";

    public function getByCategory(?string $categorySlug = null)
    {

        $sql = "SELECT q.* FROM " . $this->table . " as q";

        if ($categorySlug !== null) {
            $sql .= " INNER JOIN t_category_quiz_pivot as cqp ON q.id = cqp.quiz_id";
            $sql .= " INNER JOIN t_categories as c ON (cqp.category_id = c.id AND c.slug = :categorySlug)";
        }

        $stmt = $this->getConnection()->prepare($sql);

        if ($categorySlug !== null) {
            $stmt->bindValue("categorySlug", $categorySlug, PDO::PARAM_STR);
        }

        $stmt->execute();

        return $stmt->fetchAll();

    }
}