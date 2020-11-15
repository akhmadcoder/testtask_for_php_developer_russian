@extends('layouts.master')
@section('title', 'статья')
@section('content')

<div class="container-fluid">

<center><h3>{{$article->title}}</h3></center>

    <div class="row d-flex justify-content-center">
        <div class="card" style="width: 40rem;">
            <center><img class="card-img-top" src="{{asset('/images/' . $article->image)}}" style="width:400px;" alt="Card image cap"></center>
            <div class="card-body">
                <p class="card-text">{{$article->description}}</p>
                <input type="hidden" id="article_id" data-article_id="{{$article->id}}" >
            </div>
        </div>
    </div>


<div class="row d-flex justify-content-center">
    <div class="col-3 py-md-3 pl-md-5 bd-content">
    Tags:   @foreach($article->tags as $tag)
                <button type="button" class="btn btn-sm btn-outline-secondary">{{$tag->name}}</button>
            @endforeach
    </div>
    
    <div class="col-2 py-md-3 pl-md-5 bd-content">
    Views: {{$views}}  
    </div>
    
    <div class="col-2 py-md-3 pl-md-5 bd-content">
    Likes: <span id="likes_id">{{$likes}}</span>
           <a href="#" type="button" class="like-article btn btn-sm btn-outline-info">Like</a>
    </div>
    
</div>

<div id="comments_div">

</div>

<h3 class="col-10 d-flex justify-content-center">Добавить новый комментарий:</h3>

<div id="add_comments" class="row col-10 d-flex justify-content-center">
    <form id="create_id">
    <div class="form-group">
        <label for="exampleFormControlInput1">Тема</label>
        <input type="text" class="form-control" style="width:200%" id="subject" name="subject">
        <span id="subject_id" class="text-danger"></span>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Ваше комментарии</label>
        <textarea class="form-control" style="width:200%"  id="body" name="body" rows="3"></textarea>
        <span id="body_id" class="text-danger"></span>
    </div>

    <button type="button" class="add-comment btn btn-primary">Добавить комментарии</button>

    </form>
</div>



</div>


@endsection
<script>

window.onload = function() {

    let articleId = $('#article_id').data("article_id");
    $('#comments_div').load('/comments/'+articleId);
};

document.addEventListener('DOMContentLoaded', function () {
    // Your jquery code
    $(".like-article").click(function(event){
    
        event.preventDefault();
        let articleId = $('#article_id').data("article_id");
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "/../api/likearticle",
            type:"GET",
            dataType: 'json',
            data:{
                article_id:articleId,
                _token: _token
            },
            success:function(response){
    
                console.log(response);
                if(response) {
                    document.getElementById("likes_id").innerHTML = response.likes;
                }
            },
        });

    });

});

document.addEventListener('DOMContentLoaded', function () {
    // Your jquery code
    $(".add-comment").click(function(event){
        event.preventDefault();
        let subject = $('#subject').val();
        let body = $('#body').val();
        let articleId = $('#article_id').data("article_id");
        let _token   = $('meta[name="csrf-token"]').attr('content');
        let subject_span = document.getElementById("subject_id");
        let body_span = document.getElementById("body_id");

        $.ajax({
            url: "/../api/addcomment",
            type:"GET",
            dataType: 'json',
            data:{
                subject:subject,
                body:body,
                article_id:articleId,
                _token: _token
            },
            success:function(response){

                let articleId = $('#article_id').data("article_id");
        
                console.log("kuku: "+articleId)
    
                if(response) {
                    $('#comments_div').load('/comments/'+articleId);

                    $('#subject').val("");
                    $('#body').val("");
                    subject_span.innerHTML = "";
                    body_span.innerHTML = ""; 
                }
            },
            error: function(response){
                if(response.responseJSON.errors.subject[0]!==null){
                    subject_span.innerHTML = response.responseJSON.errors.subject[0]; 
                } 

                if(response.responseJSON.errors.body[0]!==null){
                    body_span.innerHTML = response.responseJSON.errors.body[0]; 
                } 
            },

        });
        
        
    });

});

</script>



