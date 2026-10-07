<div class="sidebar-menu">
	<div class="sidebar-header">
		<div class="logo">
			<a href="<?php echo admin_url(); ?>dashboard"><img src="<?php echo assets_url(); ?>user/img/login-page-img.jpg" alt="logo"></a>
		</div>
	</div>
	<div class="main-menu">
		<div class="menu-inner">
			<nav>
				<ul class="metismenu" id="menu">
					<?php $nav_controller_name=$this->router->fetch_class(); ?>
					
					<li <?php if($nav_controller_name=="dashboard"){ ?>class="active"<?php } ?>>
						<a href="<?php echo admin_url(); ?>dashboard"><i class="ti-dashboard"></i> <span>dashboard</span></a>
					</li>
					
					<li <?php if($nav_controller_name=="banner"){ ?>class="active"<?php } ?>>
						<a href="<?php echo admin_url(); ?>Banner"><i class="ti-receipt"></i> <span>Banner</span></a>
					</li>
					<!-- <li <?php if($nav_controller_name=="facts"){ ?>class="active"<?php } ?>>
						<a href="<?php echo admin_url(); ?>Facts"><i class="ti-receipt"></i> <span>Facts</span></a>
					</li> -->
					<li <?php if($nav_controller_name=="about"){ ?>class="active"<?php } ?>>
						<a href="<?php echo admin_url(); ?>About"><i class="ti-receipt"></i> <span>About</span></a>
					</li>
					  <li <?php if($nav_controller_name=="menu"){ ?>class="active"<?php } ?>>
						<a href="<?php echo admin_url(); ?>Menu"><i class="ti-receipt"></i> <span>Menu</span></a>
					</li> 
					<!-- <li <?php if($nav_controller_name=="service"){ ?>class="active"<?php } ?>>
						<a href="<?php echo admin_url(); ?>Service"><i class="ti-receipt"></i> <span>Service</span></a>
					</li>
					<li <?php if($nav_controller_name=="client"){ ?>class="active"<?php } ?>>
						<a href="<?php echo admin_url(); ?>Client"><i class="ti-receipt"></i> <span>Client</span></a>
					</li>
					<li <?php if($nav_controller_name=="team"){ ?>class="active"<?php } ?>>
						<a href="<?php echo admin_url(); ?>Team"><i class="ti-receipt"></i> <span>Team</span></a>
					</li>
					<li <?php if($nav_controller_name=="contact"){ ?>class="active"<?php } ?>>
						<a href="<?php echo admin_url(); ?>contact/fixed_contact"><i class="ti-receipt"></i> <span>Contact</span></a>
					</li>
					<li <?php if($nav_controller_name=="contact_us"){ ?>class="active"<?php } ?>>
					<a href="<?php echo admin_url(); ?>Contact_us/fixed_contact">
						<i class="ti-receipt"></i> 
						<span>Contact Us</span>
					</a>
				    </li>
					<li <?php if($nav_controller_name=="front_service"){ ?>class="active"<?php } ?>>
					<a href="<?php echo admin_url(); ?>front_service">
						<i class="ti-receipt"></i> 
						<span>Service Image</span>
					</a>
				    </li>
					<li <?php if($nav_controller_name=="front_team"){ ?>class="active"<?php } ?>>
					<a href="<?php echo admin_url(); ?>front_team">
						<i class="ti-receipt"></i> 
						<span>Team Image</span>
					</a>
				    </li>
					<li <?php if($nav_controller_name=="quote"){ ?>class="active"<?php } ?>>
					<a href="<?php echo admin_url(); ?>quote">
						<i class="ti-receipt"></i> 
						<span>Quote Image</span>
					</a>
				    </li>
					<li <?php if($nav_controller_name=="vendor"){ ?>class="active"<?php } ?>>
					<a href="<?php echo admin_url(); ?>vendor">
						<i class="ti-receipt"></i> 
						<span>vendor Img</span>
					</a>
				    </li>  -->
				</ul>
			</nav>
		</div>
	</div>
</div>
