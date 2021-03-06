
@include('layouts.head')

<body>
   <!-- START Main wrapper-->
   <div class="wrapper">
      <!-- START Top Navbar-->
      @include('layouts.navbar')
      <!-- END Top Navbar-->
      <!-- START aside-->
      @include('layouts.sidebar')
      <!-- End aside-->
      <!-- START aside-->
      {{-- @include('layouts.onlinebar') --}}
      <!-- END aside-->
      <!-- START Main section-->
      <section>
         <!-- START Page content-->
         <div class="main-content">
            @include('layouts.breadcrumb')
            <div class="row">
               <!-- START dashboard main content-->
               <section class="col-md-12">
                   @include('layouts.messages')
                   <div class="col-lg-6 col-md-6">
                        <form method="get" action="/add-crop" data-parsley-validate="" novalidate="">
                            {{dd(auth()->user()->getUserPermisions())}}
                            @csrf
                            <!-- START panel-->
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">Add Crop</div>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label">Crop Name</label>
                                    <input type="text" name="crop_name" required class="form-control">
                                </div>
                                {{-- <div class="form-group">
                                    <label class="control-label">Price</label>
                                    <input id="id-password" type="number" name="crop_price" required class="form-control">
                                </div> --}}
                                <div class="form-group">
                                    <label class="control-label">Minimum threshold</label>
                                    <input type="text" name="min_threshold" required data-parsley-equalto="#id-password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Minimum threshold</label>
                                    <input type="text" name="max_threshold" required data-parsley-equalto="#id-password" class="form-control">
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="clearfix">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <!-- END panel-->
                        </form>
                   </div>
                 <div class="col-lg-3 col-md-6"></div>
               </section>
               <!-- END dashboard main content-->
               <!-- START dashboard sidebar-->
               <!-- END dashboard sidebar-->
            </div>
         </div>
         <!-- END Page content-->
         <!-- START Page footer-->
         @include('layouts.footer')
         <!-- END Page Footer-->
      </section>
      <!-- END Main section-->
   </div>
   <!-- END Main wrapper-->
   <!-- START Scripts-->
   @include('layouts.javascript')
   @include('layouts.validation')
   <!-- END Scripts-->
</body>


<!-- Mirrored from geedmo.com/envato/products/wintermin/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Dec 2020 17:41:57 GMT -->
</html>