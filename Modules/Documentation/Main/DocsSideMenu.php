<?php

namespace Modules\Documentation\Main;

class DocsSideMenu
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
            // Back to Main Site
            'spms' => [
                'icon' => 'home',
                'route_name' => 'dashboard',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Back to SpMS'
            ],

            // Documentation Dashboard
            'divider',

            'dashboard' => [
                'icon' => 'home',
                'route_name' => 'documentation',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Docs Dashboard'
            ],
            // Getting Started
            'divider',
            'getting_started' => [
                'icon' => 'flag',
                'title' => 'Getting Started',
                'sub_menu' => [
                    'introduction' => [
                        'icon' => '',
                        'route_name' => 'getting_started.introduction',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Introduction'
                    ],
                    'system_access' => [
                        'icon' => '',
                        'route_name' => 'getting_started.system_access',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'System Access'
                    ],
                    'views' => [
                        'icon' => '',
                        'route_name' => 'getting_started.views',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Views'
                    ],
                    'adding_servicepeople' => [
                        'icon' => '',
                        'route_name' => 'getting_started.adding_servicepeople',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Adding Servicepeople'
                    ],
                ],
            ],
            // Personnel
            'personnel' => [
                'icon' => 'users',
                'title' => 'Personnel',
                'sub_menu' => [
                    'medical' => [
                        'icon' => '',
                        'title' => 'Medical',
                        'sub_menu' => [
                            'medical_classification' => [
                                'icon' => 'plus',
                                'route_name' => 'personnel.medical.classification',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Classification'
                            ],
                        ]

                    ],
                    'leave' => [
                        'icon' => '',
                        'route_name' => 'personnel.leave',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Leave'
                    ],
                ],
            ],
            // Manpower
            'manpower' => [
                'icon' => 'clipboard',
                'title' => 'Manpower',
                'sub_menu' => [
                    'career_management' => [
                        'icon' => '',
                        'route_name' => 'manpower.career_management',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Career Management'
                    ],
                    'vacancy' => [
                        'icon' => '',
                        'route_name' => 'manpower.vacancies',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Vacancy Views'
                    ],
                ],
            ],
            // Administration
            'administration' => [
                'icon' => 'user-check',
                'title' => 'Administration',
                'sub_menu' => [
                    'introduction' => [
                        'icon' => '',
                        'route_name' => 'administration.approval',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Approval System'
                    ],
                ],
            ],
            // System Administration
            'divider',
            'system_admin' => [
                'icon' => 'settings',
                'title' => 'System',
                'sub_menu' => [
                    'metadata' => [
                        'icon' => '',
                        'title' => 'Metadata',
                        'sub_menu' => [
                            'record_card' => [
                                'icon' => '',
                                'route_name' => 'system.metadata.record_card',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Record Card'
                            ],

                        ]
                    ],
                    'security' => [
                        'icon' => '',
                        'title' => 'Access Control',
                        'sub_menu' => [
                            'access-control' => [
                                'icon' => 'lock',
                                'route_name' => 'system.security.access_control',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Access Control'
                            ],
                            'audit-data' => [
                                'icon' => '',
                                'route_name' => 'system.security.audit',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Audit Data'
                            ],
                        ]
                    ],
                ],
            ],
        ];
    }
}
