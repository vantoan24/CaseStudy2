<?php
class NotetypeModel{
    public function getAll(){
    global $connect;
    $sql = "SELECT * FROM note_type";
    $stmt = $connect->query($sql);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $rows = $stmt->fetchAll();
    return $rows;
}
    public function getOne($id){
        global $connect;
        $sql = "SELECT * FROM note_type WHERE id = '$id'";
        $stmt = $connect->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $rows = $stmt->fetch();
        return $rows;
    }
    public function store($data){
        global $connect;
        $name = $data['name'];
        $description = $data['description'];
        $sql = "INSERT INTO note_type (id, name, description) VALUES (null, '$name', '$description')";
        $connect->exec($sql);
    }
    public function update($id,$data){
        global $connect;
        $name = $data['name'];
        $description = $data['description'];
        $sql = "UPDATE note_type SET name = '$name', description = '$description' WHERE id = '$id'";
        $connect->exec($sql);
    }
    public function delete($id){
       global $connect;
       $sql = "DELETE FROM note_type WHERE id = $id";
       $connect->exec($sql);
    }
    public function search($search){
        global $connect;
        $sql = "SELECT * FROM note_type WHERE name LIKE '%$search%'";
        $stmt = $connect->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $rows = $stmt->fetchAll();
        return $rows;

    }
    function count()
    {
        global $connect;
        $sql = "SELECT count(id) as total FROM note_type WHERE soft_delete = 0";
        $stmt = $connect->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $total_records = $stmt->fetchAll();
        $total_record = $total_records[0]['total'];
        return $total_record;
    }

    function paginate($offset, $limit)
    {
        global $connect;
        $sql = "SELECT *
        FROM  note_type WHERE soft_delete = 0
        LIMIT $offset, $limit";
        $stmt = $connect->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $items = $stmt->fetchAll();
        return $items;
    }

}