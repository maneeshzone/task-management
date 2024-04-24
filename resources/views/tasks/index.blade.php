<x-layout>

<div class="container">
  <h2>Tasks</h2>   

  <x-navbar :projects="$projects" :project="$project" />  

  <x-status />
           
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Priority</th>
        <th>Created</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="sortable">
      @forelse ($tasks as $task)
        <tr class="ui-state-default" task="{{ $task->id }}">
          <td><span class="ui-icon ui-icon-arrowthick-2-n-s"></span> {{ $task->name }}</td>
          <td>{{ $task->priority }}</td>
          <td>{{ $task->created_at }}</td>
          <td>
            <a href="{{ route('tasks.edit', ['task' =>  $task->id]) }}">Edit</a>
            <a href="javascript:void(0);" onclick="if (confirm('Are you sure?') == true) { document.getElementById('delete-task-{{ $task->id }}').submit(); }">Delete</a>
            <form action="{{ route('tasks.destroy', ['task' =>  $task->id]) }}" id="delete-task-{{ $task->id }}" method="POST">
                @csrf
                @method('DELETE')
            </form>
        </td>
        </tr>        
      @empty
        <p>No tasks</p>
      @endforelse
    </tbody>
  </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#sortable" ).sortable({
      update: function( event, ui ) {   
          $.ajax({
            method: "PATCH",
            url: '/tasks-priority-update',
            data: { 
              'priority': $( "#sortable" ).sortable( "toArray", { attribute : "task" } ), 
              '_token': $('meta[name="csrf-token"]').attr('content') 
            },
            error: function(xhr, status, error) {
              alert('error');
            }              
          })
      }
    });
    
  } );
 </script>  
</x-layout>
