@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background: #add8e6">
                    <b style="font-size: 18px">Product management - {{ isset($product)? 'Edit product' : 'Add products' }}</b>
                </div>

                <div class="card-body">
                          <table class="table">
                            <thead class="table-primary">
                                <tr>
                                  <th scope="col">Product name</th>
                                  <th scope="col">Description</th>
                                  <th scope="col">Price</th>
                                  <th scope="col">Image</th>
                                  <th scope="col"></th>
                                </tr> 
                            </thead>
                            <tbody>
                                <form action="{{ isset($product)? route('product.update', $product->id) : route('product.store') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                  @if(isset($product))
                                    @method('PUT')
                                  @endif
                                  <tr>
                                    <td><input class="form-control" type="text" name="name" value="{{ isset($product)? $product->name : '' }}"></td>
                                    <td><input class="form-control" type="text" name="description" value="{{ isset($product)? $product->description : '' }}"></td>
                                    <td><input class="form-control" type="text" name="price" value="{{ isset($product)? $product->price : '' }}"></td>
                                    <td><input class="form-control" type="file" name="img"></td>  
                                    <th><button class="btn btn-success" type="submit" name="store">{{isset($product) ? 'Update' : 'Save'}}</button></th>
                                  </tr>
                                </form>
                            </tbody>
                        </table>
                        @include('partials.errors')

                        @if(session()->has('success'))
                          <div class="alert alert-success">
                              {{session()->get('success')}}
                          </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection