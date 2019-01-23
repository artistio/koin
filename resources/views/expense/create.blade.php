@extends('_layouts.app')

<!-- Template to create form for new expenses -->

@section('content')
@include('_components.quickaccess')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-md h3">{{__('Record Expense for')}} {{ $categoryName }}</div>
    <div class="col"><a href="{{ route('selectCategory') }}">{{__('Select another category')}}</a></div>
    @if ($errors->any())
      <div class="w-100"></div>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form-signin" method="POST" action="{{ route('storeExpense') }}">
      @csrf
      <input name="categoryCode" type="hidden" id="inputCategoryCode" class="form-control" value="{{ $categoryCode }}" required>

      <div class="form-label-group">
        <input name="expense_date" type="date" id="inputDate" class="form-control" placeholder="Transaction Date" value={{ now() }} required>
        <label for="inputDate">{{ __('Transaction Date') }}</label>
      </div>

      <div class="form-label-group">
        <input name="amount" type="text" id="inputAmount" class="form-control" placeholder="Transaction Value" required autofocus>
        <label for="inputAmount">{{ __('Transaction Amount') }}</label>
      </div>

      <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">{{ __('Save Expense') }}</button>
      <hr class="my-4">
      <!--
      <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
      <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
      -->
    </form>
  </div>
</div>
@endsection
