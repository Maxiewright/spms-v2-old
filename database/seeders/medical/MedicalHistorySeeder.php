<?php
namespace Database\Seeders\medical;

use App\Models\System\Serviceperson\Medical\Allergy;
use App\Models\System\Serviceperson\Medical\AllergyType;
use App\Models\System\Serviceperson\Medical\MedicalCondition;
use App\Models\System\Serviceperson\Medical\Vaccine;
use Illuminate\Database\Seeder;

class MedicalHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ************************************************ vaccines *********************************************

        {
            $vaccines = [
                [
                    'name'=>'Diphtheria',
                    'created_at'=>'2020-02-16 10:30:00'
                ],
                [
                    'name'=>'Hepatitis B',
                    'created_at'=>'2020-02-16 10:30:00'
                ],
                [
                    'name'=>'Haemophilus influenzae name b',
                    'created_at'=>'2020-02-16 10:30:00'
                ],
                [
                    'name'=>'Seasonal influenza',
                    'created_at'=>'2020-02-16 10:30:00'
                ],
                [
                    'name'=>'Human papillomavirus',
                    'created_at'=>'2020-02-16 10:30:00'
                ],
                [
                    'name'=>'Measles',
                    'created_at'=>'2020-02-16 10:30:00'
                ],
                [
                    'name'=>'Mumps',
                    'created_at'=>'2020-02-16 10:30:00'
                ],
                [
                    'name'=>'Pertussis',
                    'created_at'=>'2020-02-16 10:30:00'
                ],
                [
                    'name'=>'Rubella',
                    'created_at'=>'2020-02-16 10:30:00'
                ],
                [
                    'name'=>'Tuberculosis',
                    'created_at'=>'2020-02-16 10:30:00'
                ],
                [
                    'name'=>'Tetanus',
                    'created_at'=>'2020-02-16 10:30:00'
                ],
                [
                    'name'=>'Varicella',
                    'created_at'=>'2020-02-16 10:30:00'
                ],
                [
                    'name'=>'Cholera',
                    'created_at'=>'2020-02-16 10:30:00'
                ],
                [
                    'name'=>'Hepatits A',
                    'created_at'=>'2020-02-16 10:30:00'
                ],
                [
                    'name'=>'Rabies',
                    'created_at'=>'2020-02-16 10:30:00'
                ],
                [
                    'name'=>'Typhoid Fever',
                    'created_at'=>'2020-02-16 10:30:00'
                ],
                [
                    'name'=>'Yellow Fever',
                    'created_at'=>'2020-02-16 10:30:00'
                ],
                [
                    'name'=>'Meningococcal disease',
                    'created_at'=>'2020-02-16 10:30:00'
                ],
                [
                    'name'=>'Poliomyelitis (Polio)',
                    'created_at'=>'2020-02-16 10:30:00'
                ],
                [
                    'name'=>'Pneumococcal disease',
                    'created_at'=>'2020-02-16 10:30:00'
                ],
                [
                    'name'=>'Rotavirus',
                    'created_at'=>'2020-02-16 10:30:00'
                ]];
            Vaccine::insert($vaccines);
        }

        // ************************************************ name Types *********************************************

        {
            $allergyTypes = [
                [
                    'name'=>'Drug',
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Food',
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Insect',
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Latex',
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Mold',
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Pet',
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Pollen',
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Contact',
                    'created_at'=>'2020-02-16 12:00:00'
                ]];
            AllergyType::insert($allergyTypes);
        }

        // *************************************************** Allergies  *********************************************

        {
            $allergies = [
                [
                    'name'=>'Cow\'s Milk' ,
                    'allergy_type_id'=> 2,
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Eggs',
                    'allergy_type_id'=> 2,
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Tree Nuts',
                    'allergy_type_id'=> 2,
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Peanuts',
                    'allergy_type_id'=> 2,
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Shellfish',
                    'allergy_type_id'=> 2,
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Wheat',
                    'allergy_type_id'=> 2,
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Soy',
                    'allergy_type_id'=> 2,
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Fish',
                    'allergy_type_id'=> 2,
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Grass and tree pollen',
                    'allergy_type_id'=> 7,
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'ibuprofen',
                    'allergy_type_id'=> 1,
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Antibiotics',
                    'allergy_type_id'=> 1,
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Insulin',
                    'allergy_type_id'=> 1,
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Aspirin',
                    'allergy_type_id'=> 1,
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Muscle relaxers',
                    'allergy_type_id'=> 1,
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Dog',
                    'allergy_type_id'=> 6,
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Cats',
                    'allergy_type_id'=> 6,
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Bee Sting',
                    'allergy_type_id'=> 3,
                    'created_at'=>'2020-02-16 12:00:00'
                ],
                [
                    'name'=>'Ants',
                    'allergy_type_id'=> 3,
                    'created_at'=>'2020-02-16 12:00:00'
                ]];
            Allergy::insert($allergies);
        }

        // *************************************************** Medical Conditions  *********************************************

        {
            $medicalConditions = [
                [
                    'name'=>'Aging Eye',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Alzheimer’s',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Anemia',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Anxiety Disorder',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Arthritis',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Osteoarthritis',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Rheumatoid Arthritis',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Asthma',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Hypertension',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Breast Cancer',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Bursitis',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Tendonitis',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Cholesterol',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Colds',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Colon Health',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Colon Cancer',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Depression',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Diabetes',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Digestive Disorders',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Fatigue',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Low Energy',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Foot Problems',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Grief',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Headache',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Hearing Loss',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Kidney Disease',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Lung Diseases',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Memory Loss',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Menopause',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Osteoporosis',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Back Pain',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Generalized Pain',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Hand Pain',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Hip Pain',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Knee Pain',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Neck Pain',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Parkinson’s',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Pregnancy',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Prostate Health Issue',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Prostate Cancer',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Skin Hair and Nails',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Sleep Disorder',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Stress',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Stroke',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Thyroid Disorders',
                    'created_at'=>'2020-02-16 12:15:00'
                ],
                [
                    'name'=>'Urine and Bladder Problems',
                    'created_at'=>'2020-02-16 12:15:00'
                ]];
            MedicalCondition::insert($medicalConditions);
        }
    }
}
