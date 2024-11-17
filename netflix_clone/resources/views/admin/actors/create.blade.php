@extends('layouts.admin')

@section('content')
<h1>إضافة ممثل جديد</h1>
<form action="{{ route('admin.actors.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">اسم الممثل:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <button type="submit" class="btn-submit">إضافة</button>
</form>
@endsection
