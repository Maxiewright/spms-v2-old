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
                'route_name' => 'servicepeople',
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
//            'inbox' => [
//                'icon' => 'inbox',
//                'route_name' => 'inbox',
//                'params' => [
//                    'layout' => 'side-menu'
//                ],
//                'title' => 'Inbox'
//            ],
//            'file-manager' => [
//                'icon' => 'hard-drive',
//                'route_name' => 'file-manager',
//                'params' => [
//                    'layout' => 'side-menu'
//                ],
//                'title' => 'File Manager'
//            ],
//            'point-of-sale' => [
//                'icon' => 'credit-card',
//                'route_name' => 'point-of-sale',
//                'params' => [
//                    'layout' => 'side-menu'
//                ],
//                'title' => 'Point of Sale'
//            ],
//            'chat' => [
//                'icon' => 'message-square',
//                'route_name' => 'chat',
//                'params' => [
//                    'layout' => 'side-menu'
//                ],
//                'title' => 'Chat'
//            ],
//            'post' => [
//                'icon' => 'file-text',
//                'route_name' => 'post',
//                'params' => [
//                    'layout' => 'side-menu'
//                ],
//                'title' => 'Post'
//            ],
//            'devider',
//            'crud' => [
//                'icon' => 'edit',
//                'title' => 'Crud',
//                'sub_menu' => [
//                    'crud-data-list' => [
//                        'icon' => '',
//                        'route_name' => 'crud-data-list',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Data List'
//                    ],
//                    'crud-form' => [
//                        'icon' => '',
//                        'route_name' => 'crud-form',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Form'
//                    ]
//                ]
//            ],
//            'users' => [
//                'icon' => 'users',
//                'title' => 'Users',
//                'sub_menu' => [
//                    'users-layout-1' => [
//                        'icon' => '',
//                        'route_name' => 'users-layout-1',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Layout 1'
//                    ],
//                    'users-layout-2' => [
//                        'icon' => '',
//                        'route_name' => 'users-layout-2',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Layout 2'
//                    ],
//                    'users-layout-3' => [
//                        'icon' => '',
//                        'route_name' => 'users-layout-3',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Layout 3'
//                    ]
//                ]
//            ],
//            'profile' => [
//                'icon' => 'trello',
//                'title' => 'Profile',
//                'sub_menu' => [
//                    'profile-overview-1' => [
//                        'icon' => '',
//                        'route_name' => 'profile-overview-1',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Overview 1'
//                    ],
//                    'profile-overview-2' => [
//                        'icon' => '',
//                        'route_name' => 'profile-overview-2',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Overview 2'
//                    ],
//                    'profile-overview-3' => [
//                        'icon' => '',
//                        'route_name' => 'profile-overview-3',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Overview 3'
//                    ]
//                ]
//            ],
//            'pages' => [
//                'icon' => 'layout',
//                'title' => 'Pages',
//                'sub_menu' => [
//                    'wizards' => [
//                        'icon' => '',
//                        'title' => 'Wizards',
//                        'sub_menu' => [
//                            'wizard-layout-1' => [
//                                'icon' => '',
//                                'route_name' => 'wizard-layout-1',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 1'
//                            ],
//                            'wizard-layout-2' => [
//                                'icon' => '',
//                                'route_name' => 'wizard-layout-2',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 2'
//                            ],
//                            'wizard-layout-3' => [
//                                'icon' => '',
//                                'route_name' => 'wizard-layout-3',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Layout 3'
//                            ]
//                        ]
//                    ],
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
//                ]
//            ],
//            'devider',
//            'components' => [
//                'icon' => 'inbox',
//                'title' => 'Components',
//                'sub_menu' => [
//                    'grid' => [
//                        'icon' => '',
//                        'title' => 'Grid',
//                        'sub_menu' => [
//                            'regular-table' => [
//                                'icon' => '',
//                                'route_name' => 'regular-table',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Regular Table'
//                            ],
//                            'tabulator' => [
//                                'icon' => '',
//                                'route_name' => 'tabulator',
//                                'params' => [
//                                    'layout' => 'side-menu'
//                                ],
//                                'title' => 'Tabulator'
//                            ]
//                        ]
//                    ],
//                    'accordion' => [
//                        'icon' => '',
//                        'route_name' => 'accordion',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Accordion'
//                    ],
//                    'button' => [
//                        'icon' => '',
//                        'route_name' => 'button',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Button'
//                    ],
//                    'modal' => [
//                        'icon' => '',
//                        'route_name' => 'modal',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Modal'
//                    ],
//                    'alert' => [
//                        'icon' => '',
//                        'route_name' => 'alert',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Alert'
//                    ],
//                    'progress-bar' => [
//                        'icon' => '',
//                        'route_name' => 'progress-bar',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Progress Bar'
//                    ],
//                    'tooltip' => [
//                        'icon' => '',
//                        'route_name' => 'tooltip',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Tooltip'
//                    ],
//                    'dropdown' => [
//                        'icon' => '',
//                        'route_name' => 'dropdown',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Dropdown'
//                    ],
//                    'toast' => [
//                        'icon' => '',
//                        'route_name' => 'toast',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Toast'
//                    ],
//                    'typography' => [
//                        'icon' => '',
//                        'route_name' => 'typography',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Typography'
//                    ],
//                    'icon' => [
//                        'icon' => '',
//                        'route_name' => 'icon',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Icon'
//                    ],
//                    'loading-icon' => [
//                        'icon' => '',
//                        'route_name' => 'loading-icon',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Loading Icon'
//                    ]
//                ]
//            ],
//            'forms' => [
//                'icon' => 'sidebar',
//                'title' => 'Forms',
//                'sub_menu' => [
//                    'regular-form' => [
//                        'icon' => '',
//                        'route_name' => 'regular-form',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Regular Form'
//                    ],
//                    'datepicker' => [
//                        'icon' => '',
//                        'route_name' => 'datepicker',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Datepicker'
//                    ],
//                    'tail-select' => [
//                        'icon' => '',
//                        'route_name' => 'tail-select',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Tail Select'
//                    ],
//                    'file-upload' => [
//                        'icon' => '',
//                        'route_name' => 'file-upload',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'File Upload'
//                    ],
//                    'wysiwyg-editor' => [
//                        'icon' => '',
//                        'route_name' => 'wysiwyg-editor',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Wysiwyg Editor'
//                    ],
//                    'validation' => [
//                        'icon' => '',
//                        'route_name' => 'validation',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Validation'
//                    ]
//                ]
//            ],
//            'widgets' => [
//                'icon' => 'hard-drive',
//                'title' => 'Widgets',
//                'sub_menu' => [
//                    'chart' => [
//                        'icon' => '',
//                        'route_name' => 'chart',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Chart'
//                    ],
//                    'slider' => [
//                        'icon' => '',
//                        'route_name' => 'slider',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Slider'
//                    ],
//                    'image-zoom' => [
//                        'icon' => '',
//                        'route_name' => 'image-zoom',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Image Zoom'
//                    ]
//                ]
//            ]
        ];
    }
}
