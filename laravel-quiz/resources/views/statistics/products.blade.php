@extends('layouts.app')

@section('content')

<div class="container">

    <div class="table-name">
        Product table
        <button onclick="excel_export()" class="btn btn-primary" id="excel_expotr">Export</button>
        <a class="btn btn-success" href="/excel/products.xlsx" id="excel_download_btn">Download last</a>
    </div>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">User name</th>
            <th scope="col">PZS kod</th>
            <th scope="col">Category name</th>
            <th scope="col">Product name</th>
            <th scope="col">Product brand</th>
            <th scope="col">Počet Face-kategória-120-180 cm (úroveň očí)</th>
            <th scope="col">Počet Face kategória-(mimo úroveň očí)</th>
            <th scope="col">Počet Face( druhotné vystavenie)</th>
            <th scope="col">Druhotné vystavenie (krátkodobé, dlhodobé)</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($marks as $mark)
                <tr>
                    <td scope="col">{{$mark->user->name}}</td>
                    <td scope="col">{{$mark->pharmacy->pzs_kod}}</td>
                    <td scope="col">{{$mark->product->category->name}}</td>
                    <td scope="col">{{$mark->product->title}}</td>
                    <td scope="col">{{$mark->product->brand}}</td>
                    <td scope="col">{{$mark->mark_1}}</td>
                    <td scope="col">{{$mark->mark_2}}</td>
                    <td scope="col">{{$mark->mark_3}}</td>
                    <td scope="col">{{$mark->mark_4}}</td>
                </tr>
            @endforeach
                {{-- <tr>
                    <td scope="col">Name</td>
                    <td scope="col">Kod</td>
                    <td scope="col">Name</td>
                    <td scope="col">Name</td>
                    <td scope="col">Brand</td>
                    <td scope="col">1</td>
                    <td scope="col">2</td>
                    <td scope="col">4</td>
                    <td scope="col">0</td>
                </tr>
                <tr>
                    <td scope="col">Name</td>
                    <td scope="col">Kod</td>
                    <td scope="col">Name</td>
                    <td scope="col">Name</td>
                    <td scope="col">Brand</td>
                    <td scope="col">1</td>
                    <td scope="col">3</td>
                    <td scope="col">4</td>
                    <td scope="col">0</td>
                </tr> --}}

        </tbody>
      </table>
</div>
</div>

<script>

    function excel_export()
    {
        fetch('/api/excel-export', {
        method: 'POST', // или 'PUT'
  })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                if(data.status === 'ok')
                {
                    document.getElementById('excel_download_btn').click()
                }

            });

    }
</script>

@endsection
