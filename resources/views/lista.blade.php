@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cálculo DLP</div>

                <div class="panel-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Alerta!</strong> Verifique as seguintes informações:
                        <br>
                        <br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="23%">Região</th>
                                <th width="23%">mGy-¹</th>
                                <th width="23%">mSv</th>
                                <th width="23%">Data</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($calculation as $val)
                            <tr id="reg_{{ $val->id }}">
                                <td>{{ $fromto[$val->region] }}</td>
                                <td>{{ $val->mgy }}</td>
                                <td>{{ $val->msv }}</td>
                                <td>{{ Carbon\Carbon::parse($val->created_at)->format('d/m/Y') }}</td>
                                <td><button class="btn btn-danger delete-calculo" onclick="deleteCalculo({{ $val->id }})">x</button></td>
                            </tr>
                            @empty

                            @endforelse                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
