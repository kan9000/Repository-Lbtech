@extends('layouts.adminLay')

@section('title', 'Page Users Index')

@section('content')

<div class="card">
    <div class="card-header">
        Page Blog index
    </div>
    <div class="card-body"> 
        <a class="btn btn-dark waves-effect waves-light mb-2" href="{{ route('blog.add') }}">เพิ่มข้อมูล</a>
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th>รูป</th>

                        <th>หัวข้อ</th>
                        <th width="15%">จำนวนคนดู</th>
                        <th width="20%">#</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- ตรวจสอบว่ามีข้อมูลหรือไม่ --}}
                    @if(isset($data) && count($data)>0)
                    @foreach($data as $key=>$row)
                    <tr>
                        <th> {{ ($key+1) }}</th>
                        <td>  
                            @if(isset($row->images) && !empty($row->images))
                            <img class="d-flex mr-2 rounded" src="{{ asset('blogs/images').'/'.$row->images}}" height="50">
                            @else
                            <div class="img-list-no mr-2"></div>
                            @endif
                        </td>

                        <td> {{ $row->title }} </td>
                        <td> {{ number_format($row->count_view) }} </td>
                        <td class="text-right">
                            <a class="btn btn-dark waves-effect waves-light" href="{{ route('blog.edit', $row->id) }}">แก้ไข</a>
                            <form method="POST" action="{{ route('delete.blog') }}" style="display:inline">
                                @csrf
                                <input type="hidden" name="id" value="{{ ($row->id)? $row->id : 0 }}">
                                <button type="submit" class="btn btn-danger waves-effect waves-light delete-confirm">ลบข้อมูล</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                
                    {{-- <tr>
                        <th>1</th>
                        <td> xx </td>
                        <td> xx </td>
                        <td class="text-right">
                            <a class="btn btn-dark waves-effect waves-light" href="#">แก้ไข</a>
                            <a class="btn btn-danger waves-effect waves-light" href="#">ลบ</a>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')
@endpush