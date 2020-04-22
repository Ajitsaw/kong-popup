<!-- .popup-dashboard-section starts -->
<div class="main-dashboard popup-dashboard-section kc-dashboard">
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
						<h5 id="popup-length"></h5>
						<h6><?php echo __( 'Average Popup Length', 'kong-popup' ); ?></h6>
					</div>
					<div class="right-icon">
						<i class="fa fa-envelope-open-o fa-lg" aria-hidden="true"></i>
					</div>
					<div id="popup-length-chart" class="chart-item chart-shadow"></div>
				</div>
			</div>
			<!-- .value-info ends -->
		</div>
		<!-- .top-value-inner ends -->
	</div>
	<!-- .top-value ends -->

	<!-- .statistics starts -->
	<div class="card statistics animate fadeUp" id="statistics" style="display: none;">
		<h3><?php echo __( 'Popup Statistics', 'kong-popup' ); ?></h3>
		<!-- .statistics-graph starts -->
		<div class="statistics-graph" id="statistics-graph"></div>
		<!-- .statistics-graph ends -->

		<!-- .chart-value-row starts -->
		<div class="chart-value-row" id="statistics-graph-no-data-block" style="display: none;">
			<span class="no-data"><i class="material-icons">error_outline</i></span>
		</div>
		<!-- .chart-value-row ends -->
	</div>
	<!-- .statistics ends -->

	<!-- .popup-list starts -->
	<div class="popup-list animate fadeUp" id="popup-list" style="display: none;">
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
				<div class="chart-block-inner clearfix" id="top-activity">
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

					<!-- .chart-value-row starts -->
					<div class="chart-value-row" id="top-activity-no-data-block" style="display: none;">
						<span class="no-data"><i class="material-icons">error_outline</i></span>
					</div>
					<!-- .chart-value-row ends -->
				</div>
			</div>
			<!-- .chart-block ends -->

			<!-- .chart-block starts -->
			<div class="chart-block">
				<div class="chart-block-inner clearfix" id="top-performing">
					<h3><?php echo __( 'top performing popup', 'kong-popup' ); ?></h3>
					<!-- .chart-value starts -->
					<div class="chart-value clearfix">
						<!-- .round-chart starts -->
						<div class="round-chart" id="top-performing-popup-round-chart">
							<div class="cup-image kg_secondary_bg" id="tpp-cup">
								<i class="fa fa-trophy" aria-hidden="true"></i>
							</div>

							<img src="#" alt="" id="tpp-url" />
							<h3 id="tpp-title"></h3>
						</div>
						<!-- .round-chart ends -->

						<!-- .chart-information starts -->
						<div class="chart-information" id="top-performing-popup-block">
							<!-- .chart-value-row starts -->
							<div class="chart-value-row">
								<strong><?php echo __( 'VIEWS', 'kong-popup' ); ?></strong>
								<span id="tpp-views">0</span>
							</div>
							<!-- .chart-value-row ends -->

							<!-- .chart-value-row starts -->
							<div class="chart-value-row">
								<strong><?php echo __( 'CLICKS', 'kong-popup' ); ?></strong>
								<span id="tpp-clicks">0</span>
							</div>
							<!-- .chart-value-row ends -->

							<!-- .chart-value-row starts -->
							<div class="chart-value-row">
								<strong><?php echo __( 'CTR', 'kong-popup' ); ?></strong>
								<span id="tpp-ctr">0</span>
							</div>
							<!-- .chart-value-row ends -->

							<!-- .chart-value-row starts -->
							<div class="chart-value-row">
								<strong><?php echo __( 'DAYS', 'kong-popup' ); ?></strong>
								<span id="tpp-days">0</span>
							</div>
							<!-- .chart-value-row ends -->
						</div>
						<!-- .chart-information ends -->
					</div>
					<!-- .chart-value ends -->

					<!-- .chart-value-row starts -->
					<div class="chart-value-row" id="top-performing-no-data-block" style="display: none;">
						<span class="no-data"><i class="material-icons">error_outline</i></span>
					</div>
					<!-- .chart-value-row ends -->
				</div>
			</div>
			<!-- .chart-block ends -->

			<!-- .chart-block starts -->
			<div class="chart-block">
				<div class="chart-block-inner clearfix" id="top-refferers">
					<h3><?php echo __( 'top refferers', 'kong-popup' ); ?></h3>
					<!-- .chart-value starts -->
					<div class="chart-value clearfix">
						<!-- .round-chart starts -->
						<div class="round-chart" id="top-refferers-round-chart"></div>
						<!-- .round-chart ends -->
						<!--- image for demo -->
						<div class="round-chart" id="top-performing-popup-round-chart">
							<img src="<?php echo PLUGIN_BASE_URL . 'admin/images/round-chart.png'; ?>" alt="" id="tpp-url">
						</div>
						<!-- .chart-information starts -->
						<div class="chart-information" id="top-refferers-block">
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
				<div class="chart-block-inner clearfix" id="top-locations">
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

					<!-- .chart-value-row starts -->
					<div class="chart-value-row" id="top-locations-no-data-block" style="display: none;">
						<span class="no-data"><i class="material-icons">error_outline</i></span>
					</div>
					<!-- .chart-value-row ends -->
				</div>
			</div>
			<!-- .chart-block ends -->
		</div>
		<!-- .activity-inner ends -->
	</div>
	<!-- .activity-section ends -->
</div> 
<!-- .popup-dashboard-section ends -->

<script>
    var popupData = {};
    <?php
    if ( isset( $_REQUEST[ 'id' ] ) && $_REQUEST[ 'id' ] > 0 ) {
        ?>
        popupData.popup_id = <?php echo $_REQUEST[ 'id' ]; ?>;
        <?php 
        foreach ( $popup_meta as $key => $value ) {
            if ( is_array( $value ) ) {
                if ( $key != "publish_popup_date" ) {
                    ?>
                    popupData.<?php echo $key; ?> =  [<?php echo '"' . implode( '","',  $value ) . '"' ?>];
                    <?php 
                }
            } else { 
                ?>
                popupData.<?php echo $key; ?> = '<?php echo trim( $value ); ?>';
                <?php 
            }
        }
    }
    ?>
</script>