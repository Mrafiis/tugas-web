<?php
require_once ROOT_PATH . '/app/core/Model.php';
/** @noinspection PhpUndefinedClassInspection */
class Category extends Model
{
    protected string $table = 'categories';
    // ini untuk mengambil semua kategori
    public function all(): array
    {
        return $this->db
            ->query("SELECT * FROM categories ORDER BY id ASC")
            ->fetchAll();
    }

    // ini untuk mengambil 1 kategori
    public function find(int $id)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM categories WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // ini fungsi untuk tambah kategori
    public function create(array $data): bool
    {
        return $this->db->prepare(
            "INSERT INTO categories
            (name,description)
            VALUES
            (
                :name,
                :description
            )"
        )->execute($data);
    }

    // ini fungsi untuk update kategori
    public function update(int $id,array $data): bool
    {
        $data['id']=$id;
        return $this->db->prepare(
            "UPDATE categories SET name=:name, description=:description WHERE id=:id"
        )->execute($data);
    }

    // ini fungsi untuk hapus data kategori
    public function remove(int $id)
    {
        $stmt = $this->db->prepare(
            "DELETE FROM categories WHERE id = :id"
        );
        return $stmt->execute([
            'id'=>$id
        ]);
    }
       
    public function countItems(int $id)
        {
            $stmt = $this->db->prepare(
                "SELECT COUNT(*) as total 
                FROM items 
                WHERE category_id = :id"
            );

            $stmt->execute([
                'id'=>$id
            ]);

            return $stmt->fetch()['total'];
        }
        // fungsi panigate
        public function paginate(int $limit, int $offset, string $search = ''): array
            {
                $sql = "SELECT * FROM categories";
                if ($search !== '') {
                    $sql .= " WHERE name LIKE :search";
                }
                $sql .= " ORDER BY id ASC LIMIT :limit OFFSET :offset";
                $stmt = $this->db->prepare($sql);
                if ($search !== '') {
                    $stmt->bindValue(':search', '%' . $search . '%');
                }
                $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

        public function count(string $search = ''): int
            {
                $sql = "SELECT COUNT(*) as total FROM categories";
                if ($search !== '') {
                    $sql .= " WHERE name LIKE :search";
                }
                $stmt = $this->db->prepare($sql);
                if ($search !== '') {
                    $stmt->bindValue(':search', '%' . $search . '%');
                }
                $stmt->execute();
                return (int) $stmt->fetch(PDO::FETCH_ASSOC)['total'];
            }
}