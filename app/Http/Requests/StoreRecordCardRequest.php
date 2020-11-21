<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecordCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [

            // Basic Information
            'serviceperson.photo'                 =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'serviceperson.number'                =>  'required|numeric|digits_between:3,5|unique:servicepeople,number',
            'serviceperson.first_name'            =>  'required|alpha-dash',
            'serviceperson.last_name'             =>  'required|alpha-dash',
            'serviceperson.marital_status_id'     =>  'required',
            'serviceperson.religion_id'           =>  'required',
            'serviceperson.ethnicity_id'          =>  'required',

             // Contact Information
            'address.address1'          =>  'required',
//            'address.address2'          =>  'sometimes',
            'address.city_or_town_id'   =>  'required',
            'phone.*.phone_type_id'     =>  'required',
            'phone.*.number'            =>  'required|phone:TT',
            'email.*.email_type_id'     =>  'required',
            'email.*.email'             =>  'required|email',


//             Identification
//                National ID
            'national_id.number'          =>  'required|numeric|digits:11|unique:national_id_cards,number',
            'national_id.date_of_birth'   =>  'required|date|before_or_equal:tomorrow',
            'national_id.place_of_birth'  =>  'required',
            'national_id.gender_id'       =>  'required',
            'national_id.issued_on'      =>  'required| date|before_or_equal:tomorrow',
            'national_id.expired_on'     =>  'required|date|after:national_id_issued_on',
//                Drivers Permit

            'drivers_permit.*.number'                               =>  'sometimes|nullable|numeric|unique:drivers_permits,number',
            'drivers_permit.*.drivers_permit_type_id'               =>  'required_with:drivers_permit.*.number',
            'drivers_permit.*.drivers_permit_class_id'              =>  'required_with:drivers_permit.*.number',
            'drivers_permit.*.drivers_permit_transaction_code_id'   =>  'required_with:drivers_permit.*.number',
            'drivers_permit.*.issued_on'                           =>  'required_with:drivers_permit.*.number|nullable|date|before_or_equal:today',
            'drivers_permit.*.expired_on'                          =>  'required_with:drivers_permit.*.number|nullable|date|after:drivers_permit.*.driver_permit_issued_on',

//                Military ID
            'military_id.number'        =>  'required|numeric|unique:military_id_cards,number',
            'military_id.issued_on'    =>  'required|date|before_or_equal:today',
            'military_id.expired_on'   =>  'required|date|after:military_id.issued_on',

//                Passport
            'passport.number'       =>  'sometimes|nullable|unique:passports,number',
            'passport.issued_on'   =>  'required_with:passport.number|nullable|before_or_equal:today',
            'passport.expired_on'  =>  'required_with:passport.number|nullable|after:passport.issued_on' ,


            //Service Data

//                Enlistment
            'enlistment.*.enlistment_type_id'   =>  'required',
            'enlistment.*.date'                 =>  'required|date|before_or_equal:today',

//                Promotion
            'rank.*.rank_id'           =>  'required',
            'rank.*.promoted_on'    =>  'required|date|before_or_equal:today',

//            Decoration
            'decoration.*.decoration_id'    => 'sometimes',
            'decoration.*.received_on'     => 'required_with:decoration.*.decoration_id|before_or_equal:today',
//
//            Military Appointment
            'appointment.*.appointment_id'      =>  'required',
            'appointment.*.started_on'          =>  'required|date|before_or_equal:today',
            'appointment.*.ended_on'            =>  'sometimes|nullable|date|after:appointment.*.started_on',

//            Unit data
            'unit.*.company_id'         =>  'required',
            'unit.*.joined_on'        =>  'required|date|before_or_equal:today',
            'unit.*.left_on'          =>  'sometimes|nullable|date|after:unit.*.joined_on',

//        Medical Data
//           Biodata
            'biodata.eye_colour_id'     =>  'required',
            'biodata.hair_colour_id'    =>  'required',
            'biodata.skin_colour_id'    =>  'required',
            'biodata.blood_type_id'     =>  'required',
//          Height and Weight
            'height.*.height_id'        =>  'required',
            'height.*.measured_on'    =>  'required|date|before_or_equal:today',
            'weight.*.weight_id'        =>  'required',
            'weight.*.weighed_on'     =>  'required|date|before_or_equal:today',

//           Medical History
//           Vaccine
            'vaccine.*.vaccine_id'      =>  'sometimes',
            'vaccine.*.received_on'    =>  'required_with:vaccine.*.vaccine_id',

//            Allergies
//           A Service person may not have allergies - thus not require at this time.
            'allergy.*.allergy_id'      =>  'sometimes',
            'allergy.*.particulars'     =>  'nullable',

//            A Service person may not have a medical condition - thus not require at this time.
            'medical_condition.*.medical_condition_id'    => 'sometimes',
            'medical_condition.*.particulars'               => 'nullable',

//        Education
//        Formal Education
            'qualification.*.education_level_id'        =>  'required',
            'qualification.*.subject_id'      =>  'required',
            'qualification.*.education_grade_id'        =>  'required',
            'qualification.*.date_completed'            =>  'required|date|before_or_equal:today',
            'qualification.*.school_id'  =>  'required',
//            Courses
            'course.*.course_type_id'           =>  'sometimes',
            'course.*.course_institution_id'    =>  'required_with:course.*.course_type_id',
            'course.*.course_id'                =>  'required_with:course.*.course_type_id',
            'course.*.course_qualification_id'  =>  'required_with:course.*.course_type_id',
            'course.*.place_on_course'          =>  'nullable|numeric',
            'course.*.started_on'               =>  'required_with:course.*.course_type_id|nullable|date|before_or_equal:today',
            'course.*.ended_on'                 =>  'required_with:course.*.course_type_id|nullable|date|after:course.*.started_on',

//        Extracurricular

//           Sports played and Hobbies are not required

//        Dependents

            'dependent.*.pin'                =>  'sometimes|nullable|numeric|unique:dependents,pin',
            'dependent.*.relationship_id'    =>  'required_with:dependent.*.pin',
            'dependent.*.date_of_birth'      =>  'required_with:dependent.*.pin|nullable|date|before_or_equal:today',
            'dependent.*.first_name'         =>  'required_with:dependent.*.pin',
            'dependent.*.middle_name'        =>  'nullable',
            'dependent.*.last_name'          =>  'required_with:dependent.*.pin',
            'dependent.*.gender_id'          =>  'required_with:dependent.*.pin',
            'dependent.*.religion_id'        =>  'required_with:dependent.*.pin',

        ];
    }



    public  function messages()
    {
        return [
//            All date attributes
            'date' => 'This is not a valid date',

//            Basic Information Messages
            'serviceperson.photo.required'                =>  'A Serviceperson photo is required',
            'serviceperson.number.unique'                 =>  'The service number already exist',
            'serviceperson.number.required'               =>  'A Service Number is required',
            'serviceperson.number.digits_between'         =>  'The Service Number must be between 3 and 5 digits',
            'serviceperson.first_name.required'           =>  'A first name is required',
            'serviceperson.last_name.required'            =>  'A last name is required',
            'serviceperson.marital_status_id.required'    =>  'Marital Status is required',
            'serviceperson.religion_id.required'          =>  'Religion is required',
            'serviceperson.ethnicity_id.required'         =>  'Ethnicity is required',

//            Contact Information Messages
            'address.address1.required'             =>  'A House/Apartment number or location is required',
            'address.address2.required'             =>  'A Street Address is required',
            'address.city_or_town_id.required'      =>  'The City or Town is required',
            'phone.*.phone_type_id.required'        =>  'A Phone type is required',
            'phone.*.number.required'               =>  'The Phone field cannot be blank',
            'phone.*.number.unique'                 =>  'The Phone number already exist',
            'phone.*.number.phone'                  =>  'Please enter a valid T&T Number',
            'email.*.email_type_id.required'        =>  'An Email Type is required',
            'email.*.email.required'                =>  'The Email field cannot be blank',
            'email.*.email.unique'                  =>  'The Email already exist',

//            Identification
//                National ID Messages
            'national_id.number.required'               =>  'National ID Card Number required',
            'national_id.number.numeric'                =>  'National ID Number must be a number',
            'national_id.number.unique'                 =>  'This National ID Number already exist',
            'national_id.date_of_birth.required'        =>  'Date of birth is required',
            'national_id.date_of_birth.before_or_equal' =>  'This date of birth cannot be after today',
            'national_id.place_of_birth.required'       =>  'Place of birth is required',
            'national_id.gender_id.required'            =>  'Gender is required',
            'national_id.issued_on.required'           =>  'An issue date is required',
            'national_id.issued_on.before_or_equal'    =>  'The issue date cannot be a future date',
            'national_id.expired_on.required'          =>  'An expiry date is required',
            'national_id.expired_on.after'             =>  'The expiry date cannot be before today',

//                Drivers Permit Messages
            'drivers_permit.*.number.numeric'                                   =>  'Drivers Permit must be a number',
            'drivers_permit.*.number.unique'                                    =>  'This Drivers Permit number already exist',
            'drivers_permit.*.drivers_permit_type_id.required_with'              =>  'Drivers permit type is required',
            'drivers_permit.*.drivers_permit_class_id.required_with'             =>  'Drivers permit class is required',
            'drivers_permit.*.drivers_permit_transaction_code_id.required_with'  =>  'Drivers permit Code is required',
            'drivers_permit.*.issued_on.required_with'                          =>  'An issue date is required',
            'drivers_permit.*.issued_on.before_or_equal'                        =>  'The issue date cannot be a future date',
            'drivers_permit.*.expired_on.required_with'                         =>  'An expiry date is required',
            'drivers_permit.*.expired_on.after'                                 =>  'The expiry date cannot be before today',

//                Military ID
            'military_id.number.required'             =>  'A Military ID card is required',
            'military_id.number.unique'               =>  'This Military ID card already exist',
            'military_id.issued_on.required'         =>  'An issue date is required',
            'military_id.issued_on.before_or_equal'  =>  'The issue date cannot be a future date',
            'military_id.expired_on.required'        =>  'An expiry date is required',
            'military_id.expired_on.after'           =>  'The expiry date cannot be before today',

//                Passport
            'passport.number.unique'                =>  'This passport already exist' ,
            'passport.issued_on.required_with'     =>  'Issue date required',
            'passport.issued_on.before_or_equal'   =>  'The issue date cannot be a future date',
            'passport.expired_on.required_with'    =>  'Expiry date required',
            'passport.expired_on.after'            =>  'The expiry date cannot be before today',

            //Service Data
//                Enlistment
            'enlistment.*.enlistment_type_id.required'  =>  'Enlistment data is required',
            'enlistment.*.date.required'                =>  'Enlistment date is required',


//                Promotion
            'rank.*.rank_id.required'               =>  'Promotion information is required',
            'rank.*.promoted_on.required'        =>  'Promotion date is required',
            'rank.*.promoted_on.before_or_equal' =>  'The promotion date cannot be a future date',

//            Decoration
            'decoration.*.received_on.required_with'    => 'Date required with Award',
            'decoration.*.received_on.before_or_equal'  => 'The award receipt date cannot be a future date',
//
//            Military Appointment
            'appointment.*.appointment_id.required'     =>  'The Serviceperson Job data is required',
            'appointment.*.started_on.required'         =>  'The start date is required',
            'appointment.*.started_on.before_or_equal'  =>  'The appointment start date cannot be after today',
            'appointment.*.ended_on.after'              =>  'The appointment end date cannot be before start date',

//            Unit data
//            'unit.*.battalion_id.required'         =>  'The Serviceperson unit data is required',
            'unit.*.company_id.required'           =>  'Company is required',
//            'unit.*.platoon_id.required'           =>  'Plt or Dept is required',
            'unit.*.joined_on.required'          =>  'Date joined is required',
            'unit.*.joined_on.before_or_equal'   =>  'Date Joined cannot be a future date',
            'unit.*.left_on.after'               =>  'Date left cannot be before date joined',

//        Medical Data
//            Biodata
            'biodata.eye_colour_id.required'           =>  'Eye colour is required',
            'biodata.hair_colour_id.required'          =>  'Hair colour is required',
            'biodata.skin_colour_id.required'          =>  'Skin colour is required',
            'biodata.blood_type_id.required'           =>  'Blood type is required',
            'height.*.height_id.required'              =>  'Height is required',
            'height.*.measured_on.required'          =>  'Date measured is required',
            'height.*.measured_on.before_or_equal'   =>  'Date measured cannot be a future date',
            'weight.*.weight_id.required'              =>  'Weight is required',
            'weight.*.weighed_on.required'           =>  'Date weighed is required',
            'weight.*.weighed_on.before_or_equal'    =>  'Date weighed cannot be a future date',
//            Medical History
//        Vaccine

            'vaccine.*.received_on.required_with'      => 'A vaccine date is required with vaccine',
            'vaccine.*.received_on.before_or_equal'    => 'Vaccine receipt date cannot be after today',

//        Education
//        Formal Education
            'qualification.*.education_level_id.required'       =>  'Education info is required',
            'qualification.*.subject_id.required'     =>  'A subject or course is required',
            'qualification.*.education_grade_id.required'       =>  'A Grade is required',
            'qualification.*.date_completed.required'           =>  'An approximate completion date is required',
            'qualification.*.date_completed.before_or_equal'    =>  'The end date cannot be a future date',
            'qualification.*.school_id.required' =>  'A School or Institution is required',

//            Courses
            'course.*.course_institution_id.required_with'      =>  'The Course institution is required',
            'course.*.course_id.required_with'                  =>  'The course is required',
            'course.*.course_qualification_id.required_with'    =>  'The course qualification is required',
            'course.*.place_on_course.numeric'                  =>  'Place on course should be a number',
            'course.*.started_on.required_with'                 =>  'The course start date is required',
            'course.*.started_on.before_or_equal'               =>  'The course start date cannot be a future date',
            'course.*.ended_on.required_with'                   =>  'The course end date is required',
            'course.*.ended_on.after'                           =>  'The course end date cannot be before start date',

//            Dependents
            'dependent.*.pin.numeric'                       =>  'The pin must be a number',
            'dependent.*.pin.unique'                        =>  'The pin provided already exist',
            'dependent.*.relationship_id.required_with'     =>  'Dependent relationship is required',
            'dependent.*.date_of_birth.required_with'       =>  'Dependents date of birth is required',
            'dependent.*.first_name.required_with'          =>  'Dependent first name is required',
            'dependent.*.last_name.required_with'           =>  'Dependent last name is required',
            'dependent.*.gender_id.required_with'           =>  'Dependent gender is required',
            'dependent.*.religion_id.required_with'         =>  'Dependent religion is required',

        ];
    }
}
