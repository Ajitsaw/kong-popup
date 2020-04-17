<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
<style type="text/css">
	.kc-dashboard .card .heading {
		padding-left: 15px;
		padding-right: 15px
	}
	.kc-dashboard .card .heading h5 {
		color: #fff;
		font-size: 24px;
		margin-bottom: 0
	}
	.kc-dashboard .card .heading h6 {
		color: #fff;
		margin-top: 0
	}
	.kc-dashboard .card .right-icon {
		color: #fff;
		font-size: 20px;
		position: absolute;
		right: 10px;
		top: 10px
	}
	.kc-dashboard .card-content h4 {
		font-size: 24px
	}
	.kc-dashboard #card-notifi .card .heading h6 {
		color: #424242;
		margin-top: 15px;
		text-align: center;
		font-size: 20px
	}

	.views {
		background-color: #369EA0;
	}

	.click {
		background-color: #F78B60;
	}

	.click-rate {
		background-color: #52C27E;
	}

	.length {
		background-color: #F3556B;
	}

	.statistics {
		height: 500px;
		width: 100%;
	}

	div#report-filter {
		color: #fff;
		font-size: 15px;
		width: 300px;
		padding: 8px;
		border: none;
		border-radius: 2px;
		cursor: pointer;
	}

	input[type=text]:not(.browser-default){
		font-size: 14px!important;
	}
	input.input-mini.form-control.kg_secondary_bg {
		color: #fff;
	}
	input.input-mini.form-control.kg_secondary_bg + i {
		color: #fff;
	}
	li.kg_secondary_bg {
		color: #fff;
	}

	i.material-icons, span.date-box {
		background: none;
	}

	button.applyBtn.kg_secondary_bg.btn.btn-sm.btn-success, button.cancelBtn.btn.btn-sm.btn-default {
		border: none;
	}

	/*div#report-filter {
		color: #fff;
		font-size: 15px;
		width: 290px;
		padding: 8px;
		border: none;
		border-radius: 2px;
		cursor: pointer;
	}

	input[type=text]:not(.browser-default){
		font-size: 14px!important;
	}
	input.input-mini.form-control.kg_secondary_bg {
		color: #fff;
	}
	input.input-mini.form-control.kg_secondary_bg + i {
		color: #fff;
	}
	li.kg_secondary_bg {
		color: #fff;
	}

	i.material-icons, span.date-box {
		background: none;
	}

	button.applyBtn.kg_secondary_bg.btn.btn-sm.btn-success, button.cancelBtn.btn.btn-sm.btn-default {
		border: none;
	}*/

	/*div#report-filter {
		border: none !important;
		color: #fff;
		border-radius: 5px;
		padding: 8px !important;
		width: 275px !important;
	}
	div#report-filter span{
		cursor: pointer;
	}
	input[type=text]:not(.browser-default){
		font-size: 14px!important;
	}
	input.input-mini.form-control.kg_secondary_bg {
		color: #fff;
	}
	input.input-mini.form-control.kg_secondary_bg + i {
		color: #fff;
	}
	li.kg_secondary_bg {
		color: #fff;
	}*/
</style>

