<?php
 session_start();
 include_once "../api/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>訂單查詢</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <style>
    main {
        margin-bottom: 80px;
        /* 預留空間給分頁 */
    }

    .fixed-footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background: #fff;
        padding: 10px 0;
        box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        z-index: 100;
    }

    .table-fixed {
        table-layout: fixed;
        width: 100%;
    }

    .table-fixed th,
    .table-fixed td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    th,
    td{
        text-align:center;
    }
    </style>
</head>

<body>
    <?php include 'bd_header.php';?>

    <main>
        <div class="container-fluid mt-3">

            <h2 class="text-center">訂單查詢</h2>
            <?php $table='order1'?>
            <table class="table table-bordered table-hover table-fixed">
                <thead>
                    <tr>
                        <th style="width: 10%;">訂單編號</th>
                        <th style="width: 10%;">日期</th>
                        <th style="width: 10%;">訂購者姓名</th>
                        <th style="width: 10%;">電話</th>
                        <th style="width: 10%;">訂購金額</th>
                        <th style="width: 20%;">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php             
                     $all=count(${ucfirst($table)}->all());
                     $div=8;
                     $pages=ceil($all/$div);
                     $now=$_GET['p']??1;
                     $start=($now-1)*$div;
                     $rows=${ucfirst($table)}->all(" limit $start,$div");
                     //$rows=${ucfirst($table)}->all();         
                     foreach ($rows as $row): 
                    ?>
                    <tr>
                        <td><?=$row['or_no'];?></td>
                        <td><?=$row['date1'];?></td>
                        <td><?=$row['name'];?></td>
                        <td><?=$row['tel'];?></td>
                        <td><?=$row['amt'];?></td>
                        
                        <td>
                            <!-- <a class="btn btn-warning" href="update_items.php?id=<?=$row['id'];?>&table=<?=$table;?>">
                                <i class="fa-solid fa-wrench"></i>查詢明細</a> -->

                            <button class="btn btn-info view-details" data-bs-toggle="modal" data-bs-target="#orderModal"
                                data-or-no="<?=$row['or_no'];?>">
                                <i class="fa-solid fa-eye"></i> 查詢明細
                            </button>


                            <a class="btn btn-danger" href="../api/delete.php?id=<?=$row['id'];?>&table=<?=$table;?>"><i
                                    class="fa-solid fa-trash-can"></i>刪除</a>
                        </td>
                    </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
            <!-- <button onclick="get_data()">aa</button> -->

            <!-- 分頁 -->
            <div class="fixed-footer">
                <div class="container mt-3">
                    <ul class="pagination justify-content-center">
                        <?php if($now-1>0): ?>
                         <li class="page-item"><a class="page-link" href="?p=<?=$now-1;?>"><</a></li>
                        <?php endif ;?>

                        <?php for($i=1;$i<=$pages;$i++): ?>
                         <li class="page-item <?=($now==$i)?'active':'';?>"><a class="page-link"
                                href="?p=<?=$i;?>"><?=$i;?></a></li>
                        <?php endfor;?>

                        <?php if($now+1<=$pages):?>
                         <li class="page-item"><a class="page-link" href="?p=<?=$now+1;?>">></a></li>
                        <?php endif ;?>
                    </ul>
                </div>
            </div>

        </div>
        </div>

      <!-- 回傳訊息用 Modal -->
        <div class="modal fade" id="resultModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center">系統訊息</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center" id="modalMessage">
                        <!-- 這裡放回傳訊息 -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                    </div>
                </div>
            </div>
        </div> 

    </main>
<!-- 載入bs5 js (bundle) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.bundle.min.js"
            integrity="sha512-Tc0i+vRogmX4NN7tuLbQfBxa8JkfUSAxSFVzmU31nVdHyiHElPPy2cWfFacmCJKw0VqovrzKhdd2TSTMdAxp2g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- 載入jquery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function get_data(){   

    const or_no = $('#modalMessage').getAttribute('data-or-no'); 
    console.log('or_no:',or_no);

//    const or_no='202507100017';
    let url = '../api/get_order_details.php';
    $.ajax({
        type: "post",
        url: url,
        data: {or_no:or_no},
        dataType: "json",
        success: function (response) {
            // console.log('response',response);    
            // console.log(response[0]['item_no']);                      
        
        $('#modalMessage').text('');
        let tmp=`<table>
                 <tr>
                 <th>品號<th>  
                 <th>品名<th> 
                 <th>數量<th> 
                 </tr>
                 `;           
        $('#modalMessage').append(tmp);            
        response.forEach((event ,idx)=> {
            tmp = `                
                <tr>
                <td>${response[idx]['item_no']}</td> 
                <td>${response[idx]['item_name']}</td> 
                <td>${response[idx]['qty']}</td> 
                </tr>               
                `;            
            $('#modalMessage').append(tmp);            
        });
          tmp=`</table>`;
          $('#modalMessage').append(tmp);                      
          const modal = new bootstrap.Modal(document.getElementById('resultModal'));
          modal.show();             
        }        
    })};
             

 </script>
</body>

</html>