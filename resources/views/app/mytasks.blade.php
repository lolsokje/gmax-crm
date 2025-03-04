@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

<div class="col-12">





        @foreach($tasks as $task)  
        <div class="col-12 mb-3">
            <div class="card card-sm">
              <div class="ribbon ribbon-top ribbon-bookmark {{$task->type}}">
                @if($task->status==1)
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-loader" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <line x1="12" y1="6" x2="12" y2="3"></line>
                  <line x1="16.25" y1="7.75" x2="18.4" y2="5.6"></line>
                  <line x1="18" y1="12" x2="21" y2="12"></line>
                  <line x1="16.25" y1="16.25" x2="18.4" y2="18.4"></line>
                  <line x1="12" y1="18" x2="12" y2="21"></line>
                  <line x1="7.75" y1="16.25" x2="5.6" y2="18.4"></line>
                  <line x1="6" y1="12" x2="3" y2="12"></line>
                  <line x1="7.75" y1="7.75" x2="5.6" y2="5.6"></line>
               </svg>
                @else 
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checks" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 12l5 5l10 -10"></path>
                  <path d="M2 12l5 5m5 -5l5 -5"></path>
               </svg>
                @endif
              </div>
              <div class="card-body">
                @if($task->status==1)<a href="{{ route('tasks.show', [ $task ]) }}"> <h3 class="card-title">Project Name - Case ID #{{$task->id}}</h3></a> @else
                <a href="{{ route('tasks.show', [ $task ]) }}">  <s> <h3 class="card-title">Project Name - Case ID #{{$task->id}}</h3></a> </s> @endif

             
                <div class="text-muted">{{$task->task}}</div>
                <div class="mt-4">
                  <div class="row">
                    <div class="col">
                      <div class="avatar-list avatar-list-stacked">
                        @if($task->assignedto)                          
                       <span class="avatar  rounded-circle" data-toggle="tooltip" data-placement="bottom" style="background-image: url({{$task->assigned->profile_photo_url}})" title="Assigned to : {{$task->assigned->name}} "></span>                      
                         @endif
                   
                       
                      </div>
                    </div>
                    <div class="col-auto text-muted">
                        <div class="spinner-grow {{$task->type}}" style="height: 12px; width:12px; padding-top: -15px" role="status"></div>
                 
                    </div>
                    <div class="col-auto">
                      <a href="#" class="link-muted"><!-- Download SVG icon from http://tabler-icons.io/i/message -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"></path><line x1="8" y1="9" x2="16" y2="9"></line><line x1="8" y1="13" x2="14" y2="13"></line></svg>
                       {{$task->updates->count()}}</a>
                    </div>
                    <div class="col-auto">
                      <form method="post" action="{{ route('projects.tasks.destroy', [ $task->project, $task ]) }}" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="text-muted">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="4" y1="7" x2="20" y2="7" />
                            <line x1="10" y1="11" x2="10" y2="17" />
                            <line x1="14" y1="11" x2="14" y2="17" />
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                          </svg>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          @endforeach

      
        {{ $tasks->links() }}
    </div>



    
	  <script>
      function advancedsearch() {
        var x = document.getElementById("advancedsearch");
        if (x.style.display === "none") {
        x.style.display = "block";
        } else {
        x.style.display = "none";
        }
      }



      </script>

@endsection
