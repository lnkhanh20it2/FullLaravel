<?php
    return [
        [
            'label'=>'Dashboard',
            'route'=>'admin.dashboard',
            'icon'=>'fa-home'
        ],
        [
            'label'=>'Category Manager',
            'route'=>'category.index',
            'icon'=>'fa-shopping-cart',
            'items' => [
                [
                    'label' => 'All Category',
                    'route' => 'category.index'
                ],
                [
                    'label' => 'Add Category',
                    'route' => 'category.create'
                ]
            ]
        ],
        [
            'label'=>'Product Manager',
            'route'=>'product.index',
            'icon'=>'fa-shopping-cart',
            'items' => [
                [
                    'label' => 'All Product',
                    'route' => 'product.index'
                ],
                [
                    'label' => 'Add Product',
                    'route' => 'product.create'
                ]
            ]
        ],
        [
            'label'=>'Order Manager',
            'route'=>'order.index',
            'icon'=>'fa-shopping-cart',
            'items' => [
                [
                    'label' => 'All Order',
                    'route' => 'order.index'
                ],
                [
                    'label' => 'Statistic',
                    'route' => 'product.index'
                ]
            ]
        ],
        [
            'label'=>'Account Admin',
            'route'=>'user.index',
            'icon'=>'fa-user',
            'items' => [
                [
                    'label' => 'All Account',
                    'route' => 'user.index'
                ],
                [
                    'label' => 'Add Account',
                    'route' => 'user.create'
                ]
            ]
        ]
        ,
        [
            'label'=>'Account User',
            'route'=>'account.index',
            'icon'=>'fa-user',
            'items' => [
                [
                    'label' => 'All Account',
                    'route' => 'account.index'
                ]
            ]
        ]
        ,
        [
            'label'=>'File Manager',
            'route'=>'admin.file',
            'icon'=>'fa-file',
        ]
    ]
?>