<?php
include './Controllers/controller.php';
include './Models/NotetypeModel.php';
class NotetypeController {
    public function index()
    {
        $Notetype = new NotetypeModel();
        // $notestype = $Notetype->getAll();
        $total_records = $Notetype->count();

        $limit  = 5;
        $total_page = ceil($total_records / $limit);

        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        if ($page > 1) {
            $pre = $page - 1;
        } else {
            $pre = 1;
        }
        if ($page < $total_page) {
            $next = $page + 1;
        } else {
            $next = $total_page;
        }

        $offset = ($page - 1) * $limit;

        $items = $Notetype->paginate($offset, $limit);
        $param = [
            'items' => $items,
            // 'total_page' => $total_page,
            // 'pre' => $pre,
            // 'next' => $next,
        ];
        $controller = new Controllers();
        $controller->renderView("/Notestype/index.php", $param);
        // include_once './Views/Notestype/index.php';
    }

    public function show()
    {
        $id = $_GET['id'];
        include_once './views/Notes/show.php';

    }

    public function add()
    {
        $errors= [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $NotetypeModel = new NotetypeModel();
            $Notetype = $NotetypeModel->store($_REQUEST);
            $_SESSION['flash_message'] = 'Thêm mới thành công';
            header('Location:index.php?controller=Notetype&action=index');
         }
            
            include_once './views/Notestype/add.php';
    }

    public function edit()
    {

      $id = $_GET['id'];
      $NotetypeModel = new NotetypeModel();
      $notetype =  $NotetypeModel->getOne($id);
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $NotetypeModel->update($id,$_REQUEST);
        header('Location:index.php?controller=Notetype&action=index');

      }
        include_once './views/Notestype/edit.php';
    }

    public function delete(){

        try {
            $id = $_GET['id'];
            $NotetypeModel   = new NotetypeModel();
            $NotetypeModel->delete($id);
            $_SESSION['flash_message'] = 'Xóa thành công';
        } catch (\Exception $e) {
            $_SESSION['flash_message'] = 'Không thể xóa còn liên kết bảng note !';
        }
             header('Location:index.php?controller=Notetype&action=index');
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $search = $_POST['search'];
            $NotetypeModel = new NotetypeModel();
            $notestype = $NotetypeModel->search($search); 
        }
        include_once './views/Notestype/search.php';
    }

}