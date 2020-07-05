@extends('layouts/master')

@section('kontainer')

    <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">{{$anArtikel->judul}}</h6>
                </div>

                <div class="card-header py-3">
                <form action="/artikel/{{$anArtikel->id}}" method="post">
                  <a href="/artikel/{{$anArtikel->id}}/edit" class="btn btn-primary">Edit</a>
                  {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="delete" id="delete" value="delete" />
                  <button type="submit" class="btn btn-danger">Delete</a>
                    </form>
                </div>
                
                <div class="card-body">
                <div class="text-xs">
                <h6>slug = {{$anArtikel->slug}}</h6>
                <h6>last update = {{$anArtikel->updated_at}}</h6><br></div>
                
                  
                  <p>{{$anArtikel->isi}}</p>

                @foreach($tagslist as $l)
                  <a href="#" class="btn btn-success">{{$l}}</a>
                @endforeach
                </div>
              </div>

@endsection