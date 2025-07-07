<?php
if(!isset($rows)){
  include_once "../api/db.php";
  $table='admin';
  $rows=${ucfirst($table)}->all();            
}
?>
<div class="container mt-3">
    <h2 class="text-center">後台管理者帳號</h2>
    <div class='btns mb-2'>
        <a class="btn btn-primary" href='./backend/add_admin.php?table=<?=$table;?>'><i
                class="fa-regular fa-pen-to-square"></i>新增</a>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>帳號</th>
                <th>密碼</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php     
              foreach ($rows as $row): 
            ?>
            <tr>
                <td><?=$row['acc'];?></td>
                <td><?=$row['pw'];?></td>
                <td>
                    <a class="btn btn-warning"
                        href="./backend/update_admin.php?id=<?=$row['id'];?>&table=<?=$table;?>"><i
                            class="fa-solid fa-wrench"></i>修改</a>
                    <a class="btn btn-danger" href="./api/delete.php?id=<?=$row['id'];?>&table=<?=$table;?>"><i
                            class="fa-solid fa-trash-can"></i>刪除</a>
                </td>
            </tr>
            <?php
             endforeach;
             ?>
        </tbody>
    </table>

</div>
