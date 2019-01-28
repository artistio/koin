@extends('_layouts.app')

<!-- Expense Index Template -->

@section('content')
@include('_components.quickaccess')

<div class="container">
  <div class="row">
    <!-- Section for Content Menu -->
    <div class="col-10 col-md-8">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
        <form class="form-date" method="GET" action="{{ route('getExpense') }}">
          @csrf
          <div class="input-group">
            <div class="form-label-group">
              <input name="start_date" type="date" id="inputStartDate" class="form-control" placeholder="Start Date" value={{ $start_date }} required>
              <label for="inputStartDate">{{ __('Start Date') }}</label>
            </div>
            <span class="input-group-addon">-</span>
            <div class="form-label-group">
              <input name="end_date" type="date" id="inputEndDate" class="form-control" placeholder="End Date" value={{ $end_date }} required>
              <label for="inputEndDate">{{ __('End Date') }}</label>
            </div>
            <button class="btn btn-sm btn-primary text-uppercase" type="submit">{{ __('Change') }}</button>
          </div>
        </form>
      </ul>
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav mr-auto">

      </ul>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-10 col-md-8">
      <table class="table">
        <thead>
          <th scope="col">{{ __('Date') }}</th>
          <th scope="col">{{ __('Expense Code') }}</th>
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
