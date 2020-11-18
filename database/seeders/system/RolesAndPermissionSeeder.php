<?php

namespace Database\Seeders\system;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            //Reset cached roles and Permissions
            app() [PermissionRegistrar::class]->forgetCachedPermissions();

            //Serviceperson - Record Card Permissions
            Permission::create(['name' => 'create-record-card']);
            Permission::create(['name' => 'view-record-card']);
            Permission::create(['name' => 'update-record-card']);
            Permission::create(['name' => 'delete-record-card']);
            Permission::create(['name' => 'force-delete-record-card']);
            Permission::create(['name' => 'restore-record-card']);

            //Record Card - Serviceperson Status
            Permission::create(['name' => 'change-serviceperson-status']);
            //Record Card - Contact Information
            Permission::create(['name' => 'create-contact-information']);
            Permission::create(['name' => 'view-contact-information']);
            Permission::create(['name' => 'update-contact-information']);
            Permission::create(['name' => 'delete-contact-information']);
            Permission::create(['name' => 'force-delete-contact-information']);
            Permission::create(['name' => 'restore-contact-information']);
            //Record Card - Personal Information
            Permission::create(['name' => 'create-personal-information']);
            Permission::create(['name' => 'view-personal-information']);
            Permission::create(['name' => 'update-personal-information']);
            Permission::create(['name' => 'delete-personal-information']);
            Permission::create(['name' => 'force-delete-personal-information']);
            Permission::create(['name' => 'restore-personal-information']);
            //Record Card - Identification
            Permission::create(['name' => 'create-identification-information']);
            Permission::create(['name' => 'view-identification-information']);
            Permission::create(['name' => 'update-identification-information']);
            Permission::create(['name' => 'delete-identification-information']);
            Permission::create(['name' => 'force-delete-identification-information']);
            Permission::create(['name' => 'restore-identification-information']);
            //Record Card - Service Data
            Permission::create(['name' => 'create-service-data']);
            Permission::create(['name' => 'view-service-data']);
            Permission::create(['name' => 'update-service-data']);
            Permission::create(['name' => 'delete-service-data']);
            Permission::create(['name' => 'force-delete-service-data']);
            Permission::create(['name' => 'restore-service-data']);
            //Record Card - Qualification
            Permission::create(['name' => 'create-qualification']);
            Permission::create(['name' => 'view-qualification']);
            Permission::create(['name' => 'update-qualification']);
            Permission::create(['name' => 'delete-qualification']);
            Permission::create(['name' => 'force-delete-qualification']);
            Permission::create(['name' => 'restore-qualification']);
            //Record Card - Medical History
            Permission::create(['name' => 'create-basic-medical-information']);
            Permission::create(['name' => 'view-basic-medical-information']);
            Permission::create(['name' => 'update-basic-medical-information']);
            Permission::create(['name' => 'delete-basic-medical-information']);
            Permission::create(['name' => 'force-delete-basic-medical-information']);
            Permission::create(['name' => 'restore-basic-medical-information']);
            //Record Card - Dependents
            Permission::create(['name' => 'create-dependents']);
            Permission::create(['name' => 'view-dependents']);
            Permission::create(['name' => 'update-dependents']);
            Permission::create(['name' => 'delete-dependents']);
            Permission::create(['name' => 'force-delete-dependents']);
            Permission::create(['name' => 'restore-dependents']);
            //Record Card - Emergency Contact
            Permission::create(['name' => 'create-emergency-contact']);
            Permission::create(['name' => 'view-emergency-contact']);
            Permission::create(['name' => 'update-emergency-contact']);
            Permission::create(['name' => 'delete-emergency-contact']);
            Permission::create(['name' => 'force-delete-emergency-contact']);
            Permission::create(['name' => 'restore-emergency-contact']);
            //Record Card - Extracurricular
            Permission::create(['name' => 'create-extracurricular-information']);
            Permission::create(['name' => 'view-extracurricular-information']);
            Permission::create(['name' => 'update-extracurricular-information']);
            Permission::create(['name' => 'delete-extracurricular-information']);
            Permission::create(['name' => 'force-delete-extracurricular-information']);
            Permission::create(['name' => 'restore-extracurricular-information']);


