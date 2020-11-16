<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
	<meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap:">

	<link rel="icon" href="images/favicon.png">

	<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700;800;900&family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	<title>MyGov</title>
	<link rel="stylesheet" href="css/framework7.bundle.min.css">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="page">
	<div class="navbar navbar-transparent">
		<div class="navbar-bg"></div>
		<div class="navbar-inner sliding">
			<div class="left">
				<a class="link back">
					<i class="icon icon-back"></i>
				</a>
			</div>
			<div class="title">Tenders</div>
			<div class="right">
				<a href="#" class="panel-open link" data-panel=".sidebar-right">
					<ion-icon name="filter-outline"></ion-icon><span></span>
				</a>
			</div>
		</div>
	</div>
	<div class="page-content">

		<!-- sidebar / panel for filter -->
		<div class="panel-backdrop"></div>
		<div class="panel panel-right sidebar-right panel-cover panel-init">
			<div class="block-title title-small">
				<h3>Sort by</h3>
			</div>
			<form class="list">
				<ul>
					<li class="item-content item-input">
						<div class="item-inner">
							<div class="item-input-wrap input-dropdown-wrap">
								<select>
									<option value="Relevance">Relevance</option>
									<option value="Date">Date</option>
									<!-- <option value="Price">Price: Low to high</option>
									<option value="Price">Price: High to low</option> -->
								</select>
							</div>
						</div>
					</li>
				</ul>
			</form>

			<div class="block-title title-small">
				<h3>Ratings</h3>
			</div>
			<div class="rating-filter">
				<div class="container">
					<ul>
						<li class="rating-active"><a href=""><ion-icon name="star-sharp"></ion-icon>5</a></li>
						<li><a href=""><ion-icon name="star-sharp"></ion-icon>4</a></li>
						<li><a href=""><ion-icon name="star-sharp"></ion-icon>3</a></li>
						<li><a href=""><ion-icon name="star-sharp"></ion-icon>2</a></li>
						<li><a href=""><ion-icon name="star-sharp"></ion-icon>1</a></li>
					</ul>
				</div>
			</div>

			<div class="block-title title-small">
				<h3>Location</h3>
			</div>
			<form class="list">
				<ul>
					<li class="item-content item-input">
						<div class="item-inner">
							<div class="item-input-wrap">
								<input type="text" placeholder="Current location">
								<span class="input-clear-button"></span>
							</div>
						</div>
					</li>
				</ul>
			</form>

			<div class="block-title title-small">
				<h3>Price Range</h3>
			</div>
			<div class="container">
				<form class="list">
					<ul>
						<li>
							<div class="row">
								<div class="col-50">
									<div class="item-content item-input">
										<div class="item-inner">
											<div class="item-input-wrap">
												<input type="text" placeholder="Minimum">
												<span class="input-clear-button"></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-50">
									<div class="item-content item-input">
										<div class="item-inner">
											<div class="item-input-wrap">
												<input type="text" placeholder="Maximum">
												<span class="input-clear-button"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</form>
			</div>

			<!-- separator -->
			<div class="separator-large"></div>
			<!-- end separator -->

			<div class="fitler-execution">
				<div class="container">
					<button class="button secondary-button panel-close">Cancel</button>
					<!-- separator -->
					<div class="separator-medium"></div>
					<!-- end separator -->
					<button class="button">Apply Filters</button>
				</div>
			</div>

			<!-- separator -->
			<div class="separator-large"></div>
			<!-- end separator -->

		</div>
		<!-- end sidebar / panel for filter -->

		<!-- separator -->
		<div class="separator-extra-small"></div>
		<!-- end separator -->

		<!-- header searchbar -->
		<div class="header-searchbar">
			<form class="searchbar">
				<div class="searchbar-inner">
					<div class="searchbar-input-wrap">
						<input type="search" placeholder="Find tenders, jobs & government news">
						<i class="searchbar-icon"></i>
						<span class="input-clear-button"></span>
					</div>
					<span class="searchbar-disable-button">Cancel</span>
				</div>
			</form>
		</div>
		<!-- end header searchbar -->

		<!-- separator -->
		<div class="separator-small"></div>
		<!-- end separator -->

		<!-- all categories -->
		<div class="categories">
			<div class="container">
				<div class="row">
					<div class="col-30">
						<div class="content-item radius-default bg-white">
							<a href="" data-transition="f7-dive">
								<div class="favorite-symbol"><ion-icon name="heart-outline"></ion-icon></div>
							</a>
							<a href="/ads-details/">
								<img class="full-width radius-top-only" src="images/tenders/office.jpg" alt="">
								<div class="text-desc">
									<p class="title-item">CONSTRUCTION OF KMA OFFICE BLOCKS</p>
									<p class="price-item">KMA.RFP/001/OFFICE BLOCK/2016-17</p>
									<p class="location-item"><ion-icon name="map-outline"></ion-icon>NATIONAL GOVERNMENT</p>
								</div>
							</a>
						</div>
					</div>
					<div class="col-30">
						<div class="content-item radius-default bg-white">
							<a href="" data-transition="f7-dive">
								<div class="favorite-symbol active-symbol"><ion-icon name="heart-outline"></ion-icon></div>
							</a>
							<a href="/ads-details/">
								<img class="full-width radius-top-only" src="images/tenders/kmc.jpg" alt="">
								<div class="text-desc">
									<p class="title-item">SUPPLY OF EMPTY METAL DRUMS</p>
									<p class="price-item">KMC/RFQ/7315/2019-2020</p>
									<p class="location-item"><ion-icon name="map-outline"></ion-icon>KENYA MEAT COMMISSION</p>
								</div>
							</a>
						</div>
					</div>
					<div class="col-30">
						<div class="content-item radius-default bg-white">
							<a href="" data-transition="f7-dive">
								<div class="favorite-symbol"><ion-icon name="heart-outline"></ion-icon></div>
							</a>
							<a href="/ads-details/">
								<img class="full-width radius-top-only" src="images/tenders/office.jpg" alt="">
								<div class="text-desc">
									<p class="title-item">CONSTRUCTION OF KMA OFFICE BLOCKS</p>
									<p class="price-item">KMA.RFP/001/OFFICE BLOCK/2016-17</p>
									<p class="location-item"><ion-icon name="map-outline"></ion-icon>NATIONAL GOVERNMENT</p>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-30">
						<div class="content-item radius-default bg-white">
							<a href="" data-transition="f7-dive">
								<div class="favorite-symbol"><ion-icon name="heart-outline"></ion-icon></div>
							</a>
							<a href="/ads-details/">
								<img class="full-width radius-top-only" src="images/tenders/kenha.jpg" alt="">
								<div class="text-desc">
									<p class="title-item">ROUTINE MAINTENANCE OF KAPLOMBOI KAPCHEMIBEI ROAD</p>
									<p class="price-item">758262</p>
									<p class="location-item"><ion-icon name="map-outline"></ion-icon>BOMET COUNTY</p>
								</div>
							</a>
						</div>
					</div>
					<div class="col-30">
						<div class="content-item radius-default bg-white">
							<a href="" data-transition="f7-dive">
								<div class="favorite-symbol"><ion-icon name="heart-outline"></ion-icon></div>
							</a>
							<a href="/ads-details/">
								<img class="full-width radius-top-only" src="images/tenders/dam.jpg" alt="">
								<div class="text-desc">
									<p class="title-item">CONSTRUCTION OF WATER PANS/SMALL DAM</p>
									<p class="price-item">MWI/SDI/ONT/002/2017-2018B</p>
									<p class="location-item"><ion-icon name="map-outline"></ion-icon>STATE DEPARTMENT OF IRRIGATION</p>
								</div>
							</a>
						</div>
					</div>
					<div class="col-30">
						<div class="content-item radius-default bg-white">
							<a href="" data-transition="f7-dive">
								<div class="favorite-symbol"><ion-icon name="heart-outline"></ion-icon></div>
							</a>
							<a href="/ads-details/">
								<img class="full-width radius-top-only" src="images/tenders/kenha.jpg" alt="">
								<div class="text-desc">
									<p class="title-item">ROUTINE MAINTENANCE OF KAPLOMBOI KAPCHEMIBEI ROAD</p>
									<p class="price-item">758262</p>
									<p class="location-item"><ion-icon name="map-outline"></ion-icon>BOMET COUNTY</p>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end all categories -->

		<!-- separator -->
		<div class="separator-large"></div>
		<!-- end separator -->

	</div>
</div>

	<!-- script -->
	<script src="js/framework7.bundle.min.js"></script>
	<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
	<script src="js/routes.js"></script>
	<script src="js/app.js"></script>
	<!-- end script -->
</body>
</html>
