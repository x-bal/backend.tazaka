<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $team->name ?? old('name') }}">

    @error('name')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="position">Position</label>
    <input type="text" name="position" id="position" class="form-control" value="{{ $team->position ?? old('position') }}">

    @error('position')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="twitter">Twitter</label>
    <input type="text" name="twitter" id="twitter" class="form-control" value="{{ $team->twitter ?? old('twitter') }}">

    @error('twitter')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="facebook">Facebook</label>
    <input type="text" name="facebook" id="facebook" class="form-control" value="{{ $team->facebook ?? old('facebook') }}">

    @error('facebook')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="instagram">Instagram</label>
    <input type="text" name="instagram" id="instagram" class="form-control" value="{{ $team->instagram ?? old('instagram') }}">

    @error('instagram')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="linkedin">Linkedin</label>
    <input type="text" name="linkedin" id="linkedin" class="form-control" value="{{ $team->linkedin ?? old('linkedin') }}">

    @error('linkedin')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


<div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" id="image" class="form-control">

    @error('image')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>