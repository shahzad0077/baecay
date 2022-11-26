@extends('frontend.layouts.front-app')
@section('title')
<title>Quiz</title>
<meta name="DC.Title" content="Login">
@endsection

@section('content')
<div class="container mt-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="jumbotron col-md-8">
            <form method="POST" action="{{ url('submitquiz') }}" >
                 {{ csrf_field() }}
                <h1 id="register">Please Fill this Form</h1>
                @foreach($data as $r)
                <div class="tab">
                    <h6>{{ $r->name }}</h6>
                


                    @if($r->type == 'text')
                    <input class="form-control" @if($r->isrequired == 'yes') required @endif placeholder="{{ $r->name }}" oninput="this.className = ''" name="{{ $r->id }}">
                    @endif

                    @if($r->type == 'radio')
                    @foreach(DB::table('quizefields')->where('quiz_parent' , $r->id)->get() as $c)
                    <input type="radio" @if($r->isrequired == 'yes') required @endif name="{{ $r->id }}" oninput="this.className = ''" 
                    value="{{ $c->name }}" > {{ $c->name }}
                    @endforeach
                    @endif
                    @if($r->type == 'checkbox')
                    @foreach(DB::table('quizefields')->where('quiz_parent' , $r->id)->get() as $c)
                    <input type="checkbox" @if($r->isrequired == 'yes') required @endif name="{{ $r->id }}" oninput="this.className = ''" 
                    value="{{ $c->name }}" > {{ $c->name }}
                    @endforeach
                    @endif
                     @if($r->type == 'textarea')
                     <textarea @if($r->isrequired == 'yes') required @endif placeholder="{{ $r->name }}" class="form-control" name=""></textarea>
                    @endif
                    
                </div>
                @endforeach
                <br>
                <div style="overflow:auto;" id="nextprevious">
                    <div style="float:right;"> 
                        <button class="btn btn-primary" type="submit">Submit</button> 
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection