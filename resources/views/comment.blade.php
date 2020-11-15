<div class="d-flex justify-content-center">
<div class="col-10">
<h3>Комментарии:</h3>
<br>
<ul class="list-unstyled">
@if(count($comments)>0)
@foreach($comments as $comment)
  <li class="media">
    <div class="media-body">
      <h5 class="mt-0 mb-1">Тема: {{$comment->subject}}</h5>
      <p><b>Комментарий:</b> {{$comment->body}}</p>
      <i>Дата: {{$comment->created_at}}</i>
      <hr>
    </div>
  </li>
@endforeach
@else
    
<i>Комментариев пока нет.</i>    

@endif
</ul>
 
</div>
</div>
