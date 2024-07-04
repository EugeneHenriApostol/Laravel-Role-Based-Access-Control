@extends('mainLayout')

@section('page-content')
<div class="container-fluid">
    <!-- Be present above all else. - Naval Ravikant -->
    <table class="table table-striped table-hover">
       <thead class="table-dark">
           <tr>
              <th>#</th>
              <th>Entry</th>
              <th>Entry Amount</th>
              <th>Encoded By</th>
              <th></th>
           </tr>
       </thead>
       <tbody>
       @foreach($allBooks as $book)
       <tr>
          <td>{{ $book->id }}</td>
          <td>{{ $book->entry }}</td>
          <td class="text-end">{{ number_format($book->amount, 2) }}</td>
          <td>{{ $book->user_id }}</td>
          <td>
            <a href="{{ route('ledger', $book->id) }}" class="link-warning">View Details</a>
          </td>
       </tr>
       @endforeach
       </tbody>
    </table>

    <a href="{{ route('acctg') }}" class="link-dark">Back</a>
</div>
@endsection
