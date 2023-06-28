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

        $visit = Visit::create($request->all());

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

        // Create a VisitOne record
        $visitOne = VisitOne::create($request->all());

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
                        $reportOne->meds += 1;
                    }
                    if ($visitOne->hypertension === 'Yes') {
                        $reportOne->hypertension += 1;
                    }
                    if ($visitOne->bp_monitoring === 'Yes') {
                        $reportOne->bp_monitoring += 1;
                    }
                    if ($visitOne->bradycardia === 'Yes') {
                        $reportOne->bradycardia += 1;
                    }
                    if ($visitOne->hypotension === 'Yes') {
                        $reportOne->hypotension += 1;
                    }

                    //Pulmonology
                    if ($visitOne->urti === 'Yes') {
                        $reportOne->urti += 1;
                    }
                    if ($visitOne->pneumonia === 'Yes') {
                        $reportOne->pneumonia += 1;
                    }
                    if ($visitOne->ptb === 'Yes') {
                        $reportOne->ptb += 1;
                    }
                    if ($visitOne->bronchitis === 'Yes') {
                        $reportOne->bronchitis += 1;
                    }
                    if ($visitOne->lung_pathology === 'Yes') {
                        $reportOne->lung_pathology += 1;
                    }
                    if ($visitOne->acute_bronchitis === 'Yes') {
                        $reportOne->acute_bronchitis += 1;
                    }

                    //Gastroenterology
                    if ($visitOne->acute_gastroenteritis === 'Yes') {
                        $reportOne->acute_gastroenteritis += 1;
                    }
                    if ($visitOne->gerd === 'Yes') {
                        $reportOne->gerd += 1;
                    }
                    if ($visitOne->hemorrhoids === 'Yes') {
                        $reportOne->hemorrhoids += 1;
                    }
                    if ($visitOne->anorexia === 'Yes') {
                        $reportOne->anorexia += 1;
                    }

                    $reportOne->cardiology = $reportOne->hypertension + 
                                            $reportOne->bp_monitoring + 
                                            $reportOne->bradycardia + 
                                            $reportOne->hypotension;

                    $reportOne->pulmonology = $reportOne->urti + 
                                            $reportOne->pneumonia + 
                                            $reportOne->ptb + 
                                            $reportOne->bronchitis + 
                                            $reportOne->lung_pathology + 
                                            $reportOne->acute_bronchitis; 

                    $reportOne->gastroenterology = $reportOne->acute_gastroenteritis +
                                                $reportOne->gerd +
                                                $reportOne->hemorrhoids +
                                                $reportOne->anorexia;

                    $reportOne->save();
                }elseif (!$reportOne) {
                    // No existing ReportOne found
                    // Create a new ReportOne and set its values based on the request
    
                    $reportOneData = $request->all();
                    $reportOneData['report_id'] = $report->id;
    
                    $reportOne = ReportOne::create($reportOneData);
    
                    // Set the values based on the request
    
                    //Cardiology
                    $reportOne->meds = $visitOne->meds === 'Yes' ? 1 : 0;
                    $reportOne->hypertension = $visitOne->hypertension === 'Yes' ? 1 : 0;
                    $reportOne->bp_monitoring = $visitOne->bp_monitoring === 'Yes' ? 1 : 0;
                    $reportOne->bradycardia = $visitOne->bradycardia === 'Yes' ? 1 : 0;
                    $reportOne->hypotension = $visitOne->hypotension === 'Yes' ? 1 : 0;
    
                    //Pulmonology
                    $reportOne->urti = $visitOne->urti === 'Yes' ? 1 : 0;
                    $reportOne->pneumonia = $visitOne->pneumonia === 'Yes' ? 1 : 0;
                    $reportOne->ptb = $visitOne->ptb === 'Yes' ? 1 : 0;
                    $reportOne->bronchitis = $visitOne->bronchitis === 'Yes' ? 1 : 0;
                    $reportOne->lung_pathology = $visitOne->lung_pathology === 'Yes' ? 1 : 0;
                    $reportOne->acute_bronchitis = $visitOne->acute_bronchitis === 'Yes' ? 1 : 0;
    
                    //Gastroenterology
                    $reportOne->acute_gastroenteritis = $visitOne->acute_gastroenteritis === 'Yes' ? 1 : 0;
                    $reportOne->gerd = $visitOne->gerd === 'Yes' ? 1 : 0;
                    $reportOne->hemorrhoids = $visitOne->hemorrhoids === 'Yes' ? 1 : 0;
                    $reportOne->anorexia = $visitOne->anorexia === 'Yes' ? 1 : 0;
    
                    $reportOne->cardiology = $reportOne->meds +
                                            $reportOne->hypertension +
                                            $reportOne->bp_monitoring +
                                            $reportOne->bradycardia +
                                            $reportOne->hypotension;
    
                    $reportOne->pulmonology = $reportOne->urti +
                                            $reportOne->pneumonia +
                                            $reportOne->ptb +
                                            $reportOne->bronchitis +
                                            $reportOne->lung_pathology +
                                            $reportOne->acute_bronchitis;
    
                    $reportOne->gastroenterology = $reportOne->acute_gastroenteritis +
                                                $reportOne->gerd +
                                                $reportOne->hemorrhoids +
                                                $reportOne->anorexia;
    
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

        // Create a VisitTwo record
        $visitTwo = VisitTwo::create($request->all());

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
                        $reportTwo->ligament_sprain += 1;
                    }
                    if ($visitTwo->muscle_strain === 'Yes') {
                        $reportTwo->muscle_strain += 1;
                    }
                    if ($visitTwo->costrochondritis === 'Yes') {
                        $reportTwo->costrochondritis += 1;
                    }
                    if ($visitTwo->soft_tissue_contusion === 'Yes') {
                        $reportTwo->soft_tissue_contusion += 1;
                    }
                    if ($visitTwo->fracture === 'Yes') {
                        $reportTwo->fracture += 1;
                    }
                    if ($visitTwo->gouty_arthritis === 'Yes') {
                        $reportTwo->gouty_arthritis += 1;
                    }
                    if ($visitTwo->plantar_fasciitis === 'Yes') {
                        $reportTwo->plantar_fasciitis += 1;
                    }
                    if ($visitTwo->dislocation === 'Yes') {
                        $reportTwo->dislocation += 1;
                    }

                    //Opthalmology
                    if ($visitTwo->conjunctivitis === 'Yes') {
                        $reportTwo->conjunctivitis += 1;
                    }
                    if ($visitTwo->stye === 'Yes') {
                        $reportTwo->stye += 1;
                    }
                    if ($visitTwo->foreign_body === 'Yes') {
                        $reportTwo->foreign_body += 1;
                    }

                    //ENT
                    if ($visitTwo->stomatitis === 'Yes') {
                        $reportTwo->stomatitis += 1;
                    }
                    if ($visitTwo->epistaxis === 'Yes') {
                        $reportTwo->epistaxis += 1;
                    }
                    if ($visitTwo->otitis_media === 'Yes') {
                        $reportTwo->otitis_media += 1;
                    }
                    if ($visitTwo->foreign_body_removal === 'Yes') {
                        $reportTwo->foreign_body_removal += 1;
                    }

                    //Neurology
                    if ($visitTwo->tension_headache === 'Yes') {
                        $reportTwo->tension_headache += 1;
                    }
                    if ($visitTwo->migraine === 'Yes') {
                        $reportTwo->migraine += 1;
                    }
                    if ($visitTwo->vertigo === 'Yes') {
                        $reportTwo->vertigo += 1;
                    }
                    if ($visitTwo->hyperventilation_syndrome === 'Yes') {
                        $reportTwo->hyperventilation_syndrome += 1;
                    }
                    if ($visitTwo->insomnia === 'Yes') {
                        $reportTwo->insomnia += 1;
                    }
                    if ($visitTwo->seizure === 'Yes') {
                        $reportTwo->seizure += 1;
                    }
                    if ($visitTwo->bell_palsy === 'Yes') {
                        $reportTwo->bell_palsy += 1;
                    }

                    //Dermatology
                    if ($visitTwo->folliculitis === 'Yes') {
                        $reportTwo->folliculitis += 1;
                    }
                    if ($visitTwo->carbuncle === 'Yes') {
                        $reportTwo->carbuncle += 1;
                    }
                    if ($visitTwo->burn === 'Yes') {
                        $reportTwo->burn += 1;
                    }
                    if ($visitTwo->wound_dressing === 'Yes') {
                        $reportTwo->wound_dressing += 1;
                    }
                    if ($visitTwo->infected_wound === 'Yes') {
                        $reportTwo->infected_wound += 1;
                    }
                    if ($visitTwo->blister_wound === 'Yes') {
                        $reportTwo->blister_wound += 1;
                    }
                    if ($visitTwo->seborrheic_dermatitis === 'Yes') {
                        $reportTwo->seborrheic_dermatitis += 1;
                    }
                    if ($visitTwo->bruise === 'Yes') {
                        $reportTwo->bruise += 1;
                    }

                    $reportTwo->musculo_skeletal = $reportTwo->ligament_sprain +
                                                $reportTwo->muscle_strain +
                                                $reportTwo->costrochondritis +
                                                $reportTwo->soft_tissue_contusion +
                                                $reportTwo->fracture +
                                                $reportTwo->gouty_arthritis +
                                                $reportTwo->plantar_fasciitis +
                                                $reportTwo->dislocation;

                    $reportTwo->opthalmology = $reportTwo->conjunctivitis +
                                            $reportTwo->stye +
                                            $reportTwo->foreign_body;

                    $reportTwo->ent = $reportTwo->stomatitis +
                                    $reportTwo->epistaxis +
                                    $reportTwo->otitis_media +
                                    $reportTwo->foreign_body_removal;

                    $reportTwo->neurology = $reportTwo->tension_headache +
                                            $reportTwo->migraine +
                                            $reportTwo->vertigo +
                                            $reportTwo->hyperventilation_syndrome +
                                            $reportTwo->insomnia +
                                            $reportTwo->seizure +
                                            $reportTwo->bell_palsy;
                    
                    $reportTwo->dermatology = $reportTwo->folliculitis +
                                            $reportTwo->carbuncle +
                                            $reportTwo->burn +
                                            $reportTwo->wound_dressing +
                                            $reportTwo->infected_wound +
                                            $reportTwo->blister_wound +
                                            $reportTwo->seborrheic_dermatitis +
                                            $reportTwo->bruise;

                    $reportTwo->save();
                }elseif (!$reportTwo) {
                    // No existing ReportTwo found
                    // Create a new ReportTwo and set its values based on the request
    
                    $reportTwoData = $request->all();
                    $reportTwoData['report_id'] = $report->id;
    
                    $reportTwo = ReportTwo::create($reportTwoData);
    
                    // Set the values based on the request
    
                    //Musculo Skeletal
                    $reportTwo->ligament_sprain = $visitTwo->ligament_sprain === 'Yes' ? 1 : 0;
                    $reportTwo->muscle_strain = $visitTwo->muscle_strain === 'Yes' ? 1 : 0;
                    $reportTwo->costrochondritis = $visitTwo->costrochondritis === 'Yes' ? 1 : 0;
                    $reportTwo->soft_tissue_contusion = $visitTwo->soft_tissue_contusion === 'Yes' ? 1 : 0;
                    $reportTwo->fracture = $visitTwo->fracture === 'Yes' ? 1 : 0;
                    $reportTwo->gouty_arthritis = $visitTwo->gouty_arthritis === 'Yes' ? 1 : 0;
                    $reportTwo->plantar_fasciitis = $visitTwo->plantar_fasciitis === 'Yes' ? 1 : 0;
                    $reportTwo->dislocation = $visitTwo->dislocation === 'Yes' ? 1 : 0;
    
                    //Opthalmology
                    $reportTwo->conjunctivitis = $visitTwo->conjunctivitis === 'Yes' ? 1 : 0;
                    $reportTwo->stye = $visitTwo->stye === 'Yes' ? 1 : 0;
                    $reportTwo->foreign_body = $visitTwo->foreign_body === 'Yes' ? 1 : 0;
    
                    //ENT
                    $reportTwo->stomatitis = $visitTwo->stomatitis === 'Yes' ? 1 : 0;
                    $reportTwo->epistaxis = $visitTwo->epistaxis === 'Yes' ? 1 : 0;
                    $reportTwo->otitis_media = $visitTwo->otitis_media === 'Yes' ? 1 : 0;
                    $reportTwo->foreign_body_removal = $visitTwo->foreign_body_removal === 'Yes' ? 1 : 0;

                    //Neurology
                    $reportTwo->tension_headache = $visitTwo->tension_headache === 'Yes' ? 1 : 0;
                    $reportTwo->migraine = $visitTwo->migraine === 'Yes' ? 1 : 0;
                    $reportTwo->vertigo = $visitTwo->vertigo === 'Yes' ? 1 : 0;
                    $reportTwo->hyperventilation_syndrome = $visitTwo->hyperventilation_syndrome === 'Yes' ? 1 : 0;
                    $reportTwo->insomnia = $visitTwo->insomnia === 'Yes' ? 1 : 0;
                    $reportTwo->seizure = $visitTwo->seizure === 'Yes' ? 1 : 0;
                    $reportTwo->bell_palsy = $visitTwo->bell_palsy === 'Yes' ? 1 : 0;

                    //Dermatology
                    $reportTwo->folliculitis = $visitTwo->folliculitis === 'Yes' ? 1 : 0;
                    $reportTwo->carbuncle = $visitTwo->carbuncle === 'Yes' ? 1 : 0;
                    $reportTwo->burn = $visitTwo->burn === 'Yes' ? 1 : 0;
                    $reportTwo->wound_dressing = $visitTwo->wound_dressing === 'Yes' ? 1 : 0;
                    $reportTwo->infected_wound = $visitTwo->infected_wound === 'Yes' ? 1 : 0;
                    $reportTwo->blister_wound = $visitTwo->blister_wound === 'Yes' ? 1 : 0;
                    $reportTwo->seborrheic_dermatitis = $visitTwo->seborrheic_dermatitis === 'Yes' ? 1 : 0;
                    $reportTwo->bruise = $visitTwo->bruise === 'Yes' ? 1 : 0;
    
                    $reportTwo->musculo_skeletal = $reportTwo->ligament_sprain +
                                                $reportTwo->muscle_strain +
                                                $reportTwo->costrochondritis +
                                                $reportTwo->soft_tissue_contusion +
                                                $reportTwo->fracture +
                                                $reportTwo->gouty_arthritis +
                                                $reportTwo->plantar_fasciitis +
                                                $reportTwo->dislocation;

                    $reportTwo->opthalmology = $reportTwo->conjunctivitis +
                                            $reportTwo->stye +
                                            $reportTwo->foreign_body;

                    $reportTwo->ent = $reportTwo->stomatitis +
                                    $reportTwo->epistaxis +
                                    $reportTwo->otitis_media +
                                    $reportTwo->foreign_body_removal;

                    $reportTwo->neurology = $reportTwo->tension_headache +
                                            $reportTwo->migraine +
                                            $reportTwo->vertigo +
                                            $reportTwo->hyperventilation_syndrome +
                                            $reportTwo->insomnia +
                                            $reportTwo->seizure +
                                            $reportTwo->bell_palsy;
                    
                    $reportTwo->dermatology = $reportTwo->folliculitis +
                                            $reportTwo->carbuncle +
                                            $reportTwo->burn +
                                            $reportTwo->wound_dressing +
                                            $reportTwo->infected_wound +
                                            $reportTwo->blister_wound +
                                            $reportTwo->seborrheic_dermatitis +
                                            $reportTwo->bruise;
    
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

        // Create a VisitThree record
        $visitThree = VisitThree::create($request->all());

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
                        $reportThree->urinary_tract_infection += 1;
                    }
                    if ($visitThree->renal_disease === 'Yes') {
                        $reportThree->renal_disease += 1;
                    }
                    if ($visitThree->urolithiasis === 'Yes') {
                        $reportThree->urolithiasis += 1;
                    }

                    //Endocrinology
                    if ($visitThree->hypoglycemia === 'Yes') {
                        $reportThree->hypoglycemia += 1;
                    }
                    if ($visitThree->dyslipidemia === 'Yes') {
                        $reportThree->dyslipidemia += 1;
                    }
                    if ($visitThree->diabetes_mellitus === 'Yes') {
                        $reportThree->diabetes_mellitus += 1;
                    }

                    //OB-Gyne
                    if ($visitThree->dysmenorrhea === 'Yes') {
                        $reportThree->dysmenorrhea += 1;
                    }
                    if ($visitThree->hormonal_imbalance === 'Yes') {
                        $reportThree->hormonal_imbalance += 1;
                    }
                    if ($visitThree->pregnancy === 'Yes') {
                        $reportThree->pregnancy += 1;
                    }

                    //Hematologic
                    if ($visitThree->leukemia === 'Yes') {
                        $reportThree->leukemia += 1;
                    }
                    if ($visitThree->blood_dyscrasia === 'Yes') {
                        $reportThree->blood_dyscrasia += 1;
                    }
                    if ($visitThree->anemia === 'Yes') {
                        $reportThree->anemia += 1;
                    }

                    //Surgery
                    if ($visitThree->lacerated_wound === 'Yes') {
                        $reportThree->lacerated_wound += 1;
                    }
                    if ($visitThree->punctured_wound === 'Yes') {
                        $reportThree->punctured_wound += 1;
                    }
                    if ($visitThree->animal_bite === 'Yes') {
                        $reportThree->animal_bite += 1;
                    }
                    if ($visitThree->superfacial_abrasions === 'Yes') {
                        $reportThree->superfacial_abrasions += 1;
                    }
                    if ($visitThree->foreign_body_removal1 === 'Yes') {
                        $reportThree->foreign_body_removal1 += 1;
                    }

                    //Allergology
                    if ($visitThree->contact_dermatitis === 'Yes') {
                        $reportThree->contact_dermatitis += 1;
                    }
                    if ($visitThree->allergic_rhinitis === 'Yes') {
                        $reportThree->allergic_rhinitis += 1;
                    }
                    if ($visitThree->bronchial_asthma === 'Yes') {
                        $reportThree->bronchial_asthma += 1;
                    }
                    if ($visitThree->hypersensitivity === 'Yes') {
                        $reportThree->hypersensitivity += 1;
                    }

                    $reportThree->nephrology = $reportThree->urinary_tract_infection +
                                            $reportThree->renal_disease +
                                            $reportThree->urolithiasis;

                    $reportThree->endocrinology = $reportThree->hypoglycemia +
                                                $reportThree->dyslipidemia +
                                                $reportThree->diabetes_mellitus;

                    $reportThree->ob_gyne = $reportThree->dysmenorrhea +
                                            $reportThree->hormonal_imbalance +
                                            $reportThree->pregnancy;

                    $reportThree->hematologic = $reportThree->leukemia +
                                            $reportThree->blood_dyscrasia +
                                            $reportThree->anemia;

                    $reportThree->surgery = $reportThree->lacerated_wound +
                                            $reportThree->punctured_wound +
                                            $reportThree->animal_bite + 
                                            $reportThree->superfacial_abrasions + 
                                            $reportThree->foreign_body_removal1;

                    $reportThree->allergology = $reportThree->contact_dermatitis +
                                            $reportThree->allergic_rhinitis +
                                            $reportThree->bronchial_asthma + 
                                            $reportThree->hypersensitivity;

                    $reportTwo->save();
                }elseif (!$reportThree) {
                    // No existing ReportThree found
                    // Create a new ReportThree and set its values based on the request
    
                    $reportThreeData = $request->all();
                    $reportThreeData['report_id'] = $report->id;
    
                    $reportThree = ReportThree::create($reportThreeData);
    
                    // Set the values based on the request
    
                    //Nephrology
                    $reportThree->urinary_tract_infection = $visitThree->urinary_tract_infection === 'Yes' ? 1 : 0;
                    $reportThree->renal_disease = $visitThree->renal_disease === 'Yes' ? 1 : 0;
                    $reportThree->urolithiasis = $visitThree->urolithiasis === 'Yes' ? 1 : 0;
    
                    //Endocrinology
                    $reportThree->hypoglycemia = $visitThree->hypoglycemia === 'Yes' ? 1 : 0;
                    $reportThree->dyslipidemia = $visitThree->dyslipidemia === 'Yes' ? 1 : 0;
                    $reportThree->diabetes_mellitus = $visitThree->diabetes_mellitus === 'Yes' ? 1 : 0;
    
                    //OB-Gyne
                    $reportThree->dysmenorrhea = $visitThree->dysmenorrhea === 'Yes' ? 1 : 0;
                    $reportThree->hormonal_imbalance = $visitThree->hormonal_imbalance === 'Yes' ? 1 : 0;
                    $reportThree->pregnancy = $visitThree->pregnancy === 'Yes' ? 1 : 0;
    
                    //Hematologic
                    $reportThree->leukemia = $visitThree->leukemia === 'Yes' ? 1 : 0;
                    $reportThree->blood_dyscrasia = $visitThree->blood_dyscrasia === 'Yes' ? 1 : 0;
                    $reportThree->anemia = $visitThree->anemia === 'Yes' ? 1 : 0;
    
                    //Surgery
                    $reportThree->lacerated_wound = $visitThree->lacerated_wound === 'Yes' ? 1 : 0;
                    $reportThree->punctured_wound = $visitThree->punctured_wound === 'Yes' ? 1 : 0;
                    $reportThree->animal_bite = $visitThree->animal_bite === 'Yes' ? 1 : 0;
                    $reportThree->superfacial_abrasions = $visitThree->superfacial_abrasions === 'Yes' ? 1 : 0;
                    $reportThree->foreign_body_removal1 = $visitThree->foreign_body_removal1 === 'Yes' ? 1 : 0;
                    
                    //Allergology
                    $reportThree->contact_dermatitis = $visitThree->contact_dermatitis === 'Yes' ? 1 : 0;
                    $reportThree->allergic_rhinitis = $visitThree->allergic_rhinitis === 'Yes' ? 1 : 0;
                    $reportThree->bronchial_asthma = $visitThree->bronchial_asthma === 'Yes' ? 1 : 0;
                    $reportThree->hypersensitivity = $visitThree->hypersensitivity === 'Yes' ? 1 : 0;
    
                    $reportThree->nephrology = $reportThree->urinary_tract_infection +
                                            $reportThree->renal_disease +
                                            $reportThree->urolithiasis;

                    $reportThree->endocrinology = $reportThree->hypoglycemia +
                                                $reportThree->dyslipidemia +
                                                $reportThree->diabetes_mellitus;

                    $reportThree->ob_gyne = $reportThree->dysmenorrhea +
                                            $reportThree->hormonal_imbalance +
                                            $reportThree->pregnancy;

                    $reportThree->hematologic = $reportThree->leukemia +
                                            $reportThree->blood_dyscrasia +
                                            $reportThree->anemia;

                    $reportThree->surgery = $reportThree->lacerated_wound +
                                            $reportThree->punctured_wound +
                                            $reportThree->animal_bite + 
                                            $reportThree->superfacial_abrasions + 
                                            $reportThree->foreign_body_removal1;

                    $reportThree->allergology = $reportThree->contact_dermatitis +
                                            $reportThree->allergic_rhinitis +
                                            $reportThree->bronchial_asthma + 
                                            $reportThree->hypersensitivity;
    
                    $reportOne->save();
                }
            }
        }
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
