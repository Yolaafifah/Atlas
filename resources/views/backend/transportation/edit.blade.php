@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Kendaraan</h5>
    <div class="card-body">
      <form method="post" action="{{route('shipping.update',$shipping->id)}}">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Nama Kendaraan <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="name" placeholder="Enter name"  value="{{$transportation->name}}" class="form-control">
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>     
        <div class="form-group">
        <label for="status">Kategori Kendaraan :</label>
        <select name="truk" id="" class="form-control">
          <option value="pick_up" selected>Pick Up</option>
          <option value="truk" >Truk</option>
          
        </select>
      </div>    
      <div class="form-group">
          <label for="capacity">Kapasitas Kendaraan<span class="text-danger">*</span></label>
          <input id="capacity" type="number" name="capacity" min="0" placeholder="Enter capacity"  value="{{old('capacity')}}" class="form-control">
          @error('capacity')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>    
        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="active" {{(($transportation->status=='active') ? 'selected' : '')}}>Aktif</option>
            <option value="inactive" {{(($transportation->status=='inactive') ? 'selected' : '')}}>Tidak Aktif</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
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