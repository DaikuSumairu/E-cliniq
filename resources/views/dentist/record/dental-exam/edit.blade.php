@extends('adminlte::page')

@section('title', 'Update Dental Examination Record')

@section('content_header')
    <h1>Updating Dental Examination Record</h1>
@stop

@section('content')
    <div class="container border mx-auto pb-4" style="height: 555px; overflow: auto;">
        <form method="POST" action="{{ route('dentist.dentalExamUpdate', $dentalExam->id) }}">
            @csrf
            @method('PUT')
            <!-- Record ID Created (Hidden) -->
            <input type="hidden" name="record_id" value="{{ $dentalExam->record->id }}">
            <input type="hidden" name="date_updated" value="{{ now() }}">

            <h3 class="mt-2"><strong>INTRAORAL EXAMINATION</strong></h3>

            <!-- Oral Hygiene -->
            <div class="row mx-auto">
                <div class="col-0" style="margin-right: 450px;margin-left: 85px;">
                    <p class="h4">Oral Hygiene</p>
                </div>
                <div class="col-1 pt-1">
                    <input class="form-check-input" type="radio" name="oral_hygiene" id="oral_hygiene" value="Good" required
                        {{ $dentalExam->dental_exam_response->oral_hygiene == 'Good' ? 'checked' : '' }}>
                    <label>Good</label>
                </div>
                <div class="col-1 pt-1">
                    <input class="form-check-input" type="radio" name="oral_hygiene" id="oral_hygiene" value="Fair" required
                        {{ $dentalExam->dental_exam_response->oral_hygiene == 'Fair' ? 'checked' : '' }}>
                    <label>Fair</label>
                </div>
                <div class="col-1 pt-1">
                    <input class="form-check-input" type="radio" name="oral_hygiene" id="oral_hygiene" value="Poor" required
                        {{ $dentalExam->dental_exam_response->oral_hygiene == 'Poor' ? 'checked' : '' }}>
                    <label>Poor</label>
                </div>
            </div>

            <!-- Gingival Color -->
            <div class="row mx-auto">
                <div class="col-0" style="margin-right: 450px;margin-left: 75px;">
                    <p class="h4">Gingival Color</p>
                </div>
                <div class="col-1 pt-1">
                    <input class="form-check-input" type="radio" name="gingival_color" id="gingival_color" value="Pink" required
                        {{ $dentalExam->dental_exam_response->gingival_color == 'Pink' ? 'checked' : '' }}>
                    <label>Pink</label>
                </div>
                <div class="col-1 pt-1">
                    <input class="form-check-input" type="radio" name="gingival_color" id="gingival_color" value="Pale" required
                        {{ $dentalExam->dental_exam_response->gingival_color == 'Pale' ? 'checked' : '' }}>
                    <label>Pale</label>
                </div>
                <div class="col-1 pt-1">
                    <input class="form-check-input" type="radio" name="gingival_color" id="gingival_color" value="Bright Red" required
                        {{ $dentalExam->dental_exam_response->gingival_color == 'Bright Red' ? 'checked' : '' }}>
                    <label>Bright Red</label>
                </div>
            </div>
            
            <!-- Consistency of the Gingival -->
            <div class="row mx-auto">
                <div class="col-0" style="margin-right: 370px;margin-left: 25px;">
                    <p class="h4">Consistency of the Gingival</p>
                </div>
                <div class="col-1 pt-1">
                    <input class="form-check-input" type="radio" name="consistency_of_the_gingival" id="consistency_of_the_gingival" value="Firm" required
                    {{ $dentalExam->dental_exam_response->consistency_of_the_gingival == 'Firm' ? 'checked' : '' }}>
                    <label>Firm</label>
                </div>
                <div class="col-1 pt-1">
                    <input class="form-check-input" type="radio" name="consistency_of_the_gingival" id="consistency_of_the_gingival" value="Smooth" required
                    {{ $dentalExam->dental_exam_response->consistency_of_the_gingival == 'Smooth' ? 'checked' : '' }}>
                    <label>Smooth</label>
                </div>
                <div class="col-1 pt-1">
                    <input class="form-check-input" type="radio" name="consistency_of_the_gingival" id="consistency_of_the_gingival" value="Enlarge" required
                    {{ $dentalExam->dental_exam_response->consistency_of_the_gingival == 'Enlarge' ? 'checked' : '' }}>
                    <label>Enlarge</label>
                </div>
            </div>

            <!-- Oral Prophylaxis -->
            <div class="row mt-1">
                @if($dentalExam->dental_exam_response->oral_prophylaxis == 'Yes')
                    <input type="checkbox" id="oral_prophylaxis" name="oral_prophylaxis" value="Yes" class="col-0 ml-3" style="height: 25px; width: 30px;" onclick="toggleCheckbox('oral_prophylaxis')" checked>
                    <input type="hidden" id="oral_prophylaxisHidden" name="oral_prophylaxis" value="Yes">
                @else
                    <input type="checkbox" id="oral_prophylaxis" name="oral_prophylaxis" value="Yes" class="col-0 ml-3" style="height: 25px; width: 30px;" onclick="toggleCheckbox('oral_prophylaxis')">
                @endif    
                <div class="col-0">
                    <p class="ml-3 h4">Oral Prophylaxis</p>
                </div>
            </div>

            <!-- Restoration of: -->
            <div class="row mt-1 my-2">
                <div class="row" style="width: 232px; padding-top: 65px;">
                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                        <input type="checkbox" id="restoration" name="restoration" value="Yes" class="col-0 ml-4" style="height: 25px; width: 30px;" onclick="toggleRestorationCheckbox()" checked>
                        <input type="hidden" id="restorationHidden" name="restoration" value="Yes">
                    @else
                        <input type="checkbox" id="restoration" name="restoration" value="Yes" class="col-0 ml-4" style="height: 25px; width: 30px;" onclick="toggleRestorationCheckbox()">
                    @endif    
                    <div class="col-0">
                        <p class="ml-3 h4">Restoration of:</p>
                    </div>
                </div>
                <div class="row-0">
                    <!-- Numbers -->
                    <div class="row" style="margin-left: 265px;">
                        <!-- Left -->
                        <div class="col">
                            <div class="row" style="width: 278px; padding-right: 5px; padding-top: 5px;">
                                <div class="col-0" style="margin-left: 15px;">
                                    <p>8</p>
                                </div>
                                <div class="col-0" style="margin-left: 25px;">
                                    <p>7</p>
                                </div>
                                <div class="col-0" style="margin-left: 28px;">
                                    <p>6</p>
                                </div>
                                <div class="col-0" style="margin-left: 25px;">
                                    <p>5</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>4</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>3</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>2</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>1</p>
                                </div>
                            </div>
                        </div>
                        <!-- Right -->
                        <div class="col">
                            <div class="row" style="width: 278px; padding-right: 5px; padding-top: 5px;">
                                <div class="col-0" style="margin-left: 22px;">
                                    <p>1</p>
                                </div>
                                <div class="col-0" style="margin-left: 25px;">
                                    <p>2</p>
                                </div>
                                <div class="col-0" style="margin-left: 28px;">
                                    <p>3</p>
                                </div>
                                <div class="col-0" style="margin-left: 25px;">
                                    <p>4</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>5</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>6</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>7</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>8</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Top -->
                    <div class="row" style="margin-left: 265px;">
                        <!-- Left -->
                        <div class="col">
                            <div class="row" style="width: 278px; padding-right: 5px; border-right: 1px solid; border-bottom: 1px solid;">
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_lt8'] == 'Yes')
                                            <input type="checkbox" id="restoration_lt8" name="restoration_lt8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_lt8')" checked>
                                            <input type="hidden" id="restoration_lt8Hidden" name="restoration_lt8" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_lt8" name="restoration_lt8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_lt8" name="restoration_lt8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_lt7'] == 'Yes')
                                            <input type="checkbox" id="restoration_lt7" name="restoration_lt7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_lt7')" checked>
                                            <input type="hidden" id="restoration_lt7Hidden" name="restoration_lt7" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_lt7" name="restoration_lt7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_lt7" name="restoration_lt7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_lt6'] == 'Yes')
                                            <input type="checkbox" id="restoration_lt6" name="restoration_lt6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_lt6')" checked>
                                            <input type="hidden" id="restoration_lt6Hidden" name="restoration_lt6" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_lt6" name="restoration_lt6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_lt6" name="restoration_lt6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_lt5'] == 'Yes')
                                            <input type="checkbox" id="restoration_lt5" name="restoration_lt5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_lt5')" checked>
                                            <input type="hidden" id="restoration_lt5Hidden" name="restoration_lt5" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_lt5" name="restoration_lt5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_lt5" name="restoration_lt5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_lt4'] == 'Yes')
                                            <input type="checkbox" id="restoration_lt4" name="restoration_lt4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_lt4')" checked>
                                            <input type="hidden" id="restoration_lt4Hidden" name="restoration_lt4" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_lt4" name="restoration_lt4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_lt4" name="restoration_lt4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_lt3'] == 'Yes')
                                            <input type="checkbox" id="restoration_lt3" name="restoration_lt3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_lt3')" checked>
                                            <input type="hidden" id="restoration_lt3Hidden" name="restoration_lt3" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_lt3" name="restoration_lt3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_lt3" name="restoration_lt3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_lt2'] == 'Yes')
                                            <input type="checkbox" id="restoration_lt2" name="restoration_lt2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_lt2')" checked>
                                            <input type="hidden" id="restoration_lt2Hidden" name="restoration_lt2" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_lt2" name="restoration_lt2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_lt2" name="restoration_lt2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_lt1'] == 'Yes')
                                            <input type="checkbox" id="restoration_lt1" name="restoration_lt1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_lt1')" checked>
                                            <input type="hidden" id="restoration_lt1Hidden" name="restoration_lt1" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_lt1" name="restoration_lt1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_lt1" name="restoration_lt1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Right -->
                        <div class="col">
                            <div class="row" style="width: 278px; padding-left: 5px; border-left: 1px solid; border-bottom: 1px solid;">
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_rt1'] == 'Yes')
                                            <input type="checkbox" id="restoration_rt1" name="restoration_rt1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_rt1')" checked>
                                            <input type="hidden" id="restoration_rt1Hidden" name="restoration_rt1" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_rt1" name="restoration_rt1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_rt1" name="restoration_rt1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_rt2'] == 'Yes')
                                            <input type="checkbox" id="restoration_rt2" name="restoration_rt2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_rt2')" checked>
                                            <input type="hidden" id="restoration_rt2Hidden" name="restoration_rt2" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_rt2" name="restoration_rt2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_rt2" name="restoration_rt2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_rt3'] == 'Yes')
                                            <input type="checkbox" id="restoration_rt3" name="restoration_rt3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_rt3')" checked>
                                            <input type="hidden" id="restoration_rt3Hidden" name="restoration_rt3" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_rt3" name="restoration_rt3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_rt3" name="restoration_rt3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_rt4'] == 'Yes')
                                            <input type="checkbox" id="restoration_rt4" name="restoration_rt4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_rt4')" checked>
                                            <input type="hidden" id="restoration_rt4Hidden" name="restoration_rt4" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_rt4" name="restoration_rt4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_rt4" name="restoration_rt4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_rt5'] == 'Yes')
                                            <input type="checkbox" id="restoration_rt5" name="restoration_rt5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_rt5')" checked>
                                            <input type="hidden" id="restoration_rt5Hidden" name="restoration_rt5" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_rt5" name="restoration_rt5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_rt5" name="restoration_rt5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_rt6'] == 'Yes')
                                            <input type="checkbox" id="restoration_rt6" name="restoration_rt6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_rt6')" checked>
                                            <input type="hidden" id="restoration_rt6Hidden" name="restoration_rt6" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_rt6" name="restoration_rt6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_rt6" name="restoration_rt6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_rt7'] == 'Yes')
                                            <input type="checkbox" id="restoration_rt7" name="restoration_rt7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_rt7')" checked>
                                            <input type="hidden" id="restoration_rt7Hidden" name="restoration_rt7" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_rt7" name="restoration_rt7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_rt7" name="restoration_rt7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_rt8'] == 'Yes')
                                            <input type="checkbox" id="restoration_rt8" name="restoration_rt8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_rt8')" checked>
                                            <input type="hidden" id="restoration_rt8Hidden" name="restoration_rt8" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_rt8" name="restoration_rt8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_rt8" name="restoration_rt8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom -->
                    <div class="row" style="margin-left: 265px;">
                        <!-- Left -->
                        <div class="col">
                            <div class="row" style="width: 278px; padding-right: 5px; padding-top: 5px; border-right: 1px solid; border-top: 1px solid;">
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_lb8'] == 'Yes')
                                            <input type="checkbox" id="restoration_lb8" name="restoration_lb8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_lb8')" checked>
                                            <input type="hidden" id="restoration_lb8Hidden" name="restoration_lb8" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_lb8" name="restoration_lb8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_lb8" name="restoration_lb8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_lb7'] == 'Yes')
                                            <input type="checkbox" id="restoration_lb7" name="restoration_lb7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_lb7')" checked>
                                            <input type="hidden" id="restoration_lb7Hidden" name="restoration_lb7" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_lb7" name="restoration_lb7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_lb7" name="restoration_lb7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_lb6'] == 'Yes')
                                            <input type="checkbox" id="restoration_lb6" name="restoration_lb6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_lb6')" checked>
                                            <input type="hidden" id="restoration_lb6Hidden" name="restoration_lb6" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_lb6" name="restoration_lb6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_lb6" name="restoration_lb6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_lb5'] == 'Yes')
                                            <input type="checkbox" id="restoration_lb5" name="restoration_lb5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_lb5')" checked>
                                            <input type="hidden" id="restoration_lb5Hidden" name="restoration_lb5" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_lb5" name="restoration_lb5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_lb5" name="restoration_lb5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_lb4'] == 'Yes')
                                            <input type="checkbox" id="restoration_lb4" name="restoration_lb4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_lb4')" checked>
                                            <input type="hidden" id="restoration_lb4Hidden" name="restoration_lb4" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_lb4" name="restoration_lb4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_lb4" name="restoration_lb4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_lb3'] == 'Yes')
                                            <input type="checkbox" id="restoration_lb3" name="restoration_lb3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_lb3')" checked>
                                            <input type="hidden" id="restoration_lb3Hidden" name="restoration_lb3" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_lb3" name="restoration_lb3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_lb3" name="restoration_lb3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_lb2'] == 'Yes')
                                            <input type="checkbox" id="restoration_lb2" name="restoration_lb2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_lb2')" checked>
                                            <input type="hidden" id="restoration_lb2Hidden" name="restoration_lb2" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_lb2" name="restoration_lb2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_lb2" name="restoration_lb2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_lb1'] == 'Yes')
                                            <input type="checkbox" id="restoration_lb1" name="restoration_lb1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_lb1')" checked>
                                            <input type="hidden" id="restoration_lb1Hidden" name="restoration_lb1" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_lb1" name="restoration_lb1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_lb1" name="restoration_lb1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Right -->
                        <div class="col">
                            <div class="row" style="width: 278px; padding-left: 5px; padding-top: 5px; border-left: 1px solid; border-top: 1px solid;">
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_rb1'] == 'Yes')
                                            <input type="checkbox" id="restoration_rb1" name="restoration_rb1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_rb1')" checked>
                                            <input type="hidden" id="restoration_rb1Hidden" name="restoration_rb1" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_rb1" name="restoration_rb1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_rb1" name="restoration_rb1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_rb2'] == 'Yes')
                                            <input type="checkbox" id="restoration_rb2" name="restoration_rb2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_rb2')" checked>
                                            <input type="hidden" id="restoration_rb2Hidden" name="restoration_rb2" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_rb2" name="restoration_rb2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_rb2" name="restoration_rb2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_rb3'] == 'Yes')
                                            <input type="checkbox" id="restoration_rb3" name="restoration_rb3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_rb3')" checked>
                                            <input type="hidden" id="restoration_rb3Hidden" name="restoration_rb3" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_rb3" name="restoration_rb3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_rb3" name="restoration_rb3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_rb4'] == 'Yes')
                                            <input type="checkbox" id="restoration_rb4" name="restoration_rb4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_rb4')" checked>
                                            <input type="hidden" id="restoration_rb4Hidden" name="restoration_rb4" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_rb4" name="restoration_rb4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_rb4" name="restoration_rb4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_rb5'] == 'Yes')
                                            <input type="checkbox" id="restoration_rb5" name="restoration_rb5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_rb5')" checked>
                                            <input type="hidden" id="restoration_rb5Hidden" name="restoration_rb5" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_rb5" name="restoration_rb5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_rb5" name="restoration_rb5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_rb6'] == 'Yes')
                                            <input type="checkbox" id="restoration_rb6" name="restoration_rb6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_rb6')" checked>
                                            <input type="hidden" id="restoration_rb6Hidden" name="restoration_rb6" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_rb6" name="restoration_rb6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_rb6" name="restoration_rb6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_rb7'] == 'Yes')
                                            <input type="checkbox" id="restoration_rb7" name="restoration_rb7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_rb7')" checked>
                                            <input type="hidden" id="restoration_rb7Hidden" name="restoration_rb7" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_rb7" name="restoration_rb7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_rb7" name="restoration_rb7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->restoration == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_restoration['restoration_rb8'] == 'Yes')
                                            <input type="checkbox" id="restoration_rb8" name="restoration_rb8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleRestorCheckbox('restoration_rb8')" checked>
                                            <input type="hidden" id="restoration_rb8Hidden" name="restoration_rb8" value="Yes">
                                        @else
                                            <input type="checkbox" id="restoration_rb8" name="restoration_rb8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="restoration_rb8" name="restoration_rb8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Numbers -->
                    <div class="row" style="margin-left: 265px;">
                        <!-- Left -->
                        <div class="col">
                            <div class="row" style="width: 278px; padding-right: 5px; padding-top: 5px;">
                                <div class="col-0" style="margin-left: 15px;">
                                    <p>8</p>
                                </div>
                                <div class="col-0" style="margin-left: 25px;">
                                    <p>7</p>
                                </div>
                                <div class="col-0" style="margin-left: 28px;">
                                    <p>6</p>
                                </div>
                                <div class="col-0" style="margin-left: 25px;">
                                    <p>5</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>4</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>3</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>2</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>1</p>
                                </div>
                            </div>
                        </div>
                        <!-- Right -->
                        <div class="col">
                            <div class="row" style="width: 278px; padding-right: 5px; padding-top: 5px;">
                                <div class="col-0" style="margin-left: 22px;">
                                    <p>1</p>
                                </div>
                                <div class="col-0" style="margin-left: 25px;">
                                    <p>2</p>
                                </div>
                                <div class="col-0" style="margin-left: 28px;">
                                    <p>3</p>
                                </div>
                                <div class="col-0" style="margin-left: 25px;">
                                    <p>4</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>5</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>6</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>7</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>8</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tooth Extraction of: -->
            <div class="row mt-3">
                <div class="row" style="width: 279px; padding-top: 65px;">
                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                        <input type="checkbox" id="extraction" name="extraction" value="Yes" class="col-0 ml-4" style="height: 25px; width: 30px;" onclick="toggleExtractionCheckbox()" checked>
                        <input type="hidden" id="extractionHidden" name="extraction" value="Yes">
                    @else    
                        <input type="checkbox" id="extraction" name="extraction" value="Yes" class="col-0 ml-4" style="height: 25px; width: 30px;" onclick="toggleExtractionCheckbox()">
                    @endif
                    <div class="col-0">
                        <p class="ml-3 h4">Tooth Extraction of:</p>
                    </div>
                </div>
                <div class="row-0">
                    <!-- Numbers -->
                    <div class="row" style="margin-left: 217px;">
                        <!-- Left -->
                        <div class="col">
                            <div class="row" style="width: 278px; padding-right: 5px; padding-top: 5px;">
                                <div class="col-0" style="margin-left: 15px;">
                                    <p>8</p>
                                </div>
                                <div class="col-0" style="margin-left: 25px;">
                                    <p>7</p>
                                </div>
                                <div class="col-0" style="margin-left: 28px;">
                                    <p>6</p>
                                </div>
                                <div class="col-0" style="margin-left: 25px;">
                                    <p>5</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>4</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>3</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>2</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>1</p>
                                </div>
                            </div>
                        </div>
                        <!-- Right -->
                        <div class="col">
                            <div class="row" style="width: 278px; padding-right: 5px; padding-top: 5px;">
                                <div class="col-0" style="margin-left: 22px;">
                                    <p>1</p>
                                </div>
                                <div class="col-0" style="margin-left: 25px;">
                                    <p>2</p>
                                </div>
                                <div class="col-0" style="margin-left: 28px;">
                                    <p>3</p>
                                </div>
                                <div class="col-0" style="margin-left: 25px;">
                                    <p>4</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>5</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>6</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>7</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>8</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Top -->
                    <div class="row" style="margin-left: 217px;">
                        <!-- Left -->
                        <div class="col">
                            <div class="row" style="width: 278px; padding-right: 5px; border-right: 1px solid; border-bottom: 1px solid;">
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_lt8'] == 'Yes')
                                            <input type="checkbox" id="extraction_lt8" name="extraction_lt8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_lt8')" checked>
                                            <input type="hidden" id="extraction_lt8Hidden" name="extraction_lt8" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_lt8" name="extraction_lt8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_lt8" name="extraction_lt8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_lt7'] == 'Yes')
                                            <input type="checkbox" id="extraction_lt7" name="extraction_lt7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_lt7')" checked>
                                            <input type="hidden" id="extraction_lt7Hidden" name="extraction_lt7" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_lt7" name="extraction_lt7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_lt7" name="extraction_lt7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_lt6'] == 'Yes')
                                            <input type="checkbox" id="extraction_lt6" name="extraction_lt6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_lt6')" checked>
                                            <input type="hidden" id="extraction_lt6Hidden" name="extraction_lt6" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_lt6" name="extraction_lt6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_lt6" name="extraction_lt6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_lt5'] == 'Yes')
                                            <input type="checkbox" id="extraction_lt5" name="extraction_lt5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_lt5')" checked>
                                            <input type="hidden" id="extraction_lt5Hidden" name="extraction_lt5" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_lt5" name="extraction_lt5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_lt5" name="extraction_lt5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_lt4'] == 'Yes')
                                            <input type="checkbox" id="extraction_lt4" name="extraction_lt4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_lt4')" checked>
                                            <input type="hidden" id="extraction_lt4Hidden" name="extraction_lt4" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_lt4" name="extraction_lt4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_lt4" name="extraction_lt4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_lt3'] == 'Yes')
                                            <input type="checkbox" id="extraction_lt3" name="extraction_lt3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_lt3')" checked>
                                            <input type="hidden" id="extraction_lt3Hidden" name="extraction_lt3" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_lt3" name="extraction_lt3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_lt3" name="extraction_lt3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_lt2'] == 'Yes')
                                            <input type="checkbox" id="extraction_lt2" name="extraction_lt2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_lt2')" checked>
                                            <input type="hidden" id="extraction_lt2Hidden" name="extraction_lt2" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_lt2" name="extraction_lt2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_lt2" name="extraction_lt2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_lt1'] == 'Yes')
                                            <input type="checkbox" id="extraction_lt1" name="extraction_lt1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_lt1')" checked>
                                            <input type="hidden" id="extraction_lt1Hidden" name="extraction_lt1" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_lt1" name="extraction_lt1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_lt1" name="extraction_lt1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Right -->
                        <div class="col">
                            <div class="row" style="width: 278px; padding-left: 5px; border-left: 1px solid; border-bottom: 1px solid;">
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_rt1'] == 'Yes')
                                            <input type="checkbox" id="extraction_rt1" name="extraction_rt1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_rt1')" checked>
                                            <input type="hidden" id="extraction_rt1Hidden" name="extraction_rt1" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_rt1" name="extraction_rt1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_rt1" name="extraction_rt1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_rt2'] == 'Yes')
                                            <input type="checkbox" id="extraction_rt2" name="extraction_rt2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_rt2')" checked>
                                            <input type="hidden" id="extraction_rt2Hidden" name="extraction_rt2" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_rt2" name="extraction_rt2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_rt2" name="extraction_rt2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_rt3'] == 'Yes')
                                            <input type="checkbox" id="extraction_rt3" name="extraction_rt3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_rt3')" checked>
                                            <input type="hidden" id="extraction_rt3Hidden" name="extraction_rt3" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_rt3" name="extraction_rt3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_rt3" name="extraction_rt3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_rt4'] == 'Yes')
                                            <input type="checkbox" id="extraction_rt4" name="extraction_rt4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_rt4')" checked>
                                            <input type="hidden" id="extraction_rt4Hidden" name="extraction_rt4" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_rt4" name="extraction_rt4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_rt4" name="extraction_rt4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_rt5'] == 'Yes')
                                            <input type="checkbox" id="extraction_rt5" name="extraction_rt5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_rt5')" checked>
                                            <input type="hidden" id="extraction_rt5Hidden" name="extraction_rt5" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_rt5" name="extraction_rt5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_rt5" name="extraction_rt5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_rt6'] == 'Yes')
                                            <input type="checkbox" id="extraction_rt6" name="extraction_rt6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_rt6')" checked>
                                            <input type="hidden" id="extraction_rt6Hidden" name="extraction_rt6" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_rt6" name="extraction_rt6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_rt6" name="extraction_rt6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_rt7'] == 'Yes')
                                            <input type="checkbox" id="extraction_rt7" name="extraction_rt7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_rt7')" checked>
                                            <input type="hidden" id="extraction_rt7Hidden" name="extraction_rt7" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_rt7" name="extraction_rt7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_rt7" name="extraction_rt7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_rt8'] == 'Yes')
                                            <input type="checkbox" id="extraction_rt8" name="extraction_rt8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_rt8')" checked>
                                            <input type="hidden" id="extraction_rt8Hidden" name="extraction_rt8" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_rt8" name="extraction_rt8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_rt8" name="extraction_rt8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom -->
                    <div class="row" style="margin-left: 217px;">
                        <!-- Left -->
                        <div class="col">
                            <div class="row" style="width: 278px; padding-right: 5px; padding-top: 5px; border-right: 1px solid; border-top: 1px solid;">
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_lb8'] == 'Yes')
                                            <input type="checkbox" id="extraction_lb8" name="extraction_lb8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_lb8')" checked>
                                            <input type="hidden" id="extraction_lb8Hidden" name="extraction_lb8" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_lb8" name="extraction_lb8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_lb8" name="extraction_lb8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_lb7'] == 'Yes')
                                            <input type="checkbox" id="extraction_lb7" name="extraction_lb7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_lb7')" checked>
                                            <input type="hidden" id="extraction_lb7Hidden" name="extraction_lb7" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_lb7" name="extraction_lb7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_lb7" name="extraction_lb7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_lb6'] == 'Yes')
                                            <input type="checkbox" id="extraction_lb6" name="extraction_lb6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_lb6')" checked>
                                            <input type="hidden" id="extraction_lb6Hidden" name="extraction_lb6" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_lb6" name="extraction_lb6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_lb6" name="extraction_lb6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_lb5'] == 'Yes')
                                            <input type="checkbox" id="extraction_lb5" name="extraction_lb5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_lb5')" checked>
                                            <input type="hidden" id="extraction_lb5Hidden" name="extraction_lb5" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_lb5" name="extraction_lb5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_lb5" name="extraction_lb5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_lb4'] == 'Yes')
                                            <input type="checkbox" id="extraction_lb4" name="extraction_lb4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_lb4')" checked>
                                            <input type="hidden" id="extraction_lb4Hidden" name="extraction_lb4" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_lb4" name="extraction_lb4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_lb4" name="extraction_lb4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_lb3'] == 'Yes')
                                            <input type="checkbox" id="extraction_lb3" name="extraction_lb3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_lb3')" checked>
                                            <input type="hidden" id="extraction_lb3Hidden" name="extraction_lb3" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_lb3" name="extraction_lb3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_lb3" name="extraction_lb3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_lb2'] == 'Yes')
                                            <input type="checkbox" id="extraction_lb2" name="extraction_lb2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_lb2')" checked>
                                            <input type="hidden" id="extraction_lb2Hidden" name="extraction_lb2" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_lb2" name="extraction_lb2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_lb2" name="extraction_lb2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_lb1'] == 'Yes')
                                            <input type="checkbox" id="extraction_lb1" name="extraction_lb1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_lb1')" checked>
                                            <input type="hidden" id="extraction_lb1Hidden" name="extraction_lb1" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_lb1" name="extraction_lb1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_lb1" name="extraction_lb1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Right -->
                        <div class="col">
                            <div class="row" style="width: 278px; padding-left: 5px; padding-top: 5px; border-left: 1px solid; border-top: 1px solid;">
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_rb1'] == 'Yes')
                                            <input type="checkbox" id="extraction_rb1" name="extraction_rb1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_rb1')" checked>
                                            <input type="hidden" id="extraction_rb1Hidden" name="extraction_rb1" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_rb1" name="extraction_rb1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_rb1" name="extraction_rb1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_rb2'] == 'Yes')
                                            <input type="checkbox" id="extraction_rb2" name="extraction_rb2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_rb2')" checked>
                                            <input type="hidden" id="extraction_rb2Hidden" name="extraction_rb2" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_rb2" name="extraction_rb2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_rb2" name="extraction_rb2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_rb3'] == 'Yes')
                                            <input type="checkbox" id="extraction_rb3" name="extraction_rb3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_rb3')" checked>
                                            <input type="hidden" id="extraction_rb3Hidden" name="extraction_rb3" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_rb3" name="extraction_rb3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_rb3" name="extraction_rb3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_rb4'] == 'Yes')
                                            <input type="checkbox" id="extraction_rb4" name="extraction_rb4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_rb4')" checked>
                                            <input type="hidden" id="extraction_rb4Hidden" name="extraction_rb4" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_rb4" name="extraction_rb4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_rb4" name="extraction_rb4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_rb5'] == 'Yes')
                                            <input type="checkbox" id="extraction_rb5" name="extraction_rb5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_rb5')" checked>
                                            <input type="hidden" id="extraction_rb5Hidden" name="extraction_rb5" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_rb5" name="extraction_rb5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_rb5" name="extraction_rb5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_rb6'] == 'Yes')
                                            <input type="checkbox" id="extraction_rb6" name="extraction_rb6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_rb6')" checked>
                                            <input type="hidden" id="extraction_rb6Hidden" name="extraction_rb6" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_rb6" name="extraction_rb6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_rb6" name="extraction_rb6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_rb7'] == 'Yes')
                                            <input type="checkbox" id="extraction_rb7" name="extraction_rb7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_rb7')" checked>
                                            <input type="hidden" id="extraction_rb7Hidden" name="extraction_rb7" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_rb7" name="extraction_rb7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_rb7" name="extraction_rb7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                                <div class="col-0">
                                    @if($dentalExam->dental_exam_response->extraction == 'Yes')
                                        @if($dentalExam->dental_exam_response->dental_exam_extraction['extraction_rb8'] == 'Yes')
                                            <input type="checkbox" id="extraction_rb8" name="extraction_rb8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" onclick="toggleExtractCheckbox('extraction_rb8')" checked>
                                            <input type="hidden" id="extraction_rb8Hidden" name="extraction_rb8" value="Yes">
                                        @else
                                            <input type="checkbox" id="extraction_rb8" name="extraction_rb8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;">
                                        @endif
                                    @else
                                        <input type="checkbox" id="extraction_rb8" name="extraction_rb8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Numbers -->
                    <div class="row" style="margin-left: 217px;">
                        <!-- Left -->
                        <div class="col">
                            <div class="row" style="width: 278px; padding-right: 5px; padding-top: 5px;">
                                <div class="col-0" style="margin-left: 15px;">
                                    <p>8</p>
                                </div>
                                <div class="col-0" style="margin-left: 25px;">
                                    <p>7</p>
                                </div>
                                <div class="col-0" style="margin-left: 28px;">
                                    <p>6</p>
                                </div>
                                <div class="col-0" style="margin-left: 25px;">
                                    <p>5</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>4</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>3</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>2</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>1</p>
                                </div>
                            </div>
                        </div>
                        <!-- Right -->
                        <div class="col">
                            <div class="row" style="width: 278px; padding-right: 5px; padding-top: 5px;">
                                <div class="col-0" style="margin-left: 22px;">
                                    <p>1</p>
                                </div>
                                <div class="col-0" style="margin-left: 25px;">
                                    <p>2</p>
                                </div>
                                <div class="col-0" style="margin-left: 28px;">
                                    <p>3</p>
                                </div>
                                <div class="col-0" style="margin-left: 25px;">
                                    <p>4</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>5</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>6</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>7</p>
                                </div>
                                <div class="col-0" style="margin-left: 26px;">
                                    <p>8</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prosthodontic Restoration -->
            <div class="row mt-1">
                @if($dentalExam->dental_exam_response->prosthodontic_restoration == 'Yes')
                    <input type="checkbox" id="prosthodontic_restoration" name="prosthodontic_restoration" value="Yes" class="col-0 ml-3" style="height: 25px; width: 30px;" onclick="toggleCheckbox('prosthodontic_restoration')" checked>
                    <input type="hidden" id="prosthodontic_restorationHidden" name="prosthodontic_restoration" value="Yes">    
                @else
                    <input type="checkbox" id="prosthodontic_restoration" name="prosthodontic_restoration" value="Yes" class="col-0 ml-3" style="height: 25px; width: 30px;" onclick="toggleCheckbox('prosthodontic_restoration')">
                @endif
                <div class="col-0">
                    <p class="ml-3 h4">Prosthodontic Restoration</p>
                </div>
            </div>

            <!-- See an Orthodontist -->
            <div class="row mt-3">
                @if($dentalExam->dental_exam_response->orthodontist == 'Yes')
                    <input type="checkbox" id="orthodontist" name="orthodontist" value="Yes" class="col-0 ml-3" style="height: 25px; width: 30px;" onclick="toggleCheckbox('orthodontist')" checked>
                    <input type="hidden" id="orthodontistHidden" name="orthodontist" value="Yes">    
                @else
                    <input type="checkbox" id="orthodontist" name="orthodontist" value="Yes" class="col-0 ml-3" style="height: 25px; width: 30px;" onclick="toggleCheckbox('orthodontist')">
                @endif    
                <div class="col-0">
                    <p class="ml-3 h4">See an Orthodontist</p>
                </div>
            </div>

            <!-- Update -->
            <div class="position-right ml-auto mt-2" style="width: 90px;">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@stop

