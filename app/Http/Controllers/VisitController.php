<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Visit;
use App\Models\VisitOne;
use App\Models\VisitTwo;
use App\Models\VisitThree;
use App\Models\Report;
use App\Models\ReportOne;
use App\Models\ReportTwo;
use App\Models\ReportThree;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->input('name');
    
        // Perform a query to retrieve the users based on the search term
        $users = User::where('name', 'like', '%' . $searchTerm . '%')->get(['name', 'school_id']);
        
        // Return the users as a JSON response
        return response()->json($users);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userID = $request->input('user_school_id');
        $visitData = $request->all();
        $visitData['user_school_id'] = $userID;

        $visit = Visit::create($visitData);

        $reportData = $request->all();
        $reportData['visit_id'] = $visit->id;

        // Check if a report already exists for the day
        $report = Report::where('day', $visit->day)->first();

        if ($report) {
            // Update the existing report
            $report->update($reportData);
        } else {
            // Create a new report for the day
            $report = Report::create($reportData);
        }

        //Validate the request for VisitOne
        $request->validate([
            'meds',
            'cardiology',
            'hypertension',
            'bp_monitoring',
            'bradycardia',
            'hypotension',
            'pulmonology',
            'urti',
            'pneumonia',
            'ptb',
            'bronchitis',
            'lung_pathology',
            'acute_bronchitis',
            'gastroenterology',
            'acute_gastroenteritis',
            'gerd',
            'hemorrhoids',
            'anorexia',
        ]);

        $visitOneData = $request->all();
        $visitOneData['visit_id'] = $visit->id;

        // Create a VisitOne record
        $visitOne = VisitOne::create($visitOneData);

        // Get all VisitOne records where answered
        $visitOne = VisitOne::where('visit_id', $visit->id)->first();

        if ($visitOne) {
            // Find the Report record associated with the visit
            $report = Report::where('visit_id', $visit->id)->first();

            if ($report) {
                // Find the ReportOne record associated with the report
                $reportOne = ReportOne::where('report_id', $report->id)->first();

                if ($reportOne) {
                    //Cardiology
                    if ($visitOne->meds === 'Yes') {
                        $reportOne->meds_count += 1;
                    }
                    if ($visitOne->hypertension === 'Yes') {
                        $reportOne->hypertension_count += 1;
                    }
                    if ($visitOne->bp_monitoring === 'Yes') {
                        $reportOne->bp_monitoring_count += 1;
                    }
                    if ($visitOne->bradycardia === 'Yes') {
                        $reportOne->bradycardia_count += 1;
                    }
                    if ($visitOne->hypotension === 'Yes') {
                        $reportOne->hypotension_count += 1;
                    }

                    //Pulmonology
                    if ($visitOne->urti === 'Yes') {
                        $reportOne->urti_count += 1;
                    }
                    if ($visitOne->pneumonia === 'Yes') {
                        $reportOne->pneumonia_count += 1;
                    }
                    if ($visitOne->ptb === 'Yes') {
                        $reportOne->ptb_count += 1;
                    }
                    if ($visitOne->bronchitis === 'Yes') {
                        $reportOne->bronchitis_count += 1;
                    }
                    if ($visitOne->lung_pathology === 'Yes') {
                        $reportOne->lung_pathology_count += 1;
                    }
                    if ($visitOne->acute_bronchitis === 'Yes') {
                        $reportOne->acute_bronchitis_count += 1;
                    }

                    //Gastroenterology
                    if ($visitOne->acute_gastroenteritis === 'Yes') {
                        $reportOne->acute_gastroenteritis_count += 1;
                    }
                    if ($visitOne->gerd === 'Yes') {
                        $reportOne->gerd_count += 1;
                    }
                    if ($visitOne->hemorrhoids === 'Yes') {
                        $reportOne->hemorrhoids_count += 1;
                    }
                    if ($visitOne->anorexia === 'Yes') {
                        $reportOne->anorexia_count += 1;
                    }

                    $reportOne->cardiology_count = $reportOne->hypertension_count + 
                                            $reportOne->bp_monitoring_count + 
                                            $reportOne->bradycardia_count + 
                                            $reportOne->hypotension_count;

                    $reportOne->pulmonology_count = $reportOne->urti_count + 
                                            $reportOne->pneumonia_count + 
                                            $reportOne->ptb_count + 
                                            $reportOne->bronchitis_count + 
                                            $reportOne->lung_pathology_count + 
                                            $reportOne->acute_bronchitis_count; 

                    $reportOne->gastroenterology_count = $reportOne->acute_gastroenteritis_count +
                                                $reportOne->gerd_count +
                                                $reportOne->hemorrhoids_count +
                                                $reportOne->anorexia_count;

                    $reportOne->save();
                }elseif (!$reportOne) {
                    // No existing ReportOne found
                    // Create a new ReportOne and set its values based on the request
    
                    $reportOneData = $request->all();
                    $reportOneData['report_id'] = $report->id;
    
                    $reportOne = ReportOne::create($reportOneData);
    
                    // Set the values based on the request
    
                    //Cardiology
                    $reportOne->meds_count = $visitOne->meds === 'Yes' ? 1 : 0;
                    $reportOne->hypertension_count = $visitOne->hypertension === 'Yes' ? 1 : 0;
                    $reportOne->bp_monitoring_count = $visitOne->bp_monitoring === 'Yes' ? 1 : 0;
                    $reportOne->bradycardia_count = $visitOne->bradycardia === 'Yes' ? 1 : 0;
                    $reportOne->hypotension_count = $visitOne->hypotension === 'Yes' ? 1 : 0;
    
                    //Pulmonology
                    $reportOne->urti_count = $visitOne->urti === 'Yes' ? 1 : 0;
                    $reportOne->pneumonia_count = $visitOne->pneumonia === 'Yes' ? 1 : 0;
                    $reportOne->ptb_count = $visitOne->ptb === 'Yes' ? 1 : 0;
                    $reportOne->bronchitis_count = $visitOne->bronchitis === 'Yes' ? 1 : 0;
                    $reportOne->lung_pathology_count = $visitOne->lung_pathology === 'Yes' ? 1 : 0;
                    $reportOne->acute_bronchitis_count = $visitOne->acute_bronchitis === 'Yes' ? 1 : 0;
    
                    //Gastroenterology
                    $reportOne->acute_gastroenteritis_count = $visitOne->acute_gastroenteritis === 'Yes' ? 1 : 0;
                    $reportOne->gerd_count = $visitOne->gerd === 'Yes' ? 1 : 0;
                    $reportOne->hemorrhoids_count = $visitOne->hemorrhoids === 'Yes' ? 1 : 0;
                    $reportOne->anorexia_count = $visitOne->anorexia === 'Yes' ? 1 : 0;
    
                    $reportOne->cardiology_count = $reportOne->meds_count +
                                            $reportOne->hypertension_count +
                                            $reportOne->bp_monitoring_count +
                                            $reportOne->bradycardia_count +
                                            $reportOne->hypotension_count;
    
                    $reportOne->pulmonology_count = $reportOne->urti_count +
                                            $reportOne->pneumonia_count +
                                            $reportOne->ptb_count +
                                            $reportOne->bronchitis_count +
                                            $reportOne->lung_pathology_count +
                                            $reportOne->acute_bronchitis_count;
    
                    $reportOne->gastroenterology_count = $reportOne->acute_gastroenteritis_count +
                                                $reportOne->gerd_count +
                                                $reportOne->hemorrhoids_count +
                                                $reportOne->anorexia_count;
    
                    $reportOne->save();
                }
            }
        }

        //Validate the request for VisitTwo
        $request->validate([
            'musculo_skeletal',
            'ligament_sprain',
            'muscle_strain',
            'costrochondritis',
            'soft_tissue_contusion',
            'fracture',
            'gouty_arthritis',
            'plantar_fasciitis',
            'dislocation',
            'opthalmology',
            'conjunctivitis',
            'stye',
            'foreign_body',
            'ent',
            'stomatitis',
            'epistaxis',
            'otitis_media',
            'foreign_body_removal',
            'neurology',
            'tension_headache',
            'migraine',
            'vertigo',
            'hyperventilation_syndrome',
            'insomnia',
            'seizure',
            'bell_palsy',
            'dermatology',
            'folliculitis',
            'carbuncle',
            'burn',
            'wound_dressing',
            'infected_wound',
            'blister_wound',
            'seborrheic_dermatitis',
            'bruise',
        ]);

        $visitTwoData = $request->all();
        $visitTwoData['visit_id'] = $visit->id;

        // Create a VisitTwo record
        $visitTwo = VisitTwo::create($visitTwoData);

        // Get all VisitTwo records where answered
        $visitTwo = VisitTwo::where('visit_id', $visit->id)->first();

        if ($visitTwo) {
            // Find the Report record associated with the visit
            $report = Report::where('visit_id', $visit->id)->first();

            if ($report) {
                // Find the ReportTwo record associated with the report
                $reportTwo = ReportTwo::where('report_id', $report->id)->first();

                if ($reportTwo) {
                    //Musculo Skeletal
                    if ($visitTwo->ligament_sprain === 'Yes') {
                        $reportTwo->ligament_sprain_count += 1;
                    }
                    if ($visitTwo->muscle_strain === 'Yes') {
                        $reportTwo->muscle_strain_count += 1;
                    }
                    if ($visitTwo->costrochondritis === 'Yes') {
                        $reportTwo->costrochondritis_count += 1;
                    }
                    if ($visitTwo->soft_tissue_contusion === 'Yes') {
                        $reportTwo->soft_tissue_contusion_count += 1;
                    }
                    if ($visitTwo->fracture === 'Yes') {
                        $reportTwo->fracture_count += 1;
                    }
                    if ($visitTwo->gouty_arthritis === 'Yes') {
                        $reportTwo->gouty_arthritis_count += 1;
                    }
                    if ($visitTwo->plantar_fasciitis === 'Yes') {
                        $reportTwo->plantar_fasciitis_count += 1;
                    }
                    if ($visitTwo->dislocation === 'Yes') {
                        $reportTwo->dislocation_count += 1;
                    }

                    //Opthalmology
                    if ($visitTwo->conjunctivitis === 'Yes') {
                        $reportTwo->conjunctivitis_count += 1;
                    }
                    if ($visitTwo->stye === 'Yes') {
                        $reportTwo->stye_count += 1;
                    }
                    if ($visitTwo->foreign_body === 'Yes') {
                        $reportTwo->foreign_body_count += 1;
                    }

                    //ENT
                    if ($visitTwo->stomatitis === 'Yes') {
                        $reportTwo->stomatitis_count += 1;
                    }
                    if ($visitTwo->epistaxis === 'Yes') {
                        $reportTwo->epistaxis_count += 1;
                    }
                    if ($visitTwo->otitis_media === 'Yes') {
                        $reportTwo->otitis_media_count += 1;
                    }
                    if ($visitTwo->foreign_body_removal === 'Yes') {
                        $reportTwo->foreign_body_removal_count += 1;
                    }

                    //Neurology
                    if ($visitTwo->tension_headache === 'Yes') {
                        $reportTwo->tension_headache_count += 1;
                    }
                    if ($visitTwo->migraine === 'Yes') {
                        $reportTwo->migraine_count += 1;
                    }
                    if ($visitTwo->vertigo === 'Yes') {
                        $reportTwo->vertigo_count += 1;
                    }
                    if ($visitTwo->hyperventilation_syndrome === 'Yes') {
                        $reportTwo->hyperventilation_syndrome_count += 1;
                    }
                    if ($visitTwo->insomnia === 'Yes') {
                        $reportTwo->insomnia_count += 1;
                    }
                    if ($visitTwo->seizure === 'Yes') {
                        $reportTwo->seizure_count += 1;
                    }
                    if ($visitTwo->bell_palsy === 'Yes') {
                        $reportTwo->bell_palsy_count += 1;
                    }

                    //Dermatology
                    if ($visitTwo->folliculitis === 'Yes') {
                        $reportTwo->folliculitis_count += 1;
                    }
                    if ($visitTwo->carbuncle === 'Yes') {
                        $reportTwo->carbuncle_count += 1;
                    }
                    if ($visitTwo->burn === 'Yes') {
                        $reportTwo->burn_count += 1;
                    }
                    if ($visitTwo->wound_dressing === 'Yes') {
                        $reportTwo->wound_dressing_count += 1;
                    }
                    if ($visitTwo->infected_wound === 'Yes') {
                        $reportTwo->infected_wound_count += 1;
                    }
                    if ($visitTwo->blister_wound === 'Yes') {
                        $reportTwo->blister_wound_count += 1;
                    }
                    if ($visitTwo->seborrheic_dermatitis === 'Yes') {
                        $reportTwo->seborrheic_dermatitis_count += 1;
                    }
                    if ($visitTwo->bruise === 'Yes') {
                        $reportTwo->bruise_count += 1;
                    }

                    $reportTwo->musculo_skeletal_count = $reportTwo->ligament_sprain_count +
                                                $reportTwo->muscle_strain_count +
                                                $reportTwo->costrochondritis_count +
                                                $reportTwo->soft_tissue_contusion_count +
                                                $reportTwo->fracture_count +
                                                $reportTwo->gouty_arthritis_count +
                                                $reportTwo->plantar_fasciitis_count +
                                                $reportTwo->dislocation_count;

                    $reportTwo->opthalmology_count = $reportTwo->conjunctivitis_count +
                                            $reportTwo->stye_count +
                                            $reportTwo->foreign_body_count;

                    $reportTwo->ent_count = $reportTwo->stomatitis_count +
                                    $reportTwo->epistaxis_count +
                                    $reportTwo->otitis_media_count +
                                    $reportTwo->foreign_body_removal_count;

                    $reportTwo->neurology_count = $reportTwo->tension_headache_count +
                                            $reportTwo->migraine_count +
                                            $reportTwo->vertigo_count +
                                            $reportTwo->hyperventilation_syndrome_count +
                                            $reportTwo->insomnia_count +
                                            $reportTwo->seizure_count +
                                            $reportTwo->bell_palsy_count;
                    
                    $reportTwo->dermatology_count = $reportTwo->folliculitis_count +
                                            $reportTwo->carbuncle_count +
                                            $reportTwo->burn_count +
                                            $reportTwo->wound_dressing_count +
                                            $reportTwo->infected_wound_count +
                                            $reportTwo->blister_wound_count +
                                            $reportTwo->seborrheic_dermatitis_count +
                                            $reportTwo->bruise_count;

                    $reportTwo->save();
                }elseif (!$reportTwo) {
                    // No existing ReportTwo found
                    // Create a new ReportTwo and set its values based on the request
    
                    $reportTwoData = $request->all();
                    $reportTwoData['report_id'] = $report->id;
    
                    $reportTwo = ReportTwo::create($reportTwoData);
    
                    // Set the values based on the request
    
                    //Musculo Skeletal
                    $reportTwo->ligament_sprain_count = $visitTwo->ligament_sprain === 'Yes' ? 1 : 0;
                    $reportTwo->muscle_strain_count = $visitTwo->muscle_strain === 'Yes' ? 1 : 0;
                    $reportTwo->costrochondritis_count = $visitTwo->costrochondritis === 'Yes' ? 1 : 0;
                    $reportTwo->soft_tissue_contusion_count = $visitTwo->soft_tissue_contusion === 'Yes' ? 1 : 0;
                    $reportTwo->fracture_count = $visitTwo->fracture === 'Yes' ? 1 : 0;
                    $reportTwo->gouty_arthritis_count = $visitTwo->gouty_arthritis === 'Yes' ? 1 : 0;
                    $reportTwo->plantar_fasciitis_count = $visitTwo->plantar_fasciitis === 'Yes' ? 1 : 0;
                    $reportTwo->dislocation_count = $visitTwo->dislocation === 'Yes' ? 1 : 0;
    
                    //Opthalmology
                    $reportTwo->conjunctivitis_count = $visitTwo->conjunctivitis === 'Yes' ? 1 : 0;
                    $reportTwo->stye_count = $visitTwo->stye === 'Yes' ? 1 : 0;
                    $reportTwo->foreign_body_count = $visitTwo->foreign_body === 'Yes' ? 1 : 0;
    
                    //ENT
                    $reportTwo->stomatitis_count = $visitTwo->stomatitis === 'Yes' ? 1 : 0;
                    $reportTwo->epistaxis_count = $visitTwo->epistaxis === 'Yes' ? 1 : 0;
                    $reportTwo->otitis_media_count = $visitTwo->otitis_media === 'Yes' ? 1 : 0;
                    $reportTwo->foreign_body_removal_count = $visitTwo->foreign_body_removal === 'Yes' ? 1 : 0;

                    //Neurology
                    $reportTwo->tension_headache_count = $visitTwo->tension_headache === 'Yes' ? 1 : 0;
                    $reportTwo->migraine_count = $visitTwo->migraine === 'Yes' ? 1 : 0;
                    $reportTwo->vertigo_count = $visitTwo->vertigo === 'Yes' ? 1 : 0;
                    $reportTwo->hyperventilation_syndrome_count = $visitTwo->hyperventilation_syndrome === 'Yes' ? 1 : 0;
                    $reportTwo->insomnia_count = $visitTwo->insomnia === 'Yes' ? 1 : 0;
                    $reportTwo->seizure_count = $visitTwo->seizure === 'Yes' ? 1 : 0;
                    $reportTwo->bell_palsy_count = $visitTwo->bell_palsy === 'Yes' ? 1 : 0;

                    //Dermatology
                    $reportTwo->folliculitis_count = $visitTwo->folliculitis === 'Yes' ? 1 : 0;
                    $reportTwo->carbuncle_count = $visitTwo->carbuncle === 'Yes' ? 1 : 0;
                    $reportTwo->burn_count = $visitTwo->burn === 'Yes' ? 1 : 0;
                    $reportTwo->wound_dressing_count = $visitTwo->wound_dressing === 'Yes' ? 1 : 0;
                    $reportTwo->infected_wound_count = $visitTwo->infected_wound === 'Yes' ? 1 : 0;
                    $reportTwo->blister_wound_count = $visitTwo->blister_wound === 'Yes' ? 1 : 0;
                    $reportTwo->seborrheic_dermatitis_count = $visitTwo->seborrheic_dermatitis === 'Yes' ? 1 : 0;
                    $reportTwo->bruise_count = $visitTwo->bruise === 'Yes' ? 1 : 0;
    
                    $reportTwo->musculo_skeletal_count = $reportTwo->ligament_sprain_count +
                                                $reportTwo->muscle_strain_count +
                                                $reportTwo->costrochondritis_count +
                                                $reportTwo->soft_tissue_contusion_count +
                                                $reportTwo->fracture_count +
                                                $reportTwo->gouty_arthritis_count +
                                                $reportTwo->plantar_fasciitis_count +
                                                $reportTwo->dislocation_count;

                    $reportTwo->opthalmology_count = $reportTwo->conjunctivitis_count +
                                            $reportTwo->stye_count +
                                            $reportTwo->foreign_body_count;

                    $reportTwo->ent_count = $reportTwo->stomatitis_count +
                                    $reportTwo->epistaxis_count +
                                    $reportTwo->otitis_media_count +
                                    $reportTwo->foreign_body_removal_count;

                    $reportTwo->neurology_count = $reportTwo->tension_headache_count +
                                            $reportTwo->migraine_count +
                                            $reportTwo->vertigo_count +
                                            $reportTwo->hyperventilation_syndrome_count +
                                            $reportTwo->insomnia_count +
                                            $reportTwo->seizure_count +
                                            $reportTwo->bell_palsy_count;
                    
                    $reportTwo->dermatology_count = $reportTwo->folliculitis_count +
                                            $reportTwo->carbuncle_count +
                                            $reportTwo->burn_count +
                                            $reportTwo->wound_dressing_count +
                                            $reportTwo->infected_wound_count +
                                            $reportTwo->blister_wound_count +
                                            $reportTwo->seborrheic_dermatitis_count +
                                            $reportTwo->bruise_count;
    
                    $reportTwo->save();
                }
            }
        }

        //Validate the request for VisitThree
        $request->validate([
            'nephrology',
            'urinary_tract_infection',
            'renal_disease',
            'urolithiasis',
            'endocrinology',
            'hypoglycemia',
            'dyslipidemia',
            'diabetes_mellitus',
            'ob_gyne',
            'dysmenorrhea',
            'hormonal_imbalance',
            'pregnancy',
            'hematologic',
            'leukemia',
            'blood_dyscrasia',
            'anemia',
            'surgery',
            'lacerated_wound',
            'punctured_wound',
            'animal_bite',
            'superfacial_abrasions',
            'foreign_body_removal1',
            'allergology',
            'contact_dermatitis',
            'allergic_rhinitis',
            'bronchial_asthma',
            'hypersensitivity',
        ]);

        $visitThreeData = $request->all();
        $visitThreeData['visit_id'] = $visit->id;

        // Create a VisitThree record
        $visitThree = VisitThree::create($visitThreeData);

        // Get all VisitThree records where answered
        $visitThree = VisitThree::where('visit_id', $visit->id)->first();

        if ($visitThree) {
            // Find the Report record associated with the visit
            $report = Report::where('visit_id', $visit->id)->first();

            if ($report) {
                // Find the ReportThree record associated with the report
                $reportThree = ReportThree::where('report_id', $report->id)->first();

                if ($reportThree) {
                    //Nephrology
                    if ($visitThree->urinary_tract_infection === 'Yes') {
                        $reportThree->urinary_tract_infection_count += 1;
                    }
                    if ($visitThree->renal_disease === 'Yes') {
                        $reportThree->renal_disease_count += 1;
                    }
                    if ($visitThree->urolithiasis === 'Yes') {
                        $reportThree->urolithiasis_count += 1;
                    }

                    //Endocrinology
                    if ($visitThree->hypoglycemia === 'Yes') {
                        $reportThree->hypoglycemia_count += 1;
                    }
                    if ($visitThree->dyslipidemia === 'Yes') {
                        $reportThree->dyslipidemia_count += 1;
                    }
                    if ($visitThree->diabetes_mellitus === 'Yes') {
                        $reportThree->diabetes_mellitus_count += 1;
                    }

                    //OB-Gyne
                    if ($visitThree->dysmenorrhea === 'Yes') {
                        $reportThree->dysmenorrhea_count += 1;
                    }
                    if ($visitThree->hormonal_imbalance === 'Yes') {
                        $reportThree->hormonal_imbalance_count += 1;
                    }
                    if ($visitThree->pregnancy === 'Yes') {
                        $reportThree->pregnancy_count += 1;
                    }

                    //Hematologic
                    if ($visitThree->leukemia === 'Yes') {
                        $reportThree->leukemia_count += 1;
                    }
                    if ($visitThree->blood_dyscrasia === 'Yes') {
                        $reportThree->blood_dyscrasia_count += 1;
                    }
                    if ($visitThree->anemia === 'Yes') {
                        $reportThree->anemia_count += 1;
                    }

                    //Surgery
                    if ($visitThree->lacerated_wound === 'Yes') {
                        $reportThree->lacerated_wound_count += 1;
                    }
                    if ($visitThree->punctured_wound === 'Yes') {
                        $reportThree->punctured_wound_count += 1;
                    }
                    if ($visitThree->animal_bite === 'Yes') {
                        $reportThree->animal_bite_count += 1;
                    }
                    if ($visitThree->superfacial_abrasions === 'Yes') {
                        $reportThree->superfacial_abrasions_count += 1;
                    }
                    if ($visitThree->foreign_body_removal1 === 'Yes') {
                        $reportThree->foreign_body_removal1_count += 1;
                    }

                    //Allergology
                    if ($visitThree->contact_dermatitis === 'Yes') {
                        $reportThree->contact_dermatitis_count += 1;
                    }
                    if ($visitThree->allergic_rhinitis === 'Yes') {
                        $reportThree->allergic_rhinitis_count += 1;
                    }
                    if ($visitThree->bronchial_asthma === 'Yes') {
                        $reportThree->bronchial_asthma_count += 1;
                    }
                    if ($visitThree->hypersensitivity === 'Yes') {
                        $reportThree->hypersensitivity_count += 1;
                    }

                    $reportThree->nephrology_count = $reportThree->urinary_tract_infection_count +
                                            $reportThree->renal_disease_count +
                                            $reportThree->urolithiasis_count;

                    $reportThree->endocrinology_count = $reportThree->hypoglycemia_count +
                                                $reportThree->dyslipidemia_count +
                                                $reportThree->diabetes_mellitus_count;

                    $reportThree->ob_gyne_count = $reportThree->dysmenorrhea_count +
                                            $reportThree->hormonal_imbalance_count +
                                            $reportThree->pregnancy_count;

                    $reportThree->hematologic_count = $reportThree->leukemia_count +
                                            $reportThree->blood_dyscrasia_count +
                                            $reportThree->anemia_count;

                    $reportThree->surgery_count = $reportThree->lacerated_wound_count +
                                            $reportThree->punctured_wound_count +
                                            $reportThree->animal_bite_count + 
                                            $reportThree->superfacial_abrasions_count + 
                                            $reportThree->foreign_body_removal1_count;

                    $reportThree->allergology_count = $reportThree->contact_dermatitis_count +
                                            $reportThree->allergic_rhinitis_count +
                                            $reportThree->bronchial_asthma_count + 
                                            $reportThree->hypersensitivity_count;

                    $reportTwo->save();
                }elseif (!$reportThree) {
                    // No existing ReportThree found
                    // Create a new ReportThree and set its values based on the request
    
                    $reportThreeData = $request->all();
                    $reportThreeData['report_id'] = $report->id;
    
                    $reportThree = ReportThree::create($reportThreeData);
    
                    // Set the values based on the request
    
                    //Nephrology
                    $reportThree->urinary_tract_infection_count = $visitThree->urinary_tract_infection === 'Yes' ? 1 : 0;
                    $reportThree->renal_disease_count = $visitThree->renal_disease === 'Yes' ? 1 : 0;
                    $reportThree->urolithiasis_count = $visitThree->urolithiasis === 'Yes' ? 1 : 0;
    
                    //Endocrinology
                    $reportThree->hypoglycemia_count = $visitThree->hypoglycemia === 'Yes' ? 1 : 0;
                    $reportThree->dyslipidemia_count = $visitThree->dyslipidemia === 'Yes' ? 1 : 0;
                    $reportThree->diabetes_mellitus_count = $visitThree->diabetes_mellitus === 'Yes' ? 1 : 0;
    
                    //OB-Gyne
                    $reportThree->dysmenorrhea_count = $visitThree->dysmenorrhea === 'Yes' ? 1 : 0;
                    $reportThree->hormonal_imbalance_count = $visitThree->hormonal_imbalance === 'Yes' ? 1 : 0;
                    $reportThree->pregnancy_count = $visitThree->pregnancy === 'Yes' ? 1 : 0;
    
                    //Hematologic
                    $reportThree->leukemia_count = $visitThree->leukemia === 'Yes' ? 1 : 0;
                    $reportThree->blood_dyscrasia_count = $visitThree->blood_dyscrasia === 'Yes' ? 1 : 0;
                    $reportThree->anemia_count = $visitThree->anemia === 'Yes' ? 1 : 0;
    
                    //Surgery
                    $reportThree->lacerated_wound_count = $visitThree->lacerated_wound === 'Yes' ? 1 : 0;
                    $reportThree->punctured_wound_count = $visitThree->punctured_wound === 'Yes' ? 1 : 0;
                    $reportThree->animal_bite_count = $visitThree->animal_bite === 'Yes' ? 1 : 0;
                    $reportThree->superfacial_abrasions_count = $visitThree->superfacial_abrasions === 'Yes' ? 1 : 0;
                    $reportThree->foreign_body_removal1_count = $visitThree->foreign_body_removal1 === 'Yes' ? 1 : 0;
                    
                    //Allergology
                    $reportThree->contact_dermatitis_count = $visitThree->contact_dermatitis === 'Yes' ? 1 : 0;
                    $reportThree->allergic_rhinitis_count = $visitThree->allergic_rhinitis === 'Yes' ? 1 : 0;
                    $reportThree->bronchial_asthma_count = $visitThree->bronchial_asthma === 'Yes' ? 1 : 0;
                    $reportThree->hypersensitivity_count = $visitThree->hypersensitivity === 'Yes' ? 1 : 0;
    
                    $reportThree->nephrology_count = $reportThree->urinary_tract_infection_count +
                                            $reportThree->renal_disease_count +
                                            $reportThree->urolithiasis_count;

                    $reportThree->endocrinology_count = $reportThree->hypoglycemia_count +
                                                $reportThree->dyslipidemia_count +
                                                $reportThree->diabetes_mellitus_count;

                    $reportThree->ob_gyne_count = $reportThree->dysmenorrhea_count +
                                            $reportThree->hormonal_imbalance_count +
                                            $reportThree->pregnancy_count;

                    $reportThree->hematologic_count = $reportThree->leukemia_count +
                                            $reportThree->blood_dyscrasia_count +
                                            $reportThree->anemia_count;

                    $reportThree->surgery_count = $reportThree->lacerated_wound_count +
                                            $reportThree->punctured_wound_count +
                                            $reportThree->animal_bite_count + 
                                            $reportThree->superfacial_abrasions_count + 
                                            $reportThree->foreign_body_removal1_count;

                    $reportThree->allergology_count = $reportThree->contact_dermatitis_count +
                                            $reportThree->allergic_rhinitis_count +
                                            $reportThree->bronchial_asthma_count + 
                                            $reportThree->hypersensitivity_count;
    
                    $reportOne->save();
                }
            }
        }
        return redirect()->route('nurse.home')->with('success', 'Inventory item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(VisitOne $visitOne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisitOne $visitOne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VisitOne $visitOne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisitOne $visitOne)
    {
        //
    }
}
