@extends('admin.layout')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-12">
                        <div class="p-2">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/company') }}" enctype="multipart/form-data">
                                @csrf
                                {{-- @method('POST') --}}

                                @foreach ($metadata['form'] as $form)
                                    @if (isset($form['type']) && $form['type'] == 'hidden' && $form['key'] == 'user_id')
                                        <input type="{{ $form['type'] }}" class="form-control" name="{{ $form['key'] }}" value="{{ auth()->user()->id }}">
                                        @continue
                                    @endif

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="simpleinput">{{ $form['name'] }}</label>
                                        <div class="col-md-10">
                                        @switch($form['component'])
                                            @case('input')

                                                <input type="{{ $form['type'] }}" class="form-control" name="{{ $form['key'] }}">
                                                    
                                                @break

                                            @case('textarea')

                                                <textarea class="form-control" rows="5" name="{{ $form['key'] }}"></textarea>

                                                @break

                                            @case('image')
                                                {{-- <div class="mb-2">
                                                    <img width="200px" src="{{ asset('storage/uploads/' . $metadata['data']->{$form['key']}) }}" alt="{{ $form['name'] }}">
                                                </div> --}}
                                                <input type="file" class="form-control" name="file-{{ $form['key'] }}">
                                                    
                                                @break
                                                
                                        @endswitch
                                        </div>
                                    </div>  
                                    
                                @endforeach
                            
                                <a href="{{ $_SERVER['HTTP_REFERER'] }}"><button type="button" class="btn btn-primary">Lui lại</button></a>
                                <button type="submit" class="btn btn-primary">Gửi</button>
                                
                            </form>
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div> <!-- end card-box -->
        </div><!-- end col -->
    </div>

</div>

@endsection
