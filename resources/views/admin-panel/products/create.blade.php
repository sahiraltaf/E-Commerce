@extends('admin-panel.layouts.app')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form action="{{route('product.store')}}" method = "POST" enctype='multipart/form-data'>
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="product_title">Title</label>
                    <input type="text" class="form-control" id="title"  name="title" placeholder="Enter Title">
                  </div>
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="$">
                  </div>
                  <div class="form-group">
                    <label for="product_discount_price">Discount Price</label>
                    <input type="text" class="form-control" id="discount_price" name="discount_price" placeholder="$">
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" cols="30" row="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="category">Category</label>
                      <select class="form-control" id="category" name="category" required>
                          <option value="">Select Category</option>
                          @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option> 
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="subcategory">Sub Category</label>
                      <select class="form-control" id="subcategory" name="subcategory" required>
                          <option value="">Select SubCategory</option>
                          @foreach($subcategories as $subcategory)
                            <option value="{{$subcategory->id}}" class="sub_cat_options" data-category_id="{{$subcategory->category_id}}">{{$subcategory->name}}</option> 
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="image">Image</label>
                      <input type="file" class="form-control" id="image" name="image">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@push('scripts')

<script>
$(document).ready(function(){
  $('#category').change(function() {
        var categoryId = $(this).val();
        // console.log("Selected Value: " + categoryId);
        if (categoryId) {  // Check if a category is selected
        $.ajax({
            url: "{{route('get-subcategories')}}",  // URL to handle the request (defined in routes/web.php)
            type: 'GET',
            data: { category_id: categoryId },
            success: function(response) {
                console.log(response);  // Handle the response (you can update UI with the data)
                $('#subcategory').empty();  // Clear the existing options
                
                $('#subcategory').append('<option value="">Select Subcategory</option>');  // Add default option
                
                $.each(response.subcategories, function(index, subcategory) {
                    $('#subcategory').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error("Error: " + error);
            }
        });
    } else {
        $('#subcategory').empty();
        $('#subcategory').append('<option value="">Select Subcategory</option>');
    }
  });
});   


// $('#category').change(function() {
//         var categoryId = $(this).val();
//         $('.sub_cat_options').hide();
//         $('.sub_cat_options[data-category_id='+categoryId+']').show();
// });
</script>
@endpush
