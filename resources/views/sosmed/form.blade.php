<div class="form-group">
    <label for="icon">Icon</label>
    <input type="text" name="icon" id="icon" class="form-control" value="{{ $sosmed->icon ?? old('icon') }}">

    @error('icon')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


<div class="form-group">
    <label for="link">Link</label>
    <input type="text" name="link" id="link" class="form-control" value="{{ $sosmed->link ?? old('link') }}">

    @error('link')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>