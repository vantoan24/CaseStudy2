<?php
include './layout/navar.php';
include './layout/header.php' ?>
<div class="container">
    <br><br><br>
    <h1 style="text-align:center">Ghi Chú</h1>
    <br>
    <form method="POST" action="index.php?controller=Notetype&action=search">
        <div class="row mt-5 justify-content-end">
            <div class="col-md-2">
                <a href="index.php?controller=Notetype&action=add" class="btn btn-dark" style="width: 100%">Thêm mới</a>
            </div>
            <div>
                <!-- <select name="type_id" class="form-control">
                                <option value="">Chọn Mô tả</option>
                            <?php foreach ($notestype as $notetype) : ?>
                                <option value="<?php echo $notetype->id ?>"><?php echo $notetype->name; ?></option>
                              <?php endforeach; ?>  
                     </select>       -->
            </div>
            <div class="col-md-8">
                <input class="form-control" type="text" placeholder="Tên" name="search">
            </div>
            <div class="col-md-2">
                <input type="submit" value="Tìm kiếm" class="form-control btn btn-dark">
            </div>
        </div>
    </form>
    <?php if (isset($_SESSION['flash_message'])) : ?>
        <?php $message = $_SESSION['flash_message']; ?>
        <?php unset($_SESSION['flash_message']); ?>
        <div class="alert alert-success"><i class="fas fa-check"></i> <?= $message ?></div>
    <?php endif; ?>
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
            <?php foreach ($param['notestype'] as $key => $notetype) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $notetype->name ?></td>
                    <td><?= $notetype->description ?></td>
                    <td> <a href="index.php?controller=Notetype&action=edit&id=<?= $notetype->id ?>" class="btn btn"><i class='fas fa-list fa-lg text-dark'></i></i></a></td>
                    <td>
                        <span data-toggle="modal" data-target="#delete<?= $notetype->id ?>"><i class='fas fa-archive fa-lg text-danger'></i></span>
                        <!-- The Modal -->
                        <div class="modal fade" id="delete<?= $notetype->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h3>Bạn có chắc chắn muốn xóa không ?</h3>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <a class="btn btn-danger mr-auto" href="index.php?controller=Notetype&action=delete&id=<?= $notetype->id ?>">Xóa</a>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </thead>
    </table>
    <div>
        <nav aria-label="Page navigation example">
            <ul class="pagination d-flex justify-content-end">
                <li class="page-item"><a class="page-link" href="index.php?controller=type_note&action=list&page=<?= $param['pre'] ?>">Previous</a></li>
                <?php for ($i = 1; $i <= $param['total_page']; $i++) : ?>
                    <li class="page-item"><a class="page-link" href="index.php?controller=type_note&action=list&page=<?= $i ?>"><?= $i ?></a></li>
                <?php endfor; ?>
                <li class="page-item"><a class="page-link" href="index.php?controller=type_note&action=list&page=<?= $param['next'] ?>">Next</a></li>
            </ul>
        </nav>
    </div>

</div>
<?php include './layout/footer.php' ?>