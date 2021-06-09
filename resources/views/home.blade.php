@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Crear envio') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="" method="POST" role="form">
                        {{ csrf_field() }}
                        <legend>Origen</legend>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="name_origin">Nombre</label>
                                    <input type="text" class="form-control" name="name_origin" id="name_origin" placeholder="Nombre" required="required">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="email_origin">Correo</label>
                                    <input type="text" class="form-control" name="email_origin" id="email_origin" placeholder="Correo" required="required">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="telephone_origin">Teléfono</label>
                                    <input type="text" class="form-control" name="telephone_origin" id="telephone_origin" placeholder="Teléfono" required="required">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="company_origin">Compañia</label>
                                    <input type="text" class="form-control" name="company_origin" id="company_origin" placeholder="Compañia" required="required">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="country_origin">Pais</label>
                                    <select name="country_origin" id="country_origin" class="form-control" required="required">
                                        <option value="">Selecciona una opción</option>
                                        @foreach($countries as $key => $country)
                                            <option {{$country->code == "MX" ? "selected" : ""}} value="{!! $country->code !!}">{!! $country->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="state_origin">Estado</label>
                                    <select name="state_origin" id="state_origin" class="form-control" required="required">
                                        <option value="">Selecciona una opción</option>
                                        @foreach($states as $key => $state)
                                            <option value="{!! $state->code_2_digits !!}">{!! $state->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="city_origin">Ciudad</label>
                                    <input type="text" class="form-control" name="city_origin" id="city_origin" placeholder="Ciudad" required="required">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="district_origin">Distrito</label>
                                    <input type="text" class="form-control" name="district_origin" id="district_origin" placeholder="Distrito" required="required">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="street_origin">Calle</label>
                                    <input type="text" class="form-control" name="street_origin" id="street_origin" placeholder="Calle" required="required">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="number_origin">Número</label>
                                    <input type="text" class="form-control" name="number_origin" id="number_origin" placeholder="Número" required="required">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="postal_code_origin">Código postal</label>
                                    <input type="text" class="form-control" name="postal_code_origin" id="postal_code_origin" placeholder="Código postal" required="required">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="reference_origin">Referencia</label>
                                    <textarea name="reference_origin" id="reference_origin" placeholder="Referencia" class="form-control" rows="3" required="required"></textarea>
                                </div>
                            </div>
                        </div>
                    
                        <legend>Destino</legend>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="name_destiny">Nombre</label>
                                    <input type="text" class="form-control" name="name_destiny" id="name_destiny" placeholder="Nombre" required="required">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="email_destiny">Correo</label>
                                    <input type="text" class="form-control" name="email_destiny" id="email_destiny" placeholder="Correo" required="required">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="telephone_destiny">Teléfono</label>
                                    <input type="text" class="form-control" name="telephone_destiny" id="telephone_destiny" placeholder="Teléfono" required="required">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="company_destiny">Compañia</label>
                                    <input type="text" class="form-control" name="company_destiny" id="company_destiny" placeholder="Compañia" required="required">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="country_destiny">Pais</label>
                                    <select name="country_destiny" id="country_destiny" class="form-control" required="required">
                                        <option value="">Selecciona una opción</option>
                                        @foreach($countries as $key => $country)
                                            <option value="{!! $country->code !!}" {{$country->code == "MX" ? "selected" : ""}}>{!! $country->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="state_destiny">Estado</label>
                                    <select name="state_destiny" id="state_destiny" class="form-control" required="required">
                                        <option value="">Selecciona una opción</option>
                                        @foreach($states as $key => $state)
                                            <option value="{!! $state->code_2_digits !!}">{!! $state->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="city_destiny">Ciudad</label>
                                    <input type="text" class="form-control" name="city_destiny" id="city_destiny" placeholder="Ciudad" required="required">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="district_destiny">Distrito</label>
                                    <input type="text" class="form-control" name="district_destiny" id="district_destiny" placeholder="Distrito" required="required">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="street_destiny">Calle</label>
                                    <input type="text" class="form-control" name="street_destiny" id="street_destiny" placeholder="Calle" required="required">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="number_destiny">Número</label>
                                    <input type="text" class="form-control" name="number_destiny" id="number_destiny" placeholder="Número" required="required">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="postal_code_destiny">Código postal</label>
                                    <input type="text" class="form-control" name="postal_code_destiny" id="postal_code_destiny" placeholder="Código postal" required="required">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="reference_destiny">Referencia</label>
                                    <textarea name="reference_destiny" id="reference_destiny" placeholder="Referencia" class="form-control" rows="3" required="required"></textarea>
                                </div>
                            </div>
                        </div>

                        <legend>Información del envío</legend>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="type">Tipo</label>
                                    <select name="type" id="type" class="form-control" required="required">
                                        <option value="envelope">Sobre</option>
                                        <option value="box">Caja</option>
                                        <option value="pallet">Tarima</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="content">Contenido</label>
                                    <input type="text" class="form-control" name="content" id="content" placeholder="Contenido" required="required">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="amount">Cantidad</label>
                                    <input type="number" class="form-control" name="amount" id="amount" placeholder="Cantidad" required="required">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="insurance">Seguro</label>
                                    <input type="number" class="form-control" name="insurance" id="insurance" placeholder="Seguro" required="required">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="length">Largo</label>
                                    <input type="number" class="form-control" name="length" id="length" placeholder="Largo" required="required">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="width">Ancho</label>
                                    <input type="number" class="form-control" name="width" id="width" placeholder="Ancho" required="required">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="height">Alto</label>
                                    <input type="number" class="form-control" name="height" id="height" placeholder="Alto" required="required">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="weight">Peso</label>
                                    <input type="number" class="form-control" name="weight" id="weight" placeholder="Peso" required="required">
                                </div>
                            </div>
                        </div>

                        <legend>Paquetería</legend>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="service">Paquetería</label>
                                    <select name="service" id="service" class="form-control" required="required">
                                        @foreach($services as $key => $service)
                                            <option value="{!! $service->service_id !!}">{!! $service->description !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Crear guía</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#country_destiny').change(function(event) {
            code = $(this).val();
            console.log(code);
            $.ajax({
                url: 'http://queries.envia.com/state?country_code=' + code,
                type: 'GET',
            })
            .done(function(response) {
                console.log(response);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            
        });
    });
</script>
@endsection
