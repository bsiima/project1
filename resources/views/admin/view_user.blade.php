
@include('layouts.head')
@include('layouts.datatablescss')

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
                <div class="panel panel-default">
                    <div class="panel-body">
                       <table id="datatable1" class="table table-striped table-hover">
                          <thead>
                             <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                
                             </tr>
                          </thead>
                          <tbody>
                              @foreach ($all_Users as $id=>$user)
                              <tr class="gradeX">
                                 <td>{{$id + 1}}</td>
                                 <td>{{ $user->name}}</td>
                                 <td>{{ $user->email }}</td>
                                 
                              </tr>
                              @endforeach
                          </tbody>
                       </table>
                    </div>
                 </div>
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
   @include('layouts.datatablesjs')
   <!-- END Scripts-->
</body>


<!-- Mirrored from geedmo.com/envato/products/wintermin/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Dec 2020 17:41:57 GMT -->
</html>