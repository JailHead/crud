@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div>
                <h2 class="text-white">CRUD de Tareas</h2>
            </div>
            <div>
                <a href="{{route('tareas.create')}}" class="btn btn-primary">Crear tarea</a>
            </div>
        </div>
        @if(Session::get('success'))
            <div class="alert alert-success mt-5">
                <strong>{{Session::get('success')}}</strong>
            </div>
        @endif
        <div class="col-12 mt-4">
            <table class="table table-bordered text-white">
                <tr class="text-secondary">
                    <th>Tarea</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
                @foreach($tareas as $tarea)
                    <tr>
                        <td class="fw-bold">{{$tarea->title}}</td>
                        <td>{{$tarea->description}}</td>
                        <td>
                            {{$tarea->due_date}}
                        </td>
                        <td>
                            <span class="badge bg-warning fs-6">{{$tarea->status}}</span>
                        </td>
                        <td>
                            <a href="{{ route('tareas.edit', ['tarea' => $tarea]) }}" class="btn btn-warning">Editar</a>

                            <form action="{{route('tareas.destroy', $tarea)}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{$tareas->links()}}
        </div>

    </div>
@endsection
