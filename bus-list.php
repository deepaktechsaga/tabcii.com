<?php include 'header.php' ?>
<section class="view-modify-date">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<ul class="locationDate">
					<li><a href="#">From Location</a></li>
					<li><a href="#">To Location</a></li>
					<li><a href="#"><i class="fa fa-angle-left "></i></a></li>
					<li><a href="#">DATE</a></li>
					<li><a href="#"><i class="fa fa-angle-right "></i></a></li>
					
				</ul>
				</div><!-- ./6 -->
				<div class="col-md-6">
					<ul class="locationDate pull-right">
						<li><a href="#" class="btn btn-primary">Modify</a></li>
						<li><a href="#" class="btn btn-primary">Add Return Ticket</a></li>
					</ul>
					</div><!-- ./6 -->
				</div>
			</div>
			</section><!-- ./view-modify-date -->
			<section class="bus-list">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="panel filter">
								<div class="panel-heading">Filters <a href="#" class="pull-right btn btn-primary"> RESET</a></div>
								<div class="panel-body">
									<ul>
										<li><a href="#"><i class="fa fa-map-marker"></i> Buses with live tracking (24)</a></li>
										<li><a href="#"><i class="fa fa-renren"></i> Zero cancellation (3)</a></li>
										<li><a href="#"><i class="fa fa-tag"></i> Red Deals (3)</a></li>
									</ul>
									
									<form action="#">
										<h4>Departure Time  </h4>
										<div class="form-check">
											<label>
												<input type="checkbox" name="" checked> <span class="label-text">Before 6 am (1)</span>
											</label>
										</div>
										<div class="form-check">
											<label>
												<input type="checkbox" name=""> <span class="label-text">6 am to 12 pm (4)</span>
											</label>
										</div>
										<div class="form-check">
											<label>
												<input type="checkbox" name=""> <span class="label-text">12 pm to 6 pm (6)</span>
											</label>
										</div>
										<div class="form-check">
											<label>
												<input type="checkbox" name=""> <span class="label-text">After 6 pm (43)</span>
											</label>
										</div>
										
									</form>
									<form action="#">
										<h4>Bus Types</h4>
										<div class="form-check">
											<label>
												<input type="checkbox" name="" checked> <span class="label-text">SEATER (1)</span>
											</label>
										</div>
										<div class="form-check">
											<label>
												<input type="checkbox" name=""> <span class="label-text">SLEEPER (1)	</span>
											</label>
										</div>
										<div class="form-check">
											<label>
												<input type="checkbox" name=""> <span class="label-text">AC (1)</span>
											</label>
										</div>
										<div class="form-check">
											<label>
												<input type="checkbox" name=""> <span class="label-text">NONAC (0)</span>
											</label>
										</div>
										
									</form>
									<form action="#">
										<h4>Arrival Time</h4>
										<div class="form-check">
											<label>
												<input type="checkbox" name="" checked> <span class="label-text">Before 6 am (0)</span>
											</label>
										</div>
										<div class="form-check">
											<label>
												<input type="checkbox" name=""> <span class="label-text">6 am to 12 pm (1)</span>
											</label>
										</div>
										<div class="form-check">
											<label>
												<input type="checkbox" name=""> <span class="label-text">12 pm to 6 pm (0)</span>
											</label>
										</div>
										<div class="form-check">
											<label>
												<input type="checkbox" name=""> <span class="label-text">After 6 pm (0)</span>
											</label>
										</div>
										
									</form>
									<form action="#">
										<div class="form-group">
											<label>Boarding Point</label>
											<div class="input-group">
												<input type="text" name="" class="form-control" placeholder="Boarding Point">
												<span class="input-group-addon"><i class="fa fa-search"></i></span>
											</div>
											
										</div>
										<div class="form-group">
											<label>Dropping Point</label>
											<div class="input-group">
												<input type="text" name="" class="form-control" placeholder="Dropping Point">
												<span class="input-group-addon"><i class="fa fa-search"></i></span>
											</div>
											
										</div>
										<div class="form-group">
											<label>Operator</label>
											<div class="input-group">
												<input type="text" name="" class="form-control" placeholder="Operator">
												<span class="input-group-addon"><i class="fa fa-search"></i></span>
											</div>
											
										</div>
										<ul>
											<li><a href="#"><i class="fa fa-wifi"></i> Wifi (0)</a></li>
											<li><a href="#"><i class="fa fa-tint"></i> Water Bottle (0)</a></li>
											<li><a href="#"><i class="fa fa-tag"></i> Blankets (0)</a></li>
											<li><a href="#"><i class="fa fa-fa-wifi"></i> Charging Point (0)</a></li>
											<li><a href="#"><i class="fa fa-film"></i> Movie (0)</a></li>
											<li><a href="#"><i class="fa fa-truck"></i> Track My Bus (0)</a></li>
											<li><a href="#"><i class="fa fa-fa-wifi"></i> Emergency Contact Nu... (0)</a></li>
										</ul>
									</form>
								</div>
							</div>
						</div>
						<div class="col-md-9">
							<div class="row p-r-15">
								<div class="panel">
									<div class="panel-heading">54 Buses found <span class="pull-right">Sort By</span></div>
									<div class="panel-body bus-lists">
										<div class="bus-status">
											<div class="table-section">
												<table class="rwd-table">
													<tr>
														<th>Available on this Route</th>
														<th>Departure starts from</th>
														<th>No of Bus</th>
														<th>Prices start from</th>
													</tr>
													<tr>
														<td data-th="Available"><img src="assets/images/upsrtc.png"> UPSRTC</td>
														<td data-th="Departure">07:01</td>
														<td data-th="No of Bus">14 Buses</td>
														<td data-th="Prices start">INR 460</td>
													</tr>
													</table><!-- ./table -->
													</div><!-- ./table-section -->
													<div class="table-section">
														<table class="rwd-table">
															<tr>
																<th>Bus Name</th>
																<th>Departure T/P</th>
																<th>Duration</th>
																<th>Arrival  T/P</th>
																<th>Fare</th>
																<th>Seats Available</th>
																<th>W</th>
															</tr>
															<tr>
																<td data-th="Bus Name">UPSRTC</td>
																<td data-th="Departure  T/P">07:01/ Delhi </td>
																<td data-th="Duration">06h 45m</td>
																<td data-th="Arrival  T/P">05:30/ KANPUR</td>
																<td data-th="Fare"><i class="fa fa-inr"></i> 1140</td>
																<td data-th="Seats Available">30</td>
																<td data-th="Window Side" >10</td>
															</tr>
															
														</table>
														<div class="ViewSeats-btn">
															<a class="expand">
																<button class="btn btn-primary expand" data-toggle="collapse" data-target="#demo">View Seats</button>
															</a>
														</div>
														<div id="demo" class="collapse view-seats">
															<ul class="nav-tabs">
																<li class="active"><a data-toggle="tab" href="#availableSeat">Available seat</a></li>
																<li><a data-toggle="tab" href="#amenities">Amenities</a></li>
																<li><a data-toggle="tab" href="#boardingPoints">Boarding & Dropping Points</a></li>
																<!-- <li><a data-toggle="tab" href="#reviews">Reviews</a></li> -->
																<li><a data-toggle="tab" href="#cancellationP">Cancellation Policy</a></li>
																<li><a data-toggle="tab" href="#onTime">On Time</a></li>
															</ul>
															<div class="tab-content">
																<div id="availableSeat" class="tab-pane fade in active">
																	<div class="busLayout">
																		<h4 class="title"> Delhi to Kanpur Bus | 26 Jul</h4>
																		
																		<div class="busNameToFrom">
																			<div class="row">
																				<div class="col-md-4">
																					<label>Samay Shatabdi Travels..</label>
																					<p><small>A/C Sleeper (2+1)</small></p>
																				</div>
																				<div class="col-md-4">
																					<label>10:30 PM 26 Jul</label>
																					<p><small>Delhi</small></p>
																				</div>
																				<div class="col-md-4">
																					<label>07:30 AM 27 Jul</label>
																					<p><small>Kanpur</small></p>
																				</div>
																			</div>
																			</div><!-- ./busNameToFrom -->
																			<div class="legend">
																				<ul>
																					<li>Available </li>
																					<li class="Selected">Selected </li>
																					<li class="Ladies">Ladies Only</li>
																					<li class="Booked">Booked</li>
																					<li class="Seat">Seat</li>
																					<li class="Sleeper">Sleeper</li>
																				</ul>
																			</div>
																			
																			<div class="row">
																				<div class="col-md-9">
																					<div class="busSeatLayout">
																						<div class="row">
																							<div class="col-md-1">
																								<div class="frontview">
																									<span class="steering"></span>
																									<p>Front</p>
																									</div><!-- ./frontview -->
																									</div><!-- ./1 -->
																									<div class="col-md-10">
																										<div class="checkbox checkbox-success data-toggle="tooltip" title="Hooray!"">
																											<input id="checkbox1" type="checkbox">
																											<label for="checkbox1"> </label>
																										</div>
																										<div class="checkbox checkbox-success data-toggle="tooltip" title="Hooray!"">
																											<input id="checkbox2" type="checkbox">
																											<label for="checkbox2"> </label>
																										</div>
																										</div><!-- ./10 -->
																									</div>
																									</div><!-- ./busSeatLayout -->
																								</div>
																							</div>
																							
																							
																							</div><!-- ./busLayout-1 -->
																						</div>
																						<div id="amenities" class="tab-pane fade ">
																							<ul>
																								<li>M-ticket Not Supported</li>
																								<li class="blankets">Blankets</li>
																								<li class="chargingPoint">Charging Point</li>
																								<li class="readingLight">Reading Light</li>
																								<li class="fireExtinguisher">Fire Extinguisher</li>
																								<li class="hammer">Hammer (to break glass)</li>
																								<li class="track">Track My Bus</li>
																							</ul>
																						</div>
																						<div id="boardingPoints" class="tab-pane fade">
																							<div class="row">
																								<div class="col-md-6">
																									<h4>Boarding Point</h4>
																									<ul>
																										<li class="watch"><strong> 22:00 </strong> Kashmiri gate metro station..</li><br>
																										<li class="watch"><strong> 22:45 </strong> Mahamaya flyover near dtc.. </li><br>
																										<li class="watch"><strong> 22:40 </strong> New ashok nagar metro stan..</li>
																									</ul>
																								</div>
																								<div class="col-md-6">
																									<h4>Dropping Point</h4>
																									<ul>
																										<li class="watch"><strong> 07:00 </strong> Fazalganj</li><br>
																									</ul>
																								</div>
																							</div>
																						</div>
																						<!--  <div id="reviews" class="tab-pane fade">
																										<h3> Reviews</h3>
																										<p>Some content in menu 2.</p>
																						</div> -->
																						<div id="cancellationP" class="tab-pane fade">
																							<table class="table table-striped">
																								<thead>
																									<tr>
																										<th>Time of Cancellation</th>
																										<th>Deduction Percentage</th>
																										<th>Cancellation Charges</th>
																									</tr>
																								</thead>
																								<tbody>
																									<tr>
																										<td>Before 14th Jul 07:00 PM</td>
																										<td>25%</td>
																										<td>₹224</td>
																									</tr>
																									<tr>
																										<td>After 14th Jul 07:00 PM & Before 14th Jul 09:00 PM</td>
																										<td>50%</td>
																										<td>₹448</td>
																									</tr>
																									<tr>
																										<td>After 14th Jul 09:00 PM & Before 14th Jul 10:00 PM</td>
																										<td>100%</td>
																										<td>₹896</td>
																									</tr>
																									<tr>
																										<td colspan="3">
																											<strong>Partial cancellation not allowed</strong>
																										</td>
																									</tr>
																								</tbody>
																							</table>
																						</div>
																						<div id="onTime" class="tab-pane fade">
																							<table class="table table-striped">
																								<thead>
																									<tr>
																										<th>On Time Guarantee or Money Back</th>
																										<th>Terms & Conditions</th>
																										
																									</tr>
																								</thead>
																								<tbody>
																									<tr>
																										<td> High quality buses with live tracking and CCTV</td>
																										<td>25% Refund - 30 mins delay in pick-up from last boarding point</td>
																										
																									</tr>
																									<tr>
																										<td> &nbsp;</td>
																										<td>150% Refund - Bus Cancelled with No alternate arrangement</td>
																									</tr>
																									<tr>
																										<td> &nbsp;</td>
																										<td>300 % Refund - Bus breakdown with no alternative within 6 hours</td>
																									</tr>
																								</tbody>
																							</table>
																						</div>
																					</div>
																					</div><!-- ./collapse -->
																					</div><!-- ./table-section -->
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</section>
													
													<?php include 'footer.php' ?>
													<script>
														$(function() {
															$(".expand").on( "click", function() {
															$(this).next().slideToggle(200);
																				$expand = $(this).find(">:first-child");
															if($expand.text() == "View Seats") {
															$expand.text("Hide Seats");
															} else {
															$expand.text("View Seats");
															}
															});
															});

														/*-----------tooltip----------*/
 
													</script>

 