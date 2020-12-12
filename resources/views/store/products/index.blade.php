@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Product</th>
                                    <th>Date of creation</th>
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
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->created_at }}</td>
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