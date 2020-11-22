<?php

namespace App\Main;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SideMenu
{
    /**
     * List of side menu items.
     *
//     * @param  Request  $request
//     * @return Response
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
                'icon' => 'plus',
                'title' => 'Manpower',
                'sub_menu' => [
                    'crud-data-list' => [
                        'icon' => '',
                        'route_name' => 'dashboard',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Vacancy'
                    ],
                    'crud-form' => [
                        'icon' => '',
                        'route_name' => 'dashboard',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Career Mgt'
                    ]
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
                            'wizard-layout-1' => [
                                'icon' => '',
                                'route_name' => 'dashboard',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Record Card'
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
//                    'blog' => [
//                        'icon' => '',
//                        'title' => 'Blog',
//                        'sub_menu' => [
//                            'blog-layout-1' => [
//                                'icon' => '',
//                                'route_name' => 'blog-layout-1',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 1'
//                            ],
//                            'blog-layout-2' => [
//                                'icon' => '',
//                                'route_name' => 'blog-layout-2',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 2'
//                            ],
//                            'blog-layout-3' => [
//                                'icon' => '',
//                                'route_name' => 'blog-layout-3',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 3'
//                            ]
//                        ]
//                    ],
//                    'pricing' => [
//                        'icon' => '',
//                        'title' => 'Pricing',
//                        'sub_menu' => [
//                            'pricing-layout-1' => [
//                                'icon' => '',
//                                'route_name' => 'pricing-layout-1',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 1'
//                            ],
//                            'pricing-layout-2' => [
//                                'icon' => '',
//                                'route_name' => 'pricing-layout-2',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 2'
//                            ]
//                        ]
//                    ],
//                    'invoice' => [
//                        'icon' => '',
//                        'title' => 'Invoice',
//                        'sub_menu' => [
//                            'invoice-layout-1' => [
//                                'icon' => '',
//                                'route_name' => 'invoice-layout-1',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 1'
//                            ],
//                            'invoice-layout-2' => [
//                                'icon' => '',
//                                'route_name' => 'invoice-layout-2',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 2'
//                            ]
//                        ]
//                    ],
//                    'faq' => [
//                        'icon' => '',
//                        'title' => 'FAQ',
//                        'sub_menu' => [
//                            'faq-layout-1' => [
//                                'icon' => '',
//                                'route_name' => 'faq-layout-1',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 1'
//                            ],
//                            'faq-layout-2' => [
//                                'icon' => '',
//                                'route_name' => 'faq-layout-2',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 2'
//                            ],
//                            'faq-layout-3' => [
//                                'icon' => '',
//                                'route_name' => 'faq-layout-3',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 3'
//                            ]
//                        ]
//                    ],
//                    'login' => [
//                        'icon' => '',
//                        'route_name' => 'login',
//                        'params' => [
//                            'layout' => 'login'
//                        ],
//                        'title' => 'Login'
//                    ],
//                    'register' => [
//                        'icon' => '',
//                        'route_name' => 'register',
//                        'params' => [
//                            'layout' => 'login'
//                        ],
//                        'title' => 'Register'
//                    ],
//                    'error-page' => [
//                        'icon' => '',
//                        'route_name' => 'error-page',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Error Page'
//                    ],
//                    'update-profile' => [
//                        'icon' => '',
//                        'route_name' => 'update-profile',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Update profile'
//                    ],
//                    'change-password' => [
//                        'icon' => '',
//                        'route_name' => 'change-password',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Change Password'
//                    ]
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
//                    'blog' => [
//                        'icon' => '',
//                        'title' => 'Blog',
//                        'sub_menu' => [
//                            'blog-layout-1' => [
//                                'icon' => '',
//                                'route_name' => 'blog-layout-1',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 1'
//                            ],
//                            'blog-layout-2' => [
//                                'icon' => '',
//                                'route_name' => 'blog-layout-2',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 2'
//                            ],
//                            'blog-layout-3' => [
//                                'icon' => '',
//                                'route_name' => 'blog-layout-3',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 3'
//                            ]
//                        ]
//                    ],
//                    'pricing' => [
//                        'icon' => '',
//                        'title' => 'Pricing',
//                        'sub_menu' => [
//                            'pricing-layout-1' => [
//                                'icon' => '',
//                                'route_name' => 'pricing-layout-1',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 1'
//                            ],
//                            'pricing-layout-2' => [
//                                'icon' => '',
//                                'route_name' => 'pricing-layout-2',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 2'
//                            ]
//                        ]
//                    ],
//                    'invoice' => [
//                        'icon' => '',
//                        'title' => 'Invoice',
//                        'sub_menu' => [
//                            'invoice-layout-1' => [
//                                'icon' => '',
//                                'route_name' => 'invoice-layout-1',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 1'
//                            ],
//                            'invoice-layout-2' => [
//                                'icon' => '',
//                                'route_name' => 'invoice-layout-2',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 2'
//                            ]
//                        ]
//                    ],
//                    'faq' => [
//                        'icon' => '',
//                        'title' => 'FAQ',
//                        'sub_menu' => [
//                            'faq-layout-1' => [
//                                'icon' => '',
//                                'route_name' => 'faq-layout-1',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 1'
//                            ],
//                            'faq-layout-2' => [
//                                'icon' => '',
//                                'route_name' => 'faq-layout-2',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 2'
//                            ],
//                            'faq-layout-3' => [
//                                'icon' => '',
//                                'route_name' => 'faq-layout-3',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 3'
//                            ]
//                        ]
//                    ],
//                    'login' => [
//                        'icon' => '',
//                        'route_name' => 'login',
//                        'params' => [
//                            'layout' => 'login'
//                        ],
//                        'title' => 'Login'
//                    ],
//                    'register' => [
//                        'icon' => '',
//                        'route_name' => 'register',
//                        'params' => [
//                            'layout' => 'login'
//                        ],
//                        'title' => 'Register'
//                    ],
//                    'error-page' => [
//                        'icon' => '',
//                        'route_name' => 'error-page',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Error Page'
//                    ],
//                    'update-profile' => [
//                        'icon' => '',
//                        'route_name' => 'update-profile',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Update profile'
//                    ],
//                    'change-password' => [
//                        'icon' => '',
//                        'route_name' => 'change-password',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Change Password'
//                    ]
                ]
            ],

        ];
    }
}
