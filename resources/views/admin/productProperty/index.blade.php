@extends('admin.layout.master')


@section('content')
      <div class="row">
          
        <div class="col-8">
         
         <div class="box">
            <div class="box-header with-border">
              <h1 class="box-title">برند ها</h1>
              <a class="btn btn-success btn-sm" href="{{ route('product.property.create',$product) }}">تغییر ویژگی های محصول</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example5" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>

                            <th>#</th>
                            <th>نام</th>
                            <th>مقدار</th>
                          
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($product->properties as $property)
                        
                        <tr>
                            <td>{{ $property->id }}</td>
                            <td>{{ $property->title }}</td>
                            <td>{{ $property->pivot->value }}</td>
                          	
                        </tr> 

                    @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                       
                            <th>id</th>
                            <th>عنوان</th>
                          
                        </tr>
                    </tfoot>
                </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->      
        </div>  
        <!-- /.col -->
      </div>
      <!-- /.row -->
@endsection

@section('scripts')
    
    <!-- This is data table -->
    <script src="/admin/assets/vendor_components/datatable/datatables.min.js"></script>
    
    <!-- Superieur Admin for Data Table -->
    <script src="/admin/js/pages/data-table.js"></script>

@endsection