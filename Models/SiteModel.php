<?php

require_once __DIR__ . '/../core/Model.php';

class SiteModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->_table = "sites";
    }

    public function insert($titre, $url, $description, $categoryId, $userId)
    {
        $sql = "INSERT INTO sites (titre, url, description, category_id, user_id, status)
                VALUES (:titre, :url, :description, :category_id, :user_id, 'approved')";

        $sth = $this->_pdo->prepare($sql);

        return $sth->execute([
            'titre' => $titre,
            'url' => $url,
            'description' => $description,
            'category_id' => $categoryId,
            'user_id' => $userId
        ]);
    }

    public function findByUser($userId)
    {
        $sql = "SELECT sites.*, category.libelle AS category_name
                FROM sites
                INNER JOIN category ON sites.category_id = category.id
                WHERE sites.user_id = :user_id
                ORDER BY sites.created_at DESC";

        $sth = $this->_pdo->prepare($sql);
        $sth->execute([
            'user_id' => $userId
        ]);

        return $sth->fetchAll();
    }

    public function findByIdAndUser($id, $userId)
    {
        $sql = "SELECT *
                FROM sites
                WHERE id = :id
                AND user_id = :user_id";

        $sth = $this->_pdo->prepare($sql);
        $sth->execute([
            'id' => $id,
            'user_id' => $userId
        ]);

        return $sth->fetch();
    }

    public function update($id, $titre, $url, $description, $categoryId, $userId)
    {
        $sql = "UPDATE sites
                SET titre = :titre,
                    url = :url,
                    description = :description,
                    category_id = :category_id
                WHERE id = :id
                AND user_id = :user_id";

        $sth = $this->_pdo->prepare($sql);

        return $sth->execute([
            'id' => $id,
            'titre' => $titre,
            'url' => $url,
            'description' => $description,
            'category_id' => $categoryId,
            'user_id' => $userId
        ]);
    }

    public function deleteByUser($id, $userId)
    {
        $sql = "DELETE FROM sites
                WHERE id = :id
                AND user_id = :user_id";

        $sth = $this->_pdo->prepare($sql);

        return $sth->execute([
            'id' => $id,
            'user_id' => $userId
        ]);
    }

    public function searchPublic($keyword = null, $categoryId = null)
    {
        $sql = "SELECT sites.*, category.libelle AS category_name
                FROM sites
                INNER JOIN category ON sites.category_id = category.id
                WHERE sites.status = 'approved'";

        $params = [];

        if (!empty($keyword)) {
            $sql .= " AND (
                sites.titre LIKE :keyword_titre
                OR sites.description LIKE :keyword_description
                OR sites.url LIKE :keyword_url
            )";

            $params['keyword_titre'] = '%' . $keyword . '%';
            $params['keyword_description'] = '%' . $keyword . '%';
            $params['keyword_url'] = '%' . $keyword . '%';
        }

        if (!empty($categoryId)) {
            $sql .= " AND sites.category_id = :category_id";
            $params['category_id'] = $categoryId;
        }

        $sql .= " ORDER BY sites.created_at DESC";

        $sth = $this->_pdo->prepare($sql);
        $sth->execute($params);

        return $sth->fetchAll();
    }

    public function findAllApproved()
    {
        $sql = "SELECT sites.*, category.libelle AS category_name
                FROM sites
                INNER JOIN category ON sites.category_id = category.id
                WHERE sites.status = 'approved'
                ORDER BY sites.created_at DESC";

        $sth = $this->_pdo->prepare($sql);
        $sth->execute();

        return $sth->fetchAll();
    }

    // 🔥 MÉTHODE AJOUTÉE (NE PAS SUPPRIMER)
    public function getLatestApproved($limit = 6)
    {
        $sql = "SELECT sites.*, category.libelle AS category_name
                FROM sites
                INNER JOIN category ON sites.category_id = category.id
                WHERE sites.status = 'approved'
                ORDER BY sites.created_at DESC
                LIMIT :limit";

        $sth = $this->_pdo->prepare($sql);
        $sth->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $sth->execute();

        return $sth->fetchAll();
    }
}