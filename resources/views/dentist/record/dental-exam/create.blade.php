@extends('adminlte::page')

@section('title', 'Create Dental Examination Record')

@section('content_header')
    <h1>Creating Dental Examination Record</h1>
@stop

@section('content')
    <div class="container border mx-auto pb-4" style="height: 625px; overflow: auto;">
        <form method="POST" action="{{ route('nurse.dentalExamStore') }}">
            @csrf
            <!-- Record ID Created (Hidden) -->
            <input type="hidden" name="record_id" value="{{ $record->id }}">
            <input type="hidden" name="date_created" value="{{ now() }}">

            <h3 class="mt-2"><strong>INTRAORAL EXAMINATION</strong></h3>

            <!-- Oral Hygiene -->
            <div class="row mx-auto">
                <div class="col-0" style="margin-right: 450px;margin-left: 85px;">
                    <p class="h4">Oral Hygiene</p>
                </div>
                <div class="col-1 pt-1">
                    <input class="form-check-input" type="radio" name="oral_hygiene" id="oral_hygiene" value="Good" required>
                    <label>Good</label>
                </div>
                <div class="col-1 pt-1">
                    <input class="form-check-input" type="radio" name="oral_hygiene" id="oral_hygiene" value="Fair" required>
                    <label>Fair</label>
                </div>
                <div class="col-1 pt-1">
                    <input class="form-check-input" type="radio" name="oral_hygiene" id="oral_hygiene" value="Poor" required>
                    <label>Poor</label>
                </div>
            </div>

            <!-- Gingival Color -->
            <div class="row mx-auto">
                <div class="col-0" style="margin-right: 450px;margin-left: 75px;">
                    <p class="h4">Gingival Color</p>
                </div>
                <div class="col-1 pt-1">
                    <input class="form-check-input" type="radio" name="gingival_color" id="gingival_color" value="Pink" required>
                    <label>Pink</label>
                </div>
                <div class="col-1 pt-1">
                    <input class="form-check-input" type="radio" name="gingival_color" id="gingival_color" value="Pale" required>
                    <label>Pale</label>
                </div>
                <div class="col-1 pt-1">
                    <input class="form-check-input" type="radio" name="gingival_color" id="gingival_color" value="Bright Red" required>
                    <label>Bright Red</label>
                </div>
            </div>
            
            <!-- Consistency of the Gingival -->
            <div class="row mx-auto">
                <div class="col-0" style="margin-right: 370px;margin-left: 25px;">
                    <p class="h4">Consistency of the Gingival</p>
                </div>
                <div class="col-1 pt-1">
                    <input class="form-check-input" type="radio" name="consistency_of_the_gingival" id="consistency_of_the_gingival" value="Firm" required>
                    <label>Firm</label>
                </div>
                <div class="col-1 pt-1">
                    <input class="form-check-input" type="radio" name="consistency_of_the_gingival" id="consistency_of_the_gingival" value="Smooth" required>
                    <label>Smooth</label>
                </div>
                <div class="col-1 pt-1">
                    <input class="form-check-input" type="radio" name="consistency_of_the_gingival" id="consistency_of_the_gingival" value="Enlarge" required>
                    <label>Enlarge</label>
                </div>
            </div>

            <!-- Oral Prophylaxis -->
            <div class="row mt-1">
                <input type="checkbox" id="oral_prophylaxis" name="oral_prophylaxis" value="No" class="col-0 ml-3" style="height: 25px; width: 30px;" onclick="toggleCheckbox('oral_prophylaxis')">
                <div class="col-0">
                    <p class="ml-3 h4">Oral Prophylaxis</p>
                </div>
            </div>

            <!-- Restoration of: -->
            <div class="row mt-1 my-2">
                <div class="row" style="width: 232px; padding-top: 65px;">
                    <input type="checkbox" id="restoration" name="restoration" value="No" class="col-0 ml-4" style="height: 25px; width: 30px;" onclick="toggleRestorationCheckbox()">
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
                                    <input type="checkbox" id="restoration_lt8" name="restoration_lt8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_lt7" name="restoration_lt7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_lt6" name="restoration_lt6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_lt5" name="restoration_lt5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_lt4" name="restoration_lt4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_lt3" name="restoration_lt3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_lt2" name="restoration_lt2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_lt1" name="restoration_lt1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                            </div>
                        </div>
                        <!-- Right -->
                        <div class="col">
                            <div class="row" style="width: 278px; padding-left: 5px; border-left: 1px solid; border-bottom: 1px solid;">
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_rt1" name="restoration_rt1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_rt2" name="restoration_rt2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_rt3" name="restoration_rt3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_rt4" name="restoration_rt4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_rt5" name="restoration_rt5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_rt6" name="restoration_rt6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_rt7" name="restoration_rt7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_rt8" name="restoration_rt8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
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
                                    <input type="checkbox" id="restoration_lb8" name="restoration_lb8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_lb7" name="restoration_lb7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_lb6" name="restoration_lb6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_lb5" name="restoration_lb5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_lb4" name="restoration_lb4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_lb3" name="restoration_lb3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_lb2" name="restoration_lb2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_lb1" name="restoration_lb1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                            </div>
                        </div>
                        <!-- Right -->
                        <div class="col">
                            <div class="row" style="width: 278px; padding-left: 5px; padding-top: 5px; border-left: 1px solid; border-top: 1px solid;">
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_rb1" name="restoration_rb1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_rb2" name="restoration_rb2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_rb3" name="restoration_rb3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_rb4" name="restoration_rb4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_rb5" name="restoration_rb5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_rb6" name="restoration_rb6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_rb7" name="restoration_rb7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="restoration_rb8" name="restoration_rb8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
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
                    <input type="checkbox" id="extraction" name="extraction" value="No" class="col-0 ml-4" style="height: 25px; width: 30px;" onclick="toggleExtractionCheckbox()">
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
                                    <input type="checkbox" id="extraction_lt8" name="extraction_lt8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_lt7" name="extraction_lt7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_lt6" name="extraction_lt6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_lt5" name="extraction_lt5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_lt4" name="extraction_lt4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_lt3" name="extraction_lt3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_lt2" name="extraction_lt2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_lt1" name="extraction_lt1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                            </div>
                        </div>
                        <!-- Right -->
                        <div class="col">
                            <div class="row" style="width: 278px; padding-left: 5px; border-left: 1px solid; border-bottom: 1px solid;">
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_rt1" name="extraction_rt1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_rt2" name="extraction_rt2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_rt3" name="extraction_rt3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_rt4" name="extraction_rt4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_rt5" name="extraction_rt5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_rt6" name="extraction_rt6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_rt7" name="extraction_rt7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_rt8" name="extraction_rt8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
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
                                    <input type="checkbox" id="extraction_lb8" name="extraction_lb8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_lb7" name="extraction_lb7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_lb6" name="extraction_lb6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_lb5" name="extraction_lb5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_lb4" name="extraction_lb4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_lb3" name="extraction_lb3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_lb2" name="extraction_lb2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_lb1" name="extraction_lb1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                            </div>
                        </div>
                        <!-- Right -->
                        <div class="col">
                            <div class="row" style="width: 278px; padding-left: 5px; padding-top: 5px; border-left: 1px solid; border-top: 1px solid;">
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_rb1" name="extraction_rb1" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_rb2" name="extraction_rb2" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_rb3" name="extraction_rb3" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_rb4" name="extraction_rb4" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_rb5" name="extraction_rb5" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_rb6" name="extraction_rb6" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_rb7" name="extraction_rb7" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
                                </div>
                                <div class="col-0">
                                    <input type="checkbox" id="extraction_rb8" name="extraction_rb8" value="Yes" class="col-0 ml-1" style="height: 25px; width: 30px;" disabled>
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
                <input type="checkbox" id="prosthodontic_restoration" name="prosthodontic_restoration" value="No" class="col-0 ml-3" style="height: 25px; width: 30px;" onclick="toggleCheckbox('prosthodontic_restoration')">
                <div class="col-0">
                    <p class="ml-3 h4">Prosthodontic Restoration</p>
                </div>
            </div>

            <!-- See an Orthodontist -->
            <div class="row mt-3">
                <input type="checkbox" id="orthodontist" name="orthodontist" value="No" class="col-0 ml-3" style="height: 25px; width: 30px;" onclick="toggleCheckbox('orthodontist')">
                <div class="col-0">
                    <p class="ml-3 h4">See an Orthodontist</p>
                </div>
            </div>

            <!-- Submit -->
            <div class="position-right ml-auto mt-2" style="width: 90px;">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        function toggleCheckbox(checkboxId) {
        var checkbox = document.getElementById(checkboxId);
            if (checkbox.checked) {
                checkbox.value = "Yes";
            } else {
                checkbox.value = "No";
            }
        }

        function toggleExtractionCheckbox() {
            var extractionCheckbox = document.getElementById('extraction');
            var extractionLt8Checkbox = document.getElementById('extraction_lt8');
            var extractionLt7Checkbox = document.getElementById('extraction_lt7');
            var extractionLt6Checkbox = document.getElementById('extraction_lt6');
            var extractionLt5Checkbox = document.getElementById('extraction_lt5');
            var extractionLt4Checkbox = document.getElementById('extraction_lt4');
            var extractionLt3Checkbox = document.getElementById('extraction_lt3');
            var extractionLt2Checkbox = document.getElementById('extraction_lt2');
            var extractionLt1Checkbox = document.getElementById('extraction_lt1');
            var extractionRt1Checkbox = document.getElementById('extraction_rt1');
            var extractionRt2Checkbox = document.getElementById('extraction_rt2');
            var extractionRt3Checkbox = document.getElementById('extraction_rt3');
            var extractionRt4Checkbox = document.getElementById('extraction_rt4');
            var extractionRt5Checkbox = document.getElementById('extraction_rt5');
            var extractionRt6Checkbox = document.getElementById('extraction_rt6');
            var extractionRt7Checkbox = document.getElementById('extraction_rt7');
            var extractionRt8Checkbox = document.getElementById('extraction_rt8');
            var extractionLb1Checkbox = document.getElementById('extraction_lb1');
            var extractionLb2Checkbox = document.getElementById('extraction_lb2');
            var extractionLb3Checkbox = document.getElementById('extraction_lb3');
            var extractionLb4Checkbox = document.getElementById('extraction_lb4');
            var extractionLb5Checkbox = document.getElementById('extraction_lb5');
            var extractionLb6Checkbox = document.getElementById('extraction_lb6');
            var extractionLb7Checkbox = document.getElementById('extraction_lb7');
            var extractionLb8Checkbox = document.getElementById('extraction_lb8');
            var extractionRb1Checkbox = document.getElementById('extraction_rb1');
            var extractionRb2Checkbox = document.getElementById('extraction_rb2');
            var extractionRb3Checkbox = document.getElementById('extraction_rb3');
            var extractionRb4Checkbox = document.getElementById('extraction_rb4');
            var extractionRb5Checkbox = document.getElementById('extraction_rb5');
            var extractionRb6Checkbox = document.getElementById('extraction_rb6');
            var extractionRb7Checkbox = document.getElementById('extraction_rb7');
            var extractionRb8Checkbox = document.getElementById('extraction_rb8');

            var extractionCheckboxes = [
                extractionLt8Checkbox, extractionLt7Checkbox, extractionLt6Checkbox, extractionLt5Checkbox,
                extractionLt4Checkbox, extractionLt3Checkbox, extractionLt2Checkbox, extractionLt1Checkbox,
                extractionRt1Checkbox, extractionRt2Checkbox, extractionRt3Checkbox, extractionRt4Checkbox,
                extractionRt5Checkbox, extractionRt6Checkbox, extractionRt7Checkbox, extractionRt8Checkbox,
                extractionLb1Checkbox, extractionLb2Checkbox, extractionLb3Checkbox, extractionLb4Checkbox,
                extractionLb5Checkbox, extractionLb6Checkbox, extractionLb7Checkbox, extractionLb8Checkbox,
                extractionRb1Checkbox, extractionRb2Checkbox, extractionRb3Checkbox, extractionRb4Checkbox,
                extractionRb5Checkbox, extractionRb6Checkbox, extractionRb7Checkbox, extractionRb8Checkbox
            ];
          
            var isChecked = !extractionCheckbox.checked;
          
            extractionCheckboxes.forEach(function (checkbox) {
                checkbox.disabled = isChecked;
                if (isChecked) {
                    checkbox.checked = false;
                    extractionCheckbox.value = "No";
                } else {
                    extractionCheckbox.value = "Yes";
                }
            });
        }

        function toggleRestorationCheckbox() {
            var restorationCheckbox = document.getElementById('restoration');
            var restorationLt8Checkbox = document.getElementById('restoration_lt8');
            var restorationLt7Checkbox = document.getElementById('restoration_lt7');
            var restorationLt6Checkbox = document.getElementById('restoration_lt6');
            var restorationLt5Checkbox = document.getElementById('restoration_lt5');
            var restorationLt4Checkbox = document.getElementById('restoration_lt4');
            var restorationLt3Checkbox = document.getElementById('restoration_lt3');
            var restorationLt2Checkbox = document.getElementById('restoration_lt2');
            var restorationLt1Checkbox = document.getElementById('restoration_lt1');
            var restorationRt1Checkbox = document.getElementById('restoration_rt1');
            var restorationRt2Checkbox = document.getElementById('restoration_rt2');
            var restorationRt3Checkbox = document.getElementById('restoration_rt3');
            var restorationRt4Checkbox = document.getElementById('restoration_rt4');
            var restorationRt5Checkbox = document.getElementById('restoration_rt5');
            var restorationRt6Checkbox = document.getElementById('restoration_rt6');
            var restorationRt7Checkbox = document.getElementById('restoration_rt7');
            var restorationRt8Checkbox = document.getElementById('restoration_rt8');
            var restorationLb1Checkbox = document.getElementById('restoration_lb1');
            var restorationLb2Checkbox = document.getElementById('restoration_lb2');
            var restorationLb3Checkbox = document.getElementById('restoration_lb3');
            var restorationLb4Checkbox = document.getElementById('restoration_lb4');
            var restorationLb5Checkbox = document.getElementById('restoration_lb5');
            var restorationLb6Checkbox = document.getElementById('restoration_lb6');
            var restorationLb7Checkbox = document.getElementById('restoration_lb7');
            var restorationLb8Checkbox = document.getElementById('restoration_lb8');
            var restorationRb1Checkbox = document.getElementById('restoration_rb1');
            var restorationRb2Checkbox = document.getElementById('restoration_rb2');
            var restorationRb3Checkbox = document.getElementById('restoration_rb3');
            var restorationRb4Checkbox = document.getElementById('restoration_rb4');
            var restorationRb5Checkbox = document.getElementById('restoration_rb5');
            var restorationRb6Checkbox = document.getElementById('restoration_rb6');
            var restorationRb7Checkbox = document.getElementById('restoration_rb7');
            var restorationRb8Checkbox = document.getElementById('restoration_rb8');
            
            var restorationCheckboxes = [
                restorationLt8Checkbox, restorationLt7Checkbox, restorationLt6Checkbox, restorationLt5Checkbox,
                restorationLt4Checkbox, restorationLt3Checkbox, restorationLt2Checkbox, restorationLt1Checkbox,
                restorationRt1Checkbox, restorationRt2Checkbox, restorationRt3Checkbox, restorationRt4Checkbox,
                restorationRt5Checkbox, restorationRt6Checkbox, restorationRt7Checkbox, restorationRt8Checkbox,
                restorationLb1Checkbox, restorationLb2Checkbox, restorationLb3Checkbox, restorationLb4Checkbox,
                restorationLb5Checkbox, restorationLb6Checkbox, restorationLb7Checkbox, restorationLb8Checkbox,
                restorationRb1Checkbox, restorationRb2Checkbox, restorationRb3Checkbox, restorationRb4Checkbox,
                restorationRb5Checkbox, restorationRb6Checkbox, restorationRb7Checkbox, restorationRb8Checkbox
            ];
        
            var isChecked = !restorationCheckbox.checked;
        
            restorationCheckboxes.forEach(function (checkbox) {
                checkbox.disabled = isChecked;
                if (isChecked) {
                    checkbox.checked = false;
                    restorationCheckbox.value = "No";
                } else {
                    restorationCheckbox.value = "Yes";
                }
            });
        }
    </script>
@stop