@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Authors</div>
					<div class="panel-body">
						@if($authors->count() > 0)
							<table class="table">
								<tr>
									<th>ID</th>
									<th>Firstname</th>
									<th>Lastname</th>
									<th>Birthday</th>
									<th>Slug</th>
								</tr>
@foreach($authors as $author)
    <tr>
        <td>{{ $author->id }}</td>
        <td>{{ $author->firstname }}</td>
        <td>{{ $author->lastname }}</td>
        <td>{{ $author->birthday }}</td>
        <td>{{ $author->slug }}</td>
        <td>
            <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
                <a type="button" class="btn btn-default" href="{{ route('authors.edit', $author->id) }}">edit</a>
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">delete</button>
            </form>
        </td>
    </tr>
@endforeach
							</table>
						@else
							No authors
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection