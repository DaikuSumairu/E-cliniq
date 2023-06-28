@extends('adminlte::page')

@section('title', 'Homepage')

@section('content_header')
    <h1>Daily Visit List</h1>
@stop

@section('content')
    <div class="container border" style="height: 470px;">
        <form method="POST" action="{{ route('nurse.visitStore') }}">
            @csrf

            <div class="row mt-3">
                <div class="col">
                    <div class="form-group">
                        <label for="school_id">ID:</label>
                        <input type="text" class="form-control" id="school_id" name="school_id">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="name">Main Complaint:</label>
                        <select class="form-control hour-input" id="main_complaint" required>
                            <option disabled selected>-- Select Main Complaint --</option>
                            <option id="meds" name="meds" value="No">Take A Medicine</option>
                            <option id="cardiology" name="cardiology" value="No">Cardiology</option>
                            <option id="pulmonology" name="pulmonology" value="No">Pulmonology</option>
                            <option id="gastroenterology" name="gastroenterology" value="No">Gastroenterology</option>
                            <option id="musculo_skeletal" name="musculo_skeletal" value="No">Musculo Skeletal</option>
                            <option id="opthalmology" name="opthalmology" value="No">Opthalmology</option>
                            <option id="ent" name="ent" value="No">ENT</option>
                            <option id="neurology" name="neurology" value="No">Neurology</option>
                            <option id="dermatology" name="dermatology" value="No">Dermatology</option>
                            <option id="nephrology" name="nephrology" value="No">Nephrology</option>
                            <option id="endocrinology" name="endocrinology" value="No">Endocrinology</option>
                            <option id="ob_gyne" name="ob_gyne" value="No">OB-Gyne</option>
                            <option id="hematologic" name="hematologic" value="No">Hematologic</option>
                            <option id="surgery" name="surgery" value="No">Surgery</option>
                            <option id="allergology" name="allergology" value="No">Allergology</option>
                        </select>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="name">Sub Complaint:</label>
                        <select class="form-control hour-input" id="sub_complaint" required>
                            <option value=" ">-- Select Sub Complaint --</option>
                        </select>
                    </div>
                </div>
            </div>
            <button>Submit</button>
        </form>
    </div>
@stop

