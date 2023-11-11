@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row mb-2">
    <div class="col-md-12">
        <div class="form-group">
            <label for="type_id"> Type ID <span class="text-danger">*</span> </label>
            <select class="form-control @error('type_id') parsley-error @enderror" name="type_id">
                <option value=""> โปรดเลือกข้อมูล </option>
                @if(isset($types) && count($types) > 0)
                @foreach($types as $row)
                <option @if(old('type_id') && old('type_id')==$row->id)
                    {{ __("selected") }}
                    @else
                    @if(isset($data->type_id) && $data->type_id==$row->id) {{ __("selected") }} @endif
                    @endif
                    value="{{ $row->id }}">{{ $row->name }}
                </option>
                @endforeach
                @endif
            </select>
            @error('type_id')
            <ul class="parsley-errors-list filled">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
            @enderror
        </div>
    </div>


  <div class="col-md-12">
      <div class="form-group">
          <label for="title"> หัวข้อ <span class="text-danger">*</span> </label>
          <input type="text" class="form-control @error('title') parsley-error @enderror" name="title" id="title" placeholder="Title" value="{{ (isset($data->title))? $data->title : old('title') }}">
          @error('title')
          <ul class="parsley-errors-list filled">
              <li class="parsley-required">{{ $message }}</li>
          </ul>
          @enderror
      </div>
  </div>
  <div class="col-md-12">
      <div class="form-group">
          <label for="title_sub"> หัวข้อย่อย <span class="text-danger">*</span> </label>
          <input type="text" class="form-control @error('title_sub') parsley-error @enderror" name="title_sub" id="title_sub" placeholder="Title Sub" value="{{ (isset($data->title_sub))? $data->title_sub : old('title_sub') }}">
          @error('title_sub')
          <ul class="parsley-errors-list filled">
              <li class="parsley-required">{{ $message }}</li>
          </ul>
          @enderror
      </div>
  </div>
  <div class="col-md-12">
      <div class="form-group">
          <label for="description"> รายละเอียด </label>
          <textarea rows="3" class="form-control @error('description') parsley-error @enderror" name="description" id="description" placeholder="Description">{{ (isset($data->description))? $data->description : old('description') }}</textarea>
          @error('description')
          <ul class="parsley-errors-list filled">
              <li class="parsley-required">{{ $message }}</li>
          </ul>
          @enderror
      </div>
  </div>
  <div class="col-md-12">
      <div class="form-group">
          <label for="link_youtube"> Link Youtube </label>
          <input type="text" class="form-control @error('link_youtube') parsley-error @enderror" name="link_youtube" id="link_youtube" placeholder="Link Youtube" value="{{ (isset($data->link_youtube))? $data->link_youtube : old('link_youtube') }}">
          @error('link_youtube')
          <ul class="parsley-errors-list filled">
              <li class="parsley-required">{{ $message }}</li>
          </ul>
          @enderror
      </div>
  </div>
  <div class="col-md-4">
      <div class="form-group">
          <label for="meta_title"> Meta Title </label>
          <input type="text" class="form-control @error('meta_title') parsley-error @enderror" name="meta_title" id="meta_title" placeholder="Meta Title" value="{{ (isset($data->meta_title))? $data->meta_title : old('meta_title') }}">
          @error('meta_title')
          <ul class="parsley-errors-list filled">
              <li class="parsley-required">{{ $message }}</li>
          </ul>
          @enderror
      </div>
  </div>
  <div class="col-md-4">
      <div class="form-group">
          <label for="meta_description"> Meta Description </label>
          <input type="text" class="form-control @error('meta_description') parsley-error @enderror" name="meta_description" id="meta_description" placeholder="Meta Description" value="{{ (isset($data->meta_description))? $data->meta_description : old('meta_description') }}">
          @error('meta_description')
          <ul class="parsley-errors-list filled">
              <li class="parsley-required">{{ $message }}</li>
          </ul>
          @enderror
      </div>
  </div>

  <div class="col-md-4">
      <div class="form-group">
          <label for="meta_keywords"> Meta Keyword </label>
          <input type="text" class="form-control @error('meta_keywords') parsley-error @enderror" name="meta_keywords" id="meta_keywords" placeholder="Meta Keyword" value="{{ (isset($data->meta_keywords))? $data->meta_keywords : old('meta_keywords') }}">
          @error('meta_keywords')
          <ul class="parsley-errors-list filled">
              <li class="parsley-required">{{ $message }}</li>
          </ul>
          @enderror
      </div>
  </div>

  <div class="col-md-3">
      <div class="form-group">
          <label for="images"> รูปหลัก </label>
          <div class="mt-2 img-file-upload-1">
            @if(isset($data->images) && !empty($data->images))
            <img class="d-flex mr-2 rounded" src="{{ asset('blogs/images').'/'.$data->images }}" height="50">
            @else
            <div class="box-image-no" style="background: #ddd;border-radius: 50%; width: 100px; height: 100px;"> </div>
            @endif          
            </div>
          <div class="mt-1 mb-1"> Size image 690 × 690 px 2MB. </div>
          <input id="images" type="file" class="@error('images') parsley-error @enderror" name="images" value="{{ old('images') }}" autocomplete="images" autofocus>
          @error('images')
          <ul class="parsley-errors-list filled">
              <li class="parsley-required">{{ $message }}</li>
          </ul>
          @enderror
      </div>
  </div>
  <div class="col-md-3">
      <div class="form-group">
          <label for="file_pdf_name"> ไฟล์ PDF </label> 
          <div class="mt-1 mb-1"> PDF 5MB. </div>
          <input id="file_pdf_name" type="file" class="@error('file_pdf_name') parsley-error @enderror" name="file_pdf_name" value="{{ old('file_pdf_name') }}" autocomplete="file_pdf_name" autofocus>
          @error('file_pdf_name') 
          <ul class="parsley-errors-list filled">
              <li class="parsley-required">{{ $message }}</li>
          </ul>
          @enderror
      </div>
  </div>
  <div class="col-md-6"> 
    @if(isset($data->file_pdf_name))
    @if(!empty($data->file_pdf_name))
    ไฟล์เดิม pdf
    <div class="text-center mb-3 d-none d-sm-block">
        <object data="{{ asset('blogs/pdf').'/'.$data->file_pdf_name }}" type="application/pdf" width="100%" height="100%"> </object>
    </div>
    <div class="text-center mb-3 d-block d-sm-none show-node-pdf">
        <div><b>เบราว์เซอร์นี้ไม่สนับสนุน PDF กรุณาดาวน์โหลดไฟล์ PDF เพื่อดู</b> </div>
        <a class="btn mt-1" href="{{ asset('blogs/pdf').'/'.$data->file_pdf_name }}">Download PDF</a>
    </div>
    @endif
    @endif
