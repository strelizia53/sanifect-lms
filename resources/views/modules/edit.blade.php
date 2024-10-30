<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Module | Admin Panel</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #111827;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="file"] {
            padding: 3px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #111827;
        }

        .actions {
            display: flex;
            justify-content: space-between;
        }

        .actions button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            color: white;
        }

        .btn-submit {
            background-color: #4f46e5;
        }

        .btn-submit:hover {
            background-color: #4338ca;
        }

        .btn-cancel {
            background-color: #ef4444;
        }

        .btn-cancel:hover {
            background-color: #dc2626;
        }

        .preview-image {
            margin-top: 10px;
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Module</h1>

        <form action="{{ route('modules.update', $module->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $module->title) }}" required />
            </div>

            <!-- Description -->
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="5" required>{{ old('description', $module->description) }}</textarea>
            </div>

            <!-- Category -->
            <div>
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" 
                            {{ $module->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Cover Image -->
            <div>
                <label for="cover_image">Cover Image</label>
                <input type="file" name="cover_image" id="cover_image" accept="image/*" />

                @if ($module->cover_image)
                    <img src="{{ asset('storage/' . $module->cover_image) }}" alt="Cover Image" class="preview-image" />
                @endif
            </div>

            <!-- Actions -->
            <div class="actions">
                <button type="submit" class="btn-submit">Update Module</button>
                <a href="{{ route('modules.index') }}" class="btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</body>

</html>
