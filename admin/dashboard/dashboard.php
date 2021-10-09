<?php
ob_start();
include '../../ulti/helpers.php';
include '../layouts/header.php';

$mAmount = selectCustomData($db,'orders','SUM(final_price) AS monthly_sales','WHERE  month = "'.date('m').'" AND year = '.date('Y'));
$mItems = selectCustomData($db,'orders','SUM(total_qty) AS monthly_items','WHERE  month = "'.date('m').'" AND year = '.date('Y'));
$yAmount = selectCustomData($db,'orders','SUM(final_price) AS yearly_sales','WHERE year = '.date('Y'));
$yItems = selectCustomData($db,'orders','SUM(total_qty) AS yearly_items','WHERE year = '.date('Y'));
$monthlyProductsName = array();
$monthlyProductsSales = array();

$yearlyProductsName = array();
$yearlyProductsSales = array();
if (isset($_POST['choose_month'])){
    $monthDate = explode('-',$_POST['month']);
    $sql = "SELECT products.product_name, SUM(total_price) AS montly_sales FROM order_detail JOIN products ON order_detail.product_id = products.id WHERE month = $monthDate[1]  AND year = $monthDate[0] GROUP BY order_detail.product_id ORDER BY total_price DESC LIMIT 6 ";
    $monthObject = $db->query($sql);
    $monthlyProducts = $monthObject->fetchAll();

foreach ($monthlyProducts as $monthlyProduct){
    array_push($monthlyProductsName,$monthlyProduct['product_name']);
    array_push($monthlyProductsSales,$monthlyProduct['montly_sales']);

}

}

$monthlyProductsName = json_encode($monthlyProductsName);
$monthlyProductsSales = json_encode($monthlyProductsSales);

if (isset($_POST['choose_year'])){
    $sql2 = "SELECT products.product_name, SUM(total_price) AS yearly_sales FROM order_detail JOIN products ON order_detail.product_id = products.id WHERE year = $_POST[year] GROUP BY order_detail.product_id ORDER BY total_price DESC LIMIT 6 ";
    $yearObject = $db->query($sql2);
    $yearProducts = $yearObject->fetchAll();

    foreach ($yearProducts as $yearProduct){
        array_push($yearlyProductsName,$yearProduct['product_name']);
        array_push($yearlyProductsSales,$yearProduct['yearly_sales']);

    }
    echo $_POST['year'];
}

$yearlyProductsName = json_encode($yearlyProductsName);
$yearlyProductsSales = json_encode($yearlyProductsSales);

?>
<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4>Dashboard</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body py-5">
                        <h4 class="text-center">$<?php echo $mAmount[0]['monthly_sales']?></h4>
                    </div>
                    <div class="card-footer d-flex">
                        Monthly Total Sales Amount
                        <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body py-5">
                        <h4 class="text-center"><?php echo $mItems[0]['monthly_items']?></h4>
                    </div>
                    <div class="card-footer d-flex">
                        Monthly Total Sales items
                        <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body py-5">
                        <h4 class="text-center">$<?php echo $yAmount[0]['yearly_sales']?></h4>
                    </div>
                    <div class="card-footer d-flex">
                        Yearly Total Sales Amount
                        <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body py-5">
                        <h4 class="text-center"><?php echo $yItems[0]['yearly_items']?></h4>
                    </div>
                    <div class="card-footer d-flex">
                       Yearly Total Sales items
                        <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <form  method="post">
                    <input name="month" class="form-control mb-4"  type="month">
                    <button name="choose_month" class="btn btn-primary" >Choose</button>
                </form>
                <div class="card h-100">
                    <div class="card-header">
                        <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                        Monthly Highest Sales Product
                    </div>
                    <div class="card-body">
                        <canvas id="mChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                  <form  method="post">
                      <select name="year" class="form-control" id="category">
                          <?php
                          for ($i=1960;  $i< 3000; $i++){
                              echo "<option>".$i."</option>";
                          }

                          ?>
                      </select>
                      <br>
                    <button name="choose_year" class="btn btn-primary" >Choose</button>
                </form>
                <div class="card h-100">
                    <div class="card-header">
                        <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                        Year Highest Sales Product
                    </div>
                    <div class="card-body">
                        <canvas id="yChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<?php
include '../layouts/footer.php'
?>

<script>
    const mChart = document.querySelectorAll("#mChart");

    mChart.forEach(function (chart) {

        var ctx = chart.getContext("2d");
        var myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: <?php echo $monthlyProductsName; ?>,
                datasets: [
                    {
                        label: "# Sales Amount",
                        data: <?php echo $monthlyProductsSales; ?>,
                        backgroundColor: "rgb(68,66,215)",
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    });

    const yChart = document.querySelectorAll("#yChart");

    yChart.forEach(function (chart) {
        var ctx = chart.getContext("2d");
        var myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels:  <?php echo $yearlyProductsName; ?>,
                datasets: [
                    {
                        label: "# Sales Amount",
                        data:  <?php echo $yearlyProductsSales; ?>,
                        backgroundColor: "rgb(117,94,215)",
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    });

</script>
