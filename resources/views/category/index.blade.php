@extends('_layouts.app')

<!-- Category Index Template -->

@section('content')
@include('_components.quickaccess')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-10 col-md-8">
      <table class="table">
        <thead>
          <th scope="col">{{ __('Name') }}</th>
          <th scope="col">{{ __('Category Code') }}</th>
          @if($isAdmin)
            <th scope="col">{{ __('Action') }}</th>
          @endif
        </thead>
        <tbody>
          @foreach ($categoryList as $category)
            <tr>
              <td>{{ $category->name }}</td>
              <td>{{ $category->code }}</td>
              @if($isAdmin)
                <td scope="col">Edit</td>
              @endif
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection
