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

                    <form method="post" action="{{ route('calculo.store') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @foreach($table_dlp as $key=>$val)
                        <input type="hidden" name="fator[{{ $val->region }}]" value="{{ $val->msv }}">
                        @endforeach
                        <table class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width:100px">Região</th>
                                    <th>mGy-¹</th>
                                    <th>mSv</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr-region">
                                    <td>Head</td>
                                    <td><input name="mgy[head]" class="form-control region" type="text"></td>
                                    <td>
                                        <div class="msv"></div>
                                        <input name="msv[head]" class="form-control" type="hidden" value="">
                                    </td>
                                </tr>
                                <tr class="tr-region">
                                    <td>Neck</td>
                                    <td><input name="mgy[neck]" class="form-control region" type="text"></td>
                                    <td>
                                        <div class="msv"></div>
                                        <input name="msv[neck]" class="form-control" type="hidden" value="">
                                    </td>
                                </tr>
                                <tr class="tr-region">
                                    <td>Chest</td>
                                    <td><input name="mgy[chest]" class="form-control region" type="text"></td>
                                    <td>
                                        <div class="msv"></div>
                                        <input name="msv[chest]" class="form-control" type="hidden" value=""
                                    ></td>
                                </tr>
                                <tr class="tr-region">
                                    <td>Abdomen</td>
                                    <td><input name="mgy[abdomen]" class="form-control region" type="text"></td>
                                    <td>
                                        <div class="msv"></div>
                                        <input name="msv[abdomen]" class="form-control" type="hidden" value=
                                    ""></td>
                                </tr>
                                <tr class="tr-region">
                                    <td>Pelvis</td>
                                    <td><input name="mgy[pelvis]" class="form-control region" type="text"></td>
                                    <td>
                                        <div class="msv"></div>
                                        <input name="msv[pelvis]" class="form-control" type="hidden" value="
                                    "></td>
                                </tr>
                                <tr class="tr-region">
                                    <td>Heart</td>
                                    <td><input name="mgy[heart]" class="form-control region" type="text"></td>
                                    <td>
                                        <div class="msv"></div>
                                        <input name="msv[heart]" class="form-control" type="hidden" value=""
                                    ></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2" style="text-align:right">
                                        <button type="button" class="btn btn-success bt-calcular">
                                            Calcular
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            Salvar
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
