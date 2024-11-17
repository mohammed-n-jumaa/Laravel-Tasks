@extends('layouts.admin')

@section('content')
<h1>إضافة فئة جديدة</h1>
<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">اسم الفئة:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <button type="submit" class="btn-submit">إضافة</button>
</form>
@endsection
