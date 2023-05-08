@extends('admin.layout')

@section('title', 'Company')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card-box">

                <table id="datatable" class="table table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            @foreach ($metadata['header'] as $item)
                                <th>{{ $item['name'] }}</th>
                            @endforeach
                           
                            @if (isset($metadata['operation']['operation']) && count($metadata['operation']['operation']) > 0)
                                <th>Hành động</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($metadata['list'] as $item)
                            <tr>
                            @foreach ($metadata['keys'] as $key)
                                @if (isset($key['component']))
                                    @switch($key['component'])
                                        @case('button')
                                            <td>
                                                <a href="/admin/{{ $key['model'] }}/{{ $metadata['prefix'] }}/{{ $item->{$key['queryParam']['key']} }}">
                                                    <button class="btn btn-icon waves-effect waves-light btn-primary"> <i class="fas fa-list-ul"></i> </button>
                                                </a>
                                            </td>
                                        @break
                                        @case('icon-button')
                                            @php
                                                $value = $item->{$key['key']};
                                            @endphp
                                            <td>
                                                <span class="mr-1"> {{ eval("return $value $key[condition] $key[value];") ? $key['textTrue'] : $key['textFalse'] }} </span>
                                                <a href="{{ $key['url'] }}/{{ $item['id'] }}">
                                                    <button class="btn btn-icon waves-effect waves-light btn-primary"> <i class="fe-refresh-cw"></i> 
                                                        Đổi
                                                    </button>
                                                </a>
                                            </td>
                                        @break
                                    @endswitch
                                @else
                                    <td>{{ $item->{$key['key']} }}</td>
                                @endif
                            @endforeach
                            @if (isset($metadata['operation']['operation']) && count($metadata['operation']['operation']) > 0)
                            <td>
                                <div class="d-flex mt-1">
                                    <div class="mr-2">
                                        <a href="{{ $metadata['prefix'] }}/edit/{{ $item->id }}">
                                            <button class="btn btn-icon waves-effect waves-light btn-warning"> <i class="fa fa-wrench"></i> </button>
                                        </a>
                                    </div>
                                    <div >
                                        <form action="{{ url('/admin/' . $metadata['prefix'] . '/' . $item->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-icon waves-effect waves-light btn-dark"> <i class=" fas fa-trash-alt"></i> </button>
                                        </form>
                                    </div> 
                                </div>                            
                            </td> 
                            @endif
                            
                            </tr>                         
                        @endforeach
                    
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
    
    @if (isset($metadata['operation']['roles']) && count($metadata['operation']['roles']) > 0)
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                
                @foreach ($metadata['operation']['roles'] as $role)
                    @switch($role['action'])
                        @case('create')

                            <a href="/admin/{{ $metadata['prefix'] }}/create"><button type="button" class="btn btn-bordered-primary waves-effect  width-md waves-light">Thêm mới</button></a>            

                            @break
            
                    @endswitch
                @endforeach
                
            </div>
        </div>
    </div> 
    @endif
</div>

@endsection

@section('css')
    <!-- third party css -->
    <link href="{{ asset('assets/admin/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->
@endsection



@section('javascript')
    <!-- Vendor js -->
    <script src="{{ asset('assets/admin/js/vendor.min.js') }}"></script>

    <!-- third party js -->
    <script src="{{ asset('assets/admin/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{ asset('assets/admin/js/pages/datatables.init.js') }}"></script>

@endsection