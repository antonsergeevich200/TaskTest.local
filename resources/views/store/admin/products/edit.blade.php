@extends('layouts.app')

@section('content')
	@php 
		/** @var \App\Models\Product $item */
	@endphp
	<div class="container">

		@include('store.admin.products.includes.product_result_messages')

		@if($item->exists)
			<form method="POST" action="{{ route('store.admin.products.update', $item->id) }}">
			@method('PATCH')
		@else
			<form method="POST" action="{{ route('store.admin.products.store', $item->id) }}">
		@endif
			@csrf
				<div class="row justify-content-center">
					<div class="col-md-8">
						@include('store.admin.products.includes.product_edit_main_col')
					</div>
					<div class="col-md-3">
						@include('store.admin.products.includes.product_edit_add_col')
					</div>
				</div>
			</form>
		@if($item->exists)
			<br>
			<form method="POST" action="{{ route('store.admin.products.destroy', $item->id) }}">
				@method('DELETE')
				@csrf
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="card card-block">
							<div class="card-body ml-auto">
								<button type="submit" class="btn btn-link">Delete</button>
							</div>
						</div>
					</div>
					<div class="col-md-3"></div>
				</div>
			</form>
		@endif
	</div>
@endsection