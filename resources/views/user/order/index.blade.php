@extends('user.layouts.master')

@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('user.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Daftar Pesanan</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($orders)>0)
        <table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No.</th>
              <th>No. Pesanan</th>
              <th>Nama</th>
              <th>No. Handphone</th>
              <th>Jumlah</th>
              <th>Harga Ongkos Kirim</th>
              <th>Jumlah Total</th>
              <th>Status</th>
              <th>Aksi</th>
              <th>Waktu Pemesanan</th>
              <th>Waktu Pengiriman</th>
              <th>Pesanan Selesai</th>
            </tr>
          </thead>
          
          <tbody>
          @php
            $no = 1;
            @endphp
            @foreach($orders as $order)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->first_name }} {{$order->last_name}}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>Rp. {{ $order->shipping->price }}</td>
                    <td>Rp. {{ number_format($order->total_amount,0) }}</td>
                    <td>
                        @if($order->status=='new')
                          <span class="badge badge-primary">{{ $order->status }}</span>
                        @elseif($order->status=='process')
                          <span class="badge badge-warning">{{ $order->status }}</span>
                        @elseif($order->status=='delivered')
                          {{-- udah dikirim tapi nunggu konfirmasi --}}
                          <span class="badge badge-info">{{ 'menunggu konfirmasi' }}</span>
                        @else
                          <span class="badge badge-danger">{{ $order->status }}</span>
                        @endif
                    </td>
                    <td>
                      
                        <a href="{{ route('user.order.show',$order->id) }}" class="btn btn-warning btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="view" data-placement="bottom"><i class="fas fa-eye"></i></a>
                        <!-- <form method="POST" action="{{ route('user.order.delete',[$order->id]) }}">
                          @csrf
                          @method('delete')
                              <button class="btn btn-danger btn-sm dltBtn" data-id={{ $order->id }} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form> -->
                  
                    </td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ (($order->deliver_date == NULL) ? '-' : $order->deliver_date) }}</td>
                    <td>
                      @if ($order->status == 'delivered')

                      <form method="POST" action="{{ route('user.order.update_status',[$order->id]) }}" onSubmit = "return confirm ('Yakin ingin konfirmasi pesanan?');">
                          @csrf
                              <button class="btn btn-success btn-sm " {{ $order->status =='delivered' ? '' : 'disabled' }} data-id={{ $order->id }} style="height:50px;" data-toggle="tooltip" data-placement="bottom" title="Pesanan Diterima">Konfirmasi Pesanan</button>
                        </form>
                      @else
                        @if ($order->confirm_date == NULL)
                          pesanan selesai
                        @else
                        {{ $order->confirm_date }}
                        @endif
                      @endif
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        <span style="float:right">{{$orders->links()}}</span>
        @else
          <h6 class="text-center">Tidak ada pesanan yang ditemukan!!! Silahkan pesan beberapa produk</h6>
        @endif
      </div>
    </div>
</div>
@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
  </style>
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>

      $('#order-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[8]
                }
            ]
        } );

        // Sweet alert

        function deleteData(id){

        }
  </script>
  <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
          })
      })
  </script>
@endpush
