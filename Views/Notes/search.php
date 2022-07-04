<?php
include './layout/navar.php';
include './layout/header.php' ?>
<div class="container">
    <br><br><br>
    <h1 style="text-align:center">Ghi Chú</h1>
    <br>
    <a href="index.php?controller=Note&action=add" class="btn btn-dark mt-1" style="width: 14%">Thêm mới</a>
            <form method="POST" action="">
                <div class="row mt-2">
                    <div class="col-md-2">
                    <select name="type_id" class="form-control">
                    <option value="">Chọn loại</option>
                            <?php foreach ($notestypes as $notestype): ?>
                                <option value="<?php echo $notestype->id?>"><?php echo $notestype->name; ?></option>
                              <?php endforeach; ?>  
                        </select>     
                     
                    </div>
                    <div class="col-9">
                        <input class="form-control" type="text" placeholder="Tiêu đề" name="search">
                    </div>
                    <div class="col-1">
                        <button type="submit" class="form-control btn btn-dark"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
    <?php echo (isset($alert)) ? $alert : ""; ?>   
   
    <table class="table table-boder" border="10">
        <thead>
            <tr>
                <td style="text-align:center"><b>STT
                <a href="">
                <i class="fa fa-fw fa-sort text-secondary"></i>
                </a>
                </b></td>
                <td style="text-align:center"><b>Tiêu đề
                <a href="">
                <i class="fa fa-fw fa-sort text-secondary"> </i>
                </a>
                </b></td>
                <td style="text-align:center"><b>Nội dung
                <a href="">
                <i class="fa fa-fw fa-sort text-secondary"> </i>
                </a>
                </b></td>
                <td style="text-align:center"><b>Phân Loại
                <a href="">
                <i class="fa fa-fw fa-sort text-secondary"> </i>
                </a>
                </b></td>
                <td colspan="4" style="text-align:center"><b>Action</b></td>
            </tr>
        <tbody>
            <?php foreach ($notes as $key =>  $note) : ?>
                <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $note->title ?></td>
                    <td><?= $note->content ?></td>
                    <td><?= $note->name ?></td>
                    <td> <a href="index.php?controller=Note&action=show&id=<?= $note->id ?>" class="btn btn"><i class='fas fa-eye fa-lg text-warning'></i></a></td>
                    <td> <a href="index.php?controller=Note&action=edit&id=<?= $note->id ?>" class="btn btn"><i class='fas fa-list fa-lg text-dark'></i></a></td>
                    <td><span data-toggle="modal" data-target="#delete<?= $note->id ?>"><i class='fas fa-archive fa-lg text-danger'></i></span>
                                    <!-- The Modal -->
                                    <div class="modal fade" id="delete<?= $note->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h3>Bạn có chắc chắn muốn xóa không ?</h3>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <a class="btn btn-danger mr-auto" href="index.php?controller=Note&action=delete&id=<?= $note->id ?>">Xóa</a>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                      </td>
                    </tr>
            <?php endforeach; ?>
        </tbody>
            <?php if(COUNT($notes) == 0){
            echo "Không tìm thấy kết quả";
    }?>
        </thead>

    </table>

</div>
<?php include './layout/footer.php' ?>