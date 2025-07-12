<?php
 session_start();
 include_once "./api/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>購物車</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
    <style>
    /* body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f9f9f9;
        padding: 20px;
        color: #333;
    } */

    .container {
        /* max-width: 900px; */
        margin: 0 auto;
        background-color: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    h3 {
        text-align: center;
        color: #444;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
    }

    th,
    td {
        padding: 12px;
        border: 1px solid #ccc;
        /* text-align: center; */
        /* vertical-align: middle; */
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #e8f4ff;
    }

    img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    input[type="number"] {
        width: 60px;
        padding: 5px;
        border-radius: 6px;
        border: 1px solid #ccc;
        text-align: center;
        font-size: 16px;
    }

    .sumprice1 {
        font-size: 18px;
        font-weight: bold;
        color: #007bff;
    }

    /* td[colspan="6"] {
        background-color: #f1f1f1;
        text-align: right;
        padding-right: 30px;
    } */

    .sumprice2 {
        font-size: 18px;
        font-weight: bold;
        color: red;
    }

    button {
        /* background: #fbca1f; */
        font-family: inherit;
        padding: 0.6em 1.3em;
        font-weight: 900;
        font-size: 18px;
        border: 1px solid black;
        border-radius: 0.4em;
        cursor: pointer;
        margin: auto;
        text-align: center;
        padding-top: 20px;
    }

    button:hover {
        transform: translate(-0.05em, -0.05em);
        box-shadow: 0.15em 0.15em;
    }

    button:active {
        transform: translate(0.05em, 0.05em);
        box-shadow: 0.05em 0.05em;
    }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <h3>購物車</h3>
        <form action="" method="post">
            <div class="container">
                <div class="form-title">訂購者資料</div>
                <?php                                                        
                     $rows_mem=$Member->find(['acc'=>$_SESSION['mem']]);   
                ?>
                <div class="row mt-4">
                    <div class="col-sm-6 mb-3">
                        <label for="date1" class="form-label text-center">訂購日期</label>
                        <input type="text" class="form-control" id="date1" name="date1"
                            value="<?php echo date("Y-m-d");?>" readonly>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="name" class="form-label">姓名</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?=$rows_mem['name']?>"
                            readonly>
                        <input type="hidden" class="form-control" id="acc" name="acc" value="<?=$rows_mem['acc']?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tel" class="form-label">電話</label>
                    <input type="text" class="form-control" id="tel" name="tel">
                </div>
            </div>

            <div class="container">

                <div class="form-card">
                    <table>                        
                        <colgroup>
                            <col style="width: 10%">
                            <col style="width: 20%">
                            <col style="width: 15%">
                            <col style="width: 10%">
                            <col style="width: 20%">
                            <col style="width: 25%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>品號</th>
                                <th>品名</th>
                                <th>產品圖</th>
                                <th>單價</th>
                                <th>數量</th>
                                <th>金額</th>
                            </tr>
                        </thead>
                        <?php                                    
                     $table='items';
                     $rows=${ucfirst($table)}->all();         
                    foreach ($rows as $row): 
                    ?>

                        <tr>
                            <td>
                                <span class="item_no"><?=$row['item_no'];?></span>
                            </td>
                            <td>
                                <span class="item_name"><?=$row['item_name'];?></span>
                            </td>
                            
                            <td>
                                <img src="../images/<?=$row['img'];?>"
                                  style='max-width: 200px; max-height: 200px;'>
                            </td>      

                            <td>                                
                                <span class="price"><?=$row['price'];?></span>
                            </td>
                            <td><input class="counts" data-price="<?=$row['price'];?>" type="number" value="0" min="0">
                            </td>
                            <td><span class="totals">0</span></td>
                        </tr>

                        <?php
                      endforeach;
                    ?>

                        <tr>
                            <td colspan="6">總金額:
                                <span id="originPrice" calss="sumprice1">0</span>
                            </td>
                        </tr>

                    </table>
                    <div class="container">
                        <button type="button" class="btn btn-primary" onclick="add()">送出</button>
                    </div>
        </form>
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

        <!-- 載入bs5 js (bundle) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.bundle.min.js"
            integrity="sha512-Tc0i+vRogmX4NN7tuLbQfBxa8JkfUSAxSFVzmU31nVdHyiHElPPy2cWfFacmCJKw0VqovrzKhdd2TSTMdAxp2g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- 載入jquery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
        $(document).ready(function() {
            const counts = $('.counts');
            const totals = $('.totals');
            const originPrice = $('#originPrice');

            function sumFun() {
                let tmpTotals = $('.totals');
                let sum = 0;
                $.each(tmpTotals, function(key, value) {
                    let tmpValue = Number($(value).text());
                    sum += tmpValue;
                });
                return sum;
            }


            counts.change(function() {
                let tmpCount = Number($(this).val());
                let tmpPrice = Number($(this).attr('data-price'));

                let result = tmpCount * tmpPrice;
                let tmpTr = $(this).parent().parent();
                let tmpTotal = tmpTr.find('.totals');
                tmpTotal.text(result);

                // 總計顯示
                let resultSum = Number(sumFun());
                originPrice.text(resultSum);
            });

        });
        ///////////////////////////////////////////////////////
        function add() {
            let mydata = [];

            $("tr").each(function() {
                const item_no = $(this).find("td").eq(0).text().trim();
                const item_name = $(this).find("td").eq(1).text().trim();
                const price = parseFloat($(this).find("td").eq(3).text());
                const qty = parseInt($(this).find("input.counts").val());

                // 檢查是否為有效數量
                if (!isNaN(qty) && qty > 0) {
                    mydata.push({
                        item_no: item_no,
                        item_name: item_name,
                        price: price,
                        qty: qty
                    });
                }
            });

            if (mydata.length === 0) {
                alert("請選擇至少一項商品");
                return;
            }

            const date1 = $('#date1').val();
            const acc = $('#acc').val();
            const name = $('#name').val();
            const tel = $('#tel').val();

            const originPrice = $('#originPrice'); // 抓總金額元素
            const amt = Number(originPrice.text()); // 取得總金額文字並轉成數字         

            fetch('./api/insert_order.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        date1: date1,
                        acc: acc,
                        name: name,
                        amt: amt,
                        tel: tel,
                        mydata: mydata
                    })
                })
                .then(res => res.json())
                .then(data => {
                    //alert(data.message);
                    $('#modalMessage').text(data.message);
                    const modal = new bootstrap.Modal(document.getElementById('resultModal'));
                    modal.show();
                })
                .catch(err => {
                    //alert(data.message);
                    //console.error('錯誤:', err);
                });
        }
        </script>
    </main>
    <?php include 'footer.php'; ?>

</body>

</html>