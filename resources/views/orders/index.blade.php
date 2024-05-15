@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Pesanan</h1>
@stop

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Orders</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Daftar Pesanan
                            </h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <form action="" method="get">
                                <div class="input-group mb-3 col-md-6 float-right">
                                    <select name="status" class="form-control mr-3">
                                        <option value="">Pilih Status</option>
                                        <option value="0">Baru</option>
                                        <option value="1">Confirm</option>
                                        <option value="2">Proses</option>
                                        <option value="3">Dikirim</option>
                                        <option value="4">Selesai</option>
                                    </select>
                                    <input type="text" name="q" class="form-control" placeholder="Cari..."
                                        value="{{ request()->q }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">Cari</button>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>InvoiceID</th>
                                            <th>Pelanggan</th>
                                            <th>Subtotal</th>
                                            <th>Bukti Bayar</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $row)
                                        <tr>
                                            <td>
                                                <strong>{{ $row->invoice }}</strong> <br>
                                                <a class="btn btn-sm btn-info" href="/costumer/pdf/{{$row->id}} ">View
                                                    invoice</a>
                                            </td>
                                            <td>
                                                <strong>{{ $row->customer_name }}</strong><br>
                                                <label><strong>Telp:</strong> {{ $row->customer_phone }}</label><br>
                                                <label><strong>Alamat:</strong> {{ $row->customer_address }} {{
                                                    $row->customer->district->name }} - {{ $row->citie->name }}, {{
                                                    $row->citie->postal_code }}</label>
                                            </td>
                                            <td>Rp {{ number_format($row->subtotal) }}</td>
                                            <td>
                                                @if ($row->status != 0)
                                                <img class="card-img"
                                                    src="{{ asset('storage/payment/' .$row->payment['proof']) }}"
                                                    style="height: 100px; width: auto;"
                                                    alt="{{$row->payment['proof']}}">
                                                @else
                                                Bukti pembayaran <br>belum di upload
                                                    @endif
                                            </td>
                                            <td>{{ $row->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                @if ($row->status == 0)
                                                <span class="badge badge-secondary">Baru</span>
                                                @elseif ($row->status == 1)
                                                <span class="badge badge-primary">Dikonfirmasi</span>
                                                @elseif ($row->status == 2)
                                                <span class="badge badge-info">Proses</span>
                                                @elseif ($row->status == 3)
                                                <span class="badge badge-warning">Dikirim</span>
                                                @elseif ($row->status == 4)
                                                <span class="badge badge-success">Selesai</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($row->status == 0)
                                                Customer belum Upload <br>bukti pembayaran
                                                @elseif ($row->status == 1)
                                                <form action="update/{{$row->id}} " method="post">
                                                    @csrf
                                                    <input type="hidden" name="status" value="2">
                                                    <button class="btn btn-success btn-sm" type="submit">Update ke
                                                        Proses</button>
                                                </form>
                                                @elseif ($row->status == 2)
                                                <form action="update/{{$row->id}} " method="post">
                                                    @csrf
                                                    <input type="hidden" name="status" value="3">
                                                    <button class="btn btn-info btn-sm" type="submit">Update ke
                                                        Dikirim</button>
                                                </form>
                                                @elseif ($row->status == 3)
                                                <div class="badge badge-warning text-left">Tunggu konfirmasi <br>penerimaan barang dari custommer</div>
                                                @elseif ($row->status == 4)
                                                <form action="destroy/{{$row->id}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {!! $orders->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
