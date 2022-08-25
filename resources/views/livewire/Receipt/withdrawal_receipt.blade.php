@extends('layouts.app')

@section('content')
    {{-- <div>
    <h1>adadasda</h1>
    @foreach ($loan as $loan)
    <h1>{{$loan}}</h1>
    @endforeach
</div> --}}

    <style>
        .card {
            padding-bottom: 0px;
            width: 90%;
            margin-top: 30px;
            background: #eee;
            font-family: 'Helvetica Neue', Helvetica, Arial;

        }

        h4 {
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
        <form action="{{ url('/changeStatus') }}" method="POST">
            @csrf
            <img src="{{URL::asset('/image/logo.png')}}" alt="profile Pic" height="200" width="200">
            <h4 class="text-center">LOAN RECEIPT</h4>
            <div class="text-center">FLSMS</div>
            <div class="text-center">{{ $loan->first_name}}</div>
            <div class="text-center">Tel :0987654321</div>
            <div class="text-center mt-3">RECIPT :</div>
            {{-- @foreach ($informations as $information)
    <div class="text-center">DATE :{{ date("Y-m-d")}}</div>
    @endforeach --}}
            <div class="text-center">DATE :{{ date("Y-m-d")}}</div>
            <div class="text-center mb-1">CASHER :{{ auth()->user()->first_name}}</div>
            <div class="dot text-center"> - - - - - - - - - - - - - - - - - - - - - - - - - - - -- - - - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </div>
            {{-- @foreach ($loan as $loan) --}}
            <div class="invoice-details mt25">
                            <div class="well">
                                <ul class="list-unstyled mb0">
                                    <li class="item"><strong>Customer ID : </strong>{{ $loan->id }}</li>
                                    <li><strong>Taken Date:</strong> {{ $loan->starting_date }}</li>
                                    <li><strong>Ending Date:</strong> {{ $loan->ending_date }}</li>
                                    <li><strong>Status:</strong> <span class="label label-danger">Withdrawed</span></li>
                                </ul>
                            </div>
                        </div>
                        {{-- @endforeach --}}
            <div class="e text-center"> - - - - - - - - - - - - - - - - - - - - - - - - - - - -- - - - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </div>
            <div id="container">
                <div class="item">Total Debit</div>
                <div class="price">{{ $loan->amount }}Br</div>
            </div>
            {{-- @endforeach --}}
            <div class="e text-center"> - - - - - - - - - - - - - - - - - - - - - - - - - - - -- - - - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </div>
            <div id="container">
                <div class="x">Service Charge</div>
                <div class="priceView">{{ $loan->service_charge }}</div>
            </div>
            <div id="container">
                <div class="x">Interest applies on</div>
                <div class="priceView">{{ $loan->interest_date}}</div>
            </div>
            <div id="container">
                <strong class="price">Loan Type</strong>
                <strong class="priceView">{{ $loan->loan_type}}</strong>
            </div>
            <div id="container">
                <strong class="price">Insurance cut</strong>
                <strong class="priceView">{{ $loan->amount*0.1}}</strong>
            </div>
            <div class="dot">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
            <div id="container">
                <div class="Cash">Net loan:</div>
                <div class="cashView">{{ $loan->net_amount }}Br</div>
            </div>
            <div class="dot">- - - - - - - - - - - - - - - - - - - - - - - - - - - - -- - - - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </div>
            {{-- <div class="PaidWith text-center">Paid with CASH</div> --}}
            <div class="dot text-center">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
            <div class="dot text-center">- - - - - - - - - - - - - - - - - - - - - - - - -- - - - - - - -  - - - - - - - - - - - - - - - - - -</div>
            <div class="text-center">THANK YOU</div>
            <div class="text-center">HAVE A NICE DAY</div>
    </div>
    </form>
@endsection
