@extends('layouts.app')

@section('content')

<div class="container">
    <div class="table-name">
        Category table
    </div>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Images</th>
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
          <tr>
            <td scope="col"><img class="table-image" src="{{ asset('/images/no-image.jpg') }}" alt=""></td>
            <td scope="col">Name</td>
            <td scope="col">Kod</td>
            <td scope="col">Name</td>
            <td scope="col">2</td>
            <td scope="col">3</td>
            <td scope="col">0</td>
            <td scope="col">0</td>
          </tr>
          <tr>
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
          </tr>
        </tbody>
      </table>

      <div class="table-name">
        Product table
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
          <tr>
            <td scope="col">Name</td>
            <td scope="col">Kod</td>
            <td scope="col">Name</td>
            <td scope="col">Name</td>
            <td scope="col">Brand</td>
            <td scope="col">2</td>
            <td scope="col">3</td>
            <td scope="col">0</td>
            <td scope="col">0</td>
          </tr>
          <tr>
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
          </tr>
        </tbody>
      </table>
</div>
</div>

@endsection
