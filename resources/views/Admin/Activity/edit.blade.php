@include('admin.assets.navbar')


        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">

                <div class="container">



                    <div class="row layout-top-spacing">

                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <h3>{{$error}}</h3>
                            @endforeach
                        @endif


                        <div id="basic" class="col-lg-12 col-sm-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>update Activity</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">




                                    <form method="POST" action="{{route('admin.activity.update')}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="activity_id" value="{{$activity->id}}">

                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Title</span>
                                            </div>
                                            <input type="text" value="{{$activity->title}}" class="form-control" name="title" aria-label="With textarea">
                                        </div>

                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Slug</span>
                                            </div>
                                            <textarea type="text" value="{{$activity->slug}}" class="form-control" name="slug" aria-label="With textarea"></textarea>
                                        </div>
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Icon</span>
                                            </div>
                                            <input type="file" class="form-control" name="icon" aria-label="With textarea">
                                        </div>
                                        <button type="submit" class="btn btn-primary"> update </button>
                                    </form>


                                </div>
                            </div>
                        </div>


            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->





  @include('Admin.Assets.footer')


