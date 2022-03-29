<div class="form-group">
    <label for="section">Section</label>
    <select name="section" id="section" class="form-control">
        <option disabled selected>-- Select Section --</option>
        @foreach($sections as $sect)
        <option {{ $section->section == $sect ? 'selected' : old('section') }} value="{{ $sect }}">{{ $sect }}</option>
        @endforeach
    </select>

    @error('section')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


<div class="form-group">
    <label for="content">Content</label>
    <textarea name="content" id="content" rows="5" class="form-control">{{ $section->content ?? old('content') }}</textarea>

    @error('content')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>