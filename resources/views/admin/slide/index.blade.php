@extends('admin.layout.master')


@section('content')
      <div class="row">
          
        <div class="col-12">
         
         <div class="box">
            <div class="box-header with-border">
              <h1 class="box-title">اسلایدر </h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example5" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>

                            <th>#</th>
                            <th>لینک</th>
                            <th>تصویر</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                          
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($slides as $slide)
                        
                        <tr>
                            <td>{{ $slide->id }}</td>
                            <td>{{ $slide->link }}</td>
                            <td>
                                <img src="{{ str_replace('public' , '/storage' , $slide->image) }}" width="100">
                            </td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ route('slide.edit',$slide) }}">ویرایش</a>
                            </td>
                            <td>
                                <form action="{{ route('slide.destroy', $slide) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <input class="btn btn-danger btn-sm" type="submit" name="delete" value="حذف">
                                </form>
                            </td>
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