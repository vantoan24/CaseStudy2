<?php
include './layout/navar.php';
include './layout/header.php' ?>
<div class="container">
    <br><br><br>
    <h1 style="text-align:center">Ghi Chú</h1>
    <br>
    <form method="POST" action="">
                <div class="row mt-5 justify-content-end">
                    <div class="col-md-2">
                        <a href="index.php?controller=Notetype&action=add" class="btn btn-dark" style="width: 100%">Thêm mới</a>
                    </div>
                    <div class="col-md-8">
                        <input class="form-control" type="text" placeholder="Tên" name="search">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" value="Tìm kiếm" class="form-control btn btn-dark">
                    </div>
                </div>
            </form>
    <?php echo (isset($alert)) ? $alert : ""; ?>   
    <?php if(COUNT($notestype) ==0){
        echo "Không tìm thấy kết quả";
    } ?>
     <table class="table table-boder" border="10">
        <thead>
            <tr>
                <td style="text-align:center"><b>STT
                <a href="">
                <i class="fa fa-fw fa-sort text-secondary"></i>
                </b></td>
                <td style="text-align:center"><b>Tên
                <a href="">
                <i class="fa fa-fw fa-sort text-secondary"></i>
                </b></td>
                <td style="text-align:center"><b>Mô tả
                <a href="">
                <i class="fa fa-fw fa-sort text-secondary"></i>
                </b></td>
                <td colspan="4" style="text-align:center"><b>Chức năng</b></td>
            </tr>
        <tbody>
            <?php foreach ($notestype as $key => $notetype) : ?>
                <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $notetype->name ?></td>
                    <td><?= $notetype->description ?></td>
                    <td> <a href="index.php?controller=Notetype&action=edit&id=<?= $notetype->id ?>" class="btn btn"><i class="fas fa-edit fa-lg text-dark"></i></a></td>
                    <td> <a href="index.php?controller=Notetype&action=delete&id=<?= $notetype->id ?>" onclick="return confirm ('Bạn có chắc muốn xóa <?= $notetype->name ?> không?')" class="btn btn"><i class='fas fa-archive fa-lg text-danger'></i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </thead>
    </table>
    <div>
            <nav aria-label="Page navigation example">
                    <ul class="pagination d-flex justify-content-end">
                    <li class="page-item"><a class="page-link" href="">Lùi</a></li>
                    <li class="page-item"><a class="page-link" href=""><></a></li>
                    <li class="page-item"><a class="page-link" href="">Tới</a></li>
                </ul>
            </nav>
    </div>      
</div>
<?php include './layout/footer.php' ?>