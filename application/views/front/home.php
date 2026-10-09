
<?php $this->load->view('front/include/header'); ?>

<body>
    <div class="container-fluid bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <div class="container-fluid p-0">

            <?php $this->load->view('front/include/navbar'); ?>

            <div class="container-fluid py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft"><br><?= $banner->title; ?></h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2"><?= $banner->description; ?></p>
                            <a href="" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Book A Table</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="<?= base_url('uploads/banner/' . $banner->banner_image); ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Start -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="<?= base_url('uploads/about/' . $about->about_img1); ?>" >
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="<?= base_url('uploads/about/' . $about->about_img2); ?>" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="<?= base_url('uploads/about/' . $about->about_img3); ?>">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="<?= base_url('uploads/about/' . $about->about_img4); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                         <h1 class="mb-4"> <?= $about->title; ?><i class="fa fa-utensils text-primary me-2"></i></h1>
                        <p class="mb-4"> <?= $about->description; ?></p>
                
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up"><?= $about->experince; ?></h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Years of</p>
                                        <h6 class="text-uppercase mb-0">Experience</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up"><?= $about->chefs; ?></h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Popular</p>
                                        <h6 class="text-uppercase mb-0">Master Chefs</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Menu Start -->
        <div class="container-fluid py-5">
            <div class="container">

                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">

                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">
                        Food Menu
                    </h5>

                    <h1 class="mb-5">
                        Most Popular Items
                    </h1>

                </div>


                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">


                    <!-- =========================
                        MENU CATEGORIES
                    ========================== -->

                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">

                        <?php $category_count = 1; ?>

                        <?php foreach ($categories as $category): ?>

                            <li class="nav-item">

                                <a class="d-flex align-items-center text-start mx-3 pb-3
                                    <?= ($category_count == 1) ? 'active' : ''; ?>"
                                data-bs-toggle="pill"
                                href="#tab-<?= $category->id; ?>">

                                    <!-- <i class="<?= $category->icon; ?> fa-2x text-primary"></i> -->

                                     <?php if ($category->category_name == 'Breakfast') { ?>

                                    <i class="fa fa-coffee fa-2x text-primary"></i>

                                    <?php } elseif ($category->category_name == 'Lunch') { ?>

                                        <i class="fa fa-hamburger fa-2x text-primary"></i>

                                    <?php } else { ?>

                                        <i class="fa fa-utensils fa-2x text-primary"></i>

                                    <?php } ?> 

                                    <div class="ps-3">

                                        <small class="text-body">
                                            <?= $category->subtitle; ?>
                                        </small>

                                        <h6 class="mt-n1 mb-0">
                                            <?= $category->category_name; ?>
                                        </h6>

                                    </div>

                                </a>

                            </li>

                            <?php $category_count++; ?>

                        <?php endforeach; ?>

                    </ul>


                    <!-- =========================
                        MENU ITEMS
                    ========================== -->

                    <div class="tab-content">

                        <?php $category_count = 1; ?>

                        <?php foreach ($categories as $category): ?>

                            <div id="tab-<?= $category->id; ?>"
                                class="tab-pane fade
                                <?= ($category_count == 1) ? 'show active' : ''; ?>
                                p-0">

                                <div class="row g-4">


                                    <?php foreach ($menu_items as $item): ?>

                                        <?php if ($item->category_id == $category->id): ?>


                                            <div class="col-lg-6">

                                                <div class="d-flex align-items-center">


                                                    <!-- Food Image -->

                                                    <img
                                                        class="flex-shrink-0 img-fluid rounded"
                                                        src="<?= base_url('uploads/menu/' . $item->image); ?>"
                                                        alt="<?= $item->item_name; ?>"
                                                        style="width: 80px; height: 80px; object-fit: cover;">


                                                    <!-- Food Details -->

                                                    <div class="w-100 d-flex flex-column text-start ps-4">

                                                        <h5 class="d-flex justify-content-between border-bottom pb-2">

                                                            <span>
                                                                <?= $item->item_name; ?>
                                                            </span>

                                                            <span class="text-primary">
                                                                ₹<?= $item->price; ?>
                                                            </span>

                                                        </h5>


                                                        <small class="fst-italic">
                                                            <?= $item->description; ?>
                                                        </small>

                                                    </div>

                                                </div>

                                            </div>


                                        <?php endif; ?>

                                    <?php endforeach; ?>


                                </div>

                            </div>

                            <?php $category_count++; ?>

                        <?php endforeach; ?>

                    </div>

                </div>

            </div>
        </div>
        <!-- Menu End -->

        <!-- Reservation Start -->
        <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row g-0">
                    <div class="col-md-6">
                        <div class="video">
                            <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                                <span></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 bg-dark d-flex align-items-center">
                        <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                            <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                            <h1 class="text-white mb-4">Book A Table Online</h1>
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="Your Name">
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating date" id="date3" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" id="datetime" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                            <label for="datetime">Date & Time</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="select1">
                                            <option value="1">People 1</option>
                                            <option value="2">People 2</option>
                                            <option value="3">People 3</option>
                                            </select>
                                            <label for="select1">No Of People</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Special Request" id="message" style="height: 100px"></textarea>
                                            <label for="message">Special Request</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reservation Start -->


        <!-- Team Start -->
        <div class="container-fluid pt-5 pb-3">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Team Members</h5>
                    <h1 class="mb-5">Our Master Chefs</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src=<?= base_url("assets/user/img/team-1.jpg");?> alt="">
                            </div>
                            <h5 class="mb-0">Full Name</h5>
                            <small>Designation</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src=<?= base_url("assets/user/img/team-2.jpg");?> alt="">
                            </div>
                            <h5 class="mb-0">Full Name</h5>
                            <small>Designation</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src=<?= base_url("assets/user/img/team-3.jpg");?> alt="">
                            </div>
                            <h5 class="mb-0">Full Name</h5>
                            <small>Designation</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src=<?= base_url("assets/user/img/team-4.jpg");?> alt="">
                            </div>
                            <h5 class="mb-0">Full Name</h5>
                            <small>Designation</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->
        
</body>

</html>

<?php $this->load->view('front/include/footer'); ?>
