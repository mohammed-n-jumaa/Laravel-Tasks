@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-4">
    <a href="{{ route('admin.actors.create') }}" class="btn-add">إضافة ممثل جديد</a>
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
        @foreach($actors as $actor)
        <tr>
            <td>{{ $actor->id }}</td>
            <td>{{ $actor->name }}</td>
            <td>
                <a href="{{ route('admin.actors.edit', $actor->id) }}" class="btn-edit">تعديل</a>
                <form action="{{ route('admin.actors.destroy', $actor->id) }}" method="POST" style="display:inline;">
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
