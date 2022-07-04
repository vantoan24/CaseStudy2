<?php
include './layout/navar.php';
include './layout/header.php'?>
<div class="container-fluid">
    <h1 class="text-center mt-5">Thêm mới ghi chú</h1>
    <div class="row mt-2 justify-content-center">
        <div class="col-md-6"> -->
            <form method="post" action="">

                <!-- <div class="row form-group mt-2">
                    <div class="col-md-2">
                        <label>Phân loại</label>
                    </div>
                    <div class="col-md-10">
                        <select name="name" class="form-select">   
                        </select>
                    </div>
                </div> -->

                <div class="row form-group mt-2">
                    <div class="col-md-2">
                        <label>Tiêu đề</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="name" value="">
                        <?php echo isset($error['name']) ? $error['name'] : ''; ?>
                        <p class="text-danger"></p>
                    </div>
                </div>

                <div class="row form-group mt-2">
                    <div class="col-md-2">
                        <label>Nội dung</label>
                    </div>
                    <div class="col-md-10">
                        <textarea type="text" class="form-control" name="description" rows="6"></textarea>
                        <?php echo isset($error['description']) ? $error['description'] : ''; ?>


                        <p class="text-danger"></p>
                    </div>
                </div>

                <div class="row form-group mt-2 justify-content-end">
                    <div class="col-md-10">
                        <input type="submit" value="Lưu" class="btn btn-primary">
                        <a href="index.php?controller=Notetype&action=index" class="btn btn-secondary">Hủy</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>