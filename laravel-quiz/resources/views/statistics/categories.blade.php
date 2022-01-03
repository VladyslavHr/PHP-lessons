@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="table-name">
            Category table
            <button onclick="excel_export_cat()" class="btn btn-primary" id="excel_expotr_cat">Export</button>
            <a class="btn btn-success" href="/excel/cat.xlsx" id="excel_download_btn_cat">Download last</a>
        </div>
        <table class="table table-striped">
            <thead>
              <tr>
                {{-- <th scope="col">Images</th> --}}
                <th scope="col">User name</th>
                <th scope="col">PZS kod</th>
                <th scope="col">Category name</th>
                <th scope="col">Počet Face-kategória-120-180 cm (úroveň očí)</th>
                <th scope="col">Počet Face kategória-(mimo úroveň očí)</th>
                <th scope="col">Počet Face( druhotné vystavenie)</th>
                <th scope="col">Druhotné vystavenie (krátkodobé, dlhodobé)</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($marks as $mark)
                    <tr>
                        {{-- <td scope="col"><img class="table-image" src="{{ asset('/images/no-image.jpg') }}" alt=""></td> --}}
                        <td scope="col">{{$mark->user->name}}</td>
                        <td scope="col">{{$mark->pharmacy->pzs_kod}}</td>
                        <td scope="col">{{$mark->category->name}}</td>
                        <td scope="col">{{$mark->mark_1}}</td>
                        <td scope="col">{{$mark->mark_2}}</td>
                        <td scope="col">{{$mark->mark_3}}</td>
                        <td scope="col">{{$mark->mark_4}}</td>
                    </tr>
                @endforeach
              {{-- <tr>
                <td scope="col"><img class="table-image" src="{{ asset('/image/no-image.jpg') }}" alt=""></td>
                <td scope="col">Name</td>
                <td scope="col">Kod</td>
                <td scope="col">Name</td>
                <td scope="col">1</td>
                <td scope="col">0</td>
                <td scope="col">4</td>
                <td scope="col">0</td>
              </tr>
              <tr>
                <td scope="col"><img class="table-image" src="{{ asset('/image/no-image.jpg') }}" alt=""></td>
                <td scope="col">Name</td>
                <td scope="col">Kod</td>
                <td scope="col">Name</td>
                <td scope="col">1</td>
                <td scope="col">1</td>
                <td scope="col">4</td>
                <td scope="col">0</td>
              </tr> --}}
            </tbody>
          </table>
    </div>

    <script>

        function excel_export_cat()
        {
            fetch('/api/excel-export-cat', {
            method: 'POST', // или 'PUT'
      })
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    if(data.status === 'ok')
                    {
                        document.getElementById('excel_download_btn_cat').click()
                    }

                });

        }
    </script>

@endsection
