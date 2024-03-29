@extends('backend.layouts.master')

@section('main-content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="row">
    <div class="col-md-12">
      @include('backend.layouts.notification')
    </div>
  </div>
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary float-left">Daftar Kendaraan</h6>
    <a href="{{route('transportation.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Tambah Kendaraan</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      @if(count($transports)>0)
      <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nomor Polisi</th>
            <th>Nama/Merek Kendaraan</th>
            <th>Kategori Kendaraan</th>
            <th>Min Kapasitas Kendaraan</th>
            <th>Max Kapasitas Kendaraan</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          @php
          $no = 1;
          @endphp
          @foreach($transports as $transportation)
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ strtoupper($transportation->police_number) }}</td>
            <td>{{ $transportation->name }}</td>
            <td>{{ $transportation->type }}</td>
            <td>{{ $transportation->min_capacity }}</td>
            <td>{{ $transportation->max_capacity }}</td>
            <td>
              {{-- status: active, in_used, inactive --}}
              @if($transportation->status=='active')
              <span class="badge badge-success">{{ $transportation->status }}</span>
              @elseif ($transportation->status=='in_used')
              <span class="badge badge-warning">{{ 'Dalam perjalanan' }}</span>
              @else
              <span class="badge badge-danger">{{$transportation->status }}</span>
              @endif
            </td>
            <td>
              <a href="{{route('transportation.edit',$transportation->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
          <form method="POST" action="{{route('transportation.destroy',[$transportation->id])}}">
            @csrf
            @method('delete')
                <button class="btn btn-danger btn-sm dltBtn" data-id={{$transportation->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
              </form>
          </td>
            
            {{-- Delete Modal --}}
            
    </div>
    </tr>
    @endforeach
    </tbody>
    </table>
    <span style="float:right">{{$transports->links()}}</span>
    @else
    <h6 class="text-center">Tidak ada transportasi ditemukan!!! Silakan ditambahkan</h6>
    @endif
  </div>
</div>
</div>
@endsection

@push('styles')
<link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<style>
  div.dataTables_wrapper div.dataTables_paginate {
    display: none;
  }

  .zoom {
    transition: transform .2s;
    /* Animation */
  }

  .zoom:hover {
    transform: scale(3.2);
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
  $('#banner-dataTable').DataTable({
    "columnDefs": [{
      "orderable": false,
      "targets": [3, 4]
    }]
  });

  // Sweet alert

  function deleteData(id) {

  }
</script>
<script>
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $('.dltBtn').click(function(e) {
      var form = $(this).closest('form');
      var dataID = $(this).data('id');
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