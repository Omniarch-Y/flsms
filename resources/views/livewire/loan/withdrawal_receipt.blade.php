@extends('layouts.app')

@section('content')

{{-- <div>
    <h1>adadasda</h1>
    @foreach($data as $data)
    <h1>{{$data}}</h1>
    @endforeach
</div> --}}

<style>

    .card{
      padding-bottom:0px;
        width:20%;
        margin-top: 30px;
        background:#f0f0f0;
        font-family: 'Helvetica Neue',Helvetica,Arial;
  
    }
    h4{
        margin-top: 20px;
    }
  
    #container {
    display: flex;
    justify-content: space-between;
    }
  
  </style>
  <div class="card container text">
  <strong>    
              @if ($message = Session::get('error'))
              <div class="alert alert-danger center_text">
                  <h4>{{ $message }}</h4>
              </div>
             @endif    
              </strong>
    <form action="{{url('/changeStatus')}}" method="POST">
      @csrf
    <h4 class="text-center">LOAN RECEIPT</h4>
    <div class="text-center">FLSMS</div>
    <div class="text-center">WEE WE BORROWED</div>
    <div class="text-center">Tel :0987654321</div>
    <div class="text-center mt-3">RECIPT :</div>
    {{-- @foreach ($informations as $information)
    <div class="text-center">DATE :{{$information->created_at->format('Y-m-d') }}</div>
    @endforeach --}}
    <div class="text-center">DATE :</div>
    <div class="text-center mb-1">CASHER :{{auth()->user()->name}}</div>
    <div class="dot">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
    {{-- @foreach ($data as $data) --}}
   
    <div id="container"> 
      <div class="item">{{$data->id}}</div>
      <div class="price">{{$data->amount}}Br</div>
    </div>
    {{-- @endforeach --}}
    <div class="e">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
    <div id="container"> 
   <div class="x">TAXABLE</div>
      <div class="priceView">Br</div>
    </div>
    <div id="container">
      <div class="x">VAT15%</div>
      <div class="priceView">Br</div>
    </div>
    <div id="container">
      <strong class="price">TOTAL</strong>
      <strong class="priceView">Br</strong>
    </div>
    <div class="dot">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
    <div id="container"> 
      <div class="Cash">CASH:</div>
      <div class="cashView">Br</div>
    </div>
    <div class="dot">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
    <div class="PaidWith">Paid with CASH</div>
    <div class="dot">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
    <div class="dot">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
    <div class="text-center">THANK YOU</div>
    <div class="text-center">HAVE A NICE DAY</div>
  </div>
  </form>

@endsection