 <!-- Navbar & Hero Start -->
        
<div class="container position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 pe-4">
                <a href="<?= base_url(); ?>" class="nav-item nav-link active">Home</a>
                <a href="<?= base_url('about'); ?>" class="nav-item nav-link">About</a>
                <a href="<?= base_url('menu'); ?>" class="nav-item nav-link">Menu</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="<?= base_url('booking'); ?>" class="dropdown-item">Booking</a>
                        <a href="<?= base_url('team'); ?>" class="dropdown-item">Our Team</a>
                    </div>
                </div>
                <a href="<?= base_url('contact'); ?>" class="nav-item nav-link">Contact</a>
            </div>
            <a href="https://htmlcodex.com/downloading/?item=2098" class="btn btn-primary py-2 px-4">Buy Pro Version</a>
        </div>
    </nav>
</div>

            
        <!-- Navbar & Hero End -->