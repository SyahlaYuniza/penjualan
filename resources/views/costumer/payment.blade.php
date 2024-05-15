@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{asset('assets/vendors/linericon/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/nouislider/nouislider.min.css')}}">
<style>
    .center {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 150px;
    }
</style>
@endsection

@section('title')
Order
@endsection

@section('main')
<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="category" style="min-height: 300px">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1>Payment Confirmation</h1><br>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <form action="/costumer/payment/{{$order->invoice}}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="order_id" value=" {{$order->id}} " required>
                            <input type="hidden" name="name" value=" {{$order->customer->name}} " required>
                            <input type="hidden" name="transfer_to" value="070-00-01877775" required>
                            <input type="hidden" name="amount" value=" {{$order->cost}} " required>
                            <input type="file" name="proof" required class="form-file" accept="image/*">
                            <button class="btn btn-success" type="submit">Upload Bukti Pembayaran</button>
                        </form>
                        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop Category</li> --}}
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->

@endsection
