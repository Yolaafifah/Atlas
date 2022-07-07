@extends('backend.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="card">
  <h5 class="card-header">Edit Pesanan</h5>
  <div class="card-body">
    <form action="{{route('order.update',$order->id)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="status">Status :</label>
        <select name="status" id="" class="form-control">
        @if (Auth::user()->role == 'admin')
          <option value="new" {{($order->status=='delivered' || $order->status=="process" || $order->status=="cancel") ? 'disabled' : ''}}  {{(($order->status=='new')? 'selected' : '')}}>Baru</option>
          <option value="process" {{($order->status=='delivered'|| $order->status=="cancel") ? 'disabled' : ''}}  {{(($order->status=='process')? 'selected' : '')}}>Sedang di Proses</option>
        @endif
        @if (Auth::user()->role == 'gudang')
          <option value="delivered" {{($order->status=="cancel") ? 'disabled' : ''}}  {{(($order->status=='delivered')? 'selected' : '')}}>Sedang Dikirim</option>
        @endif
        @if (Auth::user()->role == 'supir')
          <option value="delivered" {{($order->status=="cancel") ? 'disabled' : ''}}  {{(($order->status=='delivered')? 'selected' : '')}}>Sudah Dikirim</option>
          <option value="cancel" {{($order->status=='delivered') ? 'disabled' : ''}}  {{(($order->status=='cancel')? 'selected' : '')}}>Sudah Dibatalkan</option>
        @endif
          
          
        </select>
      </div>
      <div class="form-group">
        <label for="status">Supir :</label>
        <select name="sopir_id" id="" class="form-control">
          @foreach($supirs as $supir) 
          <option value="{{$supir->id}}" >{{$supir->name}}</option>
          @endforeach
        </select>

      </div>
      <div class="form-group">
        <label for="status">Kendaraan :</label>
        <select name="truk" id="" class="form-control">
          <option value="pick_up" selected>Pick Up</option>
          <option value="truk" >Truk</option>
          
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>
@endsection

@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush
