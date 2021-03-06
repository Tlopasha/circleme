@extends("admin.translation.main")

@section("subcontent")


    {!! Form::open(["url" => URL::action("Admin\TranslationController@storeValidation")]) !!}
    {!! Form::submit(trans("admin.save"), ["class" => "btn btn-success"]) !!}
    <div class="row">
        <div class="col-md-8 col-xs-12">
            <br/>

            @if(Session::has("message"))
                <div class="alert alert-success">
                    {{ Session::get("message") }}
                </div>
            @endif

            <br/>
            @foreach($control as $key => $value)
                <div class="row">
                    @if(!is_array($value))
                        <div class="col-md-5 col-xs-6">
                            <label for="">{{ $value }}</label>
                        </div>
                        <div class="col-md-7 col-xs-6">
                            <div class="form-group">
                                {!! Form::text($key, $lang[$key], ["class" => "form-control"]) !!}
                            </div>
                        </div>
                    @elseif(is_array($value))

                        @foreach($value as $k => $v)
                            @if(!$k == "custom")
                                <div class="col-md-5 col-xs-6">
                                    <label>{{ $v }}</label>
                                </div>
                                <div class="col-md-7 col-xs-6">
                                    <div class="form-group">
                                        {!! Form::text($key . "-" . $k, $lang[$key][$k], ["class" => "form-control"]) !!}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
                <hr style="margin: 0 0 15px;"/>
            @endforeach
        </div>
    </div>
    {!! Form::submit(trans("admin.save"), ["class" => "btn btn-success"]) !!}

    {!! Form::close() !!}

@endsection