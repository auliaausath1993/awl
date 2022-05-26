<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#page-top">Agung Widiya Lestari</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                <?php if(empty($this->session->userdata('is_login'))) { ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>dashboard/register">Register</a></li>
		        <?php } else { ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>dashboard/logout">Logout</a></li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>