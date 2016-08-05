@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">留言板</div>
				 <form class="form-horizontal" role="form" method="POST" action="{{ url('/comment') }}">{{ csrf_field() }}
                <div class="panel-body">
                    <textarea style="margin-left:25px;"  rows="7" cols="120"  name="content" /></textarea>
                     <button style="margin-left:25px;" type="submit" class="btn btn-primary">
                     	<i  class="fa fa-btn "></i> 留言
                                </button>
                </div>
               	</form>
            <div style="margin-top:50px; ;" class="panel panel-default">    
                <div class="panel-body">
                	<?php $id=0 ?>
             		@forelse($comments as $comments1)            			
             			           			
    						<p style="font-size: 15px;color:cornflowerblue"> {{ $comments1->name }}
    						 	<span style="font-size:14px;color:#666666;margin-left:8px;">{{$comments1->created_at}}</span></p>
    						<p style="font-size:20px;">{{$comments1->content}}</p>
    						@forelse($commentss as $comments2)
    							@if($comments2->lastid==$comments1->id)
    								<div style="border: dashed 1px #B0BEC5;margin-left:20px ;margin-top:10px ;"><p style="margin-left:10px;font-size: 13px;color:cornflowerblue"> {{ $comments2->name }}
    						 			<span style="font-size:14px;color:#666666;margin-left:8px;">{{$comments2->created_at}}</span></p>
    									<p style="margin-left:40px;font-size:18px;">{{$comments2->content}}</p>
    								</div>
    								
    							@endif
    						@empty
    							
    						@endforelse
    							<form method="post" action="{{ url('/comment1') }}">{{ csrf_field() }}
    							<div class="remark[]" style="display: none;margin-top:20px; ;" >
    							<textarea style="margin-left:45px;"  rows="4" cols="115"  name="remark" /></textarea>
    							<input style="display: none;" type="text" value="{{$comments1->id}}" name="lastid" />
    							<button style="margin-left:45px;" type="submit" class="btn btn-primary" name="btu[]">
                     				<i  class="fa fa-btn ">回复</i> 
                           		</button></br>
                           	</div>
                           		</form>
                           		<br/>
    							<a name="hui[]" onclick="remark({{$id++}})" style="text-align: right;color: red;" href="javascript:void(0)">回复</a>
    						<hr/>   						
    					
					@empty
    					<p>没有评论</p>
					@endforelse
						
              <div style="margin:0 auto">{!! $comments->links() !!}</div>
                </div>
                	
              </div>
            </div>
        </div>
    </div>
</div>

<script>
	function remark(id){
		var id=id;
		var remark=document.getElementsByClassName("remark[]");
		var hui=document.getElementsByName("hui[]");
		if(remark[id].style.display=="none"){
			
			remark[id].style.display="block";			
			hui[id].innerHTML="收起";
		}
		else{
			
			remark[id].style.display="none";
			hui[id].innerHTML="回复";
		}

	}
</script>
@endsection