//         Servicepeople list
            Permission::create(['name' => 'view-servicepeople']);

//        Administration
            Permission::create(['name' => 'view-administration-module']);
//        Approval System
//        Pending
            Permission::create(['name' => 'view-pending-serviceperson']);
            Permission::create(['name' => 'view-pending-qualification']);
            Permission::create(['name' => 'view-pending-unit-change']);
//        Approvals
            Permission::create(['name' => 'approve-serviceperson']);
            Permission::create(['name' => 'approve-qualification']);
            Permission::create(['name' => 'approve-dependent']);
            Permission::create(['name' => 'approve-unit']);
            Permission::create(['name' => 'approve-job']);

//        Parade State
            Permission::create(['name' => 'view-parade-state']);

//        Manpower (Career Management)

            Permission::create(['name' => 'view-manpower-module']);
            Permission::create(['name' => 'view-career-management-module']);
            Permission::create(['name' => 'view-vacancies']);

            // Job Metadata
            Permission::create(['name' => 'create-job']);
            Permission::create(['name' => 'view-job']);
            Permission::create(['name' => 'update-job']);
            Permission::create(['name' => 'delete-job']);
            Permission::create(['name' => 'force-delete-job']);
            Permission::create(['name' => 'restore-job']);

            Permission::create(['name' => 'update-establishment']);

            //        Qualification Metadata (Formal Education and Course)
            Permission::create(['name' => 'create-qualification-metadata']);
            Permission::create(['name' => 'view-qualification-metadata']);
            Permission::create(['name' => 'update-qualification-metadata']);
            Permission::create(['name' => 'delete-qualification-metadata']);
            Permission::create(['name' => 'force-delete-qualification-metadata']);
            Permission::create(['name' => 'restore-qualification-metadata']);

            //        Career Management System Metadata
            Permission::create(['name' => 'create-cms-metadata']);
            Permission::create(['name' => 'view-cms-metadata']);
            Permission::create(['name' => 'update-cms-metadata']);
            Permission::create(['name' => 'delete-cms-metadata']);
            Permission::create(['name' => 'force-delete-cms-metadata']);
            Permission::create(['name' => 'restore-cms-metadata']);

//        Reports
            Permission::create(['name' => 'view-report-module']);

            Permission::create(['name' => 'view-contract-reports']);
            Permission::create(['name' => 'view-identification-reports']);
            Permission::create(['name' => 'view-sos-reports']);


//         System Administration
            Permission::create(['name' => 'view-system-admin-module']);

//        Metadata
            Permission::create(['name' => 'create-metadata']);
            Permission::create(['name' => 'view-metadata']);
            Permission::create(['name' => 'update-metadata']);
            Permission::create(['name' => 'delete-metadata']);
            Permission::create(['name' => 'force-delete-metadata']);
            Permission::create(['name' => 'restore-metadata']);

//        Security
            Permission::create(['name' => 'view-security-module']);

//        Roles
            Permission::create(['name' => 'create-roles']);
            Permission::create(['name' => 'view-roles']);
            Permission::create(['name' => 'update-roles']);
            Permission::create(['name' => 'delete-roles']);
            Permission::create(['name' => 'force-delete-roles']);
            Permission::create(['name' => 'restore-roles']);

            Permission::create(['name' => 'assign-roles']);
            Permission::create(['name' => 'revoke-roles']);
