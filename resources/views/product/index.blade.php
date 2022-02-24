@extends('layouts.app')

@section('css')
<style type="text/css">
  .zoom:hover {
    transform: scale(3); 
  }  
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <b style="font-size: 18px">Product management</b>
                   <a href="{{ route('product.create') }}" class="btn btn-success float-end">New product</a> 
                </div>

                <div class="card-body">
                    @if ($products->count() > 0)
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                  <th scope="col">No.</th>
                                  <th scope="col">Product name</th>
                                  <th scope="col">Description</th>
                                  <th scope="col">Price</th>
                                  <th scope="col">Image</th>
                                  <th scope="col">Edit product</th>
                                  <th scope="col">Delete</th>
                                </tr> 
                            </thead>
                            <tbody>
                              @foreach($products as $product)
                                
                                <tr>
                                  <th scope="row">{{ $loop->index +1 }}</th>
                                  <td class="align-center">{{ $product->name }}</td>
                                  <td>{{ $product->description }}</td>
                                  <td>{{ $product->price }} RSD</td>
                                  <td><img class="zoom" src="{{ asset('/storage/' . $product->img) }}" style="height: 10%"></td>
                                  <td><a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary" style="width: 100px">Edit</a></td>
                                  <td>
                                    <button type="button" name="delete" class="btn btn-danger" style="width: 100px" onclick="handleDelete({{$product->id}})">Delete</button>
                                    <!--<a href="#" class="btn btn-danger" style="width: 100px">Delete</a>--></td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="">
                            No products yet, please add product.
                        </div>                   

                    @endif

                    @if(session()->has('success'))
                      <div class="alert alert-success">
                        {{session()->get('success')}}
                      </div>
                    @endif
                </div>
            </div>

            <!-- modal-->
            <form action="" method="POST" id="deleteProduct">
                @csrf
                @method('DELETE')
                <div class="modal" tabindex="-1" id="modalDelete" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete product</h5>
                            <button type="button" class="btn-close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <b>Are you soure want to delete this product?</b>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

@section('script')
<script>

function handleDelete(id){

    var form = document.getElementById("deleteProduct");
    form.action = '/product/' + id;
    
    $('#modalDelete').modal('show');
} 

</script>
@endsection
