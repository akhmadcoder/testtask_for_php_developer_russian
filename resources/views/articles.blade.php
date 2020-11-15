@extends('layouts.master')
@section('title', 'статья')
@section('content')

<center><h1>Каталог статей</h1></center>

<div class="row d-flex justify-content-center">
    <div class="col-10 py-md-3 pl-md-5 bd-content">
    <table class="table">
        <thead>
            <tr>
            <th scope="col"># id</th>
            <th scope="col">название</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{$article['id']}}</td>
                <td>{{$article['title']}}</td>
                <td>
                <!-- <a href="{{ route('articles', ['article' => $article['id']])}}" class="btn btn-sm btn-outline-info"> Посмотреть </a> -->
                <a href="articles/{{$article['id']}}" class="btn btn-sm btn-outline-info"> Посмотреть </a>
                
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        <ul class="pagination">
            {{ $articles->links() }}
        </ul>
    
    </div>
</div>



@endsection