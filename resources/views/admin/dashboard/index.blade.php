
@extends('admin.layouts.template')
@section('admin.content')






				<section role="main" class="content-body">

					<header class="page-header">
						<h2>{{$header}}</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.html">
										<i class="fa fa-home"></i>
									</a>
								</li>

								<li><span>{{$header}}</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>


					<!-- start: page -->



<div class="row">

							<div class="row">

								<div class="col-md-12 col-lg-4 col-xl-4">
										<section class="panel panel-featured-left panel-featured-tertiary">
											<div class="panel-body">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon bg-tertiary">
															<i class="fa fa fa-life-ring"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Attendee</h4>
															<div class="info">
																<strong class="amount">{{$Attendee}}</strong>
																<span class="text-primary">(เหลือ {{$Attendee_lim}})</span>
															</div>
														</div>

													</div>
												</div>
											</div>
										</section>
									</div>

						</div>

				</div>
</section>
@stop
