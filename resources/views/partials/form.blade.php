<div class="form-group mb-3">
    <label for="title">Title</label>
    <input type="text" name="title" value="{{ old('title') ?? $post->title }}" id="title" class="form-control">
    @error('title')
    <div class="mt-2 text-danger">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label for="body">Description</label>
    <textarea type="text" name="body" id="body" class="form-control">{{ old('title') ??  $post->body }}</textarea>
    @error('title')
    <div class="mt-2 text-danger">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mt-3">
    <button type="submit" class="btn btn-primary">{{ $submit ?? 'Update' }}</button>
</div>