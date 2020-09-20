@extends('admin.layouts.app')
@section('content')
<div class="row">
    <!-- <div class="col-md-2">
       @component('admin.layouts.menus.sidebar')
       @endcomponent
    </div> -->
    <div class="w3-container col-md-10">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">View Transactions</h3>           
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
        <!-- /.box-header -->
            <div class="box-body">           
                 <!-- {!! $chart->render() !!}-->
                 <center>

                  {!! $chart->render() !!}

                 </center>
            <!-- pie chart -->
            </div>
            <!--End Pie Chart--> 
            <!-- AREA CHART -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Terminal Activity</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <center>
                        Line chart will display here
                    </center>
                </div>
            </div>
        <!-- BAR CHART -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Bar Chart</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <center>
                         Bar chart will display here
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection