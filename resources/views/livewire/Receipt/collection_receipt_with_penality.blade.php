@extends('layouts.app')

@section('content')
    <style>
        .card {
            padding-bottom: 0px;
            width: 90%;
            margin-top: 30px;
            background: #f0f0f0;
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
            <div><img src="{{ URL::asset('/image/logo.png') }}" alt="logo Pic" height="100" width="100"></div>
            <h4 class="text-center">LOAN COLLECTION RECEIPT</h4>
            <div class="text-center">FLSMS</div>
            <div class="text-center">Tel :0987654321</div>
            <div class="text-center mt-3">RECIPT NO :{{ $collection->id }}</div>

            <div class="text-center">DATE :{{ $collection->created_at }}</div>
            <div class="text-center mb-1">CASHER
                :{{ $collection->user->first_name }}{{ ' ' }}{{ $collection->user->last_name }}</div>
            <div class="dot text-center"> - - - - - - - - - - - - - - - - - - - - - - - - - - - -- - - - - - - - - - - - - -
                - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                - - - - - - - - - - - - - - - - - - - - - - - </div>

            <div class="invoice-details mt25">
                <div class="well">
                    <ul class="list-unstyled mb0">
                        <li class="item"><strong>Customer Name :
                            </strong>{{ $customer->first_name }}{{ ' ' }}{{ $customer->last_name }}</li>
                        <li class="item"><strong>Customer ID : </strong>{{ $customer->id }}</li>
                        <li class="item"><strong>Loan ID : </strong>{{ $loan->id }}</li>
                        <li><strong>Taken Date:</strong> DATE :{{ date('Y-m-d') }} </li>
                        <li><strong>Status:</strong> <span class="label label-danger">collected</span></li>
                    </ul>
                </div>
            </div>
            <div class="dot text-center">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                - - - - - - - - - - - - - - - - - - - </div>
            <div id="container">
                <div class="x">Reciept ID </div>
                <div class="priceView">{{ $collection->id }}</div>
            </div>
            <div id="container">
                <div class="x">Late By </div>
                <div class="priceView">{{$penality->late_by}} days</div>
            </div>
            <div id="container">
                <div class="x">Penality</div>
                <div class="priceView">{{$penality->amount}} Br</div>
            </div>
            <div id="container">
                <strong class="price">Colected amount</strong>
                <strong class="priceView">{{ $collection->amount }} Br</strong>
            </div>
            <div class="dot text-center">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -- - - - - - - - - - - - - - - - -
                - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                - - - - - - - - - - - - - - - - - -</div>
            <div id="container">
                <div class="Cash">Total Collection:</div>
                <div class="cashView strong">{{ $collection->amount + $penality->amount}} Br</div>
            </div>
            <div class="dot text-center">- - - - - - - - - - - - - - - - - - - - - - - - - - - - -- - - - - - - - - - - - - - - - - -
                - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                - - - - - - - - - - - - - - - - - - </div>
            <div class="PaidWith text-center">Paid with CASH</div>
            <div class="dot text-center">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
            <div class="dot text-center">- - - - - - - - - - - - - - - - - - - - - - - - -- - - - - - - - - - - - - - - - -
                - - - - - - - - -</div>
            <div class="text-center">THANK YOU</div>
            <div class="text-center">HAVE A NICE DAY</div>
    </div>
    </form>
@endsection
