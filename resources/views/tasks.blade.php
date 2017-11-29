@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Tasks</div>

                <div class="panel-body">
                @include('error')
                    <form class="form-horizontal"action="{{route('tasks.store')}}" method="post">

                        <div class="form-group{{$errors->has('name') ? 'has-error': ''}}">
                            <label for="name" class="col-sm-3 control-lable">Task</label>
                               <div class="col-sm-6">
                               <input class="form-control" type="text" name="name" id="name" />
                               <div class="help-block">
                                   Name is required
                               </div> 
                            </div>
                        </div>
                     <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                           <button class="btn btn-default" type="submit">Add Tasks</button> 
                        </div> 
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>

     <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Current Tasks</div>

                <div class="panel-body">
                @if($tasks->count())
                 <table class="table table-striped">
                   <thead>
                     
                     <th>Tasks</th>
                     <th>&nbsp;</th>
                   </thead>
                   <tbody>
                   @foreach($tasks as $task)
                      <tr>
                       <td>
                         {{$task->name}}
                       </td>
                       <td>
                         <form action="{{ route('tasks.destroy' , $task->id) }}" method="post">
                           <button type="submit" class="btn btn-danger">
                             Delete
                           </button>
                           {{method_field('DELETE')}}
                           {{csrf_field()}}
                         </form>
                       </td>
                     </tr>   
                   @endforeach
                     
                   </tbody>
                 </table>

                  @else
                  <p>You have no tasks currentlty</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
