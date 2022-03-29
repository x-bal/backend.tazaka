<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ $count->title ?? old('title') }}">

    @error('title')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


<div class="form-group">
    <label for="total">Total</label>
    <input type="number" name="total" id="total" class="form-control" value="{{ $count->total ?? old('total') }}">

    @error('total')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>