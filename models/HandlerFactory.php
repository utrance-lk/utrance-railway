<?php

// DON'T EDIT THIS CLASS

class HandlerFactory{

    public function getOne($table, $field, $value) { // getOne('users', 'id', '$this->id')
        $query = App::$APP->db->pdo->prepare("SELECT * FROM $table WHERE $field=:field LIMIT 1");
        $query->bindValue(":field", $value);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll($table, $field, $value) {
        $query = App::$APP->db->pdo->prepare("SELECT * FROM $table WHERE $field=:field");
        $query->bindValue(":field", $value);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createOne($table, $valueArray) { // createOne('users', ['first_name' => $this->first_name', 'last_name' => $this->last_name])
        $columnString = '';
        $bindString = '';
        
        foreach($valueArray as $key => $item) {
            $columnString .= "$key,";
            $bindString .= ":$key,";
        }
        
        $columnString = substr($columnString, 0, -1);
        $bindString = substr($bindString, 0, -1);
        $query = App::$APP->db->pdo->prepare("INSERT INTO $table ($columnString) VALUES ($bindString)");
        
        foreach($valueArray as $key => $item) {
            $query->bindValue(":$key", $item);
        }

        $query->execute();
        return 'success';
    }

    public function updateOne($table, $field, $value, $valueArray) { 
        // updateOne('users', 'id', $this->id, ['first_name' => $this->first_name', 'last_name' => $this->last_name])
        $bindString = '';
        
        foreach ($valueArray as $key => $item) {
            $bindString .= "$key=:$key,";
        }

        $bindString = substr($bindString, 0, -1);

        $query = App::$APP->db->pdo->prepare("UPDATE $table SET $bindString WHERE $field=:field");

        foreach ($valueArray as $key => $item) {
            $query->bindValue(":$key", $item);
        }

        $query->bindValue(":field", $value);

        $query->execute();
        
        return 'success';
    }
}

?>