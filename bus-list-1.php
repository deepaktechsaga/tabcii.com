<?php include 'header.php' ?>
<section class="view-modify-date">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-7">
				<ul class="locationDate">
					<li><a href="#">From Location</a></li>
					<li><a href="#">To Location</a></li>
					<li><a href="#"><i class="fa fa-angle-left "></i></a></li>
					<li><a href="#">DATE</a></li>
					<li><a href="#"><i class="fa fa-angle-right "></i></a></li>
					
				</ul>
				</div><!-- ./6 -->
				<div class="col-md-6 col-sm-6 col-xs-5">
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
									<div class="row">
										<div class="col-md-12 col-sm-4 col-xs-6">
										<ul>
											<li><a href="#"><i class="fa fa-map-marker"></i> Buses with live tracking (24)</a></li>
											<li><a href="#"><i class="fa fa-renren"></i> Zero cancellation (3)</a></li>
											<li><a href="#"><i class="fa fa-tag"></i> Red Deals (3)</a></li>
										</ul>
									</div>
									<div class="col-md-12 col-sm-4 col-xs-6">
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
								</div>
								<div class="col-md-12 col-sm-4 col-xs-6">
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
								</div>
								<div class="col-md-12 col-sm-4 col-xs-6">
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
								</div>
								<div class="col-md-12 col-sm-4 col-xs-6">
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

									</form>
								</div>
								<div class="col-md-12 col-sm-4 col-xs-6">
									<form action="#"> 
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
								</div><!-- ./row -->
								</div>
							</div><!-- ./filter -->
						</div>
						<div class="col-md-9"> 
						 
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
																				<div class="col-md-4 col-sm-4">
																					<label>Samay Shatabdi Travels..</label>
																					<p><small>A/C Sleeper (2+1)</small></p>
																				</div>
																				<div class="col-md-4 col-sm-4">
																					<label>10:30 PM 26 Jul</label>
																					<p><small>Delhi</small></p>
																				</div>
																				<div class="col-md-4 col-sm-4">
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
																				<div class="col-md-8 col-sm-8">
																					<div class="busSeatLayout">
																						<div class="row">
																							<div class="col-md-1 col-sm-1 col-xs-1">
																								<div class="frontview">
																									<span class="steering"></span>
																									<p>Front</p>
																									</div><!-- ./frontview -->
																									</div><!-- ./1 -->
																									<div class="col-md-9 col-sm-11 col-xs-11 col-xs-custom">
																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="1">
																											<input id="checkbox1" type="checkbox">
																											<label for="checkbox1"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="8">
																											<input id="checkbox8" type="checkbox">
																											<label for="checkbox8"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="9">
																											<input id="checkbox9" type="checkbox">
																											<label for="checkbox9"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="16">
																											<input id="checkbox16" type="checkbox">
																											<label for="checkbox16" class="ladies"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="17">
																											<input id="checkbox17" type="checkbox">
																											<label for="checkbox17"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="24">
																											<input id="checkbox24" type="checkbox">
																											<label for="checkbox24"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="25">
																											<input id="checkbox25" type="checkbox">
																											<label for="checkbox25"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="32">
																											<input id="checkbox32" type="checkbox">
																											<label for="checkbox32"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="33">
																											<input id="checkbox33" type="checkbox">
																											<label for="checkbox33"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="40">
																											<input id="checkbox40" type="checkbox">
																											<label for="checkbox40"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="41">
																											<input id="checkbox41" type="checkbox">
																											<label for="checkbox41"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="46">
																											<input id="checkbox46" type="checkbox">
																											<label for="checkbox46"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="47">
																											<input id="checkbox47" type="checkbox">
																											<label for="checkbox47"> </label>
																										</div><!-- ./checkbox -->
																										  
																										</div><!-- ./9 -->
 
																										<div class="col-md-9 col-sm-11 col-xs-11 col-xs-custom">
																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="2">
																											<input id="checkbox2" type="checkbox">
																											<label for="checkbox2"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="7">
																											<input id="checkbox7" type="checkbox">
																											<label for="checkbox7"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="10">
																											<input id="checkbox10" type="checkbox">
																											<label for="checkbox10"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="15">
																											<input id="checkbox15" type="checkbox">
																											<label for="checkbox15" class="ladies"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="18">
																											<input id="checkbox18" type="checkbox">
																											<label for="checkbox18"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="23">
																											<input id="checkbox23" type="checkbox">
																											<label for="checkbox23"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="26">
																											<input id="checkbox26" type="checkbox">
																											<label for="checkbox26"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="31">
																											<input id="checkbox31" type="checkbox">
																											<label for="checkbox31"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="34">
																											<input id="checkbox34" type="checkbox">
																											<label for="checkbox34"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="39">
																											<input id="checkbox39" type="checkbox">
																											<label for="checkbox39"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="42">
																											<input id="checkbox42" type="checkbox">
																											<label for="checkbox42"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="45">
																											<input id="checkbox45" type="checkbox">
																											<label for="checkbox45"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="48">
																											<input id="checkbox48" type="checkbox">
																											<label for="checkbox48"> </label>
																										</div><!-- ./checkbox -->
																										  
																										</div><!-- ./9 -->
 
																										<div class="col-md-9 col-sm-11 col-xs-11 col-xs-custom">
																											<div class="checkbox checkbox-success xs-m-top" data-toggle="tooltip" title="49">
																											<input id="checkbox49" type="checkbox">
																											<label for="checkbox49"> </label>
																										</div><!-- ./checkbox -->
																										</div><!-- ./9 -->
 
																										<div class="col-md-9 col-sm-11 col-xs-11 col-xs-custom">
																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="3">
																											<input id="checkbox3" type="checkbox">
																											<label for="checkbox3"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="6">
																											<input id="checkbox6" type="checkbox">
																											<label for="checkbox6"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="11">
																											<input id="checkbox11" type="checkbox">
																											<label for="checkbox11"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="14">
																											<input id="checkbox14" type="checkbox">
																											<label for="checkbox14"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="19">
																											<input id="checkbox19" type="checkbox">
																											<label for="checkbox19"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="22">
																											<input id="checkbox22" type="checkbox">
																											<label for="checkbox22"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="27">
																											<input id="checkbox27" type="checkbox">
																											<label for="checkbox27"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="30">
																											<input id="checkbox30" type="checkbox">
																											<label for="checkbox30"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="35">
																											<input id="checkbox35" type="checkbox">
																											<label for="checkbox35"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="38">
																											<input id="checkbox38" type="checkbox">
																											<label for="checkbox38"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="43">
																											<input id="checkbox43" type="checkbox">
																											<label for="checkbox43"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success visibility-H visibility-xs" data-toggle="tooltip" title=""> 
																											<label for="checkbox46"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="50">
																											<input id="checkbox50" type="checkbox">
																											<label for="checkbox50"> </label>
																										</div><!-- ./checkbox -->
																										  
																										</div><!-- ./9 -->
 
																										<div class="col-md-9 col-sm-11 col-xs-11 col-xs-custom">
																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="4">
																											<input id="checkbox4" type="checkbox">
																											<label for="checkbox4"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="5">
																											<input id="checkbox5" type="checkbox">
																											<label for="checkbox5"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="12">
																											<input id="checkbox12" type="checkbox">
																											<label for="checkbox12"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="13">
																											<input id="checkbox13" type="checkbox">
																											<label for="checkbox13"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="20">
																											<input id="checkbox20" type="checkbox">
																											<label for="checkbox20"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="21">
																											<input id="checkbox21" type="checkbox">
																											<label for="checkbox21"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="28">
																											<input id="checkbox28" type="checkbox">
																											<label for="checkbox28"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="29">
																											<input id="checkbox29" type="checkbox">
																											<label for="checkbox29"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="36">
																											<input id="checkbox36" type="checkbox">
																											<label for="checkbox36"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="37">
																											<input id="checkbox37" type="checkbox">
																											<label for="checkbox37"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="44">
																											<input id="checkbox44" type="checkbox">
																											<label for="checkbox44"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success visibility-H visibility-xs" data-toggle="tooltip" title=" "> 
																											<label for="checkbox45"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox checkbox-success" data-toggle="tooltip" title="51">
																											<input id="checkbox51" type="checkbox">
																											<label for="checkbox51"> </label>
																										</div><!-- ./checkbox -->
																										  
																										</div><!-- ./9 --> 
																									</div>
																									</div><!-- ./busSeatLayout -->


																									<div class="busSeatLayout">
																						<div class="row">
																							<div class="col-md-1 col-sm-1 col-xs-1">
																								<div class="frontview">					 
																									<p>Upper Deck</p>
																									</div><!-- ./frontview -->
																									</div><!-- ./1 -->
																									<div class="col-md-9 col-sm-11 col-xs-11 col-xs-custom">
																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="1">
																											<input id="checkboxU1" type="checkbox">
																											<label for="checkboxU1" class="UpperDeck"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="8">
																											<input id="checkboxU8" type="checkbox">
																											<label for="checkboxU8" class="UpperDeck"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="9">
																											<input id="checkboxU9" type="checkbox">
																											<label for="checkboxU9" class="UpperDeck Uladies"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="16">
																											<input id="checkboxU16" type="checkbox">
																											<label for="checkboxU16" class="UpperDeck"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="17">
																											<input id="checkboxU17" type="checkbox">
																											<label for="checkboxU17" class="UpperDeck"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="24">
																											<input id="checkboxU24" type="checkbox">
																											<label for="checkboxU24" class="UpperDeck"> </label>
																										</div><!-- ./checkbox -->
 
																										  
																										</div><!-- ./9 -->
 
																										<div class="col-md-9 col-sm-11 col-xs-11 col-xs-custom">
																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="2">
																											<input id="checkboxU2" type="checkbox">
																											<label for="checkboxU2" class="UpperDeck"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="7">
																											<input id="checkboxU7" type="checkbox">
																											<label for="checkboxU7" class="UpperDeck"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="10">
																											<input id="checkboxU10" type="checkbox">
																											<label for="checkboxU10" class="UpperDeck Uladies"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="15">
																											<input id="checkboxU15" type="checkbox">
																											<label for="checkboxU15" class="UpperDeck"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="18">
																											<input id="checkboxU18" type="checkbox">
																											<label for="checkboxU18" class="UpperDeck"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="23">
																											<input id="checkboxU23" type="checkbox">
																											<label for="checkboxU23" class="UpperDeck"> </label>
																										</div><!-- ./checkbox --> 
																										  
																										</div><!-- ./9 -->
 
																										<div class="col-md-9 col-sm-11 col-xs-11 col-xs-custom">
																											<div class="checkbox UpperDeck checkbox-success visibility-H" data-toggle="tooltip" title="49">
																											<input id="checkboxU49" type="checkbox">
																											<label for="checkboxU49" class="UpperDeck"> </label>
																										</div><!-- ./checkbox -->
																										</div><!-- ./9 -->
 
																										<div class="col-md-9 col-sm-11 col-xs-11 col-xs-custom">
																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="3">
																											<input id="checkboxU3" type="checkbox">
																											<label for="checkboxU3" class="UpperDeck"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="6">
																											<input id="checkboxU6" type="checkbox">
																											<label for="checkboxU6" class="UpperDeck"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="11">
																											<input id="checkboxU11" type="checkbox">
																											<label for="checkboxU11" class="UpperDeck"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="14">
																											<input id="checkboxU14" type="checkbox">
																											<label for="checkboxU14" class="UpperDeck"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="19">
																											<input id="checkboxU19" type="checkbox">
																											<label for="checkboxU19" class="UpperDeck"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="22">
																											<input id="checkboxU22" type="checkbox">
																											<label for="checkboxU22" class="UpperDeck"> </label>
																										</div><!-- ./checkbox -->
  
																										</div><!-- ./9 -->
 
																										<div class="col-md-9 col-sm-11 col-xs-11 col-xs-custom">
																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="4">
																											<input id="checkboxU4" type="checkbox">
																											<label for="checkboxU4" class="UpperDeck"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="5">
																											<input id="checkboxU5" type="checkbox">
																											<label for="checkboxU5" class="UpperDeck"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="12">
																											<input id="checkboxU12" type="checkbox">
																											<label for="checkboxU12" class="UpperDeck"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="13">
																											<input id="checkboxU13" type="checkbox">
																											<label for="checkboxU13" class="UpperDeck"> </label>
																										</div><!-- ./checkbox -->

																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="20">
																											<input id="checkboxU20" type="checkbox">
																											<label for="checkboxU20" class="UpperDeck"> </label>
																										</div><!-- ./checkbox -->
																										<div class="checkbox UpperDeck checkbox-success" data-toggle="tooltip" title="21">
																											<input id="checkboxU21" type="checkbox">
																											<label for="checkboxU21" class="UpperDeck"> </label>
																										</div><!-- ./checkbox --> 
																										  
																										</div><!-- ./9 --> 
																									</div>
																									</div><!-- ./busSeatLayout -->
																								</div>

																								<div class="col-md-4 col-sm-4">
																									<div class="SelectedSeatsFare">
																										<div class="seatNo">
																											<h5>Your Selected Seat(s):</h5>
																											<div class="btn btn-primary">1</div>
																										</div>

																										<div class="seatNo">
																											<h5>Fare Details:</h5>
																											<p>
																												<span> Base Fare : </span>
																												<span class="pull-right"> Rs 1100 </span>
																											</p>
																											<p>
																												<span> Operator GST  : </span>
																												<span class="pull-right"> Rs55</span>
																											</p>
																											<p>
																												<span><strong>Total :</strong> </span>
																												<span class="pull-right"><strong> Rs 1155 </strong></span>
																											</p>
																										</div>
																									</div><!-- ./SelectedSeatsFare-->
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
													<script>
														$(document).ready(function(){
														    $('[data-toggle="tooltip"]').tooltip();   
														});
														</script>
 