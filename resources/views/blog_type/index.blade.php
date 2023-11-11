@extends('layouts.adminLay')

@section('title', 'Page Blog Type Index')

@section('content')
<div class="card">
    <div class="card-header">
        Page Blog Type index
    </div>
    <div class="card-body">
        <a class="btn btn-dark waves-effect waves-light mb-2" href="{{ route('blogs.type.add') }}">เพิ่มข้อมูล</a>
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th>ชื่อประเภท</th> 
                        <th width="20%">#</th>
                    </tr>
                </thead>
                <tbody>

                    @if(isset($data) && count($data)>0)
                    @foreach($data as $key=>$row)
                    <tr>
                        <th> {{ ($key+1) }}</th>
                        <td> {{ $row->name }} </td> 
                        <td class="text-right">
                            <a class="btn btn-dark waves-effect waves-light" href="{{ route('blogs.type.edit', $row->id) }}">แก้ไข</a>
                           
                            <form method="POST" action="{{ route('delete.blogs.type') }}" style="display:inline">
                                @csrf
                                <input type="hidden" name="id" value="{{ ($row->id)? $row->id : 0 }}">
                                <button type="submit" class="btn btn-danger waves-effect waves-light delete-confirm">ลบข้อมูล</button>
                            </form>
                             
                        </td>
                    </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
    </div>
</div>
@endsection

@push('scripts')
@endpush