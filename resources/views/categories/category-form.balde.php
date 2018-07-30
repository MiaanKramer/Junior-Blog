@extends ('layouts.app')

@section ('content')

<div class="container">

@foreach($errors->all() as $message)
<div>{{ $message }}</div>
@endforeach

<div class="card">

        <h3 class="card-header bg-primary text-white">{{ $create ? "Create Category" : "Edit Category" }}</h3>

    <div class="card-body">
        <form action="{{ $create ? route('categorys.store') : route('categorys.update', ['id' => $category->id]) }}" method="category" id="form_category">
            @if(!$create)
                <input type="hidden" name="_method" value="PUT">
            @endif
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title:</label>
                <input class="form-control" type="text" name="title" value="{{ old('title', isset($category) ? $category->title : '') }}" required>
            </div>
            <div class="form-group">
                <label for="body">Body:</label>
                <textarea class="form-control" name="body" required>{{ $create ? '' : old('body', isset($category) ? $category->body : '') }}</textarea>
            </div>
            <div class="form-group">
                <label for="category">Select Category:</label>
                <select id="select_category" class="form-control bg-light" name="category" required {{ $create ? '' : 'disabled' }}>
                    <option value="">Please Select Category</option>
                    @php
                        $value = $create ? '' : old('category', $category->category->title);
                    @endphp

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $value === $category->title ? 'selected="selected"' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

    <div class="card-footer bg-primary">
        <button class="btn btn-outline-light" type="submit" form="form_category">{{ $create ? 'Create Category' : 'Save' }}</button>
    </div>

</div>
</div>

@endsection