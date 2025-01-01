@extends('master.layout')
@section('title', 'Form Add Item')
@section('content')
    <div class="row">
        <div class="col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{ route('item.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="mb-2">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-4">
                                <label for="itemCategory">Item Category</label>
                                <select class="form-control" id="itemCategory" name="item_category_id">
                                    @foreach ($itemCategory as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary rounded-pill">Add Item Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
