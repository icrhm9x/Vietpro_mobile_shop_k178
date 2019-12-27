<?php

if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
}else{
    $keyword = '';
}
$search = '%'.implode('%',explode(' ',$keyword)).'%';

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
//gán số lượng sp cần hiển thị tren 1 trang
$rows_per_page = 6;
//công thức
$per_row = $page * $rows_per_page - $rows_per_page;
//tính số bản ghi
$total_rows = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM product WHERE prd_name LIKE '$search'"));
$total_pages = ceil($total_rows/$rows_per_page); //hàm làm tròn trong php
//nút prev pgae
$list_pages = '';
$page_prev = $page - 1;
if($page_prev <= 0 ){
    $page_prev = 1;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=search&keyword='.$keyword.'&page='.$page_prev.'">&laquo;</a></li>';
//tính toán số trang
for($i=1; $i<=$total_pages; $i++){
    if($i==$page){
        $active = 'active';
    }else{
        $active = '';
    }
    $list_pages .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=search&keyword='.$keyword.'&page='.$i.'">'.$i.'</a></li>';
}
//nút next page
$page_next = $page + 1;
if($page_next > $total_pages){
    $page_next = $total_pages;
}
$list_pages .= ' <li class="page-item"><a class="page-link" href="index.php?page_layout=search&keyword='.$keyword.'&page='.$page_next.'">&raquo;</a></li>';

$query = mysqli_query($connect, "SELECT * FROM product WHERE prd_name LIKE '$search' LIMIT $per_row, $rows_per_page");
?>
<!--	List Product	-->
<div class="products">
    <div id="search-result">Kết quả tìm kiếm với sản phẩm <span><?php echo $keyword ?></span></div>
    <div class="product-list row">
        <?php while($data = mysqli_fetch_assoc($query)){ ?>
        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
            <div class="product-item card text-center">
                <a href="index.php?page_layout=product&prd_id=<?php echo $data['prd_id'] ?>"><img src="admin/img/products/<?php echo $data['prd_image'] ?>"></a>
                <h4><a href="index.php?page_layout=product&prd_id=<?php echo $data['prd_id'] ?>"><?php echo $data['prd_name'] ?></a></h4>
                <p>Giá Bán: <span><?php echo number_format($data['prd_price'],0,'.','.')?></span></p>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<!--	End List Product	-->

<div id="pagination">
    <ul class="pagination">
        <?php echo $list_pages; ?>
    </ul>
</div>