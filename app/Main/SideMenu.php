<?php

namespace App\Main;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * //     * @param Request $request
     * //     * @return array
     */
    public static function menu()
    {
        return [
            'dashboard' => [
                'icon' => 'home',
                'route_name' => 'dashboard',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Dashboard'
            ],
            'parade_state' => [
                'icon' => 'users',
                'route_name' => 'parade_state',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Parade State'
            ],
            'servicepeople' => [
                'icon' => 'users',
                'route_name' => 'servicepeople.index',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Servicepeople'
            ],
            'devider',
            'administration' => [
                'icon' => 'check',
                'title' => 'Administration',
                'sub_menu' => [
                    'side-menu' => [
                        'icon' => '',
                        'route_name' => 'dashboard',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Approvals'
                    ],
                ]
            ],
            'medical' => [
                'icon' => 'plus',
                'title' => 'Medical Records',
                'sub_menu' => [
                    'side-menu' => [
                        'icon' => '',
                        'route_name' => 'dashboard',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Basic Medical Info'
                    ],
                ]
            ],
            'manpower' => [
                'icon' => 'layout',
                'title' => 'Manpower',
                'sub_menu' => [
                    'vacancies' => [
                        'icon' => '',
                        'title' => 'Vacancies',
                        'sub_menu' => [
                            'branch' => [
                                'icon' => '',
                                'route_name' => 'dashboard',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Branch'
                            ],
                            'stream' => [
                                'icon' => '',
                                'route_name' => 'dashboard',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Stream'
                            ],
                        ],

                    ],
                    'career-management' => [
                        'icon' => '',
                        'title' => 'Career Mgt',
                        'sub_menu' => [
                            'job' => [
                                'icon' => '',
                                'route_name' => 'dashboard',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Job'
                            ],
                            'qualification' => [
                                'icon' => '',
                                'route_name' => 'dashboard',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Qualification'
                            ],
                            'PDCMS' => [
                                'icon' => '',
                                'route_name' => 'dashboard',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'PDCMS'
                            ],
                        ]
                    ],
                ],
                'Security' => [
                    'wizards' => [
                        'icon' => '',
                        'title' => 'Security',
                        'sub_menu' => [
                            'access-control' => [
                                'icon' => '',
                                'route_name' => 'dashboard',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Access Control'
                            ],
                            'audit' => [
                                'icon' => '',
                                'route_name' => 'dashboard',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Audit data'
                            ],
                        ]
                    ],
                ]
            ],
            'devider',
            'system-admin' => [
                'icon' => 'layout',
                'title' => 'System Admin',
                'sub_menu' => [
                    'metadata' => [
                        'icon' => '',
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
                        ]
                    ],
                    'security' => [
                        'icon' => '',
                        'title' => 'Security',
                        'sub_menu' => [
                            'access-controll' => [
                                'icon' => '',
                                'route_name' => 'dashboard',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Access Control'
                            ],
                            'audit-data' => [
                                'icon' => '',
                                'route_name' => 'dashboard',
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
