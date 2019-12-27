<?php
$query = mysqli_query($connect,"SELECT * FROM category ORDER BY cat_id ASC");
?>
<nav>
    <div id="menu" class="collapse navbar-collapse">
        <ul>
            <?php while($data = mysqli_fetch_assoc($query)){ ?>
            <li class="menu-item"><a href="index.php?page_layout=category&cat_id=<?php echo $data['cat_id'] ?>"><?php echo $data['cat_name'] ?></a></li>
            <?php } ?>
        </ul>
    </div>
</nav>