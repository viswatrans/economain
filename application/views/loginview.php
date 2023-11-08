
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>Econo</title>
	<link rel="shortcut icon" href="assets/images/transglobal-logo.png" type="image/x-icon">

	<link rel="stylesheet" href="assets/styles/style.min.css">
	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">
	
	<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 
	 <!-- stats.js lib --> <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>	
<style>
	

/* index styles */


canvas {
  display: block;
  vertical-align: bottom;
} /* ---- particles.js container ---- */
#particles-js {
  position: absolute;
  width: 100%;
  height: 100%;
  background-color: black;
  background-position: 50% 50%;
} /* ---- stats.js ---- */

.js-count-particles {
  font-size: 2.1em;
}
#stats,
.count-particles {
  -webkit-user-select: none;

  margin-left: 5px;
}
#stats {
  border-radius: 3px 3px 0 0;
  overflow: hidden;
}
.count-particles {
  border-radius: 0 0 3px 3px;
}

</style>
</head>

<body>
	<!-- particles.js container --> <div id="particles-js"></div> <!-- stats - count particles -->
	<div class="count-particles">
		<div id="single-wrapper">
		<?php if ($this->session->flashdata('success')) { ?>

		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			<strong><?php echo $this->session->flashdata('success'); ?></strong>
		</div>

		<?php } ?>

		<?php if ($this->session->flashdata('error')) { ?>

		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			<strong><?php echo $this->session->flashdata('error'); ?></strong>
		</div>

		<?php } ?>

		<form class="form-horizontal form-signin frm-single" method="POST" action="<?php echo base_url() ?>login/verify">
				<div class="inside">
					<div class="title"><strong><span class="one">Trans Global</span> <span class="two">Geomatics</span><span class="three"> Pvt Ltd</span></strong></div>
					<!-- /.title -->
					<div class="frm-title">Login</div>
					<!-- /.frm-title -->
					<div class="frm-input"><input type="text" placeholder="Username" class="frm-inp username" id="username" name="username"><i class="fa fa-user frm-ico"></i></div>
					<!-- /.frm-input -->
					<div class="frm-input"><input type="password" placeholder="Password" class="frm-inp password" id="password" name="password"><i class="fa fa-lock frm-ico"></i></div>
					<!-- /.frm-input -->
					<div class="clearfix margin-bottom-20">
						<div class="pull-left">
							<div class="checkbox primary"><input type="checkbox" id="remember-me" class="chk-remember"><label for="rememberme">Remember me</label></div>
							<!-- /.checkbox -->
						</div>
						<!-- /.pull-left -->
						<div class="pull-right"></div>
						<!-- /.pull-right -->
					</div>
					<!-- /.clearfix -->
					<button type="submit" name="submit" class="frm-submit">Login<i class="fa fa-arrow-circle-right"></i></button>
					
					<div class="frm-footer">@ Trans Global Geomatics Pvt Ltd</div>
					<!-- /.footer -->
				</div>
				<!-- .inside -->
			</form>
			<!-- /.frm-single -->
		</div><!--/#single-wrapper -->
	</div>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>
</body>
<script>
    particlesJS("particles-js", {
      particles: {
        number: { value: 80, density: { enable: true, value_area: 800 } },
        color: { value: "#ffffff" },
        shape: {
          type: "circle",
          stroke: { width: 0, color: "#000000" },
          polygon: { nb_sides: 5 },
          image: { src: "img/github.svg", width: 100, height: 100 },
        },
        opacity: {
          value: 0.5,
          random: false,
          anim: { enable: false, speed: 1, opacity_min: 0.1, sync: false },
        },
        size: {
          value: 3,
          random: true,
          anim: { enable: false, speed: 40, size_min: 0.1, sync: false },
        },
        line_linked: {
          enable: true,
          distance: 150,
          color: "#ffffff",
          opacity: 0.4,
          width: 1,
        },
        move: {
          enable: true,
          speed: 6,
          direction: "none",
          random: false,
          straight: false,
          out_mode: "out",
          bounce: false,
          attract: { enable: false, rotateX: 600, rotateY: 1200 },
        },
      },
      interactivity: {
        detect_on: "canvas",
        events: {
          onhover: { enable: true, mode: "repulse" },
          onclick: { enable: true, mode: "push" },
          resize: true,
        },
        modes: {
          grab: { distance: 400, line_linked: { opacity: 1 } },
          bubble: {
            distance: 400,
            size: 40,
            duration: 2,
            opacity: 8,
            speed: 3,
          },
          repulse: { distance: 200, duration: 0.4 },
          push: { particles_nb: 4 },
          remove: { particles_nb: 2 },
        },
      },
      retina_detect: true,
    });
    var count_particles, stats, update;
    stats = new Stats();
    stats.setMode(0);
    stats.domElement.style.position = "absolute";
    stats.domElement.style.left = "0px";
    stats.domElement.style.top = "0px";
    document.body.appendChild(stats.domElement);
    count_particles = document.querySelector(".js-count-particles");
    update = function () {
      stats.begin();
      stats.end();
      if (
        window.pJSDom[0].pJS.particles &&
        window.pJSDom[0].pJS.particles.array
      ) {
        count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
      }
      requestAnimationFrame(update);
    };
    requestAnimationFrame(update);
  </script>
</html>