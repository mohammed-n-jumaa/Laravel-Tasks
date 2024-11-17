@extends('layouts.admin')

@section('content')
<h1>إضافة نوع جديد</h1>
<form action="{{ route('admin.genres.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">اسم النوع:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <button type="submit" class="btn-submit">إضافة</button>
</form>
@endsection