@section('footer')
    <p class="mb-0 h5 text-right">Asia Pacific College Data Privacy Act</p>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        function toggleCheckbox(checkboxId) {
            var checkbox = document.getElementById(checkboxId);
            var hiddenInput = document.getElementById(checkboxId + 'Hidden');
            
            if (checkbox.checked) {
                hiddenInput.value = "Yes";
            } else {
                hiddenInput.value = "No";
            }
        }

        function toggleExtractionCheckbox() {
            var extractionCheckbox = document.getElementById('extraction');
            var extractionHidden = document.getElementById('extractionHidden');
            var extractionHiddens = document.querySelectorAll('[id^="extraction_"][id$="Hidden"]');
                
            var isChecked = !extractionCheckbox.checked;
                
            extractionHiddens.forEach(function (hiddenField) {
                hiddenField.value = isChecked ? "No" : "Yes";
            });
        
            if (extractionHidden) {
                extractionHidden.value = isChecked ? "No" : "Yes";
            }
        
            var extractionCheckboxes = document.querySelectorAll('[id^="extraction_"]:not([id$="Hidden"])');
            extractionCheckboxes.forEach(function (checkbox) {
                checkbox.disabled = false; // Enable the checkboxes
                checkbox.checked = false; // Uncheck all checkboxes
            
                if (isChecked) {
                    checkbox.disabled = true; // Disable the checkboxes if extraction is "No"
                }
            });
        }

        function toggleExtractCheckbox(checkboxId) {
            var checkbox = document.getElementById(checkboxId);
            var hiddenInput = document.getElementById(checkboxId + 'Hidden');
            
            if (checkbox.checked) {
                hiddenInput.value = "Yes";
            } else {
                hiddenInput.value = "No";
            }
        }

        function toggleRestorationCheckbox() {
            var restorationCheckbox = document.getElementById('restoration');
            var restorationHidden = document.getElementById('restorationHidden');
            var restorationHiddens = document.querySelectorAll('[id^="restoration_"][id$="Hidden"]');
                
            var isChecked = !restorationCheckbox.checked;
                
            restorationHiddens.forEach(function (hiddenField) {
                hiddenField.value = isChecked ? "No" : "Yes";
            });
        
            if (restorationHidden) {
                restorationHidden.value = isChecked ? "No" : "Yes";
            }
        
            var restorationCheckboxes = document.querySelectorAll('[id^="restoration_"]:not([id$="Hidden"])');
            restorationCheckboxes.forEach(function (checkbox) {
                checkbox.disabled = false; // Enable the checkboxes
                checkbox.checked = false; // Uncheck all checkboxes
            
                if (isChecked) {
                    checkbox.disabled = true; // Disable the checkboxes if restoration is "No"
                }
            });
        }

        function toggleRestorCheckbox(checkboxId) {
            var checkbox = document.getElementById(checkboxId);
            var hiddenInput = document.getElementById(checkboxId + 'Hidden');
            
            if (checkbox.checked) {
                hiddenInput.value = "Yes";
            } else {
                hiddenInput.value = "No";
            }
        }
    </script>
@stop