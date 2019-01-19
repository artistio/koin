@extends('_layouts.app')

<!-- Budget Index Template -->

@section('content')
@include('_components.quickaccess')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-10 col-md-8">
      <table class="table">
        <thead>
          <th scope="col">{{ __('Month') }}-{{ __('Year') }}</th>
          <th scope="col">{{ __('Code') }}</th>
          <th scope="col">{{ __('Expense Code') }}</th>
          <th scope="col">{{ __('Amount') }}</th>
        </thead>
        <tbody>
          @foreach ($budgetList as $budget)
            <tr>
              <td>{{ $budget->budget_month }}-{{ $budget->budget_year }}</td>
              <td>{{ $budget->budget_code }}</td>
              <td>{{ $budget->expense_code }}</td>
              <td>{{ $budget->amount }}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection
