@extends('layouts/master')

@section('kontainer')
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Article!</h1>
              </div>
              
              <form class="user" action="/artikel/{{$anArtikel->id}}" method="post">
              {{csrf_field()}}
              {{ method_field('PUT') }}
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" value="{{$anArtikel->judul}}">
                  </div>
                </div>
                <div class="form-group">
                <textarea class="form-control" rows="3" id="isi" name ="isi" placeholder="isi blog anda ...">{{$anArtikel->isi}}</textarea>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control" id="tags" name="tags" value = "{{$anArtikel->tag}}" placeholder="Tags (separate with comma ex: food,travel,drink)">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Submit Article
                </button>
                <hr>
                <a href="/artikel/{{$anArtikel->id}}" class="btn btn-google btn-user btn-block">
                   cancel edit
                </a>
                
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.html">Already have an account? Login!</a>
              </div>
            </div>
@endsection