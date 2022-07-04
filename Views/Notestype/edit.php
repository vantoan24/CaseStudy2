<?php
include './layout/navar.php';
include './layout/header.php'
?>
<div class="container-fluid">
    <h1 class="text-center mt-5">Sửa mới ghi chú</h1>
    <div class="row mt-2 justify-content-center">
        <div class="col-md-6">
            <form method="post" action="">

                <div class="row form-group mt-2">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-10">
                    </div>
                </div>

                <div class="row form-group mt-2">
                    <div class="col-md-2">
                        <label>Tên</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="name" value="<?php echo $notetype->name ?>">
                        <p class="text-danger"></p>
                    </div>
                </div>

                <div class="row form-group mt-2">
                    <div class="col-md-2">
                        <label>Mô tả</label>
                    </div>
                    <div class="col-md-10">
                        <textarea type="text" class="form-control" name="description" rows="6" value="" >
                        <?php echo $notetype->description ?>
                        </textarea>
                        <p class="text-danger"></p>
                    </div>
                </div>

                <div class="row form-group mt-2 justify-content-end">
                    <div class="col-md-10">
                        <input type="submit" value="Sửa" class="btn btn-primary">
                        <a href="index.php?controller=Notetype&action=index" class="btn btn-secondary">Hủy</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include './layout/footer.php' ?>