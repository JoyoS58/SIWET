@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail RT</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>ID RT</th>
                        <td>{{$RT->ID_RT}}</td>
                    </tr>
                    <tr>
                        <th>Ketua RT</th>
                        <td>{{$RT->ketua_RT}}</td>
                    </tr>
                    <tr>
                        <th>Sekretaris RT</th>
                        <td>{{$RT->sekretaris_RT}}</td>
                    </tr>
                    <tr>
                        <th>Bendahara RT</th>
                        <td>{{$RT->bendahara_RT}}</td>
                    </tr>
                    <tr>
                        <th>Nomor RT</th>
                        <td>{{$RT->nomor_RT}}</td>
                    </tr>
                </table>
            {{-- @endempty --}}
            <a href="{{url('RT')}}" class="btn btn-sm btn-danger mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')

@endpush
@push('js')

@endpush
