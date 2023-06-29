@extends('adminlte::page')

@section('title', 'Daily Visit')

@section('content_header')
    <h1>Daily Visit</h1>
@stop

@section('content')
    <div class="container border" style="height: 470px;">
        <form method="POST" id="myForm" action="{{ route('nurse.visitStore') }}">
            @csrf
            <div class="row mt-3">
                <div class="col text-right">
                    <label>Date: </label>
                    <input type="date" name="day" id="date-input" style="width: 120px;" readonly>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <div class="dropdown">
                            <input type="text" class="form-control" id="name" autocomplete="off" name="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" required>
                            <div class="dropdown-menu" aria-labelledby="name" id="dropdown-menu"></div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="school_id">ID:</label>
                        <input type="text" class="form-control" id="school_id" name="user_school_id" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="name">Main Complaint:</label>
                        <select class="form-control hour-input" id="main_complaint" name="" value="" required>
                            <option disabled selected>-- Select Main Complaint --</option>
                            <option id="cardiology" name="cardiology" value="Yes">Cardiology</option>
                            <option id="pulmonology" name="pulmonology" value="Yes">Pulmonology</option>
                            <option id="gastroenterology" name="gastroenterology" value="Yes">Gastroenterology</option>
                            <option id="musculo_skeletal" name="musculo_skeletal" value="Yes">Musculo Skeletal</option>
                            <option id="opthalmology" name="opthalmology" value="Yes">Opthalmology</option>
                            <option id="ent" name="ent" value="Yes">ENT</option>
                            <option id="neurology" name="neurology" value="Yes">Neurology</option>
                            <option id="dermatology" name="dermatology" value="Yes">Dermatology</option>
                            <option id="nephrology" name="nephrology" value="Yes">Nephrology</option>
                            <option id="endocrinology" name="endocrinology" value="Yes">Endocrinology</option>
                            <option id="ob_gyne" name="ob_gyne" value="Yes">OB-Gyne</option>
                            <option id="hematologic" name="hematologic" value="Yes">Hematologic</option>
                            <option id="surgery" name="surgery" value="Yes">Surgery</option>
                            <option id="allergology" name="allergology" value="Yes">Allergology</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="name">Sub Complaint:</label>
                        <select class="form-control hour-input" id="sub_complaint" name="" value="" required>
                            <option disabled selected>-- Select First in the Main Complaint --</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <input type="checkbox" id="meds" name="meds" value="Yes">
                            <label class="h5">Take A Medicine</label>
                        </div>
                        <div class="col" style="overflow: auto; height: 250px; display: none;" id="medicine-col">
                            <a class="btn btn-info mt-2 add-medicine">+</a>
                            <div id="medicine-container">
                                <div class="medicine-row">
                                    <select class="form-control hour-input" id="med" disabled>
                                        <option disabled selected>-- Select Medicine --</option>
                                        @foreach ($inventory as $inventoryItem)
                                            <option value="{{ $inventoryItem->name }}" data-quantity="{{ $inventoryItem->quantity }}">{{ $inventoryItem->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="number" class="form-control" id="med_quantity" name="quantity" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                mainComplaintSelect.setAttribute("name", option.id);
                mainComplaintSelect.setAttribute("value", "Yes");
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
                    <option id="hypertension" name="hypertension" value="Yes">Hypertension</option>
                    <option id="bp_monitoring" name="bp_monitoring" value="Yes">BP Monitoring</option>
                    <option id="bradycardia" name="bradycardia" value="Yes">Bradycardia</option>
                    <option id="hypotension" name="hypotension" value="Yes">Hypotension</option>
                `;
            } else if (selectedMainComplaintId === "pulmonology") {
                subComplaintSelect.innerHTML += `
                    <option id="urti" name="urti" value="Yes">URTI</option>
                    <option id="pneumonia" name="pneumonia" value="Yes">Pneumonia</option>
                    <option id="ptb" name="ptb" value="Yes">PTB</option>
                    <option id="bronchitis" name="bronchitis" value="Yes">Bronchitis</option>
                    <option id="lung_pathology" name="lung_pathology" value="Yes">Lung Pathology</option>
                    <option id="acute_bronchitis" name="acute_bronchitis" value="Yes">Acute Bronchitis</option>
                `;
            } else if (selectedMainComplaintId === "gastroenterology") {
                subComplaintSelect.innerHTML += `
                    <option id="acute_gastroenteritis" name="acute_gastroenteritis" value="Yes">Acute Gastroenteritis</option>
                    <option id="gerd" name="gerd" value="Yes">GERD</option>
                    <option id="hemorrhoids" name="hemorrhoids" value="Yes">Hemorrhoids</option>
                    <option id="anorexia" name="anorexia" value="Yes">Anorexia</option>
                `;
            } else if (selectedMainComplaintId === "musculo_skeletal") {
                subComplaintSelect.innerHTML += `
                    <option id="ligament_sprain" name="ligament_sprain" value="Yes">Ligament Sprain</option>
                    <option id="muscle_strain" name="muscle_strain" value="Yes">Muscle Strain</option>
                    <option id="costrochondritis" name="costrochondritis" value="Yes">Costrochondritis</option>
                    <option id="soft_tissue_contusion" name="soft_tissue_contusion" value="Yes">Soft Tissue Contusion</option>
                    <option id="fracture" name="fracture" value="Yes">Fracture</option>
                    <option id="gouty_arthritis" name="gouty_arthritis" value="Yes">Gouty Arthritis</option>
                    <option id="plantar_fasciitis" name="plantar_fasciitis" value="Yes">Plantar Fasciitis</option>
                    <option id="dislocation" name="dislocation" value="Yes">Dislocation</option>
                `;
            } else if (selectedMainComplaintId === "opthalmology") {
                subComplaintSelect.innerHTML += `
                    <option id="conjunctivitis" name="conjunctivitis" value="Yes">Conjunctivitis</option>
                    <option id="stye" name="stye" value="Yes">Stye</option>
                    <option id="foreign_body" name="foreign_body" value="Yes">Foreign Body</option>
                `;
            } else if (selectedMainComplaintId === "ent") {
                subComplaintSelect.innerHTML += `
                    <option id="stomatitis" name="stomatitis" value="Yes">Stomatitis</option>
                    <option id="epistaxis" name="epistaxis" value="Yes">Epistaxis</option>
                    <option id="otitis_media" name="otitis_media" value="Yes">Otitis Media</option>
                    <option id="foreign_body_removal" name="foreign_body_removal" value="Yes">Foreign Body Removal</option>
                `;
            } else if (selectedMainComplaintId === "neurology") {
                subComplaintSelect.innerHTML += `
                    <option id="tension_headache" name="tension_headache" value="Yes">Tension Headache</option>
                    <option id="migraine" name="migraine" value="Yes">Migraine</option>
                    <option id="vertigo" name="vertigo" value="Yes">Vertigo</option>
                    <option id="hyperventilation_syndrome" name="hyperventilation_syndrome" value="Yes">Hyperventilation Syndrome</option>
                    <option id="insomnia" name="insomnia" value="Yes">Insomnia</option>
                    <option id="seizure" name="seizure" value="Yes">Seizure</option>
                    <option id="bell_palsy" name="bell_palsy" value="Yes">Bell's Palsy</option>
                `;
            } else if (selectedMainComplaintId === "dermatology") {
                subComplaintSelect.innerHTML += `
                    <option id="folliculitis" name="folliculitis" value="Yes">Folliculitis</option>
                    <option id="carbuncle" name="carbuncle" value="Yes">Carbuncle</option>
                    <option id="burn" name="burn" value="Yes">Burn</option>
                    <option id="wound_dressing" name="wound_dressing" value="Yes">Wound Dressing</option>
                    <option id="infected_wound" name="infected_wound" value="Yes">Infected Wound</option>
                    <option id="blister_wound" name="blister_wound" value="Yes">Blister Wound</option>
                    <option id="seborrheic_dermatitis" name="seborrheic_dermatitis" value="Yes">Seborrheic Dermatitis</option>
                    <option id="bruise" name="bruise" value="Yes">Bruise / Hematoma</option>
                `;
            } else if (selectedMainComplaintId === "nephrology") {
                subComplaintSelect.innerHTML += `
                    <option id="urinary_tract_infection" name="urinary_tract_infection" value="Yes">Urinary Tract Infection</option>
                    <option id="renal_disease" name="renal_disease" value="Yes">Renal Disease</option>
                    <option id="urolithiasis" name="urolithiasis" value="Yes">Urolithiasis</option>
                `;
            } else if (selectedMainComplaintId === "endocrinology") {
                subComplaintSelect.innerHTML += `
                    <option id="hypoglycemia" name="hypoglycemia" value="Yes">Hypoglycemia</option>
                    <option id="dyslipidemia" name="dyslipidemia" value="Yes">Dyslipidemia</option>
                    <option id="diabetes_mellitus" name="diabetes_mellitus" value="Yes">Diabetes Mellitus</option>
                `;
            } else if (selectedMainComplaintId === "ob_gyne") {
                subComplaintSelect.innerHTML += `
                    <option id="dysmenorrhea" name="dysmenorrhea" value="Yes">Dysmenorrhea</option>
                    <option id="hormonal_imbalance" name="hormonal_imbalance" value="Yes">Hormonal Imbalance</option>
                    <option id="pregnancy" name="pregnancy" value="Yes">Pregnancy</option>
                `;
            } else if (selectedMainComplaintId === "hematologic") {
                subComplaintSelect.innerHTML += `
                    <option id="leukemia" name="leukemia" value="Yes">Leukemia</option>
                    <option id="blood_dyscrasia" name="blood_dyscrasia" value="Yes">Blood Dyscrasia</option>
                    <option id="anemia" name="anemia" value="Yes">Anemia</option>
                `;
            } else if (selectedMainComplaintId === "surgery") {
                subComplaintSelect.innerHTML += `
                    <option id="lacerated_wound" name="lacerated_wound" value="Yes">Lacerated Wound</option>
                    <option id="punctured_wound" name="punctured_wound" value="Yes">Punctured Wound</option>
                    <option id="animal_bite" name="animal_bite" value="Yes">Animal Bite</option>
                    <option id="superfacial_abrasions" name="superfacial_abrasions" value="Yes">Superfacial Abrasions</option>
                    <option id="foreign_body_removal1" name="foreign_body_removal1" value="Yes">Foreign Body Removal</option>
                `;
            } else if (selectedMainComplaintId === "allergology") {
                subComplaintSelect.innerHTML += `
                    <option id="contact_dermatitis" name="contact_dermatitis" value="Yes">Contact Dermatitis</option>
                    <option id="allergic_rhinitis" name="allergic_rhinitis" value="Yes">Allergic Rhinitis</option>
                    <option id="bronchial_asthma" name="bronchial_asthma" value="Yes">Bronchial Asthma</option>
                    <option id="hypersensitivity" name="hypersensitivity" value="Yes">Hypersensitivity</option>
                `;
            }

            subComplaintSelect.addEventListener("change", function() {
            // Set "Yes" or "No" value for sub complaint options
            const options = subComplaintSelect.getElementsByTagName("option");
            for (let i = 0; i < options.length; i++) {
                const option = options[i];
                if (option.selected) {
                    subComplaintSelect.setAttribute("name", option.id);
                    subComplaintSelect.setAttribute("value", "Yes");
                }
            }

            const selectedSubComplaint = subComplaintSelect.value;

            });
        });

        // Trigger the change event initially to populate sub complaint options if a default option is selected
        mainComplaintSelect.dispatchEvent(new Event('change'));
    </script>

    <!-- Adding medicine if the patient take more than one -->
    <script>
        $(document).ready(function() {
            $('#meds').change(function() {
                var isChecked = $(this).is(':checked');
                $('#medicine-col').toggle(isChecked); // Show/hide the medicine column

                // Enable/disable the input and select elements based on the checkbox status
                $('#medicine-container .medicine-row').each(function() {
                    $(this).find('select, input').prop('disabled', !isChecked);
                    $(this).find('select').prop('required', isChecked);
                    $(this).find('input').prop('required', isChecked);
                });

                if (!isChecked) {
                    clearMedicineRows(); // Clear additional rows when unchecked
                }
            });

            $('.add-medicine').click(function() {
                var $medicineRow = $('.medicine-row').first().clone(); // Clone the first medicine row
                $medicineRow.find('select').prop('selectedIndex', 0); // Reset the selected option
                $medicineRow.find('input').val(''); // Reset the input value
                $('#medicine-container').append($medicineRow); // Append the cloned row to the container
            });

            function clearMedicineRows() {
                $('#medicine-container .medicine-row').not(':first').remove(); // Remove additional rows
            }
        });
    </script>

    <!-- Live Search -->
    <script>
        var dropdownMenu = document.getElementById('dropdown-menu');
        var nameInput = document.getElementById('name');
        var schoolIdInput = document.getElementById('school_id');

        document.getElementById('name').addEventListener('input', function() {
            var name = this.value.trim();

            if (name.length > 0) {
                // Make an AJAX request to the server
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '/search?name=' + encodeURIComponent(name), true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            var users = JSON.parse(xhr.responseText);

                            // Update the dropdown menu with the retrieved users
                            dropdownMenu.innerHTML = '';

                            users.forEach(function(user) {
                                var userElement = document.createElement('a');
                                userElement.classList.add('dropdown-item');
                                userElement.textContent = user.name;
                                userElement.href = '#';
                                userElement.addEventListener('click', function(event) {
                                    event.preventDefault();
                                    nameInput.value = user.name;
                                    schoolIdInput.value = user.school_id; // Populate the school ID input
                                    dropdownMenu.innerHTML = '';
                                });
                                dropdownMenu.appendChild(userElement);
                            });
                        } else {
                            console.error('Error: ' + xhr.status);
                            dropdownMenu.innerHTML = '';
                        }
                    }
                };
                xhr.send();
            } else {
                // Clear the dropdown menu if the input is empty
                dropdownMenu.innerHTML = '';
            }
        });

        // Close the dropdown menu if the user clicks outside
        document.addEventListener('click', function(event) {
            var isClickedInside = dropdownMenu.contains(event.target) || nameInput.contains(event.target);
            if (!isClickedInside) {
                dropdownMenu.innerHTML = '';
            }
        });
    </script>

    <!-- Today's date -->
    <script>
        // Get the current date
        var currentDate = new Date();

        // Format the date as "YYYY-MM-DD" for the input field
        var year = currentDate.getFullYear();
        var month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
        var day = currentDate.getDate().toString().padStart(2, '0');
        var formattedDate = year + '-' + month + '-' + day;

        // Set the value of the input field
        document.getElementById('date-input').value = formattedDate;
    </script>
@stop