@extends('layouts.admin') <!-- هنا مسار القالب -->

@section('content')
<div class="flex justify-between items-center mb-4">
    <a href="{{ route('admin.movies.create') }}" class="btn-add">إضافة فيلم جديد</a>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($movies as $movie)
        <tr>
            <td>{{ $movie->id }}</td>
            <td>{{ $movie->title }}</td>
            <td>
                <a href="{{ route('admin.movies.edit', $movie->id) }}" class="btn-edit">تعديل</a>
                <form action="{{ route('admin.movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
