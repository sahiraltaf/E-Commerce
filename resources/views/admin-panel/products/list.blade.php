@extends('admin-panel.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Products List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Product Category Id</th>
                    <th>Product Sub Category Id</th>
                    <th>Image</th>                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($products as $product)
                  <tr>
                    @php
                      $category =App\Models\Category::find($product->category_id);
                    @endphp
                    <td>{{$product->title}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->discount_price}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->subcategory->name}}</td>
                    <td><img src="{{asset($product->image)}}" alt="" style="width:100px; height:100px;"></td>
                    

                  </tr>
                  @endforeach
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection


