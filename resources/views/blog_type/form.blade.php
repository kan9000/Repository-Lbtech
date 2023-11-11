<div class="row mb-2">
    <div class="col-md-12">
        <div class="form-group">
            <label for="name"> ชื่อประเภท <span class="text-danger">*</span> </label>
            <input type="text" class="form-control @error('name') parsley-error @enderror" 
            name="name" id="name" placeholder="ชื่อประเภท" value="{{ (isset($data->name))? $data->name : old('name') }}">
            @error('name')
            <ul class="parsley-errors-list filled">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
            @enderror
        </div>
    </div>
    <div class="col-md-12 text-right"> 
        <hr>
        <button type="submit" class="btn btn-primary waves-effect width-md waves-light"> บันทึกข้อมูล </button>
    </div>
</div>