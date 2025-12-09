<?php
namespace App\Core;

use App\Core\Database;
use PDO;

abstract class BaseModel {
    protected static string $table; // يجب تحديده في كل Model
    protected static array $fillable = []; // الحقول التي يمكن تعبئتها

    protected static function getPDO(): PDO {
        return Database::getInstance();
    }

    public static function create(array $data): int {
        $pdo = self::getPDO();

        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));

        $stmt = $pdo->prepare("INSERT INTO " . static::$table . " ($columns) VALUES ($placeholders)");
        $stmt->execute($data);

        return $pdo->lastInsertId();
    }

    public static function all(): array {
        $pdo = self::getPDO();
        $stmt = $pdo->query("SELECT * FROM " . static::$table);
        return $stmt->fetchAll();
    }

    public static function find(int $id): ?array {
        $pdo = self::getPDO();
        $stmt = $pdo->prepare("SELECT * FROM " . static::$table . " WHERE Id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch() ?: null;
    }

    public static function delete(int $id): bool {
        $pdo = self::getPDO();
        $stmt = $pdo->prepare("DELETE FROM " . static::$table . " WHERE Id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public static function update(int $id, array $data): bool {
        $pdo = self::getPDO();
        $set = [];
        foreach ($data as $column => $value) {
            $set[] = "$column = :$column";
        }
        $setString = implode(", ", $set);
        $data['id'] = $id;

        $stmt = $pdo->prepare("UPDATE " . static::$table . " SET $setString WHERE Id = :id");
        return $stmt->execute($data);
    }
}
