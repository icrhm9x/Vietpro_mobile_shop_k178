<?php
if(isset($_GET['cat_id'])){
    $cat_id = $_GET['cat_id'];
    $sql = "SELECT * FROM product WHERE cat_id = $cat_id ORDER BY prd_id DESC";
    $query = mysqli_query($connect, $sql);
}

?>
<div class="products">
    <h3><?php $row_cat = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM category WHERE cat_id = $cat_id")); echo $row_cat['cat_name'] ?>(hiện có <?php echo mysqli_num_rows($query) ?> sản phẩm)</h3>
    <div class="product-list row">
        <?php while($row = mysqli_fetch_assoc($query)){ ?>
        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
            <div class="product-item card text-center">
                <a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id'] ?>"><img src="admin/img/products/<?php echo $row['prd_image'] ?>"></a>
                <h4><a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id'] ?>"><?php echo $row['prd_name'] ?></a></h4>
                <p>Giá Bán: <span><?php echo number_format($row['prd_price'],0,'.','.')  ?></span></p>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<!--	End List Product	-->

<div id="pagination">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li>
    </ul>
</div>