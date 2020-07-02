<?php
session_start();
include("funcs.php");
// loginCheck();

$pdo  = db_connect();


$sql = "SELECT * FROM BMI ";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
} else {
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <canvas id="myChart"></canvas>

    <!-- ライブラリ読み込み -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['<?php echo $dt; ?>'],
                datasets: [{
                    label: '体重',
                    data: ['<? $weight ?>', ],
                    backgroundColor: "rgba(219,39,91,0.5)"
                }, {
                    label: '身長',
                    data: ['<? $height ?>', ],
                    backgroundColor: "rgba(130,22,91,0.5)"

                }]
            },
            option: {
                title: {
                    display: true,
                    text: 'A氏の体重'
                },
                scales: {
                    yAxis: [{
                        ticks: {
                            suggestedMax: 80,
                            suggestedMin: 60,
                            stepSize: 5,
                            callback: function(value, index, values) {
                                return value + 'kg'
                            }
                        }
                    }]
                },
            }
        });
    </script>
</body>

</html>