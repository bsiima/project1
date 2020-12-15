<div class="row">
   <div class="col-md-3">
      <!-- START widget-->
      <div class="panel widget">
         <div class="panel-body">
            <div class="text-right text-muted">
               <em class="fa fa-trophy fa-2x"></em>
            </div>
            <h3 class="mt0">{{$count_users}}</h3>
            <p class="text-muted">Number of users</p>
            <div class="progress progress-striped progress-xs">
               <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-warning progress-60">
                  <span class="sr-only">60% Complete</span>
               </div>
            </div>
         </div>
      </div>
      <!-- END widget-->
   </div>
    <div class="col-md-3">
       <!-- START widget-->
       <div class="panel widget">
          <div class="panel-body">
             <div class="text-right text-muted">
                <em class="fa fa-users fa-2x"></em>
             </div>
             <h3 class="mt0">{{ $count_yileds }}</h3>
             <p class="text-muted">Number of yields</p>
             <div class="progress progress-striped progress-xs">
                <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-success progress-80">
                   <span class="sr-only">80% Complete</span>
                </div>
             </div>
          </div>
       </div>
       <!-- END widget-->
    </div>
    <div class="col-md-3">
       <!-- START widget-->
       <div class="panel widget">
          <div class="panel-body">
             <div class="text-right text-muted">
                <em class="fa fa-bar-chart-o fa-2x"></em>
             </div>
             <h3 class="mt0">{{$count_sensor_records}}</h3>
             <p class="text-muted">Sensor records</p>
             <div class="progress progress-striped progress-xs">
                <div role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-info progress-40">
                   <span class="sr-only">40% Complete</span>
                </div>
             </div>
          </div>
       </div>
       <!-- END widget-->
    </div>
    <div class="col-md-3">
       <!-- START widget-->
       <div class="panel widget">
          <div class="panel-body">
             <div class="text-right text-muted">
                <em class="fa fa-trophy fa-2x"></em>
             </div>
             <h3 class="mt0">{{$count_equip}}</h3>
             <p class="text-muted">Equipment used</p>
             <div class="progress progress-striped progress-xs">
                <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-warning progress-60">
                   <span class="sr-only">60% Complete</span>
                </div>
             </div>
          </div>
       </div>
       <!-- END widget-->
    </div>

 </div>