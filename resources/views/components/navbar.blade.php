<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
<form class="form-inline" action="{{ route('tasks.index') }}">
    <select class="form-control mr-sm-2" name="project">
    <option value="">Select Project</option>
    @foreach($projects AS $p)
        <option value="{{ $p->id }}" @selected($p->id == $project)>{{ $p->name }}</option>
    @endforeach
    </select>      
    <button class="btn btn-success" type="submit">Search</button>
</form>
<ul class="navbar-nav">
    <li class="nav-item">
    <a class="nav-link" href="{{ route('tasks.create') }}">Create</a>
    </li>
</ul>    
</nav> 