<section style="background-color: #f9f9f9;">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-9 col-sm-9 col-12">
                <div class="row">
                    <?php
include 'dbconnect.php';
$query = "SELECT * FROM products";
$stmt = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($stmt)){
    $id = $row['id'];
    $name = $row['name'];
    $price = $row['price'];
    $description = $row['description'];
    $image = $row['image'];
?>
                    <div class="col-md-4 col-lg-4 col-12 mb-4">
                        <div class="card text-black">
                            <div class="pt-3 pe-3">
                                <span class="float-end badge rounded-pill bg-primary w-25">
                                    Price
                                </span>
                            </div>
                            <img src="images/<?= $image;?>" class="card-img-top rounded-circle mx-auto pt-3"
                                style="width:180px" alt="iPhone" />
                            <div class="card-body">
                                <div class="mb-4">
                                    <span class="float-start badge rounded-pill bg-primary w-25">
                                        Price
                                    </span>
                                    <span class="float-end fw-bold">&#2547; <?= $price;?></span>
                                </div>
                                <div class="text-center mt-1">
                                    <h6 class="card-title"><?= $name;?></h6>
                                    <h6 class="text-black mb-1 pb-3"><?= substr($description,0,100);?></h6>
                                </div>

                                <div class="d-flex flex-row">
                                    <a href="details.php?id=<?= $id;?>" class="btn btn-outline-primary flex-fill me-1">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

            </div>
            <div class="col-lg-3 col-sm-3 col-12">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <nav id="sidebarMenu" class="d-lg-block bg-white">
                            <div class="position-sticky">
                                <div class="list-group list-group-flush mx-3 mt-4">
                                    <a href="dashboard.php"
                                        class="list-group-item list-group-item-action py-2 ripple active">
                                        <i class="fas fa-chart-area fa-fw me-3"></i><span>Main Dashboard</span>
                                    </a>
                                    <a href="postproductform.php"
                                        class="list-group-item list-group-item-action py-2 ripple"><i
                                            class="fas fa-chart-line fa-fw me-3"></i><span>Poat A Product</span></a>
                                    <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                                        <i class="fas fa-chart-pie fa-fw me-3"></i><span>SEO</span>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                                            class="fas fa-chart-bar fa-fw me-3"></i><span>Orders</span></a>
                                    <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                                            class="fas fa-globe fa-fw me-3"></i><span>International</span></a>
                                    <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                                            class="fas fa-building fa-fw me-3"></i><span>Partners</span></a>
                                    <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                                            class="fas fa-calendar fa-fw me-3"></i><span>Calendar</span></a>
                                    <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                                            class="fas fa-users fa-fw me-3"></i><span>Users</span></a>
                                    <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                                            class="fas fa-money-bill fa-fw me-3"></i><span>Sales</span></a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <nav id="sidebarMenu" class="d-lg-block bg-white">
                            <div class="position-sticky">
                                <div class="list-group list-group-flush mx-3 mt-4">
                                    <a href="dashboard.php"
                                        class="list-group-item list-group-item-action py-2 ripple active">
                                        <i class="fas fa-chart-area fa-fw me-3"></i><span>Main Dashboard</span>
                                    </a>
                                    <a href="postproductform.php"
                                        class="list-group-item list-group-item-action py-2 ripple"><i
                                            class="fas fa-chart-line fa-fw me-3"></i><span>Poat A Product</span></a>
                                    <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                                        <i class="fas fa-chart-pie fa-fw me-3"></i><span>SEO</span>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                                            class="fas fa-chart-bar fa-fw me-3"></i><span>Orders</span></a>
                                    <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                                            class="fas fa-globe fa-fw me-3"></i><span>International</span></a>
                                    <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                                            class="fas fa-building fa-fw me-3"></i><span>Partners</span></a>
                                    <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                                            class="fas fa-calendar fa-fw me-3"></i><span>Calendar</span></a>
                                    <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                                            class="fas fa-users fa-fw me-3"></i><span>Users</span></a>
                                    <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                                            class="fas fa-money-bill fa-fw me-3"></i><span>Sales</span></a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>