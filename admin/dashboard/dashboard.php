<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Frontendfunn - Bootstrap 5 Admin Dashboard Template</title>
</head>
<body>
<!-- top navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#sidebar"
                aria-controls="offcanvasExample"
        >
            <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>

        <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#topNavBar"
                aria-controls="topNavBar"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
            <a
                    class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
                    href="#"
            >Customer Panel</a>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <button class="btn btn-outline-warning"> <i class="bi bi-arrow-left"></i></button>

                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- top navigation bar -->
<!-- offcanvas -->
<div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li>
                    <a href="dashboard.php" class="nav-link px-3 active">
                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="profile.php" class="nav-link px-3 active">
                        <span class="me-2"><i class="bi bi-person-square"></i></span>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="../user-management/view-user.php" class="nav-link px-3 active">
                        <span class="me-2"><i class="bi bi-person-circle"></i></span>
                        <span>View Users</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link px-3 sidebar-link active" data-bs-toggle="collapse" href="#layouts">
                        <span class="me-2"><i class="bi bi-layout-split"></i></span>
                        <span>Product Management</span>
                        <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
                    </a>
                    <div class="collapse" id="layouts">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="../product-management/insert-product.php" class="nav-link px-3 active">
                                    <span class="me-2"><i class="bi bi-plus-square-fill"></i></span>
                                    <span>Product Insert</span>
                                </a>
                            </li>
                            <li>
                                <a href="../product-management/view-product.php" class="nav-link px-3 active">
                                    <span class="me-2"><i class="bi bi-eye-fill"></i></span>
                                    <span>Product View</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="../order-system/view-order.php" class="nav-link px-3 active">
                        <span class="me-2"><i class="bi bi-bag-fill"></i></span>
                        <span>View Order</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- offcanvas -->
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
                        <h4 class="text-center">$1000</h4>
                    </div>
                    <div class="card-footer d-flex">
                        Daily Total Sales
                        <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body py-5">
                        <h4 class="text-center">$10000</h4>
                    </div>
                    <div class="card-footer d-flex">
                        Weekly Total Sales
                        <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body py-5">
                        <h4 class="text-center">$100000</h4>
                    </div>
                    <div class="card-footer d-flex">
                        Monthly Total Sales
                        <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body py-5">
                        <h4 class="text-center">$1000000</h4>
                    </div>
                    <div class="card-footer d-flex">
                        Yearly Total Sales
                        <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <input class="form-control mb-4"  type="month">
                <div class="card h-100">
                    <div class="card-header">
                        <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                        Area Chart Example
                    </div>
                    <div class="card-body">
                        <canvas class="chart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <input class="form-control mb-4"  type="month">
                <div class="card h-100">
                    <div class="card-header">
                        <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                        Area Chart Example
                    </div>
                    <div class="card-body">
                        <canvas class="chart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<script src="../js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
<script src="../js/jquery-3.5.1.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap5.min.js"></script>
<script src="../js/script.js"></script>
</body>
</html>
