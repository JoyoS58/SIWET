@extends('layouts.template')

@section('content') 
    <div class="card card-outline card-primary"> 
        <div class="card-header"> 
        <h3 class="card-title">{{ $page->title }}</h3> 
        <div class="card-tools"></div> 
        </div> 
        <div class="card-body"> 
        @empty($kegiatanRW) 
            <div class="alert alert-danger alert-dismissible"> 
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> 
                Data yang Anda cari tidak ditemukan. 
            </div> 
            <a href="{{ url('kegiatanRW') }}" class="btn btn-sm btn-default mt-2">Kembali</a> 
        @else 
            <form method="POST" action="{{ url('/kegiatanRW/'.$kegiatanRW->ID_) }}" class="form-horizontal"> 
                @csrf 
                {!! method_field('PUT') !!}  <!-- tambahkan baris ini untuk proses edit yang butuh method PUT -->  
                <div class="form-group row"> 
                    <label class="col-1 control-label col-form-label">ID Pengurus</label> 
                    <div class="col-11"> 
                        <select class="form-control" id="ID_RW" name="ID_RW" required> 
                            <option value="">- Pilih ID Pengurus -</option> 
                            @foreach($ID_RW as $item) 
                                <option value="{{ $item->ID_RW }}">{{ $item->ID_RW }}</option> 
                            @endforeach 
                        </select>
                        @error('ID_RW') 
                            <small class="form-text text-danger">{{ $message }}</small> 
                        @enderror 
                    </div> 
                </div> 
                <div class="form-group row"> 
                    <label class="col-1 control-label col-form-label">Nama Kegiatan</label> 
                    <div class="col-11"> 
                        <input type="text" class="form-control" id="Nama_Kegiatan" name="nama_Kegiatan" value="{{ old('nama_Kegiatan') }}" required> 
                        @error('Nama_Kegiatan') 
                            <small class="form-text text-danger">{{ $message }}</small> 
                        @enderror 
                    </div> 
                </div> 
                <div class="form-group row"> 
                    <label class="col-1 control-label col-form-label">Tanggal Kegiatan</label> 
                    <div class="col-11"> 
                        <input type="date" class="form-control" id="tanggal" name="tangga" value="{{ old('tanggal') }}" required> 
                        @error('tanggal') 
                            <small class="form-text text-danger">{{ $message }}</small> 
                        @enderror 
                    </div>
                </div>  
                <div class="form-group row"> 
                    <label class="col-1 control-label col-form-label">Penanggung Jawab</label> 
                    <div class="col-11"> 
                        <input type="text" class="form-control" id="penanggung_Jawab" name="penanggung_Jawab" value="{{ old('penanggung_Jawab') }}" required> 
                        @error('penanggung_Jawab') 
                            <small class="form-text text-danger">{{ $message }}</small> 
                        @enderror 
                    </div>
                </div>    
                <div class="form-group row"> 
                    <label class="col-1 control-label col-form-label">Tempat Kegiatan</label> 
                    <div class="col-11"> 
                        <input type="text" class="form-control" id="tempat" name="tempat" value="{{ old('tempat') }}" required> 
                        @error('tempat') 
                            <small class="form-text text-danger">{{ $message }}</small> 
                        @enderror 
                    </div>
                </div>    
                <div class="form-group row"> 
                    <label class="col-1 control-label col-form-label">Keterangan</label> 
                    <div class="col-11"> 
                        <input type="text" class="form-control" id="dekripsi" name="dekripsi" value="{{ old('dekripsi') }}" required> 
                        @error('dekripsi') 
                            <small class="form-text text-danger">{{ $message }}</small> 
                        @enderror 
                    </div>
                </div>    
                <div class="form-group row"> 
                    <label class="col-1 control-label col-form-label"></label> 
                    <div class="col-11"> 
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button> 
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('kegiatanRW') }}">Kembali</a> 
                    </div> 
                </div> 
            </form> 
        @endempty 
        </div> 
    </div> 
@endsection 
 
@push('css') 
@endpush 
@push('js') 
@endpush

{{-- @section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Kegiatan RW</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form action="{{url('kegiatan-rw')}}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">ID Pengurus</label>
                    <div class="col-10">
                        <select name="id_pengurus" id="id_pengurus" class="form-control" required>
                            <option value="">- Pilih ID Pengurus -</option>
                            <option value="1">ID Pengurus 1</option>
                            <option value="2">ID Pengurus 2</option>
                            <!-- Tambahkan option lainnya sesuai dengan ID pengurus yang tersedia -->
                        </select>
                        @error('id_pengurus')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Nama Kegiatan</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="{{old('nama_kegiatan')}}" required>
                        @error('nama_kegiatan')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Penanggung Jawab</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" value="{{old('penanggung_jawab')}}" required>
                        @error('penanggung_jawab')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Tempat Kegiatan</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="tempat_kegiatan" name="tempat_kegiatan" value="{{old('tempat_kegiatan')}}" required>
                        @error('tempat_kegiatan')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Tanggal Kegiatan</label>
                    <div class="col-10">
                        <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" value="{{old('tanggal_kegiatan')}}" required>
                        @error('tanggal_kegiatan')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Waktu Kegiatan</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="waktu_kegiatan" name="waktu_kegiatan" value="{{old('waktu_kegiatan')}}" required>
                        @error('waktu_kegiatan')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Deskripsi Kegiatan</label>
                    <div class="col-10">
                        <textarea class="form-control" id="deskripsi_kegiatan" name="deskripsi_kegiatan" rows="3" required>{{old('deskripsi_kegiatan')}}</textarea>
                        @error('deskripsi_kegiatan')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label"></label>
                    <div class="col-10">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="{{url('kegiatan-rw')}}" class="btn btn-sm btn-danger ml-1">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection --}}