<!-- .popup-dashboard-section starts -->
<div class="main-dashboard popup-dashboard-section kc-dashboard">
	<!-- .dashboard-top starts -->
	<div class="dashboard-top clearfix">
		<!-- .dashboard-left starts -->
		<!-- <div class="dashboard-left">
			<i class="material-icons"><?php //echo __( 'more_vert', 'kong-popup' ); ?></i>
			<span class="date-box"><?php //echo __( 'May14 - Jun13', 'kong-popup' ); ?></span>
		</div> -->
		<div class="dashboard-left">
			<div class="kg_secondary_bg" id="report-filter">
				<i class="material-icons"><?php echo __( 'more_vert', 'kong-popup' ); ?></i>
				<span class="date-box"></span>
			</div>

			<div>
				<select class="dashboard-popup-lists">
					<option>ABCD</option>
					<option>ABCD</option>
					<option>ABCD</option>
					<option>ABCD</option>
				</select>
			</div>
		</div>
		<!-- .dashboard-left ends -->

		<!-- .dashboard-right starts -->
		<div class="dashboard-right">
			<!-- .dashboard-fullscreen starts -->
			<a href="#" class="dashboard-fullscreen">
				<i class="material-icons"><?php echo __( 'crop_free', 'kong-popup' ); ?></i>
			</a>
			<!-- .dashboard-fullscreen ends -->

			<!-- .dashboard-home starts -->
			<a href="#" class="dashboard-home">
				<i class="material-icons"><?php echo __( 'home', 'kong-popup' ); ?></i>
			</a>
			<!-- .dashboard-home ends -->

			<!-- .notification starts -->
			<div class="notification">
				<a href="#">
					<i class="material-icons"><?php echo __( 'notifications', 'kong-popup' ); ?></i>
					<i class="material-icons"><?php echo __( 'arrow_drop_down', 'kong-popup' ); ?></i>
					<span class="notification-number">4</span>
				</a>
			</div>
			<!-- .notification ends -->

			<!-- .profile-photo starts -->
			<div class="profile-photo"></div>
			<!-- .profile-photo ends -->
		</div>
		<!-- .dashboard-right ends -->
	</div>
	<!-- .dashboard-top ends -->

	<!-- .top-value starts -->
	<div class="top-value">
		<!-- .top-value-inner starts -->
		<div class="top-value-inner">
			<!-- .value-info starts -->
			<div class="value-info">
				<div class="card value-info--inner views animate fadeUp" id="views" style="display:none;">
					<div class="heading"> 
						<h5 id="total-views"></h5>
						<h6><?php echo __( 'Views', 'kong-popup' ); ?></h6>
					</div>
					<div class="right-icon">
						<i class="fa fa-lightbulb-o fa-lg" aria-hidden="true"></i>
					</div>
					<div id="total-views-chart" class="chart-item chart-shadow"></div>
				</div>
			</div>
			<!-- .value-info ends -->

			<!-- .value-info starts -->
			<div class="value-info">
				<div class="card value-info--inner click animate fadeUp" id="click" style="display:none;">
					<div class="heading"> 
						<h5 id="total-clicks"></h5>
						<h6><?php echo __( 'Clicks', 'kong-popup' ); ?></h6>
					</div>
					<div class="right-icon">
						<i class="fa fa-pie-chart fa-lg" aria-hidden="true"></i>
					</div>
					<div id="total-clicks-chart" class="chart-item chart-shadow"></div>
				</div>
			</div>
			<!-- .value-info ends -->

			<!-- .value-info starts -->
			<div class="value-info">
				<div class="card value-info--inner click-rate animate fadeUp" id="click-rate" style="display:none;">
					<div class="heading"> 
						<h5 id="total-click-through-rate"></h5>
						<h6><?php echo __( 'Click Through Rate', 'kong-popup' ); ?></h6>
					</div>
					<div class="right-icon">
						<i class="fa fa-line-chart fa-lg" aria-hidden="true"></i>
					</div>
					<div id="total-click-through-rate-chart" class="chart-item chart-shadow"></div>
				</div>
			</div>
			<!-- .value-info ends -->

			<!-- .value-info starts -->
			<div class="value-info">
				<div class="card value-info--inner length animate fadeUp" id="length" style="display:none;">
					<div class="heading"> 
						<h5 id="total-length"></h5>
						<h6><?php echo __( 'Average Popup Length', 'kong-popup' ); ?></h6>
					</div>
					<div class="right-icon">
						<i class="fa fa-envelope-open-o fa-lg" aria-hidden="true"></i>
					</div>
					<div id="total-length-chart" class="chart-item chart-shadow"></div>
				</div>
			</div>
			<!-- .value-info ends -->
		</div>
		<!-- .top-value-inner ends -->
	</div>
	<!-- .top-value ends -->

	<!-- .statistics starts -->
	<div class="card statistics animate fadeUp" id="statistics" style="display:none;">
		<h3><?php echo __( 'Popup Statistics', 'kong-popup' ); ?></h3>
		<!-- .statistics-graph starts -->
		<div class="statistics-graph" id="statistics-graph"></div>
		<!-- .statistics-graph ends -->
	</div>
	<!-- .statistics ends -->

	<!-- .popup-list starts -->
	<div class="popup-list animate fadeUp" id="popup-list" style="display:none;">
		<h3><?php echo __( 'Top lead generating popups', 'kong-popup' ); ?></h3>
		<!-- .popuplist-box starts -->
		<table class="popuplist-box" id="popuplist-box" cellspacing="0" cellpadding="0">
			<!-- thead starts -->
			<thead>
				<tr>
					<th class="popuptitle"><?php echo __( 'Popup Title', 'kong-popup' ); ?></th>
					<th class="popuptype"><?php echo __( 'Popup Type', 'kong-popup' ); ?></th>
					<th class="leads"><?php echo __( 'Leads', 'kong-popup' ); ?></th>
				</tr>
			</thead>
			<!-- thead ends -->

			<!-- tbody starts -->
			<tbody></tbody>
			<!-- tbody ends -->
		</table>
		<!-- .popuplist-box ends -->
	</div>
	<!-- .popup-list ends -->

	<!-- .activity-section starts -->
	<div class="activity-section">
		<!-- .activity-inner starts -->
		<div class="activity-inner">
			<!-- .chart-block starts -->
			<div class="chart-block">
				<div class="chart-block-inner claerfix">
					<h3><?php echo __( 'total activity', 'kong-popup' ); ?></h3>
					<!-- .chart-value starts -->
					<div class="chart-value clearfix">
						<!-- .round-chart starts -->
						<div class="round-chart" id="top-activity-round-chart"></div>
						<!-- .round-chart ends -->

						<!-- .chart-information starts -->
						<div class="chart-information" id="total-activity-block"></div>
						<!-- .chart-information ends -->
					</div>
					<!-- .chart-value ends -->
				</div>
			</div>
			<!-- .chart-block ends -->

			<!-- .chart-block starts -->
			<div class="chart-block">
				<div class="chart-block-inner claerfix">
					<h3><?php echo __( 'top performing popup', 'kong-popup' ); ?></h3>
					<!-- .chart-value starts -->
					<div class="chart-value clearfix">
						<!-- .round-chart starts -->
						<div class="round-chart" id="top-performing-popup-round-chart"></div>
						<!-- .round-chart ends -->

						<!-- .chart-information starts -->
						<div class="chart-information" id="top-performing-popup-block"></div>
						<!-- .chart-information ends -->
					</div>
					<!-- .chart-value ends -->
				</div>
			</div>
			<!-- .chart-block ends -->

			<!-- .chart-block starts -->
			<div class="chart-block">
				<div class="chart-block-inner claerfix">
					<h3><?php echo __( 'top refferers', 'kong-popup' ); ?></h3>
					<!-- .chart-value starts -->
					<div class="chart-value clearfix">
						<!-- .round-chart starts -->
						<div class="round-chart" id="top-refferers-round-chart"></div>
						<!-- .round-chart ends -->

						<!-- .chart-information starts -->
						<div class="chart-information">
							<!-- .chart-value-row starts -->
							<div class="chart-value-row">
								<strong><?php echo __( 'subscribers', 'kong-popup' ); ?></strong>
								<span>0</span>
							</div>
							<!-- .chart-value-row ends -->

							<!-- .chart-value-row starts -->
							<div class="chart-value-row">
								<strong><?php echo __( 'contact messages', 'kong-popup' ); ?></strong>
								<span>0</span>
							</div>
							<!-- .chart-value-row ends -->

							<!-- .chart-value-row starts -->
							<div class="chart-value-row">
								<strong><?php echo __( 'promo clicks', 'kong-popup' ); ?></strong>
								<span>0</span>
							</div>
							<!-- .chart-value-row ends -->

							<!-- .chart-value-row starts -->
							<div class="chart-value-row">
								<strong><?php echo __( 'responses', 'kong-popup' ); ?></strong>
								<span>0</span>
							</div>
							<!-- .chart-value-row ends -->

							<!-- .chart-value-row starts -->
							<div class="chart-value-row">
								<strong><?php echo __( 'followers', 'kong-popup' ); ?></strong>
								<span>0</span>
							</div>
							<!-- .chart-value-row ends -->

							<!-- .chart-value-row starts -->
							<div class="chart-value-row">
								<strong><?php echo __( 'shares', 'kong-popup' ); ?></strong>
								<span>0</span>
							</div>
							<!-- .chart-value-row ends -->

							<!-- .chart-value-row starts -->
							<div class="chart-value-row">
								<strong><?php echo __( 'fb messenger', 'kong-popup' ); ?></strong>
								<span>0</span>
							</div>
							<!-- .chart-value-row ends -->
						</div>
						<!-- .chart-information ends -->
					</div>
					<!-- .chart-value ends -->
				</div>
			</div>
			<!-- .chart-block ends -->

			<!-- .chart-block starts -->
			<div class="chart-block">
				<div class="chart-block-inner claerfix">
					<h3><?php echo __( 'top locations', 'kong-popup' ); ?></h3>
					<!-- .chart-value starts -->
					<div class="chart-value clearfix">
						<!-- .round-chart starts -->
						<div class="round-chart" id="top-locations-round-chart"></div>
						<!-- .round-chart ends -->

						<!-- .chart-information starts -->
						<div class="chart-information" id="top-locations-block"></div>
						<!-- .chart-information ends -->
					</div>
					<!-- .chart-value ends -->
				</div>
			</div>
			<!-- .chart-block ends -->
		</div>
		<!-- .activity-inner ends -->
	</div>
	<!-- .activity-section ends -->
</div> 
<!-- .popup-dashboard-section ends -->