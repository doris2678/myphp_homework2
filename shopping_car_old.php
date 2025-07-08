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
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <style>
    body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f9f9f9;
        padding: 20px;
        color: #333;
    }

    .container {
        max-width: 900px;
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
        text-align: center;
        vertical-align: middle;
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

    td[colspan="6"] {
        background-color: #f1f1f1;
        text-align: right;
        padding-right: 30px;
    }

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
    <main>
        <div class="container">
            <h3>購物車</h3>
            <form action="" method="post">
            <table>
                <tr>
                    <th width="5%">品號</th>
                    <th width="5%">品名</th>
                    <th width="15%">產品圖</th>
                    <th width="5%">單價</th>
                    <th width="20%">數量</th>
                    <th>金額</th>
                </tr>

                <?php          
                 $table='items';
                 $rows=${ucfirst($table)}->all();         
                 foreach ($rows as $row): 
                ?>                
                    <tr>                        
                        <td><?=$row['item_no'];?></td>
                        <td><?=$row['item_name'];?></td>
                        <td><?=$row['img'];?></td>
                        <td><?=$row['price'];?></td>
                        <td><input class="counts" data-price="100" type="number" value="1" min="0">
                        </td>
                        <td><span class="totals">100</span></td>
                    </tr>

                    <?php
                      endforeach;
                    ?>

                    <tr>
                        <td colspan="6">總金額:
                            <span id="originPrice" calss="sumprice1">150</span>
                        </td>
                    </tr>

                    <tr id="discountInfoRow" style="display:none;">
                        <td colspan="6" style="text-align: right; padding-right: 30px;">
                            <span id="discountText" style="font-size: 16px; color: green;"></span>
                        </td>
                    </tr>
            </table>
            <div class="container">
              <button type="button" class="btn btn-primary" onclick="add()">送出</button>              
            </div>
            </form>
        </div>
        

        <!-- 載入jquery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
        const myCountJs = document.getElementById('myCount');
        const myTotalJs = document.getElementById('myTotal');

        $(document).ready(function() {
            //function
            function sumFun() {
                let tmpTotals = $('.totals');
                // console.log('tmpTotals', tmpTotals);
                // console.log('counts', counts);

                // json data / jq objs
                let sum = 0;
                $.each(tmpTotals, function(key, value) {
                    // console.log('key', key);
                    // console.log('value', value);
                    let tmpValue = Number($(value).text());
                    // console.log('tmpValue', tmpValue);
                    // console.log('tmpValue typeof', typeof (tmpValue));
                    sum += tmpValue;
                });

                // console.log('sum', sum);
                return sum;
            }

            // 1.bind
            const counts = $('.counts');
            const totals = $('.totals');
            const myCount = $('#myCount');
            const myTotal = $('#myTotal');
            const originPrice = $('#originPrice');
            const btn = $('.btn');

            // 2.action

            counts.change(function() {
                // console.log('myCount ok');
                let tmpCount = Number($(this).val());
                let tmpPrice = Number($(this).attr('data-price'));
                // console.log('tmpCount', tmpCount);
                // console.log('tmpPrice', tmpPrice);

                let result = tmpCount * tmpPrice;
                // console.log('result', result);
                let tmpTr = $(this).parent().parent();
                let tmpTotal = tmpTr.find('.totals');
                // console.log('tmpTr', tmpTr);
                // console.log('tmpTotal', tmpTotal);
                tmpTotal.text(result);

                // 總計顯示
                let resultSum = Number(sumFun());
                // console.log('resultSum', resultSum);              

            });

        });


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
        //$_POST=mydata[0];
        $_POST=mydata.serializeArray();
        console.log("mydata:",mydata);
        console.log("$_POST:",$_POST);     
        $.post("./api/insert_shopping.php", $_POST, function(res){
            console.log(res);
            if (res.success) {
                alert("新增成功");
                //location.href = "index.html"; // 返回主頁
            } else {
                alert("新增失敗：" + res.message);
            }
    }); 

        

    }

        </script>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>