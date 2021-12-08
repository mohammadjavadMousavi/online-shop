@extends('admin.layout.master')


@section('content')
      <div class="row">
          
        <div class="col-12">
         
         <div class="box">
            <div class="box-header with-border">
              <h1 class="box-title">محصولات</h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example5" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>

                            <th>#</th>
                            <th>نام</th>
                            <th>قیمت</th>
                            <th>برند</th>
                            <th>دسته بندی</th>
                            <th>اسلاگ</th>
                            <th>عکس</th>
                            <th>گالری</th>
                            <th>کامنت </th>
                            <th>مشخصات</th>
                            <th>تخفیف</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                          
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($products as $product)
                        
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->brand->name }}</td>
                            <td>{{ $product->category->title }}</td>
                            <td>{{ $product->slug }}</td>
                            <td>
                                <img src="{{ str_replace('public' , '/storage' , $product->image) }}" width="100">
                            </td>
                            <td>
                                <a href="{{ route('product.pictures.index',$product) }}" class="btn btn-primary btn-sm">گالری</a>
                            </td>
                            <td>
                                <a href="{{ route('product.comment.index',$product) }}" class="btn btn-primary btn-sm">کامنت </a>
                            </td>

                            <td>
                                <a href="{{ route('product.property.index',$product) }}" class="btn btn-primary btn-sm">مشخصات</a>
                            </td>
                            <td>

                                @if (!$product->discount()->exists())

                                <a href="{{ route('product.discount.create',$product) }}" class="btn btn-success btn-sm">ایجاد تخفیف</a>

                                @else

                                <p>{{ $product->discount->value}}%</p>

                                <form action="{{ route('product.discount.destroy',['product'=>$product,'discount'=>$product->discount]) }}" method="post">
                                    
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" name="delete" class="btn btn-danger btn-sm" value="حذف">
                                </form>

                                @endif

                            </td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ route('product.edit',$product) }}">ویرایش</a>
                            </td>
                            <td>
                                <form action="{{ route('product.destroy', $product) }}" method="post">
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
                       
                            <th>#</th>
                            <th>نام</th>
                            <th>قیمت</th>
                            <th>برند</th>
                            <th>دسته بندی</th>
                            <th>عکس</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                          
                          
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