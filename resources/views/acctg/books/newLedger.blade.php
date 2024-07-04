@extends('mainLayout')

@section('page-content')
<div class="container-fluid">
    <div class="row">
        <div class="col"></div>
        <div class="col-sm-8">
            <div class="card border border-dark py-3 px-5">
                <h5 class="card-title text-center mb-4">Add New Ledger Entry</h5>
                <form action="{{ route('saveledger') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="entrydetail" class="form-label">Entry Detail:</label>
                        <textarea name="entrydetail" id="entrydetail" cols="30" rows="5" class="form-control" style="resize: none;"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="entryamount" class="form-label">Amount:</label>
                        <input type="text" class="form-control text-end" id="entryamount" name="entryamount">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success me-2">Submit</button>
                        <button type="reset" class="btn btn-danger">Clear</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col"></div>
    </div>
    <div class="row mt-3">
        <div class="col text-center">
            <a href="{{ route('acctg') }}" class="btn btn-link">Back</a>
        </div>
    </div>
</div>
@endsection
