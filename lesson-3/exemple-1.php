<?php
// ClosureTable

class ClosureTable
{
    static $DB = 'gb-algorithm';
    static $nodes_table = 'categories_db';
    static $edges_table = 'category_links';

    /**
     * Установка связи с БД
     *
     */
    function __construct() {
        $this->parenId = false;
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=' . self::$DB, 'mysql', 'mysql');
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . PHP_EOL;
            die();
        }
    }

    /**
     * Выполнение запроса
     * @param $raw_query_str
     * @param array $execute
     * @return bool|PDOStatement
     */
    protected function query($raw_query_str, $execute = []) {
        $stmt = $this->pdo->prepare($raw_query_str);
        $stmt->execute($execute);
        return $stmt;
    }

    /**
     * Выбор родительской категории, допустим если нам не надо всё
     * @param int $node
     * @return $this
     */
    public function setParentNode($node = 1) {
        // Проверка
        $result = $this->query("SELECT * FROM ".self::$nodes_table." WHERE id_category = " . $node);
        if( !$result->fetch(PDO::FETCH_ASSOC) ) {
            $this->parenId = false;
        }
        $this->parenId = $node;
        return $this;
    }

    /**
     * Берём категории из бд
     */
    public function getArThree($parent_node = false) {
        if($parent_node === false) {
            $parent_node = $this->parenId;
        }
        if(!$parent_node) {
            return [];
        }

        $arThree = $this->query(
    "SELECT c.id_category, c.category_name, cl.parent_id, cl.child_id, cl.level
                FROM `".self::$nodes_table."` AS `c`
                INNER JOIN `".self::$edges_table."` AS `cl` ON `c`.`id_category` = `cl`.`child_id`
                WHERE `cl`.`parent_id` = '". $parent_node ."';"
        );

        return $arThree;
    }


    /**
    *   Строим дерево
     */
    public function buildThree($array) {
        $arCategory = [];
        foreach($array as $row) {
            $arCategory[$row['id_category']] = $row;
        }
    }
}

$NS = new ClosureTable();
$three = $NS->setParentNode(1)->getArThree();
$NS->buildThree($three);