@section('footer')
    <p class="mb-0 h6">Asia Pacific College Data Privacy Act</p>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- Main Complaint and Sub Complaint -->
    <script>
        const mainComplaintSelect = document.getElementById("main_complaint");
        const subComplaintSelect = document.getElementById("sub_complaint");

        mainComplaintSelect.addEventListener("change", function() {
            // Set "Yes" or "No" value for main complaint options
            const options = mainComplaintSelect.getElementsByTagName("option");
            for (let i = 0; i < options.length; i++) {
                const option = options[i];
                if (option.selected) {
                    option.value = "Yes";
                } else {
                    option.value = "No";
                }
            }

            // Clear existing options
            subComplaintSelect.innerHTML = '<option value=" ">-- Select Sub Complaint --</option>';

            // Get the selected value and ID of the main complaint
            const selectedMainComplaint = mainComplaintSelect.value;
            const selectedMainComplaintId = mainComplaintSelect.options[mainComplaintSelect.selectedIndex].id;

            // Populate sub complaint options based on the selected main complaint's ID
            if (selectedMainComplaintId === "cardiology") {
                subComplaintSelect.innerHTML += `
                    <option name="hypertension" value="No">Hypertension</option>
                    <option name="bp_monitoring" value="No">BP Monitoring</option>
                    <option name="bradycardia" value="No">Bradycardia</option>
                    <option name="hypotension value="No">Hypotension</option>
                `;
            } else if (selectedMainComplaintId === "pulmonology") {
                subComplaintSelect.innerHTML += `
                    <option name="urti" value="No">URTI</option>
                    <option name="pneumonia" value="No">Pneumonia</option>
                    <option name="ptb" value="No">PTB</option>
                    <option name="bronchitis" value="No">Bronchitis</option>
                    <option name="lung_pathology" value="No">Lung Pathology</option>
                    <option name="acute_bronchitis" value="No">Acute Bronchitis</option>
                `;
            } else if (selectedMainComplaintId === "gastroenterology") {
                subComplaintSelect.innerHTML += `
                    <option name="acute_gastroenteritis" value="No">Acute Gastroenteritis</option>
                    <option name="gerd" value="No">GERD</option>
                    <option name="hemorrhoids" value="No">Hemorrhoids</option>
                    <option name="anorexia" value="No">Anorexia</option>
                `;
            } else if (selectedMainComplaintId === "musculo_skeletal") {
                subComplaintSelect.innerHTML += `
                    <option name="ligament_sprain" value="No">Ligament Sprain</option>
                    <option name="muscle_strain" value="No">Muscle Strain</option>
                    <option name="costrochondritis" value="No">Costrochondritis</option>
                    <option name="soft_tissue_contusion" value="No">Soft Tissue Contusion</option>
                    <option name="fracture" value="No">Fracture</option>
                    <option name="gouty_arthritis" value="No">Gouty Arthritis</option>
                    <option name="plantar_fasciitis" value="No">Plantar Fasciitis</option>
                    <option name="dislocation" value="No">Dislocation</option>
                `;
            } else if (selectedMainComplaintId === "opthalmology") {
                subComplaintSelect.innerHTML += `
                    <option name="conjunctivitis" value="No">Conjunctivitis</option>
                    <option name="stye" value="No">Stye</option>
                    <option name="foreign_body" value="No">Foreign Body</option>
                `;
            } else if (selectedMainComplaintId === "ent") {
                subComplaintSelect.innerHTML += `
                    <option name="stomatitis" value="No">Stomatitis</option>
                    <option name="epistaxis" value="No">Epistaxis</option>
                    <option name="otitis_media" value="No">Otitis Media</option>
                    <option name="foreign_body_removal" value="No">Foreign Body Removal</option>
                `;
            } else if (selectedMainComplaintId === "neurology") {
                subComplaintSelect.innerHTML += `
                    <option name="tension_headache" value="No">Tension Headache</option>
                    <option name="migraine" value="No">Migraine</option>
                    <option name="vertigo" value="No">Vertigo</option>
                    <option name="hyperventilation_syndrome" value="No">Hyperventilation Syndrome</option>
                    <option name="insomnia" value="No">Insomnia</option>
                    <option name="seizure" value="No">Seizure</option>
                    <option name="bell_palsy" value="No">Bell's Palsy</option>
                `;
            } else if (selectedMainComplaintId === "dermatology") {
                subComplaintSelect.innerHTML += `
                    <option name="folliculitis" value="No">Folliculitis</option>
                    <option name="carbuncle" value="No">Carbuncle</option>
                    <option name="burn" value="No">Burn</option>
                    <option name="wound_dressing" value="No">Wound Dressing</option>
                    <option name="infected_wound" value="No">Infected Wound</option>
                    <option name="blister_wound" value="No">Blister Wound</option>
                    <option name="seborrheic_dermatitis" value="No">Seborrheic Dermatitis</option>
                    <option name="bruise" value="No">Bruise / Hematoma</option>
                `;
            } else if (selectedMainComplaintId === "nephrology") {
                subComplaintSelect.innerHTML += `
                    <option name="urinary_tract_infection" value="No">Urinary Tract Infection</option>
                    <option name="renal_disease" value="No">Renal Disease</option>
                    <option name="urolithiasis" value="No">Urolithiasis</option>
                `;
            } else if (selectedMainComplaintId === "endocrinology") {
                subComplaintSelect.innerHTML += `
                    <option name="hypoglycemia" value="No">Hypoglycemia</option>
                    <option name="dyslipidemia" value="No">Dyslipidemia</option>
                    <option name="diabetes_mellitus" value="No">Diabetes Mellitus</option>
                `;
            } else if (selectedMainComplaintId === "ob_gyne") {
                subComplaintSelect.innerHTML += `
                    <option name="dysmenorrhea" value="No">Dysmenorrhea</option>
                    <option name="hormonal_imbalance" value="No">Hormonal Imbalance</option>
                    <option name="pregnancy" value="No">Pregnancy</option>
                `;
            } else if (selectedMainComplaintId === "hematologic") {
                subComplaintSelect.innerHTML += `
                    <option name="leukemia" value="No">Leukemia</option>
                    <option name="blood_dyscrasia" value="No">Blood Dyscrasia</option>
                    <option name="anemia" value="No">Anemia</option>
                `;
            } else if (selectedMainComplaintId === "surgery") {
                subComplaintSelect.innerHTML += `
                    <option name="lacerated_wound" value="No">Lacerated Wound</option>
                    <option name="punctured_wound" value="No">Punctured Wound</option>
                    <option name="animal_bite" value="No">Animal Bite</option>
                    <option name="superfacial_abrasions" value="No">Superfacial Abrasions</option>
                    <option name="foreign_body_removal1" value="No">Foreign Body Removal</option>
                `;
            } else if (selectedMainComplaintId === "allergology") {
                subComplaintSelect.innerHTML += `
                    <option name="contact_dermatitis" value="No">Contact Dermatitis</option>
                    <option name="allergic_rhinitis" value="No">Allergic Rhinitis</option>
                    <option name="bronchial_asthma" value="No">Bronchial Asthma</option>
                    <option name="hypersensitivity" value="No">Hypersensitivity</option>
                `;
            }

            subComplaintSelect.addEventListener("change", function() {
            // Set "Yes" or "No" value for sub complaint options
            const options = subComplaintSelect.getElementsByTagName("option");
            for (let i = 0; i < options.length; i++) {
                const option = options[i];
                if (option.selected) {
                    option.value = "Yes";
                } else {
                    option.value = "No";
                }
            }
            });
        });

        // Trigger the change event initially to populate sub complaint options if a default option is selected
        mainComplaintSelect.dispatchEvent(new Event('change'));
    </script>


@stop