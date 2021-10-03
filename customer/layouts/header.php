<html>
<head>
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
                    <a href="../profile/profile.php" class="nav-link px-3 active">
                        <span class="me-2"><i class="bi bi-person-square"></i></span>
                        <span>Profile</span>
                    </a>
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