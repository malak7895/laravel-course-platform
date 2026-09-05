@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-md rounded-xl p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">➕ إضافة كورس جديد</h1>

    <form action="{{ route('courses.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700 font-medium mb-1">اسم الكورس</label>
            <input type="text" name="name" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">الوصف</label>
            <textarea name="description" rows="3" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required></textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-medium mb-1">السعر ($)</label>
                <input type="number" step="0.01" name="price" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">عدد الساعات</label>
                <input type="number" name="hours" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            </div>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">المستوى</label>
            <select name="level" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="beginner">مبتدئ (Beginner)</option>
                <option value="intermediate">متوسط (Intermediate)</option>
                <option value="advanced">متقدم (Advanced)</option>
            </select>
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-2 rounded-lg hover:bg-indigo-700 transition">حفظ الكورس</button>
    </form>
</div>
@endsection