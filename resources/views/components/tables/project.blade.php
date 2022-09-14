<section>
    <table class="table mt-3">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Owner</th>
        <th scope="col">Progress</th>
        @role('admin')
        <th scope="col">Actions</th>
        @endrole
        </tr>
    </thead>
    <tbody>
        @foreach ( $projects as $project)
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $project->name }}</td>
            <td>{{ $project->owner }}</td>
            <td>{{ $project->progress }}%</td>             
            @role('admin')               
            <td>
                <a href="{{ route('project.show', $project->id) }}" class="btn btn-primary">
                    Lihat
                </a>
            </td>
            @endrole
            </tr>
        @endforeach
    </tbody>
    </table>
</section>