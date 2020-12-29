			<!-- start sidebar menu -->
			<div class="sidebar-container">
				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
					<div id="remove-scroll">
						<ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true"
							data-slide-speed="200">
							<li class="sidebar-toggler-wrapper hide">
								<div class="sidebar-toggler">
									<span></span>
								</div>
							</li>


							<li class="nav-item start active">
								<a href="{{ url('/bookingadmin/dashboard') }}" class="nav-link ">
									<i class="material-icons">dashboard</i>
									<span class="title">Dashboard</span>
								</a>
							</li>

                            <li class="nav-item start">
								<a href="{{ url('/bookingadmin/flights') }}" class="nav-link ">
									<i class="material-icons">flight</i>
									<span class="title">Flights</span>
								</a>
							</li>

							<li class="nav-item">
								<a href="#" class="nav-link nav-toggle">
									<i class="material-icons">flight</i>
									<span class="title">Misc</span>
									<span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="{{ url('/bookingadmin/places') }}" class="nav-link ">
											<span class="title">Places</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="view_booking.html" class="nav-link ">
											<span class="title">View Flight</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="{{ url('/bookingadmin/new_flight') }}" class="nav-link ">
											<span class="title">Add Places</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link nav-toggle">
									<i class="material-icons">local_taxi</i>
									<span class="title">Trips</span>
									<span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="add_room.html" class="nav-link ">
											<span class="title">Add Trip Details</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="all_rooms.html" class="nav-link ">
											<span class="title">View All Trips</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="edit_room.html" class="nav-link ">
											<span class="title">Edit Trip Details</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- end sidebar menu -->
