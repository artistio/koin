@extends('_layouts.app')

<!-- Expense Index Template -->

@section('content')
@include('_components.quickaccess')

<div class="container">
  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarExpense" aria-controls="navbarExpense" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarExpense">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
        <form class="form-date" method="GET" action="{{ route('getExpense') }}">
          @csrf

          <div class="row no-gutters">
            <div class="col-12 col-md-5">
              <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                  <span class="input-group-text">{{ __('From') }}</span>
                </div>
                <input name="start_date" type="date" id="inputStartDate" class="form-control" placeholder="Start Date" value={{ $start_date }} required>
              </div>
            </div>
            <div class="col-12 col-md-5">
              <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                  <span class="input-group-text">{{ __('To') }}</span>
                </div>
                <input name="end_date" type="date" id="inputEndDate" class="form-control" placeholder="End Date" value={{ $end_date }} required>
              </div>
            </div>
            <div class="col-12 col-md-2">
              <button class="btn btn-sm btn-primary text-uppercase" type="submit">{{ __('Change') }}</button>
            </div>
          </div>

        </form>
      </ul>
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
            <a href="{{ route('selectCategory') }}" class="btn btn-sm btn-primary text-uppercase">+ New Expense</a>
      </ul>
    </div>
  </nav>
  <div class="row justify-content-center">
    <div class="col-10 col-md-8">
      <table class="table">
        <thead>
          <th scope="col">{{ __('Date') }}</th>
          <th scope="col">{{ __('Category') }}</th>
          <th scope="col">{{ __('Amount') }}</th>
        </thead>
        <tbody>
          @foreach ($expenseList as $expense)
            <tr>
              <td>{{ $expense->expense_date }}</td>
              <td>{{ $expense->getCategoryName() }}</td>
              <td>{{ $expense->amount }}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection
