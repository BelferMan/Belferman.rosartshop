@extends('cms/master_cms')
@section('cms_main_section')
<h1>Orders</h1>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <table class="table">
                <thead>
                    <th>Information</th>
                    <th>Order info</th>
                    <th>Price</th>
                    <th>Date</th>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>
                            <ul>
                                @foreach(unserialize($order['data']) as $data)
                                <li>{{$data}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach(unserialize($order['order_details']) as $dataDetails)
                                <li>Product: {{$dataDetails['name']}}</li>
                                <li>Price: ${{$dataDetails['price']}}</li>
                                <li>Quantity: {{$dataDetails['quantity']}}</li>
                                <hr>
                                @endforeach
                            </ul>
                        </td>
                        <td>${{$order['total']}}</td>
                        <td>{{date('d/m/Y - H:i',strtotime($order['updated_at']))}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