//        Permissions
            Permission::create(['name' => 'create-permissions']);
            Permission::create(['name' => 'view-permissions']);
            Permission::create(['name' => 'update-permissions']);
            Permission::create(['name' => 'delete-permissions']);
            Permission::create(['name' => 'force-delete-permissions']);
            Permission::create(['name' => 'restore-permissions']);

            Permission::create(['name' => 'assign-permissions']);
            Permission::create(['name' => 'revoke-permissions']);

            //Audit

            Permission::create(['name' => 'view-activities']);
            Permission::create(['name' => 'delete-activities']);
            Permission::create(['name' => 'force-delete-activities']);
            Permission::create(['name' => 'restore-activities']);

            /** !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!  Roles !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

//      System Administration
            Role::create(['name' => 'super-admin'])->givePermissionTo(Permission::all());

            /**
             * G6 permissions
             */
            Role::create(['name' => 'g6'])->givePermissionTo([
//                Administration
                'view-administration-module', 'view-report-module',
//          Roles
                'create-roles', 'view-roles', 'update-roles', 'delete-roles', 'assign-roles', 'revoke-roles',
//        Permissions
                'create-permissions', 'view-permissions', 'update-permissions', 'delete-permissions', 'assign-permissions', 'revoke-permissions',
//        Activities
                'view-activities', 'delete-activities',
//            Metadata
                'create-metadata', 'view-metadata', 'update-metadata', 'delete-metadata', 'view-activities',
//           System Administration
                'view-system-admin-module',
            ]);

            Role::create(['name' => 'system-admin'])->givePermissionTo([
//                Administration
                'view-administration-module', 'view-report-module',
//           System Administration
                'view-system-admin-module',
//          Roles
                'assign-roles', 'revoke-roles',
//        Permissions
                'assign-permissions', 'revoke-permissions',
//            Metadata
                'create-metadata', 'view-metadata', 'update-metadata', 'delete-metadata',
//           Activities
                'view-activities'
            ]);

            //      Serviceperson Administration
            /**
             * Chief Clerk permissions
             */
            Role::create(['name' => 'chief-clerk'])->givePermissionTo([
//                Administration
                'view-administration-module', 'view-report-module',
//            Record Card
                'create-record-card', 'view-record-card', 'update-record-card', 'delete-record-card',
//            Serviceperson Status
                'change-serviceperson-status',
//            Contact Information
                'create-contact-information', 'view-contact-information', 'update-contact-information', 'delete-contact-information',
//            Personal Information
                'create-personal-information', 'view-personal-information', 'update-personal-information', 'delete-personal-information',
//            Identification Information
                'create-identification-information', 'view-identification-information', 'update-identification-information', 'delete-identification-information',
//            Service Data
                'create-service-data', 'view-service-data', 'update-service-data', 'delete-service-data',
//            Qualification
                'create-qualification', 'view-qualification', 'update-qualification', 'delete-qualification',
//            Medical Data
                'create-basic-medical-information', 'view-basic-medical-information', 'update-basic-medical-information', 'delete-basic-medical-information',
//            Dependents
                'create-dependents', 'view-dependents', 'update-dependents', 'delete-dependents',
//            Emergency Contact
                'create-emergency-contact', 'view-emergency-contact', 'update-emergency-contact', 'delete-emergency-contact',
//            Extracurricular
                'create-extracurricular-information', 'view-extracurricular-information', 'update-extracurricular-information', 'delete-extracurricular-information',
//            View servicepeople list
                'view-servicepeople',
//            Approval system
//            View Pending
                'view-pending-serviceperson', 'view-pending-qualification', 'view-pending-unit-change',
//            Make Approval
                'approve-serviceperson', 'approve-qualification', 'approve-unit',
                //        Reports
                'view-contract-reports', 'view-identification-reports', 'view-sos-reports',
                // System Administration
                'view-system-admin-module',
            ]);

            /**
             * Administrative NCO permissions
             */
            Role::create(['name' => 'admin-nco'])->givePermissionTo([
//                Administration
                'view-administration-module', 'view-report-module',
//            Record Card
                'create-record-card', 'view-record-card', 'update-record-card',
//            Serviceperson Status
                'change-serviceperson-status',
//            Contact Information
                'create-contact-information', 'view-contact-information', 'update-contact-information',
//            Personal Information
                'create-personal-information', 'view-personal-information', 'update-personal-information',
//            Identification Information
                'create-identification-information', 'view-identification-information', 'update-identification-information',
//            Service Data
                'create-service-data', 'view-service-data', 'update-service-data',
//            Qualification
                'create-qualification', 'view-qualification', 'update-qualification',
//            Medical Data
                'create-basic-medical-information', 'view-basic-medical-information', 'update-basic-medical-information',
//            Dependents
                'create-dependents', 'view-dependents', 'update-dependents', 'delete-dependents',
//            Emergency Contact
                'create-emergency-contact', 'view-emergency-contact', 'update-emergency-contact', 'delete-emergency-contact',
//            Extracurricular
                'create-extracurricular-information', 'view-extracurricular-information', 'update-extracurricular-information', 'delete-extracurricular-information',
//            View servicepeople list
                'view-servicepeople',
//            Approval system
//            View Pending
                'view-pending-serviceperson', 'view-pending-qualification', 'view-pending-unit-change',
//            Make Approval
                'approve-serviceperson', 'approve-qualification', 'approve-unit',
                //        Reports
                'view-contract-reports', 'view-identification-reports', 'view-sos-reports',
            ]);

            /**
             * Administrative clerk permissions
             */
            Role::create(['name' => 'admin-clerk'])->givePermissionTo([
//            Record Card
                'create-record-card', 'view-record-card', 'update-record-card',
//            Serviceperson Status
                'change-serviceperson-status',
//            Contact Information
                'create-contact-information', 'view-contact-information', 'update-contact-information',
//            Personal Information
                'create-personal-information', 'view-personal-information', 'update-personal-information',
//            Identification Information
                'create-identification-information', 'view-identification-information', 'update-identification-information',
//            Service Data
                'create-service-data', 'view-service-data', 'update-service-data',
//            Qualification
                'create-qualification', 'view-qualification',
//            Medical Data
                'create-basic-medical-information', 'view-basic-medical-information', 'update-basic-medical-information',
//            Dependents
                'create-dependents', 'view-dependents', 'update-dependents',
//            Emergency Contact
                'create-emergency-contact', 'view-emergency-contact', 'update-emergency-contact',
//            Extracurricular
                'create-extracurricular-information', 'view-extracurricular-information', 'update-extracurricular-information', 'delete-extracurricular-information',
//            View servicepeople list
                'view-servicepeople',
                //        Reports
                'view-contract-reports', 'view-identification-reports',
            ]);;