</div>

  <div class="col-md-12">
      <div class="form-group">
          <label for="status-1"> สถานะการแสดงผล <span class="text-danger">*</span></label>
          <div class="mt-2">
              <div class="radio radio-success form-check-inline">
                  <input type="radio" id="status-1" value="true" name="status" @if(isset($data->status) && $data->status==true) {{ __('checked') }} @endif
                  @if(!empty(old('status')) && old('status')==true) {{ __('checked') }} @endif
                  @if(!isset($data->status) && empty(old('status'))) {{ __('checked') }} @endif>
                  <label for="status-1">
                      <span class="badge badge-success p-1"> Enable </span>
                  </label>
              </div>
              <div class="radio radio-secondary form-check-inline">
                  <input type="radio" id="status-0" value="0" name="status" @if(isset($data->status) && $data->status==false) {{ __('checked') }} @endif
                  @if(!empty(old('status')) && old('status')==false) {{ __('checked') }} @endif>
                  <label for="status-0">
                      <span class="badge badge-secondary p-1"> Disable </span>
                  </label>
              </div>
          </div>
      </div>
  </div>
  
  <div class="col-md-12"> 
    @if(isset($data->link_youtube))
    @if(!empty($data->link_youtube))
    Youtube
    <div class="text-center mb-3 d-none d-sm-block">
        {{-- <object data="{{ asset('blogs/pdf').'/'.$data->file_pdf_name }}" type="application/pdf" width="100%" height="100%"> </object> --}}
        <iframe width="560" height="315" 
        src="https://www.youtube.com/embed/hZssqYRBBlY?si={{$data->link_youtube}}" 
        title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
    <div class="text-center mb-3 d-block d-sm-none show-node-pdf">
        <div><b>เบราว์เซอร์นี้ไม่สนับสนุน PDF กรุณาดาวน์โหลดไฟล์ PDF เพื่อดู</b> </div>
        <a class="btn mt-1" href="{{ asset('blogs/pdf').'/'.$data->file_pdf_name }}">Download PDF</a>
    </div>
    @endif
    @endif
</div>
  
</div>