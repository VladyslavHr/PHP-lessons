@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="table-name">
            Category table
            <button onclick="excel_export_cat()" class="btn btn-primary" id="excel_expotr_cat">Export</button>
            <a class="btn btn-success" href="/excel/cat.xlsx" id="excel_download_btn_cat">Download last</a>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    {{-- <th scope="col">Images</th> --}}
                    <th scope="col">User name</th>
                    <th scope="col">PZS kod</th>
                    <th scope="col">Location</th>
                    <th scope="col">Category name</th>
                    <th scope="col">Počet Face-kategóry celkem</th>
                </tr>
                </thead>
                <tbody class="col">
                    @foreach ($marks as $mark)
                        <tr>
                            {{-- <td scope="col"><img class="table-image" src="{{ asset('/images/no-image.jpg') }}" alt=""></td> --}}
                            <td scope="col">{{$mark->user->name}}</td>
                            <td scope="col">{{$mark->pharmacy->pzs_kod}}</td>
                            <td scope="col">{{$mark->pharmacy->location}}</td>
                            <td scope="col">{{$mark->category->name}}</td>
                            <td scope="col">{{$mark->mark_1}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
