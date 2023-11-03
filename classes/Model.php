<?php



abstract class Model
{
    protected $table;
    public function __construct()
    {
    }







    public function create(array $data)
    {
        global $connection;
        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data)); // Add ":" before each column name
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$values})";
        $stmt = $connection->prepare($sql);
        $stmt->execute($data);
        return $connection->lastInsertId();
    }

    public function all()
    {
        global $connection;
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $connection->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    function select(array $where = [], $order = '', $limit = '') {
        global $connection;
        $sql = "SELECT * FROM {$this->table}";
        
        // Add WHERE clause if provided
        if (!empty($where)) {
            $sql .= " WHERE ";
            $whereClauses = [];
            foreach ($where as $column => $value) {
                $whereClauses[] = "$column = :$column";
            }
            $sql .= implode(" AND ", $whereClauses);
        }
        
        // Add ORDER BY clause if provided
        if (!empty($order)) {
            $sql .= " ORDER BY $order";
        }
        
        // Add LIMIT clause if provided
        if (!empty($limit)) {
            $sql .= " LIMIT :limit";
        }
        
        $stmt = $connection->prepare($sql);
        
        // Bind parameter values for WHERE clause
        foreach ($where as $column => $value) {
            $stmt->bindValue(":$column", $value);
        }
        
        // Bind parameter value for LIMIT clause
        if (!empty($limit)) {
            $stmt->bindValue(":limit", (int)$limit, PDO::PARAM_INT);
        }
        
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get($columns = ["*"], $where = [], $order = "", $page = 1, $perPage = 10)
    {
        global $connection;
        $query = "SELECT ";
        if ($columns[0] == "*") {
            $query .= "*";
        } else {
            $query .= implode(", ", $columns);
        }
        $query .= " FROM {$this->table}";
        if (!empty($where)) {
            $query .= " WHERE ";
            $where_parts = [];
            foreach ($where as $key => $value) {
                $where_parts[] = "$key = '$value'";
            }
            $query .= implode(" AND ", $where_parts);
        }
        if (!empty($order)) {
            $query .= " ORDER BY $order";
        }

        // Calculate the starting index of the rows
        $start = ($page - 1) * $perPage;

        // Add the LIMIT clause to the query
        $query .= " LIMIT $start, $perPage";

        $stmt = $connection->prepare($query);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }



    public function selectRand()
    {
        
    }




    public function find($id)
    {
        global $connection;
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $connection->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result[0];
    }
    public function update($values, $where)
    {

        global $connection;

        $query = "UPDATE {$this->table} SET ";

        $set_parts = [];

        $params = [];

        foreach ($values as $key => $value) {
            $set_parts[] = "{$key} = ?";
            $params[] = $value;
        }

        $query .= implode(", ", $set_parts);

        $query .= " WHERE ";

        $where_parts = [];

        foreach ($where as $key => $value) {
            $where_parts[] = "{$key} = ?";
            $where_params[] = $value;
        }

        $query .= implode(" AND ", $where_parts);

        $stmt = $connection->prepare($query);

        $stmt->execute(array_merge($params, $where_params));

        return $stmt->rowCount();
    }



    public function delete($id)
    {

        global $connection;
        $stmt = $connection->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
