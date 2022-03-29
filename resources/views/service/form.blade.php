<div class="form-group">
    <label for="icon">Icon</label>
    <input type="text" name="icon" id="icon" class="form-control" value="{{ $service->icon }}" placeholder='<i class="fas fa-cog"></i>'>

    @error('icon')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ $service->title }}">

    @error('title')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="description" rows="3" class="form-control summernote">{{ $service->description }}</textarea>

    @error('description')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>