//  Human Resources

            /**
             * G1 Permissions
             */
            Role::create(['name' => 'g1'])->givePermissionTo([
//                Administration
                'view-administration-module',
//           Record Card
                'view-record-card', 'view-servicepeople',
//        Parade State
                'view-parade-state',
//        Manpower - Job Metadata
                'create-job', 'view-job', 'update-job', 'delete-job', 'approve-job', 'update-establishment',
//        Qualification Metadata (Formal Education and Course)
                'create-qualification-metadata', 'view-qualification-metadata', 'update-qualification-metadata', 'delete-qualification-metadata',
//        Career Management System Metadata
                'create-cms-metadata', 'view-cms-metadata', 'update-cms-metadata', 'delete-cms-metadata',
//        Reports
                'view-report-module', 'view-contract-reports', 'view-identification-reports', 'view-sos-reports',
//            Qualification
                'view-qualification', 'update-qualification', 'delete-qualification',
//           View Modules
                'view-manpower-module', 'view-career-management-module', 'view-vacancies',


            ]);

            /**
             * G1 legal permissions
             */
            Role::create(['name' => 'g1-legal'])->givePermissionTo([
//           Record Card
                'view-record-card', 'view-servicepeople',
                //        Reports
                'view-report-module', 'view-contract-reports', 'view-sos-reports',
//            Qualification
                'view-qualification',
            ]);

            Role::create(['name' => 'hro'])->givePermissionTo([
//           Record Card
                'view-record-card', 'view-servicepeople',
//        Parade State
                'view-parade-state',
//        Manpower / Job Metadata
                'create-job', 'view-job', 'update-job', 'delete-job', 'approve-job', 'update-establishment',
//        Qualification Metadata (Formal Education and Course)
                'create-qualification-metadata', 'view-qualification-metadata', 'update-qualification-metadata', 'delete-qualification-metadata',
//        Career Management System Metadata
                'create-cms-metadata', 'view-cms-metadata', 'update-cms-metadata', 'delete-cms-metadata',
//        Reports
                'view-contract-reports', 'view-identification-reports', 'view-sos-reports',
//        Qualification
                'view-qualification', 'update-qualification', 'delete-qualification',
//           View Modules
                'view-manpower-module', 'view-career-management-module', 'view-vacancies',
            ]);

            /**
             * Human Resource Warrant Officer permissions
             */

            Role::create(['name' => 'hr-wo'])->givePermissionTo([
//           Record Card
                'view-record-card', 'view-servicepeople',
//        Parade State
                'view-parade-state',
//        Manpower / Job Metadata
                'create-job', 'view-job', 'update-job', 'delete-job', 'approve-job', 'update-establishment',
//        Qualification Metadata (Formal Education and Course)
                'create-qualification-metadata', 'view-qualification-metadata', 'update-qualification-metadata', 'delete-qualification-metadata',
//        Career Management System Metadata
                'create-cms-metadata', 'view-cms-metadata', 'update-cms-metadata', 'delete-cms-metadata',
//        Reports
                'view-report-module', 'view-contract-reports', 'view-identification-reports', 'view-sos-reports',
//        Qualification
                'view-qualification', 'update-qualification',
//           View Modules
                'view-manpower-module', 'view-career-management-module', 'view-vacancies',
            ]);

            /**
             * HR Senior NCO Permissions
             */

            Role::create(['name' => 'hr-snco'])->givePermissionTo([
//           Record Card
                'view-record-card', 'view-servicepeople',
//        Parade State
                'view-parade-state',
//        Manpower - Job Metadata
                'create-job', 'view-job', 'update-job', 'delete-job', 'approve-job',
//        Qualification Metadata (Formal Education and Course)
                'create-qualification-metadata', 'view-qualification-metadata', 'update-qualification-metadata',
//        Career Management System Metadata
                'create-cms-metadata', 'view-cms-metadata', 'update-cms-metadata', 'delete-cms-metadata',
//        Reports
                'view-report-module','view-contract-reports', 'view-identification-reports', 'view-sos-reports',
//            Qualification
                'view-qualification', 'update-qualification',
//           View Modules
                'view-manpower-module', 'view-career-management-module', 'view-vacancies',
            ]);

            /**
             * HR Clerk Permissions
             */
            Role::create(['name' => 'hr-clerk'])->givePermissionTo([
//           Record Card
                'view-record-card', 'view-servicepeople',
//        Parade State
                'view-parade-state',
//        Manpower - Job Metadata
                'create-job', 'view-job', 'update-job',
//        Qualification Metadata (Formal Education and Course)
                'create-qualification-metadata', 'view-qualification-metadata', 'update-qualification-metadata',
//        Career Management System Metadata
                'create-cms-metadata', 'view-cms-metadata',
//        Reports
                'view-contract-reports', 'view-identification-reports', 'view-sos-reports',
                //        Reports
                'view-contract-reports', 'view-identification-reports', 'view-sos-reports',
//            Qualification
                'view-qualification',
                //           View Modules
                'view-manpower-module', 'view-career-management-module', 'view-vacancies',
            ]);

