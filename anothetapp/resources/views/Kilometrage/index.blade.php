@extends('dashboard')

@section('title')
    Page Index Kilometrage
@endsection

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session('message'))
                  <h4 class="alert alert-success">{{session('message')}}</h4>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Liste des kilomatrage des materiels de transport
                            <a href="{{route('Transport.index')}}" class="btn btn-primary float-end">Retour</a>
                          @can('Kilomatrage-create')
                            <a href="{{route('Kilometrage.create')}}" class="btn btn-secondary float-end"><i class="bi bi-plus-square-fill"></i>Ajouter kilométrage du materiel de transport</a>
                           @endcan
                        </h4>

                        <br>
                        <br>
                        <table class="table" id="myTable">
                            <thead class="table-success">
                                <tr>
                                    <th>Immmatriculation  du materiel de transport</th>
                                    <th>kilométrage</th>
                                    <th>Date de kilométrage</th>
                                    <th>Heure de kilométrage</th>
                                    <th>Commentaire de kilométrage</th>
                                    <th>Opération</th>
                                </tr>
                            </thead>
                            <tbody id="yaya">
                                @foreach($kilometrages as $item)
                                    <tr>
                                        <td>{{$item->transport->Immatriculation}}</td>
                                        <td>{{$item->Kilometrage}}</td>
                                        <td>{{$item->Date_Kilometrage}}</td>
                                        <td>{{$item->Heure_Kilo}}</td>
                                        <td>{{$item->Commentaire_Kilometrage}}</td>
                                        <td>
                                        @can('Kilomatrage-edit')
                                            <a class="btn btn-primary" href="{{route('Kilometrage.edit',$item->id)}}" role="button">Modifier</a>
                                        @endcan
                                        @can('Kilomatrage-list')
                                            <a class="btn btn-warning" href="{{route('Kilometrage.show',$item->id)}}" role="button"><i class="bi bi-eye-fill"></i>Voir</a>
                                        @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
