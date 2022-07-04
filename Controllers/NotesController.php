<?php
include './Models/NotesModel.php';
include './Models/NotetypeModel.php';
class NoteController {
    public function index(){
        $NotetypeModel = new NotetypeModel();
        $notestypes = $NotetypeModel->getAll();
        // $alert = (isset($_SESSION['alert'])) ? $_SESSION['alert'] : '';
        // unset($_SESSION['alert']);
        $Note = new NoteModel();
        $notes = $Note->getAll();

    include_once './views/Notes/index.php';
    }
    public function show(){
        $id = $_GET['id'];
        $NoteModel = new NoteModel();
        $note = $NoteModel ->getOne($id);
        include_once './views/Notes/show.php';     
    }
    public function add(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
         $NoteModel = new NoteModel();
         $NoteModel->store($_REQUEST);
         $_SESSION['flash_message'] = 'Thêm mới thành công';
        header('Location:index.php?controller=Note&action=index');
        }
        $Notetype = new NotetypeModel();
        $notestypes = $Notetype->getAll();
        include_once './views/Notes/add.php';
    }  
    public function edit(){
        $id = $_GET['id'];
        $NoteModel = new NoteModel();
        $note =  $NoteModel->getOne($id);
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){  
            // echo "<pre>"; 
            // print_r($_REQUEST);
          $NoteModel->update($id,$_REQUEST); 
          $_SESSION['flash_message'] = 'Sửa thành công';
          header('Location:index.php?controller=Note&action=index');
        }
        $NotetypeModel = new NotetypeModel();
        $notestypes = $NotetypeModel->getAll();
        include_once './views/Notes/edit.php';
    }
    public function delete(){    
        try {
            $id = $_GET['id'];
            $Notety  = new NoteModel();
            $notetype = $Notety->destroy($id);
            $_SESSION['flash_message'] = 'Xóa thành công';
        } catch (\Exception $e) {
            $_SESSION['flash_message'] = 'Xóa không thành công';
        }
        header('Location:index.php?controller=Note&action=index');
    }
    public function search(){
        $NotetypeModel = new NotetypeModel();
        $notestypes = $NotetypeModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            // echo "<pre>";
            // print_r($_REQUEST);
            // die();
            $type_id = $_POST['type_id'];
            $search = $_POST['search'];
            $NoteModel = new NoteModel();
            $notes = $NoteModel->search($search,$type_id);        
            include_once './views/Notes/search.php';
        }
    }
}