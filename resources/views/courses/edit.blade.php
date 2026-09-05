@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-md rounded-xl p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">✏️ تعديل الكورس</h1>

    <form action="{{ route('courses.update', $course->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        
        <div>
            <label class="block text-gray-700 font-medium mb-1">اسم الكورس</label>
            <input type="text" name="name" value="{{ $course->name }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">الوصف</label>
            <textarea name="description" rows="3" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>{{ $course->description }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-medium mb-1">السعر ($)</label>
                <input type="number" step="0.01" name="price" value="{{ $course->price }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">عدد الساعات</label>
                <input type="number" name="hours" value="{{ $course->hours }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            </div>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">المستوى</label>
            <select name="level" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="beginner" {{ $course->level == 'beginner' ? 'selected' : '' }}>مبتدئ</option>
                <option value="intermediate" {{ $course->level == 'intermediate' ? 'selected' : '' }}>متوسط</option>
                <option value="advanced" {{ $course->level == 'advanced' ? 'selected' : '' }}>متقدم</option>
            </select>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded-lg hover:bg-blue-700 transition">تحديث البيانات</button>
    </form>
</div>
@endsection