@extends('master.layout')
@section('title', 'Outbound Report')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('report.outbound.store') }}" method="post">
                @csrf
                <div class="d-flex justify-content-left">
                    <div class="mx-2">
                        <input type="date" class="form-control" name="doc_date">
                    </div>
                    <div class="mx-2">
                        <select class="form-control" id="itemCategory" name="item_id">
                            <option selected>~ Pilih Barang ~</option>
                            @foreach ($item as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mx-2">
                        <select class="form-control" id="itemCategory" name="uom_id">
                            <option selected>~ Pilih UOM ~</option>
                            @foreach ($uom as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mx-2">
                        <input type="text" class="form-control" name="Qty" placeholder="Masukan Jumlah"
                            max="{{ $item->qty }}">
                    </div>
                    <button class="btn btn-primary" type="submit">Add Outbound</button>
                    <a href="{{ route('item.index') }}" class="btn btn-info  mx-2">Check Item</a>
                </div>

            </form>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Doc Number</th>
                            <th>Doc Date</th>
                            <th>Barang</th>
                            <th>Uom</th>
                            <th>Jumlah Outbound</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($outbound as $item)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->doc_number }}</td>
                                <td>{{ $item->doc_date }}</td>
                                <td>{{ $item->item->name }}</td>
                                <td>{{ $item->uom->name }}</td>
                                <td>{{ intval($item->Qty) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
