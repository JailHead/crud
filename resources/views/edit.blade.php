@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div>
                <h2>Edición</h2>
            </div>
            <div>
                <a href="{{route('tareas.index')}}" class="btn btn-primary">Volver</a>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger mt-5">
                <strong>Revisa los campos!</strong> Algo fue mal..<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('tareas.update', $tarea)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Tarea:</strong>
                        <input type="text" name="title" class="form-control" placeholder="Tarea" value="{{$tarea->title}}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Descripción:</strong>
                        <textarea class="form-control" style="height:150px" name="description" placeholder="Descripción...">{{$tarea->description}}</textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Fecha límite:</strong>
                        <input type="date" name="due_date" class="form-control" id="" value={{$tarea->due_date}}>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Estado (inicial):</strong>
                        <select name="status" class="form-select" id="">
                            <option value="">-- Elige el status --</option>
                            <option value="Pendiente" @selected("Pendiente" == $tarea->status)>Pendiente</option>
                            <option value="En progreso" @selected("En progreso" == $tarea->status)>En progreso</option>
                            <option value="Completada" @selected("Completada" == $tarea->status)>Completada</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
