@extends('admin.layout')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-12">
                        <div class="p-2">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/' . $metadata['prefix'] . '/' . $metadata['data']->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                @foreach ($metadata['form'] as $form)
                                    @php
                                        if (strpos($form['key'], '.')) {
                                            $arrKey = explode(".", $form['key']);
                                            $value = $metadata['data'];
                                            foreach ($arrKey as $key => $keyItem) {
                                                $value = $value->{$keyItem};
                                            }
                                        } else {
                                            $value = $metadata['data']->{$form['key']};
                                        }

                                        if (isset($form['const'])) {
                                            $value = config($form['const'])[$value];
                                        }
                                    @endphp
                                    
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="simpleinput">{{ $form['name'] }}</label>
                                        <div class="col-md-10">
                                        @switch($form['component'])
                                            @case('text')
                                                <div style="
                                                    height: 100%;
                                                    display: flex;
                                                    align-items: center;
                                                ">
                                                    <span for="" class="">{{ $value }}</span>
                                                </div>
                                                {{-- <input type="{{ $form['type'] }}" class="form-control" name="{{ $form['key'] }}" value="" {{ isset($form['read_only']) ? 'readonly' : '' }}> --}}
                                                    
                                                @break

                                            @case('input')

                                                <input type="{{ $form['type'] }}" class="form-control" name="{{ $form['key'] }}" value="{{ $value }}" {{ isset($form['read_only']) ? 'readonly' : '' }}>
                                                    
                                                @break

                                            @case('textarea')

                                                <textarea class="form-control" rows="5" name="{{ $form['key'] }}">{{ $metadata['data']->{$form['key']} }}</textarea>

                                                @break

                                            @case('image')
                                                <div class="mb-2">
                                                    <img width="200px" src="{{ asset('storage/uploads/' . $metadata['data']->{$form['key']}) }}" alt="{{ $form['name'] }}">
                                                </div>
                                                <input type="file" class="form-control" name="file-{{ $form['key'] }}">
                                                    
                                                @break

                                            @case('checkbox')

                                                <input type="checkbox" class="" name="{{ $form['key'] }}" value="1" {{ ($metadata['data']->{$form['key']} == 1) ? 'checked' : ''  }}>
                                                    
                                                @break

                                            @case('file')
                                                <div class="d-flex row align-items-center" >
                                                    <div class="col-2">
                                                        <a href="{{ asset('storage/uploads/' . $value) }}" download class="btn btn-primary btn-hover"><i class="uil uil-import"></i> Download CV</a>    
                                                    </div>
                                                    
                                                </div>

                                                <div class="d-flex row mt-2" >
                                                    <div class="col-6">
                                                        <input type="file" class="form-control" name="file-{{ $form['key'] }}">
                                                    </div>
                                                    
                                                </div>
                                            @break
                                            
                                            @case('select')
                                                <div class="row" >
                                                    <div class="col-4">
                                                        <select name="{{ $form['key'] }}" class="form-control">
                                                            <option value="">Chọn</option>  
                                                            @foreach ($form['options'] as $key => $item)
                                                                <option value="{{ $key }}"
                                                                    @if ($key == $metadata['data']->{$form['key']})
                                                                        selected
                                                                    @endif
                                                                    >{{ $item }}
                                                                </option> 
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                                

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
