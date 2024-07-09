@extends('dashboard')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Gestion des utilisateurs</h2>
        </div>
        <a href="{{ route('users.create') }}" class="btn btn-secondary float-end"><i class="bi bi-plus-square-fill"></i>Créer un nouvel utilisateur</a>
        
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   {{--  <th>No</th>  --}}
   <th>Nom</th>
   <th>Email</th>
   <th>Rôles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    {{--  <td>{{ ++$i }}</td>  --}}
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge rounded-pill bg-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Voir</a>
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Modifier</a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}

@endsection
 

