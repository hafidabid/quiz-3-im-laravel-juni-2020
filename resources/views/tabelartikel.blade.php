@extends('layouts/master')

@section('kontainer')
<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 109px;">Judul</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 171px;">Release date</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 31px;">Update date</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 31px;"><a href="/artikel/create" class="btn btn-primary btn-block">Create new article</a></th>
                 </thead>
                  
                  <tbody>
                    @foreach($listartikel as $li)
                  <tr role="row" class="odd">
                      <td class="sorting_1">{{$li->judul}}</td>
                      <td>{{$li->created_at}}</td>
                      <td>{{$li->updated_at}}</td>
                      <td><a href="#" class="btn btn-google btn-block">open</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
@endsection