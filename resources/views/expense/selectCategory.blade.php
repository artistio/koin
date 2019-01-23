@extends('_layouts.app')

<!-- Select Category for Expense Template -->

@section('content')
@include('_components.quickaccess')

<div class="container">
  <div class="row justify-content-center">
    @if(session()->has('result'))
      <div class="w-100"></div>
        <div class="alert alert-success">
            {{__('Expense Saved Successfully')}}
        </div>
    @endif
    <div class="col-12 h3">{{__('Select Expense Category')}}</div>
    @foreach ($categoryList as $category)
      <div class="col-10 col-md-3">
        <a href="/expense/new?category={{ $category->code }}" class="btn btn-primary">{{ $category->name }}</a>
      </div>
    @endforeach
    </div>
  </div>
</div>
@endsection
