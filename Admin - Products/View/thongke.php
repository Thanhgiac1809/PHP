<!DOCTYPE html>
<html>

<head>
    <tenhh>Thống kê</tenhh>
    <meta charset="utf-8">
</head>

<body>
    <div class="card mt-3">
        <div class="card-header info">
            THỐNG KÊ
        </div>
        <div class="card-body">
            <div class="list-group">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?action=thongke">
                    <select name="range" id="range" class="range" onchange="this.form.submit()">
                        <option value="all"
                            <?php if(!isset($_POST['range']) || $_POST['range'] == 'all') echo 'selected'; ?>>Tất cả
                        </option>
                        <option value="seven"
                            <?php if(isset($_POST['range']) && $_POST['range']=='seven') echo 'selected'; ?>>7
                            ngày qua</option>
                        <option value="twentyeight"
                            <?php if(isset($_POST['range']) && $_POST['range']=='twentyeight') echo 'selected'; ?>>28
                            ngày qua
                        </option>
                        <option value="nightty"
                            <?php if(isset($_POST['range']) && $_POST['range']=='nightty') echo 'selected'; ?>>90
                            ngày qua</option>
                        <option value="year"
                            <?php if(isset($_POST['range']) && $_POST['range']=='year') echo 'selected'; ?>>365 ngày
                            qua</option>
                    </select>
                </form>
            </div>
            <div class="w-75">
                <div id="chart_div"></div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
    google.load('visualization', '1.0', {
        'packages': ['corechart']
    });
    google.setOnLoadCallback(drawVisualization);
tenhh
    function drawVisualization() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Hàng hóa');
        data.addColumn('number', 'Số lượng bán');
        var rows = [
            <?php
            $hh = new hanghoa();
            $range = 'year';
            if (isset($_POST['range'])) {
                $range = $_POST['range'];
                $result = $hh->getThongKeHangHoa($range);
                foreach ($result as $row) {
                    echo "['" . $row['tenhh'] . "', " . $row['soluongmua'] . "], ";
                }
            } else {
                $result = $hh->getThongKeHangHoa('all');
                foreach ($result as $row) {
                    echo "['" . $row['tenhh'] . "', " . $row['soluongmua'] . "], ";
                }
            }
            ?>
        ];
        data.addRows(rows);
        var option = {
            tenhh: 'Thống kê số lượng bán',
            'width': 600,
            'height': 400,
            'backgroundColor': '#ffffff',
            is3D: true
        };
        // draw Pie, Column, Bar, Line
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, option);
    }
    </script>
</body>

</html>
