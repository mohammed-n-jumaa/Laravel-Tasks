@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-4">
    <a href="{{ route('admin.genres.create') }}" class="btn-add">إضافة نوع جديد</a>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($genres as $genre)
        <tr>
            <td>{{ $genre->id }}</td>
            <td>{{ $genre->name }}</td>
            <td>
                <a href="{{ route('admin.genres.edit', $genre->id) }}" class="btn-edit">تعديل</a>
                <form action="{{ route('admin.genres.destroy', $genre->id) }}" method="POST" style="display:inline;">
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
