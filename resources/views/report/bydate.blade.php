@extends('_layouts.app')

<!-- Report by Date Template -->

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
        @include('_components.formdate', ['action' => route('reportByDate') ])

      </ul>
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
      </ul>
    </div>
  </nav>
  <div class="row justify-content-center">
    <div class="col-10 col-md-8">
      <table class="table">
        <thead>
          <th scope="col">{{ __('Date') }}</th>
          <th scope="col">{{ __('Total Amount') }}</th>
        </thead>
        <tbody>
          @foreach ($expenseList as $expense)
            <tr>
              <td>{{ $expense->expense_date }}</td>
              <td>{{ $expense->total_amount }}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection
