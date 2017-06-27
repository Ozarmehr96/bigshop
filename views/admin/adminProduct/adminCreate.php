<?php include_once ROOT . '/views/layouts/admin_header.php'; ?>
<a href="/admin/product/list" class="btn btn-default">
    <span class="glyphicon glyphicon-chevron-left"></span>Назад к списку товаров
</a>
<h3>Добавьте товары</h3>
<p>Все отмеченные поля объязельны для заполнения*</p>
<form action="#" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label for="title">Название*</label>
                <input class="form-control" type="text" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="image">Изображение товара</label>
                <input class="form-control" type="file" name="image" id="image" value="" >
            </div>
            <div class="form-group">
                <label for="categ">Категория*</label>
                <select class="form-control" id="categ" name="categ">
                    <?php foreach ($categoryList as $category): ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['category_title']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="code">Артикул*</label>
                <input class="form-control" type="text" name="code" id="code" value="" required>
            </div>
            
            <div class="form-group">
                <label for="newprice">Текущая цена*</label>
                <input class="form-control" type="text" name="newprice" id="newprice" value="" required>
            </div>
            <div class="form-group">
                <label for="oldprice">Старая цена</label>
                <input class="form-control" type="text" name="oldprice" id="oldprice" value="">
            </div>


            <div class="form-group">
                <label for="status">Статус*</label>
                <select class="form-control" id="status" name="status">
                    <option value="1">Отображать</option>  
                    <option value="0">Неотображать</option>  
                </select>
            </div>

            <div class="form-group">
                <label for="is_recom">Рекомендуемый*</label>
                <select class="form-control" id="is_recom" name="is_recom">
                    <option value="1">Да</option>  
                    <option value="0">Нет</option>  
                </select>
            </div>
            <div class="form-group">
                <label for="is_new">Новинка*</label>
                <select class="form-control" id="is_new" name="is_new" >
                    <option value="1">Да</option>  
                    <option value="0">Нет</option>  
                </select>
            </div>

            <div class="form-group">
                <label for="discription">Описание*</label>
                <textarea class="form-control" cols="5" rows="10"  id = "discription" name="discription" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="form-control btn btn-success" name="submit" id="submit"/>
            </div>
        </div>
    </div>
</form>

<?php include_once ROOT . '/views/layouts/admin_footer.php'; ?>