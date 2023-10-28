@extends('enfold.index')

@section('title','Profil')

@section('content')

	<div class="profile-main">
		<div class="profile-header">
			<div class="user-detail">
				<div class="user-image">
					<img src="http://nicesnippets.com/demo/up-profile.jpg">
				</div>
				<div class="user-data">
					<h2>Smith Alexander</h2>
					<span class="post-label">Admin</span>
					<span class="post-label">Speaker</span>
					<span class="post-label">AMA</span>
					<p>Founder and CEO at <strong>NewSpot</strong><br>
					<i class="fa fa-map-marker" aria-hidden="true"></i>  Boston, MA, United States
					</p>
				</div>
				<div class="social-icons">
					<i class="fa fa-facebook"></i>
					<i class="fa fa-twitter"></i>
					<i class="fa fa-linkedin"></i>
					<i class="fa fa-google"></i>
					<i class="fa fa-instagram"></i>
					<a href="#" type="button" class="msg-btn"><i class="fa fa-envelope-o" aria-hidden="true"></i>Send Message</a>
				</div>
			</div>
			<div class="tab-panel-main">
				<ul class="tabs">
					<li class="tab-link current" data-tab="Basic-detail">Basic Detail</li>
					<li class="tab-link" data-tab="Edu-detail">Educational Detail</li>
					<li class="tab-link" data-tab="Portfolio">Portfolio</li>
				</ul>
				<div id="Basic-detail" class="tab-content current">
					<div class="skill-box">
					  <ul>
						<li><strong>My Core Skills:</strong></li>
						<li>INBOUND MARKETING<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></li>
						<li>ENTERPRENEURSHIP<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></li>
						<li>GROWTH MARKETING<i class="fa fa-star" aria-hidden="true"></i></li>
					  </ul>		
					</div>
					<div class="bio-box">
						<div class="heading">
							<p>Professional Bio
							<label>10 Year Experience</label></p>
						</div>
						<div class="desc">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
						</div>
					</div>
					<div class="detail-box">
						<p>Detail</p>
						<ul class="ul-first">
							<li>Birth date</li>
							<li>City</li>
							<li>Country</li>
							<li>Contact No</li>
						</ul>
						<ul class="ul-second">
							<li>8 March 1997</li>
							<li>Jamanagar</li>
							<li>California</li>
							<li>9900990087</li>
						</ul>
					</div>
				</div>
				<div id="Edu-detail" class="tab-content">
					<div class="Edu-box-main">
						 <h2><i class="fa fa-graduation-cap" aria-hidden="true"></i> Education</h2>
						 <div class="Edu-box">
						 	<h5><span>Graphic designer</span> <br>
						 		2005 - 2007 | Infoway Corporation</h5>
						 	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						 </div>
						 <div class="Edu-box">
						 	<h5><span>Web designer</span> <br>
						 		2007 - 2009 | Light Corporation</h5>
						 	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						 </div>
					</div>
				</div>
				<div id="Portfolio" class="tab-content">
					<div class="portfolio-box">
						<div class="portfolio-img-box">
							<h3>Web Design</h3>
							<img src="http://nicesnippets.com/demo/up-web-design.jpg">
						</div>
						<div class="portfolio-img-box">
							<h3>Web development</h3>
							<img src="http://nicesnippets.com/demo/up-web-development.png">
						</div>
						<div class="portfolio-img-box">
							<h3>SEO</h3>
							<img src="http://nicesnippets.com/demo/up-seo.jpg">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div style="clear: both;"></div>
		<div class="footer">
			<p><strong>My Badges</strong></p><br>
			<div class="footer-box"><i class="fa fa-facebook"></i></div>
			<div class="footer-box"><i class="fa fa-twitter"></i></div>
			<div class="footer-box"><i class="fa fa-linkedin"></i></div>
			<div class="footer-box"><i class="fa fa-google"></i></div>
			<div class="footer-box"><i class="fa fa-instagram"></i></div>
		</div>
	</div>

@endsection
