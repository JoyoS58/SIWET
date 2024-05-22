@extends('layouts.templatePKK')
@section('title', 'Pengelolaan Kas PKK')

@section('content_header')
<h1>Data Kriteria</h1>
@endsection

@section('content')
<a href="{{ route('/spk') }}" class="btn btn-success">Add New Criterion</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No Kriteria</th>
            <th>Nama Kriteria</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($criteria as $criterion)
            <tr>
                <td>{{ $criterion->id }}</td>
                <td>{{ $criterion->name }}</td>
                <td>
                    <a href="{{ route('criteria.show', $criterion->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('criteria.edit', $criterion->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('criteria.destroy', $criterion->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
