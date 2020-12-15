
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
                        <form method="get" action="/add-user" data-parsley-validate="" novalidate="">
                            @csrf
                            <!-- START panel-->
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">Create User</div>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label">Name</label>
                                    <input type="text" name="name" required class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input type="text" name="email" required data-parsley-equalto="#id-password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Password</label>
                                    <input type="text" name="password" required data-parsley-equalto="#id-password" class="form-control">
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="clearfix">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary">Create</button>
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