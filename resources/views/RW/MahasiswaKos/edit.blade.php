@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Data Mahasiswa Kos</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form action="{{url('MahasiswaKos/' . $mahasiswaKos->NIK)}}" method="POST" class="form-horizontal">
            @csrf
            {!! method_field('PUT') !!}
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">NIK</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="nik" name="nik" value="{{old('NIK',$mahasiswaKos->NIK)}}" required>
                    @error('nik')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label" for="id_rt">ID_RT</label>
                <div class="col-10">
                    <select class="form-control" id="id_rt" name="id_rt" required>
                        <option value="">Pilih ID_RT</option>
                        @foreach($RT as $rt)
                            <option value="{{ $rt->ID_RT }}" @if(old('ID_RT', $mahasiswaKos->ID_RT) == $rt->ID_RT) selected @endif> RT {{ $rt->nomor_RT }}</option>
                        @endforeach
                    </select>
                    @error('id_rt')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nama</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama',$mahasiswaKos->nama)}}" required>
                    @error('nama')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Tempat, Tanggal Lahir</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="ttl" name="ttl" value="{{old('tempat_Tanggal_Lahir',$mahasiswaKos->tempat_Tanggal_Lahir)}}" required>
                    @error('ttl')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Alamat Kos</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="alamatkos" name="alamatkos" value="{{old('alamat_Kos',$mahasiswaKos->alamat_Kos)}}" required>
                    @error('alamatkos')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Jenis Kelamin</label>
                <div class="col-10">
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" @if(old('jenis_kelamin', $mahasiswaKos->jenis_Kelamin) == 'Laki-laki') selected @endif>Laki-laki</option>
                        <option value="Perempuan" @if(old('jenis_kelamin', $mahasiswaKos->jenis_Kelamin) == 'Perempuan') selected @endif>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Agama</label>
                <div class="col-10">
                    <select class="form-control" id="agama" name="agama" required>
                        <option value="">Pilih Agama</option>
                        <option value="Islam" @if(old('agama', $mahasiswaKos->agama) == 'Islam') selected @endif>Islam</option>
                        <option value="Kristen Protestan" @if(old('agama', $mahasiswaKos->agama) == 'Kristen Protestan') selected @endif>Kristen Protestan</option>
                        <option value="Katolik" @if(old('agama', $mahasiswaKos->agama) == 'Katolik') selected @endif>Katolik</option>
                        <option value="Hindu" @if(old('agama', $mahasiswaKos->agama) == 'Hindu') selected @endif>Hindu</option>
                        <option value="Buddha" @if(old('agama', $mahasiswaKos->agama) == 'Buddha') selected @endif>Buddha</option>
                        <option value="Konghucu" @if(old('agama', $mahasiswaKos->agama) == 'Konghucu') selected @endif>Konghucu</option>
                        <!-- Jika ada agama lain yang ingin ditambahkan, tambahkan pilihan di sini -->
                    </select>
                    @error('agama')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Universitas</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="universitas" name="universitas" value="{{old('universitas',$mahasiswaKos->universitas)}}" required>
                    @error('universitas')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Jurusan</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{old('jurusan',$mahasiswaKos->jurusan)}}" required>
                    @error('jurusan')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2"></div>
                <div class="col-10">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a href="{{url('mahasiswaKos')}}" class="btn btn-sm btn-danger ml-1">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
