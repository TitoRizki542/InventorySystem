@extends('master.layout')
@section('title', 'Item')
@section('content')
    <div class="card shadow">
        <div class="card-body">
            <a href="{{ route('item.create') }}" class="btn btn-primary mb-4">Add Item</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item as $item)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->item_category->name }}</td>
                                <td>
                                    @if (intval($item->qty) > 0)
                                        {{ intval($item->qty) }}
                                    @else
                                        Kosong
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
