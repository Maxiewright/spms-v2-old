<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * //     *
     * @return array
     */
    public static function menu()
    {
        return [
            // Servicepeople
            'dashboard' => [
                'icon' => 'home',
                'route_name' => 'dashboard',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Dashboard'
            ],
            'parade_state' => [
                'icon' => 'user-check',
                'route_name' => 'parade_state',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Parade State'
            ],
            'personnel' => [
                'icon' => 'users',
                'title' => 'Personnel',
                'sub_menu' => [
                    'servicepeople' => [
                        'icon' => '',
                        'route_name' => 'servicepeople.index',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Servicepeople'
                    ],
                    'medical' => [
                        'icon' => '',
                        'route_name' => 'medial_classifications',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Medical'
                    ],
                    'leave' => [
                        'icon' => '',
                        'route_name' => 'leave.dashboard',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Leave'
                    ],
                ],

            ],
            // Manpower and Admin
            'divider',
            'manpower' => [
                'icon' => 'users',
                'title' => 'Manpower',
                'sub_menu' => [
                    'vacancies' => [
                        'icon' => 'user-minus',
                        'title' => 'Vacancies',
                        'sub_menu' => [
                            'branch' => [
                                'icon' => '',
                                'route_name' => 'manpower.vacancies.branch',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Branch'
                            ],
                            'stream' => [
                                'icon' => '',
                                'route_name' => 'manpower.vacancies.stream',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Stream'
                            ],
                        ],

                    ],
                    'career-management' => [
                        'icon' => 'user-check',
                        'title' => 'Career Mgt',
                        'sub_menu' => [
                            'job' => [
                                'icon' => '',
                                'route_name' => 'manpower.career_management.jobs',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Job'
                            ],
                            'qualification' => [
                                'icon' => '',
                                'route_name' => 'manpower.career_management.qualifications',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Qualification'
                            ],
                            'PDCMS' => [
                                'icon' => '',
                                'route_name' => 'manpower.career_management.career_management_system',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'PDCMS'
                            ],
                        ]
                    ],
                ],
            ],
            'administration' => [
                'icon' => 'clipboard',
                'title' => 'Admin',
                'sub_menu' => [
                    'approval' => [
                        'icon' => '',
                        'route_name' => 'dashboard',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Approvals'
                    ],
                ],

            ],
            // System Administration and Documentation
            'divider',
            'system' => [
                'icon' => 'users',
                'title' => 'System',
                'sub_menu' => [
                    'metadata' => [
                        'icon' => 'user-minus',
                        'title' => 'Metadata',
                        'sub_menu' => [
                            'basic-info' => [
                                'icon' => '',
                                'route_name' => 'metadata.basic_info',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Basic Info'
                            ],
                            'contact' => [
                                'icon' => '',
                                'route_name' => 'metadata.contact',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Contact'
                            ],
                            'identification' => [
                                'icon' => '',
                                'route_name' => 'metadata.identification',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Identification'
                            ],
                            'service-data' => [
                                'icon' => '',
                                'route_name' => 'metadata.service_data',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Service Data'
                            ],
                            'bio-data' => [
                                'icon' => '',
                                'route_name' => 'metadata.bio_data',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Bio Data'
                            ],
                            'medical' => [
                                'icon' => '',
                                'route_name' => 'metadata.medical',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Medical'
                            ],
                            'extracurricular' => [
                                'icon' => '',
                                'route_name' => 'metadata.extracurricular',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Extracurricular'
                            ],
                        ],

                    ],
                    'security' => [
                        'icon' => 'user-check',
                        'title' => 'Security',
                        'sub_menu' => [
                            'access_control' => [
                                'icon' => '',
                                'route_name' => 'metadata.basic_info',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Access Control'
                            ],
                            'audit' => [
                                'icon' => '',
                                'route_name' => 'metadata.contact',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Audit'
                            ],
                        ]
                    ],
                ],
            ],
            'documentation' => [
                'icon' => 'book-open',
                'route_name' => 'documentation',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Documentation'
            ],
        ];
    }
}
