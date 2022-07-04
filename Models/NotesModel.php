<?php
class NoteModel{
    private $table = 'note';
    // Lấy tất cả kết quả dựa vào id
    public function getAll(){
        global $connect;
        $sql = "SELECT note.id, note.title, note.content,note_type.name,note.type_id
        FROM note JOIN note_type ON note.type_id = note_type.id";
        $stmt =$connect->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $rows = $stmt->fetchAll();
        // echo "<pre>";
        // print_r($sql);
        // die();
        return $rows;
    }
     //lấy 1 kết quả dựa vào id
    public function getOne($id){
        global $connect;
        $sql = "SELECT note.id, note.title, note.content,note_type.name,note.type_id
        FROM note JOIN note_type ON note.type_id = note_type.id WHERE $this->table.id = $id"; 
        $stmt = $connect->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $row = $stmt->fetch();
        return $row;
    }
    //Thêm mới dữ liệu
    public function store($data){
        global $connect;
        $title = $data['title'];
        $content = $data['content'];
        $type_id = $data['type_id'];
        $sql = "INSERT INTO $this->table  (`id`, `title`, `content`, `type_id`) VALUES (NULL,'$title','$content','$type_id');";       
        $connect->exec($sql);
    }
    //Cập nhật dữ liệu
    function update($id,$data){
        global $connect; 
        $title = $data['title'];
        $content = $data['content'];
        $type_id = $data['type_id'];
        $sql = "UPDATE $this->table SET title = '$title',content = '$content',type_id = '$type_id' WHERE id = '$id'";     
        $connect->exec($sql);
    }
    //Xóa dữ liệu
    public function destroy($id){
        global $connect;
        $sql = "DELETE FROM $this->table  WHERE id = $id";
        $connect->exec($sql);
    }
    public function search($search, $type_id){
        global $connect;
        $sql = "SELECT note.id, note.title, note.content, note_type.name, note.type_id
        FROM note JOIN note_type ON note.type_id = note_type.id WHERE note.id > 0 ";

        if($type_id){
            $sql.= " AND note.type_id = $type_id";
        }      
        if($search){
            $sql.= " AND note.title LIKE '%$search%' ";
        }      
        $stmt =$connect->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $rows = $stmt->fetchAll();
        return $rows;
    }

}