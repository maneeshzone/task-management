<x-layout>

<div class="container">
  <h2>Create Task</h2>

  <x-status />
      
  <form action="{{ route('tasks.store') }}" method="POST">
    @method('post')
    @csrf
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ old('name') }}" required>
    </div>
    <div class="form-group">
        <label for="project_id">Select list:</label>
        <select class="form-control" id="project_id" name="project_id" required>
          <option value="">Select Project</option>
          @foreach($projects AS $project)
            <option value="{{ $project->id }}" @selected(old('project_id') == $project->id)>{{ $project->name }}</option>
          @endforeach
        </select>
    </div>    
    <div class="form-group">
      <label for="priority">Priority:</label>
      <input type="text" class="form-control" id="priority" placeholder="Enter priority" name="priority" value="{{ old('priority') }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</x-layout>
