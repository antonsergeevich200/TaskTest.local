@extends('layouts.app')

@section('content')
	@php 
		/** @var \App\Models\ProductCategory $item */
	@endphp
	<div class="container">

		@include('store.admin.categories.includes.category_result_messages')

		@if($item->exists)
			<form method="POST" action="{{ route('store.admin.categories.update', $item->id) }}">
			@method('PATCH')
		@else
			<form method="POST" action="{{ route('store.admin.categories.store', $item->id) }}">
		@endif
			@csrf
				<div class="row justify-content-center">
					<div class="col-md-8">
						@include('store.admin.categories.includes.category_edit_main_col')
					</div>
					<div class="col-md-3">
						@include('store.admin.categories.includes.category_edit_add_col')
					</div>
				</div>
			</form>
		@if($item->exists)
			<br>
			<form method="POST" action="{{ route('store.admin.categories.destroy', $item->id) }}">
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