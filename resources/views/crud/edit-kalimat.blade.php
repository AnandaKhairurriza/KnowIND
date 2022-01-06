@extends('crud.crud-template')

@section('form')

<!--CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="panel ">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw ti-comments"></i> Edit Kalimat
                </h3>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><b>- {{ $error }}</b></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="panel-body">
                <form id="form-validation" action="{{route('update-kalimat', $kalimat->kalimat_id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="pic-kalimat">
                            PIC
                        </label>
                        <div class="col-md-9">
                            <input id="pic" type="text" class="form-control" placeholder="Nama PIC (Max 100 karakter!)" maxlength="100" name="pic_kalimat" value="{{$kalimat->PIC}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="asalbahasa-kalimat">
                            Asal Bahasa
                        </label>
                        <div class="col-md-9">
                            <select id="select21" class="form-control select2" style="width:100%" name="asal_bahasa" required>
                                <option value="" selected>-</option>
                                @foreach ($asalbahasa as $ab)
                                    @if($kalimat->asalbahasa_id == $ab->asalbahasa_id)
                                    <option value="{{$ab->asalbahasa_id}}" selected>{{$ab->asalbahasa_nama}}</option>
                                    @else
                                    <option value="{{$ab->asalbahasa_id}}">{{$ab->asalbahasa_nama}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="bahasa-daerah">
                            Bahasa Daerah
                        </label>
                        <div class="col-md-9">
                            <input id="bahasa-daerah" class="form-control" type="text" placeholder="Bahasa Daerah (Max 250 karakter!)" maxlength="250" name="bahasa_daerah" value="{{$kalimat->bahasa_daerah}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="bahasa-indonesia">
                            Bahasa Indonesia
                        </label>
                        <div class="col-md-9">
                            <input id="bahasa-indonesia" class="form-control" type="text" placeholder="Bahasa Indonesia (Max 250 karakter!)" maxlength="250" name="bahasa_indonesia"  value="{{$kalimat->bahasa_indonesia}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="bahasa-inggris">
                            Bahasa Inggris
                        </label>
                        <div class="col-md-9">
                            <input id="bahasa-inggris" class="form-control" type="text" placeholder="Bahasa Inggris (Max 250 karakter!)" maxlength="250" name="bahasa_inggris" value="{{$kalimat->bahasa_inggris}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <br>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-9">
                            <b>Current Member (ID)</b>  
                            <input type="text"  name="X" value="{{$kalimat->kalimat_member}}" disabled style="margin-bottom: 2px; width: 100%">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="member-kalimat">
                            Member
                        </label>
                        <div class="col-md-9">
                            <select id="select22" class="form-control select2" style="width:100%" name="member_kalimat[]" multiple>
                                <optgroup label="Member List">
                                    @foreach ($user as $us)
                                    <option value="{{$us ->name}} ({{$us ->member_id}})">{{$us ->name}} ( ID = {{$us ->member_id}})</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
                            <button type="reset" class="btn btn-effect-ripple btn-default reset_btn">Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
