@include('admin.Assets.navbar')


        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <h3 style="color: #0C9A9A">Hey {{$admin}}  </h3>

                <div class="row layout-top-spacing">

                    <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing" >
                        <div class="widget widget-one" style="width: content-box">
                            <div class="widget-heading">
                                <h6 class="">Statistics</h6>
                            </div>
                            <div class="w-chart">
                                <div class="w-chart-section">
                                    <div class="w-detail">
                                        <p class="w-title">no. of Teachers</p>
                                        <p class="w-stats">{{$teachers}}</p>
                                    </div>
                                </div>
                                <div class="w-chart-section">
                                    <div class="w-detail">
                                        <p class="w-title">no. of Courses</p>
                                        <p class="w-stats">{{$courses}}</p>
                                    </div>
                                </div>
                                    <div class="w-chart-section">
                                        <div class="w-detail">
                                            <p class="w-title">no. of Activites</p>
                                            <p class="w-stats">{{$activities}}</p>
                                        </div>
                                    </div>
                                        <div class="w-chart-section">
                                            <div class="w-detail">
                                                <p class="w-title">no. of Sliders</p>
                                                <p class="w-stats">{{$sliders}}</p>
                                            </div>
                                        </div>

                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->
@include('admin.Assets.footer')
