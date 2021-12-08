@extends('admin.layout.master')


@section('content')
      <div class="row">
          
        <div class="col-12">
         
         <div class="box">
            <div class="box-header with-border">
              <h1 class="box-title">کامنت محصول {{ $product->name }}</h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example5" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>

                            <th>#</th>
                            <th>نام کاربر</th>
                            <th>متن کامنت</th>
                            <th>حذف</th>
                          
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($product->comments as $comment)
                        
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->user->name }}</td>
                            <td>{{ $comment->content }}</td>
                            <td>
                                <form action="{{ route('comment.destroy', $comment) }}" method="post">
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
      @include('admin.layout.errors');
@endsection

@section('scripts')
    
    <!-- This is data table -->
    <script src="/admin/assets/vendor_components/datatable/datatables.min.js"></script>
    
    <!-- Superieur Admin for Data Table -->
    <script src="/admin/js/pages/data-table.js"></script>

@endsection