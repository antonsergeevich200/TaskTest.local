@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @include('store.admin.products.includes.product_result_messages')

                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('store.admin.products.create') }}">Add Product</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Product</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($paginator as $product)
                                    @php 
                                        /** @var\App\Models\Product $product */ 
                                    @endphp
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->category->title }}</td>
                                        <td>
                                            <a href="{{ route('store.admin.products.edit', $product->id) }}">
                                                {{ $product->title }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @If($paginator->total() > $paginator->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $paginator->links() }}
                        </div>
                    </div>
                </div>        
            </div>
        @endif
    </div>
@endsection