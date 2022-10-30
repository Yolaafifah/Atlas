@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Kendaraan</h5>
    <div class="card-body">
      <form method="post" action="{{ route('transportation.update',$transport->id) }}">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="police_number" class="col-form-label">Nomor Polisi <span class="text-danger">*</span></label>
          <input id="police_number" type="text" name="police_number" placeholder="Enter police number" value="{{ old('police_number', $transport->police_number) }}" class="form-control" required>
          @error('police_number')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Nama/Merek Kendaraan <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="name" placeholder="Enter transportation brand" value="{{ old('name', $transport->name) }}" class="form-control" required>
          @error('name')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="type">Jenis Kendaraan :</label>
          <select name="type" id="" class="form-control">
            <option value="pick_up" {{ (($transport->type=='pick_up') ? 'selected' : '') }}>Pick Up</option>
            <option value="truk" {{ (($transport->type=='truk') ? 'selected' : '') }}>Truk</option>
          </select>
        </div>

        <div class="form-group">
          <label for="min_capacity">Minimal Kapasitas (dalam Kg) <span class="text-danger">*</span></label>
          <input id="min_capacity" type="number" name="min_capacity" min="0" placeholder="Enter min capacity" value="{{ old('min_capacity', $transport->min_capacity) }}" class="form-control" required>
          @error('min_capacity')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="max_capacity">Maksimal Kapasitas (dalam Kg) <span class="text-danger">*</span></label>
          <input id="max_capacity" type="number" name="max_capacity" min="0" placeholder="Enter max capacity" value="{{ old('max_capacity', $transport->max_capacity) }}" class="form-control" required>
          @error('max_capacity')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="active" {{ (($transport->status=='active') ? 'selected' : '') }}>Aktif</option>
            <option value="inactive" {{ (($transport->status=='inactive') ? 'selected' : '') }}>Tidak Aktif</option>
          </select>
          @error('status')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
@endpush