//        Command Roles
            Role::create(['name' => 'brigade-commander'])->givePermissionTo(Permission::all());
            Role::create(['name' => 'brigade-second'])->givePermissionTo(Permission::all());

            Role::create(['name' => 'battalion-commander'])->givePermissionTo([
//                Administration
                'view-administration-module',
//            Parade State
                'view-parade-state',
//            Record Card
                'view-record-card',
//            View servicepeople list
                'view-servicepeople',
//            View Pending
                'view-pending-serviceperson', 'view-pending-qualification', 'view-pending-unit-change',
//             Reports
                'view-report-module','view-contract-reports', 'view-identification-reports', 'view-sos-reports',
//              Manpower
                'view-vacancies'
            ]);

            Role::create(['name' => 'battalion-second'])->givePermissionTo([
//                Administration
                'view-administration-module',
//            Parade State
                'view-parade-state',
//            Record Card
                'view-record-card',
//            View servicepeople list
                'view-servicepeople',
//            View Pending
                'view-pending-serviceperson', 'view-pending-qualification', 'view-pending-unit-change',
//             Reports
                'view-report-module','view-contract-reports', 'view-identification-reports', 'view-sos-reports',
//              Manpower
                'view-vacancies'
            ]);

            Role::create(['name' => 'company-commander'])->givePermissionTo([
//                Administration
                'view-administration-module',
//            Parade State
                'view-parade-state',
//            Record Card
                'view-record-card',
//            View servicepeople list
                'view-servicepeople',
//             Reports
                'view-report-module', 'view-contract-reports', 'view-identification-reports', 'view-sos-reports',
//              Manpower
                'view-vacancies'
            ]);

            Role::create(['name' => 'company-second'])->givePermissionTo([
//                Administration
                'view-administration-module',
//            Parade State
                'view-parade-state',
//            Record Card
                'view-record-card',
//            View servicepeople list
                'view-servicepeople',
//             Reports
                'view-report-module', 'view-contract-reports', 'view-identification-reports', 'view-sos-reports',
//              Manpower
                'view-vacancies'
            ]);

            Role::create(['name' => 'platoon-commander'])->givePermissionTo([
//            Parade State
                'view-parade-state',
//            Record Card
                'view-record-card',
//            View servicepeople list
                'view-servicepeople',
//             Reports
                'view-report-module','view-contract-reports', 'view-identification-reports',
            ]);

            Role::create(['name' => 'platoon-second'])->givePermissionTo([
                'view-servicepeople',
//             Reports
                'view-contract-reports', 'view-identification-reports',
            ]);

            Role::create(['name' => 'section-commander'])->givePermissionTo([
                'view-servicepeople'
            ]);

            Role::create(['name' => 'section-second'])->givePermissionTo([
                'view-servicepeople'
            ]);

            // Advisory Roles

            Role::create(['name' => 'brigade-advisor'])->givePermissionTo([
                'view-servicepeople',
//             Reports
                'view-contract-reports', 'view-identification-reports', 'view-sos-reports',
            ]);
            Role::create(['name' => 'battalion-advisor'])->givePermissionTo([
                'view-servicepeople',
//             Reports
                'view-contract-reports', 'view-identification-reports', 'view-sos-reports',
            ]);
            Role::create(['name' => 'company-advisor'])->givePermissionTo([
                'view-servicepeople',
//             Reports
                'view-report-module', 'view-contract-reports', 'view-identification-reports', 'view-sos-reports',
            ]);

//        Serviceperson
            Role::create(['name' => 'serviceperson'])->givePermissionTo([

                // Model serviceperson can create

                'create-dependents', 'create-contact-information', 'create-identification-information', 'create-qualification',
                'create-basic-medical-information', 'create-emergency-contact', 'create-extracurricular-information',

                // Items serviceperson can delete

                'delete-contact-information',

                // n.b Most other authorisation are handled if the serviceperson is the owner of the Model
            ]);

//        Auditor
            Role::create(['name' => 'auditor'])->givePermissionTo([
                'view-activities',
            ]);

// Staff Officers
            Role::create(['name' => 'G2']);
            Role::create(['name' => 'G3']);
            Role::create(['name' => 'G4']);
            Role::create(['name' => 'G5']);
            Role::create(['name' => 'G7']);
        });
    }
}
