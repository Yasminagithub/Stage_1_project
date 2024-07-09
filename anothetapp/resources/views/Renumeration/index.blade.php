@extends('dashboard')

@section('title')
    Page Index
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
                        <h4>Liste des rémunérations des employés
                            <a href="{{route('Employe.index')}}" class="btn btn-primary float-end">Retour</a>
                        @can('Remuneration-create')
                            <a href="{{route('Renumeration.create')}}" class="btn btn-secondary float-end"><i class="bi bi-plus-square-fill"></i>Ajouter Rémunération d'employé</a>
                        @endcan
                        </h4>

                        <br>
                        <br>
                        <table class="table" id="myTable">
                            <thead class="table-success">
                                <tr>
                                    <th>Nom d'employé</th>
                                    <th>Prénom d'employé</th>
                                    <th>Profession d'employé</th>
                                    <th>Type de rémunération</th>
                                    <th>Valeur de rémunération</th>
                                    <th>Date de rémunération</th>
                                    <th>Opérations</th>
                                </tr>
                            </thead>
                            <tbody id="yaya">
                                @foreach($renumerations as $item)
                                    <tr>
                                        <td>{{$item->employe->Nom_employe}}</td>
                                        <td>{{$item->employe->Prenom_employe}}</td>
                                        <td>{{$item->employe->Profession}}</td>
                                        <td>{{$item->Type_renumeration}}</td>
                                        <td>{{$item->Valeur_renumeration}}</td>
                                        <td>{{$item->Date_renumeration}}</td>

                                        <td>
                                        @can('Remuneration-edit')
                                            <a class="btn btn-primary" href="{{route('Renumeration.edit',$item->id)}}" role="button">Modifier</a>
                                        @endcan
                                        @can('Remuneration-list')    
                                            <a class="btn btn-warning" href="{{route('Renumeration.show',$item->id)}}" role="button"><i class="bi bi-eye-fill"></i>Voir</a>
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
